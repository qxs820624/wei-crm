<?php /*站长吧源码论坛 www.admin8.co*/
global $_W,$_GPC;


$url = murl('activity',array('a'=>'token','do'=>'mine'));
header("location:$url");
exit();