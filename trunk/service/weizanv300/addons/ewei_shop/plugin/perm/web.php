<?php

//微赞科技 by QQ:800083075 http://www.012wz.com/
if (!defined('IN_IA')) {
	die('Access Denied');
}
class PermWeb extends Plugin
{
	public function __construct()
	{
		parent::__construct('perm');
	}
	public function index()
	{
		if (cv('perm.role')) {
			header('location: ' . $this->createPluginWebUrl('perm/role'));
			die;
		} else {
			if (cv('perm.user')) {
				header('location: ' . $this->createPluginWebUrl('perm/user'));
				die;
			} else {
				if (cv('perm.log')) {
					header('location: ' . $this->createPluginWebUrl('perm/log'));
					die;
				} else {
					if (cv('perm.set')) {
						header('location: ' . $this->createPluginWebUrl('perm/set'));
						die;
					}
				}
			}
		}
	}
	public function set()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
	public function role()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
	public function user()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
	public function log()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
	public function plugins()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
	public function setting()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
}