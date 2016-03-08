<?php /*站长吧源码论坛 www.admin8.co*/
global $_W,$_GPC;

load()->model('mc');
$tempalte = $this->module['config']['name']?$this->module['config']['name']:'default';

$forum = getSet();
include $this->template($tempalte.'/templates/forum/mianze');