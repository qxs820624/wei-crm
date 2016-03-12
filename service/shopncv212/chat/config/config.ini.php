<?php
defined('ByShopWWI') or exit('Access Invalid!');
/* if (!@include(BASE_DATA_PATH.'/config/config.ini.php')) exit('config.ini.php isn\'t exists!');
if (file_exists(BASE_PATH.'/config/config.ini.php')){
	include(BASE_PATH.'/config/config.ini.php');
}
global $config; */
define('NODE_SITE_URL',$config['node_site_url']);
define('CHAT_SITE_URL',$config['chat_site_url']);

define('CHAT_TEMPLATES_URL',CHAT_SITE_URL.'/templates/default');
define('CHAT_RESOURCE_URL',CHAT_SITE_URL.'/resource');