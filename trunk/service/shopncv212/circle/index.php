<?php
/**
 * 圈子板块初始化文件
 *
 * 圈子板块初始化文件，引用框架初始化文件
 *
 * * @网店运维 (c) 2015-2018 ShopWWI Inc. (http://www.goodziyuan.com)
 * @license    http://www.shopwwi.c om
 * @link       http://www.goodziyuan.com/
 * @since      网店运维提供技术支持 授权请购买shopnc授权
 */
define('APP_ID','circle');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));

require __DIR__ . '/../shopwwi.php';

define('APP_SITE_URL', CIRCLE_SITE_URL);
define('TPL_NAME', TPL_CIRCLE_NAME);
define('CIRCLE_TEMPLATES_URL', CIRCLE_SITE_URL.'/templates/'.TPL_NAME);
define('CIRCLE_RESOURCE_SITE_URL',CIRCLE_SITE_URL.'/resource');
require(BASE_PATH.'/framework/function/function.php');

require(BASE_PATH.'/control/control.php');
Base::run();
