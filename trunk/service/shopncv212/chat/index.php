<?php
/**
 * 初始化文件
 *
 * @网店运维提供技术支持 授权请购买shopnc授权
 * @license    http://www.goodziyuan.com
 * @link       http://www.goodziyuan.com/
 */
define('APP_ID','chat');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
if (!@include(dirname(dirname(__FILE__)).'/shopwwi.php')) exit('shopwwi.php isn\'t exists!');

if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');

Base::run();
?>