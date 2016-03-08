<?php /*站长吧源码论坛 www.admin8.co*/
global $_W,$_GPC;

$tempalte = $this->module['config']['name']?$this->module['config']['name']:'default';

include $this->template($tempalte.'/templates/jssdkdemo');