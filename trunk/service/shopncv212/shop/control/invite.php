<?php

/**分享奖励

 * 

 * * @网店运维 (c) 2015-2018 ShopWWI Inc. (http://www.goodziyuan.com)

 * @license    http://www.shopwwi.c om

 * @link       http://www.goodziyuan.com/

 * @since      网店运维提供技术支持 授权请购买shopnc授权

 */







defined('ByShopWWI') or exit('Access Invalid!');

class inviteControl extends BaseHomeControl {



    public function __construct() {

        parent::__construct();

        /**

         * 读取语言包

         */

        Language::read('member_member_points,member_pointorder');

        /**

         * 判断系统是否开启积分功能

         */

        if (C('points_isuse') != 1){

            showMessage(Language::get('points_unavailable'),urlShop('member', 'home'),'html','error');

        }

    }

	public function indexOp(){

        $memberid = $_SESSION['member_id'];

        $this->_get_invite($memberid, $_GET['type'], 10);

        Tpl::showpage('shopwwi_invite');

    }

	private function _get_invite($memberid, $type, $page) {

        $condition = array();

        switch ($type) {

            case '1':

                $condition['invite_one'] = $memberid ;

                Tpl::output('type', '1');

                break;

            case '2':

                $condition['invite_two'] = $memberid ;

                Tpl::output('type', '2');

                break;

            case '3':

               $condition['invite_three'] = $memberid ;

                Tpl::output('type', '3');

                break;

			default:

			 $condition['invite_one'] = $memberid ;

                Tpl::output('type', '1');

                break;

        }





        //查询积分日志列表

        $member_model = Model('member');

        $list_log = $member_model->getMembersList($condition,$page);

        Tpl::output('show_page',$member_model->showpage('5'));

        Tpl::output('list_log',$list_log);

    }

	

}

