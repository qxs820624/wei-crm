<?php

//微赞科技 by QQ:800083075 http://www.012wz.com/
if (!defined('IN_IA')) {
	die('Access Denied');
}
class QiniuWeb extends Plugin
{
	public function __construct()
	{
		parent::__construct('qiniu');
	}
	public function check($config)
	{
		return p('qiniu')->save('http://www.baidu.com/img/bdlogo.png', $config);
	}
	public function index()
	{
		$this->_exec_plugin(__FUNCTION__);
	}
}