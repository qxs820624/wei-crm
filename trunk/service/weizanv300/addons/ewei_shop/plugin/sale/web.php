<?php

//微赞科技 by QQ:800083075 http://www.012wz.com/
if (!defined('IN_IA')) {
	die('Access Denied');
}
class SaleWeb extends Plugin
{
	public function __construct()
	{
		parent::__construct('sale');
	}
	public function index()
	{
		global $_W;
		if (cv('sale.deduct.view')) {
			header('location: ' . $this->createPluginWebUrl('sale/deduct'));
			die;
		} else {
			if (cv('sale.enough.view')) {
				header('location: ' . $this->createPluginWebUrl('sale/enough'));
				die;
			}
		}
	}
	public function deduct()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
	public function enough()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
}