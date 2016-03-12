<?php
/**
 * 物流自提服务站首页
 *
 * * @网店运维 (c) 2015-2018 ShopWWI Inc. (http://www.goodziyuan.com)
 * @license    http://www.shopwwi.c om
 * @link       http://www.goodziyuan.com/
 * @since      网店运维提供技术支持 授权请购买shopnc授权
 */



defined('ByShopWWI') or exit('Access Invalid!');

class indexControl extends BaseChainCenterControl{
    public function __construct(){
        parent::__construct();
        redirect('index.php?act=goods');
    }

}
