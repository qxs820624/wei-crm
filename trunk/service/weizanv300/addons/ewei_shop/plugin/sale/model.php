<?php

//微赞科技 by QQ:800083075 http://www.012wz.com/
if (!defined('IN_IA')) {
	die('Access Denied');
}
if (!class_exists('SaleModel')) {
	class SaleModel extends PluginModel
	{
		public function perms()
		{
			return array('sale' => array('text' => $this->getName(), 'isplugin' => true, 'child' => array('deduct' => array('text' => '抵扣设置', 'view' => '查看', 'save' => '保存-log'), 'enough' => array('text' => '满额优惠设置', 'view' => '查看', 'save' => '保存-log'))));
		}
	}
}