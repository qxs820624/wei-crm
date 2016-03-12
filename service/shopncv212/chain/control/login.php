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

class loginControl extends BaseAccountCenterControl{
    public function __construct(){
        parent::__construct();
    }
    /**
     * 登录
     */
    public function indexOp() {
        if ($_SESSION['chain_login'] == 1) {
            @header('location: index.php?act=goods');die;
        }
        if (chksubmit(true,true)) {
            $where = array();
            $where['chain_user'] = $_POST['user'];
            $where['chain_pwd'] = md5($_POST['pwd']);
            $chain_info = Model('chain')->getChainInfo($where);
            if (!empty($chain_info)) {
                $_SESSION['chain_login']    = 1;
                $_SESSION['chain_id']       = $chain_info['chain_id'];
                $_SESSION['chain_store_id'] = $chain_info['store_id'];
                $_SESSION['chain_user']     = $chain_info['chain_user'];
                $_SESSION['chain_name']     = $chain_info['chain_name'];
                $_SESSION['chain_img']      = getChainImage($chain_info['chain_img'], $chain_info['store_id']);
                $_SESSION['chain_address']  = $chain_info['area_info'] . ' ' . $chain_info['chain_address'];
                $_SESSION['chain_phone']    = $chain_info['chain_phone'];
			showDialog('登录成功', 'index.php?act=goods', 'succ');
			redirect('index.php?act=seller_center');
            } else {
                showDialog('登录失败');
            }
        }
        Tpl::showpage('login');
    }
    /**
     * 登出
     */
    public function logoutOp() {
        unset($_SESSION['chain_login']);
        unset($_SESSION['chain_id']);
        unset($_SESSION['chain_store_id']);
        unset($_SESSION['chain_user']);
        unset($_SESSION['chain_name']);
        unset($_SESSION['chain_img']);
        unset($_SESSION['chain_address']);
        unset($_SESSION['chain_phone']);
        showDialog('退出成功', 'reload', 'succ');
    }
}
