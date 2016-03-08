<?php

//微赞科技 by QQ:800083075 http://www.012wz.com/
if (!defined('IN_IA')) {
	die('Access Denied');
}
global $_W, $_GPC;
$kwd = trim($_GPC['keyword']);
$params = array();
$params[':uniacid'] = $_W['uniacid'];
$condition = " and uniacid=:uniacid";
if (!empty($kwd)) {
	$condition .= " AND `title` LIKE :keyword";
	$params[':keyword'] = "%{$kwd}%";
}
$ds = pdo_fetchall('SELECT id,title,thumb FROM ' . tablename('ewei_shop_goods') . " WHERE 1 {$condition} order by createtime desc", $params);
$ds = set_medias($ds, 'thumb');
include $this->template('web/shop/query');