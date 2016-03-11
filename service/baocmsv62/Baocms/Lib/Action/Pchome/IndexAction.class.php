<?php

/*
 * 软件为合肥生活宝网络公司出品，未经授权许可不得使用！
 * 作者：baocms团队
 * 官网：www.taobao.com
 * 邮件: youge@baocms.com  QQ 800026911
 */

class IndexAction extends CommonAction {
    
     public function _initialize() {
        parent::_initialize();
        $this->type = D('Keyword')->fetchAll();
        $this->assign('types', $this->type);
    }

    public function index() {
        
        if (is_mobile()) {
            header("Location:" . U('mobile/index/index'));
            die;
        }
		/////开始
		 $ele = D('Ele');
        $map = array('city_id' => $this->city_id);
        $linkArr = array();
        if ($keyword = $this->_param('keyword', 'htmlspecialchars')) {
            $map['shop_name'] = array('LIKE', '%' . $keyword . '%');
            $this->assign('keyword', $keyword);
            $linkArr['keywrod'] = $map['shop_name'];
        }
        $cate = $this->_param('cate', 'htmlspecialchars');
        $lng = $this->_param('lng', 'htmlspecialchars');
        $lat = $this->_param('lat', 'htmlspecialchars');
        $linkArr['cate'] = $cate;
        $linkArr['lng'] = $lng;
        $linkArr['lat'] = $lat;
        $this->assign('cate', $cate);
        $price = (int) $this->_param('price');
        switch ($price) {
            case 1:
                $map['since_money'] = array('ELT', '5000');
                break;
            case 2:
                $map['since_money'] = array('between', '5001,10000');
                break;
            case 3:
                $map['since_money'] = array('between', '10001,20000');
                break;
            case 4:
                $map['since_money'] = array('EGT', '20001');
                break;
        }
        $linkArr['price'] = $price;
        $this->assign('price', $price);
        $order = $this->_param('order', 'htmlspecialchars');
        $orderby = '';
        switch ($order) {
            case 's':
                $orderby = array('sold_num' => 'desc');
                $linkArr['order'] = $order;
                break;
            case 't':
                $orderby = array('distribution' => 'asc');
                $linkArr['order'] = $order;
                break;
            default:
                $orderby = array('orderby' => 'asc', 'sold_num' => 'desc', 'month_num' => 'desc');
                break;
        }
        $this->assign('order', $order);

        if ($new = (int) $this->_param('new')) {
            $linkArr['new'] = $new;
            $map['is_new'] = $new;
        }
        $this->assign('new', $new);

        if ($fan = (int) $this->_param('fan')) {
            $linkArr['fan'] = $fan;
            $map['is_fan'] = $fan;
        }
        $this->assign('fan', $fan);

        if ($pay = (int) $this->_param('pay')) {
            $linkArr['pay'] = $pay;
            $map['is_pay'] = $pay;
        }
        $this->assign('pay', $pay);
        $lists = $ele->order($orderby)->where($map)->select();
        foreach ($lists as $k => $val) {
            if (!empty($cate)) {
                if (strpos($val['cate'], $cate) === false) {
                    unset($lists[$k]);
                }
            }
            if (!empty($lng) && !empty($lat)) {
                $lists[$k]['d'] = getDistanceNone($lat, $lng, $val['lat'], $val['lng']);
                if ($lists[$k]['d'] > 20000) { //大于2KM的要咔嚓掉
                    unset($lists[$k]);
                }
            }
        }
        $count = count($lists);  // 查询满足要求的总记录数  
        $list = array_slice($lists, $Page->firstRow, $Page->listRows);
        $shop_ids = array();
        foreach ($list as $k => $val) {
            if (!empty($cate)) {
                if (strpos($val['cate'], $cate) === false) {
                    unset($list[$k]);
                }
            }
            if (!empty($val['shop_id'])) {
                $shop_ids[$val['shop_id']] = $val['shop_id'];
            }
        }
        $this->assign('shops', D('Shop')->itemsByIds($shop_ids));
        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->assign('linkArr', $linkArr);
		
		

		 
		 
		 /////结束
		
		
        $this->display();
  
    }
    
    
    public function get_arr(){
        
         if(IS_AJAX){
            
            $cate_id = I('val',0,'intval,trim');
            
            $today = date('Y-m-d');

            $t = D('Tuan');
            $map = array(
                'cate_id'=>$cate_id,
                'city_id'=>$this->city_id,
                'closed'=>0,
                'audit'=>1,
                'bg_date' => array('elt',$today),
                'end_date'=>array('egt',$today)
                
            );
            $r = $t->where($map)->limit(8)->select();
            
            if($r){
                $this->ajaxReturn(array('status'=>'success','arr'=>$r));
            }else{
                $this->ajaxReturn(array('status'=>'error'));
            }
            
        }
        
    }
    

    public function test() {

        //$data = D('Email')->sendMail('email_newpwd', '1442211217@qq.com', '重置密码', array('newpwd' => 123456));
       // var_dump($data);
        //var_dump(D('Email')->getEorrer());
       
    }

}
