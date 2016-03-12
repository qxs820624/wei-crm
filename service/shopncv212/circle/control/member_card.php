<?php
/**
 * The AJAX call member information
 *
 *
 *
 * * @网店运维 (c) 2015-2018 ShopWWI Inc. (http://www.goodziyuan.com)
 * @license    http://www.shopwwi.c om
 * @link       http://www.goodziyuan.com/
 * @since      网店运维提供技术支持 授权请购买shopnc授权
 */

class member_cardControl extends BaseCircleControl{
    public function mcard_infoOp(){
        $uid    = intval($_GET['uid']);
        $member_list = Model()->table('circle_member')->field('member_id,circle_id,circle_name,cm_level,cm_exp')->where(array('member_id'=>$uid,'cm_state'=>1))->select();
        if(empty($member_list)){
            echo 'false';exit;
        }
        echo json_encode($member_list);exit;
    }
}
