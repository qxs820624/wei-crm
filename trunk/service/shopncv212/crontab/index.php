<?php
/**
 * 队列
 *
 *
 *
 *
 * @网店运维提供技术支持 授权请购买shopnc授权
 * @license    http://www.goodziyuan.com
 * @link       http://www.goodziyuan.com/
 */
 if(!empty($_GET['act'])){
$_SERVER['argv'][1] = $_GET['act'];}
 if(!empty($_GET['op'])){
@$_SERVER['argv'][2] = $_GET['op'];}

if (empty($_SERVER['argv'][1])) exit('Access Invalid!');

define('APP_ID','crontab');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
define('TRANS_MASTER',true);
require __DIR__ . '/../shopwwi.php';

if (PHP_SAPI == 'cli') {
     $_GET['act'] = $_SERVER['argv'][1];
     $_GET['op'] = empty($_SERVER['argv'][2]) ? 'index' : $_SERVER['argv'][2];
}
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
Base::run();
