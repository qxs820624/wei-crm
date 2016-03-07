<?php
//折翼天使资源社区 http://www.zheyitianshi.com/
defined('IN_IA') or exit('Access Denied');
define('MB_ROOT', IA_ROOT . '/addons/feng_fightgroups');

class Feng_fightgroupsModuleSite extends WeModuleSite
{
	public function getuserinfo()
	{
		global $_W;
		load()->model('mc');
		$profile = pdo_fetch("SELECT * FROM " . tablename('mc_mapping_fans') . " WHERE uniacid ='{$_W['uniacid']}' and openid = '{$_W['openid']}'");
		if (empty($profile['nickname'])) {
			$userinfo = mc_oauth_userinfo();
			$fan = mc_fansinfo($_SESSION['openid']);
			if (!empty($fan)) {
				$record = array('updatetime' => TIMESTAMP, 'nickname' => stripslashes($userinfo['nickname']), 'follow' => $userinfo['subscribe'], 'followtime' => $userinfo['subscribe_time'], 'tag' => base64_encode(iserializer($userinfo)));
				pdo_update('mc_mapping_fans', $record, array('openid' => $_SESSION['openid'], 'acid' => $_W['acid'], 'uniacid' => $_W['uniacid']));
			} else {
				$record = array();
				$record['updatetime'] = TIMESTAMP;
				$record['nickname'] = stripslashes($userinfo['nickname']);
				$record['tag'] = base64_encode(iserializer($userinfo));
				$record['openid'] = $_SESSION['openid'];
				$record['acid'] = $_W['acid'];
				$record['uniacid'] = $_W['uniacid'];
				pdo_insert('mc_mapping_fans', $record);
			}
			if (!empty($fan['uid']) || !empty($_SESSION['uid'])) {
				$uid = intval($fan['uid']);
				if (empty($uid)) {
					$uid = intval($_SESSION['uid']);
				}
				$member = mc_fetch($uid, array('nickname', 'gender', 'residecity', 'resideprovince', 'nationality', 'avatar'));
				$record = array();
				if (empty($member['nickname']) && !empty($userinfo['nickname'])) {
					$record['nickname'] = stripslashes($userinfo['nickname']);
				}
				if (empty($member['gender']) && !empty($userinfo['sex'])) {
					$record['gender'] = $userinfo['sex'];
				}
				if (empty($member['residecity']) && !empty($userinfo['city'])) {
					$record['residecity'] = $userinfo['city'] . '市';
				}
				if (empty($member['resideprovince']) && !empty($userinfo['province'])) {
					$record['resideprovince'] = $userinfo['province'] . '省';
				}
				if (empty($member['nationality']) && !empty($userinfo['country'])) {
					$record['nationality'] = $userinfo['country'];
				}
				if (empty($member['avatar']) && !empty($userinfo['avatar'])) {
					$record['avatar'] = rtrim($userinfo['avatar'], '0') . 132;
				}
				if (!empty($record)) {
					pdo_update('mc_members', $record, array('uid' => intval($uid)));
				}
			}
		}
	}

	public function updategourp()
	{
		global $_W;
		$now = time();
		$allgroups = pdo_fetchall("select *from" . tablename('tg_group') . "where groupstatus=3 and uniacid='{$_W['uniacid']}'");
		foreach ($allgroups as $key => $value) {
			if ($value['endtime'] < $now && $value['lacknum'] > 0) {
				pdo_update('tg_group', array('groupstatus' => 1), array('groupnumber' => $value['groupnumber']));
				$orders = pdo_fetchall("select * from" . tablename('tg_order') . "where tuan_id='{$value['groupnumber']}' and uniacid='{$_W['uniacid']}' and status in(1,2,3,4)");
				foreach ($orders as $k => $v) {
					$res = pdo_update('tg_order', array('status' => 6), array('id' => $v['id']));
				}
			}
		}
	}

	public function cancleorder()
	{
		global $_W;
		$allgroups = pdo_fetchall("select *from" . tablename('tg_order') . "where status=0 and uniacid='{$_W['uniacid']}'");
		$now = time();
		foreach ($allgroups as $key => $value) {
			$shouldpaytime = $value['createtime'] + 1800;
			if ($shouldpaytime < $now) {
				$res = pdo_update('tg_order', array('status' => 5), array('id' => $value['id']));
			}
		}
	}

	public function backlists()
	{
		global $_W, $frames;
		require_once MB_ROOT . '/source/backlist.class.php';
		$backlist = new backlist();
		$frames = $backlist->getModuleFrames('feng_fightgroups');
		$backlist->_calc_current_frames2($frames);
	}

	public function checkpay($openid)
	{
		global $_GPC, $_W;
		$content = " and uniacid='{$_W['uniacid']}' ";
		if ($openid) {
			$content .= " AND openid='{$openid}' ";
		}
		$orders = pdo_fetchall("select * from" . tablename('tg_order') . "where checkpay=0  $content");
		foreach ($orders as $key => $value) {
			$log = pdo_fetch('SELECT * FROM ' . tablename('core_paylog') . "WHERE tid = '{$value['orderno']}' AND uniacid = '{$_W['uniacid']}'");
			$tag = iunserializer($log['tag']);
			$params['type'] = $log['type'];
			$params['tag'] = $tag;
			$paytype = array('credit' => 1, 'wechat' => 2, 'alipay' => 2, 'delivery' => 3);
			$data['pay_type'] = $paytype[$params['type']];
			if ($log['status'] == '1') {
				if ($value['status'] < 1) {
					$data['status'] = $log['status'];
				}
			}
			if ($params['type'] == 'wechat') {
				$data['transid'] = $params['tag']['transaction_id'];
			}
			if ($log['status'] == '1' && empty($value['ptime'])) {
				$data['ptime'] = TIMESTAMP;
				$data['starttime'] = TIMESTAMP;
			}
			$data['checkpay'] = 1;
			pdo_update('tg_order', $data, array('id' => $value['id']));
		}
	}

	public function refund($orderno, $price, $type)
	{
		global $_GPC, $_W;
		include_once '../addons/feng_fightgroups/source/WxPay.Api.php';
		$WxPayApi = new WxPayApi();
		$input = new WxPayRefund();
		load()->model('account');
		load()->func('communication');
		$accounts = uni_accounts();
		$acid = $_W['uniacid'];
		$path_cert = IA_ROOT . '/addons/feng_fightgroups/cert/' . $_W['uniacid'] . '/apiclient_cert.pem';
		$path_key = IA_ROOT . '/addons/feng_fightgroups/cert/' . $_W['uniacid'] . '/apiclient_key.pem';
		$key = $this->module['config']['apikey'];
		$account_info = pdo_fetch("select * from" . tablename('account_wechats') . "where uniacid={$_W['uniacid']}");
		$appid = $account_info['key'];
		$mchid = $this->module['config']['mchid'];
		$refund_ids = pdo_fetch("select * from" . tablename('tg_order') . "where orderno ='{$orderno}'");
		$goods = pdo_fetch("select * from" . tablename('tg_goods') . "where id='{$refund_ids['g_id']}'");
		if (!empty($price)) {
			$fee = $price;
		} else {
			$fee = $refund_ids['price'] * 100;
		}
		$refundid = $refund_ids['transid'];
		$input->SetAppid($appid);
		$input->SetMch_id($mchid);
		$input->SetOp_user_id($mchid);
		$input->SetOut_refund_no($refund_ids['orderno']);
		$input->SetRefund_fee($fee);
		$input->SetTotal_fee($refund_ids['price'] * 100);
		$input->SetTransaction_id($refundid);
		$result = $WxPayApi->refund($input, 6, $path_cert, $path_key, $key);
		$data = array('transid' => $refund_ids['transid'], 'refund_id' => $result['refund_id'], 'createtime' => TIMESTAMP, 'status' => 0, 'type' => $type, 'goodsid' => $refund_ids['g_id'], 'orderid' => $refund_ids['id'], 'payfee' => $refund_ids['price'], 'refundfee' => $refund_ids['price'], 'refundername' => $refund_ids['addname'], 'refundermobile' => $refund_ids['mobile'], 'goodsname' => $goods['gname'], 'uniacid' => $_W['uniacid']);
		pdo_insert('tg_refund_record', $data);
		if ($result['return_code'] == 'SUCCESS') {
			if ($type == 3) {
				pdo_update('tg_order', array('status' => 7, 'is_tuan' => 2), array('id' => $refund_ids['id']));
			} else {
				pdo_update('tg_order', array('status' => 7), array('id' => $refund_ids['id']));
			}
			pdo_update('tg_refund_record', array('status' => 1), array('transid' => $refund_ids['transid']));
			require_once IA_ROOT . '/addons/feng_fightgroups/source/Message.class.php';
			$access_token = WeAccount::token();
			$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token . "";
			$url2 = '';
			$sendmessage = new Message();
			if ($type == 4) {
				$res = $sendmessage->part_refund($refund_ids['openid'], $price * 0.01, $this, $url1, $url2);
			} else {
				$res = $sendmessage->refund($refund_ids['openid'], $refund_ids['price'], $this, $url1, $url2);
			}
			pdo_query('update' . tablename('tg_goods') . " set gnum=gnum+1 where id = '{$refund_ids['g_id']}'");
			return 'success';
		} else {
			if ($type == 3) {
				pdo_update('tg_order', array('status' => 6, 'is_tuan' => 2), array('id' => $refund_ids['id']));
			} else {
				pdo_update('tg_order', array('status' => 6), array('id' => $refund_ids['id']));
			}
			return 'fail';
		}
	}

	public function checkmode()
	{
		if (empty($this->module['config']['mode'])) {
			message('请先设置拼团模式', "../web/index.php?c=profile&a=module&do=setting&m=feng_fightgroups", 'warning');
			exit;
		}
	}

	public function payResult($params)
	{
		global $_W, $_GPC;
		$fee = intval($params['fee']);
		$data = array('status' => $params['result'] == 'success' ? 1 : 0);
		$paytype = array('credit' => 1, 'wechat' => 2, 'alipay' => 2, 'delivery' => 3);
		$data['pay_type'] = $paytype[$params['type']];
		if ($params['type'] == 'wechat') {
			$data['transid'] = $params['tag']['transaction_id'];
		}
		$order_out = pdo_fetch("select * from" . tablename('tg_order') . "where orderno = '{$params['tid']}'");
		$goodsInfo = pdo_fetch("SELECT * FROM" . tablename('tg_goods') . "WHERE `id` = :id ", array(':id' => $order_out['g_id']));
		$nowtuan = pdo_fetch("select * from" . tablename('tg_group') . "where groupnumber = '{$order_out['tuan_id']}'");
		if (!empty($nowtuan)) {
			if ($nowtuan['lacknum'] == 0 && $order_out['status'] == 0) {
				echo "<script>location.href='" . $_W['siteroot'] . 'app/' . $this->createMobileUrl('more_refund', array('orderno' => $order_out['orderno'])) . "';</script>";
				exit;
			}
		}
		if ($params['type'] == 'delivery') {
			$data['status'] = 1;
			$data['starttime'] = TIMESTAMP;
			$data['ptime'] = TIMESTAMP;
		}
		if ($params['result'] == 'success') {
			$data['ptime'] = TIMESTAMP;
			$data['starttime'] = TIMESTAMP;
		}
		if ($params['result'] == 'success' && $params['from'] == 'notify') {
			require_once MB_ROOT . '/source/Message.class.php';
			load()->model('account');
			$access_token = WeAccount::token();
			$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token . "";
			$url2 = $_W['siteroot'] . 'app/' . $this->createMobileUrl('myorder', array('id' => $order_out['id']));
			$sendmessage = new Message();
			$res = $sendmessage->pay_success($order_out['openid'], $order_out['orderno'], $goodsInfo['gname'], $this, $url1, $url2);
			if ($order_out['status'] != 1) {
				pdo_update('tg_order', $data, array('orderno' => $params['tid']));
				if ($order_out['is_tuan'] == 0) {
					pdo_update('tg_order', array('status' => 2), array('orderno' => $params['tid']));
				}
				if (!empty($goodsInfo['gnum'])) {
					pdo_update('tg_goods', array('gnum' => $goodsInfo['gnum'] - 1, 'salenum' => $goodsInfo['salenum'] + 1), array('id' => $order_out['g_id']));
				}
			}
			if ($order_out['status'] != 1) {
				if ($nowtuan['lacknum'] > 0) {
					pdo_update('tg_group', array('lacknum' => $nowtuan['lacknum'] - 1), array('groupnumber' => $order_out['tuan_id']));
				}
			}
			$now = pdo_fetch("select * from" . tablename('tg_group') . "where groupnumber = '{$order_out['tuan_id']}'");
			if (!empty($now) && $now['lacknum'] == 0) {
				pdo_update('tg_group', array('groupstatus' => 2), array('groupnumber' => $now['groupnumber']));
				pdo_update('tg_order', array('status' => 2), array('tuan_id' => $now['groupnumber'], 'status' => 1));
				require_once MB_ROOT . '/source/Message.class.php';
				load()->model('account');
				$access_token = WeAccount::token();
				$url1 = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token . "";
				$url2 = '';
				$sendmessage = new Message();
				$res = $sendmessage->group_success($order_out['tuan_id'], $this, $url1, $url2);
				$prints = pdo_fetchall('SELECT * FROM ' . tablename('tg_print') . ' WHERE uniacid = :aid AND status = 1', array(':aid' => $_W['uniacid']));
				if (!empty($prints)) {
					include_once MB_ROOT . '/source/wprint.class.php';
					foreach ($prints as $li) {
						if (!empty($li['print_no']) && !empty($li['key'])) {
							$wprint = new wprint();
							if ($li['mode'] == 1) {
								$orderinfo .= "<CB>组团成功</CB><BR>";
								$orderInfo .= "商品信息：<BR>";
								$orderinfo .= '------------------------------<BR>';
								$orderinfo .= "商品名称：{$goodsInfo['gname']}<BR>";
								$orderinfo .= '------------------------------<BR>';
								$orderinfo .= "用户信息：<BR>";
								$orderinfo .= '------------------------------<BR>';
								foreach ($alltuan as $row) {
									$user = pdo_fetch("select * from" . tablename('tg_address') . "where id='{$row['addressid']}'");
									$orderinfo .= "用户名：{$user['cname']}<BR>";
									$orderinfo .= "手机号：{$user['tel']}<BR>";
									$orderinfo .= "地址：{$user['province']}{$user['city']}{$user['county']}{$user['detailed_address']}<BR>";
									$orderinfo .= '------------------------------<BR>';
								}
								$status = $wprint->StrPrint($li['print_no'], $li['key'], $orderinfo, $li['print_nums']);
							} else {
								$orderinfo .= "组团成功";
								$orderInfo .= "商品信息：";
								$orderinfo .= '------------------------------';
								$orderinfo .= "商品名称：{$goodsInfo['gname']}";
								$orderinfo .= '------------------------------';
								$orderinfo .= "用户信息：";
								$orderinfo .= '------------------------------';
								foreach ($alltuan as $row) {
									$user = pdo_fetch("select * from" . tablename('tg_address') . "where id='{$row['addressid']}'");
									$orderinfo .= "用户名：{$user['cname']}";
									$orderinfo .= "手机号：{$user['tel']}";
									$orderinfo .= "地址：{$user['province']}{$user['city']}{$user['county']}{$user['detailed_address']}";
									$orderinfo .= '------------------------------';
								}
								$status = $wprint->testSendFreeMessage($li['member_code'], $li['print_no'], $li['key'], $orderinfo);
							}
						}
					}
				}
			}
		}
		if ($params['from'] == 'return') {
			$setting = uni_setting($_W['uniacid'], array('creditbehaviors'));
			$credit = $setting['creditbehaviors']['currency'];
			if ($params['type'] == $credit) {
				if ($order_out['is_tuan'] == 0) {
					echo "<script> location.href='" . $this->createMobileUrl('myorder', array('payreslut' => 'success')) . "';</script>";
					exit;
				} else {
					echo '<script>  location.href=\'' . $this->createMobileUrl('group', array('tuan_id' => $order_out['tuan_id'], 'payreslut' => 'success')) . "';</script>";
					exit;
				}
			} else {
				if ($order_out['is_tuan'] == 0) {
					echo "<script>  location.href='" . $_W['siteroot'] . 'app/' . $this->createMobileUrl('myorder', array('payreslut' => 'success')) . "';</script>";
					exit;
				} else {
					echo '<script>  location.href=\'' . $_W['siteroot'] . 'app/' . $this->createMobileUrl('group', array('tuan_id' => $order_out['tuan_id'], 'payreslut' => 'success')) . "';</script>";
					exit;
				}
			}
		}
	}

	protected function pay($params = array())
	{
		global $_W;
		$params['module'] = $this->module['name'];
		$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `uniacid`=:uniacid AND `module`=:module AND `tid`=:tid';
		$pars = array();
		$pars[':uniacid'] = $_W['uniacid'];
		$pars[':module'] = $params['module'];
		$pars[':tid'] = $params['tid'];
		$log = pdo_fetch($sql, $pars);
		if (!empty($log) && $log['status'] == '1') {
			message('这个订单已经支付成功, 不需要重复支付.');
		}
		$setting = uni_setting($_W['uniacid'], array('payment', 'creditbehaviors'));
		if (!is_array($setting['payment'])) {
			message('没有有效的支付方式, 请联系网站管理员.');
		}
		$pay = $setting['payment'];
		$pay['credit']['switch'] = false;
		$pay['delivery']['switch'] = false;
		$share_data = $this->module['config'];
		$_W['page']['footer'] = $share_data['copyright'];
		$title = '支付方式';
		include $this->template('paycenter');
	}
}