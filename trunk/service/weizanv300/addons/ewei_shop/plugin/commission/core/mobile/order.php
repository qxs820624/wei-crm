<?php

//微赞科技 by QQ:800083075 http://www.012wz.com/
global $_W, $_GPC;
$openid = m('user')->getOpenid();
$member = $this->model->getInfo($openid, array('ordercount0'));
$agentLevel = $this->model->getLevel($openid);
$level = intval($this->set['level']);
$commissioncount = 0;
$status = trim($_GPC['status']);
$condition = ' and o.status>=0';
if ($status != '') {
	$condition = ' and o.status=' . intval($status);
}
$orders = array();
$level1 = $member['level1'];
$level2 = $member['level2'];
$level3 = $member['level3'];
$ordercount = $member['ordercount0'];
if ($level >= 1) {
	$level1_memberids = pdo_fetchall('select id from ' . tablename('ewei_shop_member') . ' where uniacid=:uniacid and agentid=:agentid', array(':uniacid' => $_W['uniacid'], ':agentid' => $member['id']), 'id');
	$level1_orders = pdo_fetchall('select commission1,o.id,o.createtime,o.price from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join  ' . tablename('ewei_shop_order') . ' o on og.orderid=o.id ' . " where o.uniacid=:uniacid and o.agentid=:agentid {$condition} and og.status1>=0", array(':uniacid' => $_W['uniacid'], ':agentid' => $member['id']));
	foreach ($level1_orders as $o) {
		if (empty($o['id'])) {
			continue;
		}
		$commission = iunserializer($o['commission1']);
		$commission_ok = isset($commission['level' . $agentLevel['id']]) ? $commission['level' . $agentLevel['id']] : $commission['default'];
		$hasorder = false;
		foreach ($orders as &$or) {
			if ($or['id'] == $o['id'] && $or['level'] == 1) {
				$or['commission'] += $commission_ok;
				$hasorder = true;
				break;
			}
		}
		unset($or);
		if (!$hasorder) {
			$orders[] = array('id' => $o['id'], 'commission' => $commission_ok, 'createtime' => $o['createtime'], 'level' => 1);
		}
		$commissioncount += $commission_ok;
	}
}
if ($level >= 2) {
	if ($level1 > 0) {
		$level2_orders = pdo_fetchall('select commission2 ,o.id,o.createtime,o.price   from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join  ' . tablename('ewei_shop_order') . ' o on og.orderid=o.id ' . " where o.uniacid=:uniacid and o.agentid in( " . implode(',', array_keys($member['level1_agentids'])) . ")  {$condition}  and og.status2>=0 ", array(':uniacid' => $_W['uniacid']));
		foreach ($level2_orders as $o) {
			if (empty($o['id'])) {
				continue;
			}
			$commission = iunserializer($o['commission2']);
			$commission_ok = isset($commission['level' . $agentLevel['id']]) ? $commission['level' . $agentLevel['id']] : $commission['default'];
			$hasorder = false;
			foreach ($orders as &$or) {
				if ($or['id'] == $o['id'] && $or['level'] == 2) {
					$or['commission'] += $commission_ok;
					$hasorder = true;
					break;
				}
			}
			unset($or);
			if (!$hasorder) {
				$orders[] = array('id' => $o['id'], 'commission' => $commission_ok, 'createtime' => $o['createtime'], 'level' => 2);
			}
			$commissioncount += $commission_ok;
		}
	}
}
if ($level >= 3) {
	if ($level2 > 0) {
		$level3_orders = pdo_fetchall('select commission3 ,o.id,o.createtime,o.price  from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join  ' . tablename('ewei_shop_order') . ' o on og.orderid=o.id ' . ' where o.uniacid=:uniacid and o.agentid in( ' . implode(',', array_keys($member['level2_agentids'])) . ")  {$condition} and og.status3>=0", array(':uniacid' => $_W['uniacid']));
		foreach ($level3_orders as $o) {
			if (empty($o['id'])) {
				continue;
			}
			$commission = iunserializer($o['commission3']);
			$commission_ok = isset($commission['level' . $agentLevel['id']]) ? $commission['level' . $agentLevel['id']] : $commission['default'];
			$hasorder = false;
			foreach ($orders as &$or) {
				if ($or['id'] == $o['id'] && $or['level'] == 3) {
					$or['commission'] += $commission_ok;
					$hasorder = true;
					break;
				}
			}
			unset($or);
			if (!$hasorder) {
				$orders[] = array('id' => $o['id'], 'commission' => $commission_ok, 'createtime' => $o['createtime'], 'level' => 3);
			}
			$commissioncount += $commission_ok;
		}
	}
}
usort($orders, 'sortByCreateTime');
$commissioncount = number_format($commissioncount, 2);
if ($_W['isajax']) {
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;
	$orders1 = array_slice($orders, ($pindex - 1) * $psize, $psize);
	$orderids = array();
	foreach ($orders1 as $o) {
		$orderids[$o['id']] = $o;
	}
	$list = array();
	if (!empty($orderids)) {
		$list = pdo_fetchall("select id,ordersn,createtime,status from " . tablename('ewei_shop_order') . "  where uniacid ={$_W['uniacid']} and id in ( " . implode(',', array_keys($orderids)) . ") order by id desc limit " . ($pindex - 1) * $psize . ',' . $psize);
		foreach ($list as &$row) {
			$row['commission'] = number_format($orderids[$row['id']]['commission'], 2);
			$row['createtime'] = date('Y-m-d H:i', $row['createtime']);
			if ($row['status'] == 0) {
				$row['status'] = '待付款';
			} else {
				if ($row['status'] == 1) {
					$row['status'] = '已付款';
				} else {
					if ($row['status'] == 2) {
						$row['status'] = '待收货';
					} else {
						if ($row['status'] == 3) {
							$row['status'] = '已完成';
						}
					}
				}
			}
			if ($orderids[$row['id']]['level'] == 1) {
				$row['level'] = '一';
			} else {
				if ($orderids[$row['id']]['level'] == 2) {
					$row['level'] = '二';
				} else {
					if ($orderids[$row['id']]['level'] == 3) {
						$row['level'] = '三';
					}
				}
			}
		}
		unset($row);
	}
	show_json(1, array('list' => $list, 'pagesize' => $psize));
}
include $this->template('order');