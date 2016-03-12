<?php
/**
 * 前台control父类
 *
 * @网店运维提供技术支持 授权请购买shopnc授权
 * @license    http://www.goodziyuan.com
 * @link       http://www.goodziyuan.com/
 */
defined('ByShopWWI') or exit('Access Invalid!');

/********************************** 前台control父类 **********************************************/

class BaseControl {
	public function __construct(){
		Language::read('common');
	}
}
