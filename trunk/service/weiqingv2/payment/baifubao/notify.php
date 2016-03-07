<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
define('IN_MOBILE', true);
require '../../framework/bootstrap.inc.php';
$_GPC['i'] = !empty($_GPC['i']) ? $_GPC['i'] : $_GET['extra'];
require '../../app/common/bootstrap.app.inc.php';
load()->app('common');
load()->app('template');

$setting = uni_setting($_W['uniacid'], array('payment'));
if(!is_array($setting['payment'])) {
	exit('没有设定支付参数.');
}
$payment = $setting['payment']['baifubao'];
require 'bfb_sdk.php';
$bfb_sdk = new bfb_sdk();
if (!empty($_GPC['pay_result']) && $_GPC['pay_result'] == '1') {
	if (true === $bfb_sdk->check_bfb_pay_result_notify()) {
		$sql = 'SELECT * FROM ' . tablename('core_paylog') . ' WHERE `uniontid`=:uniontid';
		$params = array();
		$params[':uniontid'] = $_GPC['order_no'];
		$log = pdo_fetch($sql, $params);
		if(!empty($log) && $log['status'] == '0') {
			$log['tag'] = iunserializer($log['tag']);
			$log['tag']['bfb_order_no'] = $_POST['bfb_order_no'];
			$record = array();
			$record['status'] = 1;
			$record['tag'] = iserializer($log['tag']);
			pdo_update('core_paylog', $record, array('plid' => $log['plid']));

						if($log['is_usecard'] == 1 && $log['card_type'] == 1 &&  !empty($log['encrypt_code']) && $log['acid']) {
				load()->classs('coupon');
				$acc = new coupon($log['acid']);
				$codearr['encrypt_code'] = $log['encrypt_code'];
				$codearr['module'] = $log['module'];
				$codearr['card_id'] = $log['card_id'];
				$acc->PayConsumeCode($codearr);
			}
						if($log['is_usecard'] == 1 && $log['card_type'] == 2) {
				$now = time();
				$log['card_id'] = intval($log['card_id']);
				$iscard = pdo_fetchcolumn('SELECT iscard FROM ' . tablename('modules') . ' WHERE name = :name', array(':name' => $log['module']));
				$condition = '';
				if($iscard == 1) {
					$condition = " AND grantmodule = '{$log['module']}'";
				}
				pdo_query('UPDATE ' . tablename('activity_coupon_record') . " SET status = 2, usetime = {$now}, usemodule = '{$log['module']}' WHERE uniacid = :aid AND couponid = :cid AND uid = :uid AND status = 1 {$condition} LIMIT 1", array(':aid' => $_W['uniacid'], ':uid' => $log['openid'], ':cid' => $log['card_id']));
			}

			$site = WeUtility::createModuleSite($log['module']);
			if(!is_error($site)) {
				$method = 'payResult';
				if (method_exists($site, $method)) {
					$ret = array();
					$ret['weid'] = $log['uniacid'];
					$ret['uniacid'] = $log['uniacid'];
					$ret['result'] = 'success';
					$ret['type'] = $log['type'];
					$ret['from'] = 'return';
					$ret['tid'] = $log['tid'];
					$ret['uniontid'] = $log['uniontid'];
					$ret['user'] = $log['openid'];
					$ret['fee'] = $log['fee'];
					$ret['tag'] = $log['tag'];
					$site->$method($ret);
					$bfb_sdk->notify_bfb();
					exit('success');
				}
			}
		}
	}
}
$bfb_sdk->notify_bfb();
exit('fail');