
<?php
class  DingAction extends  CommonAction{
    
    public function _initialize() {
        parent::_initialize();
		
		//echo $_COOKIE['eleproduct'];echo "File:", __FILE__, ',Line:',__LINE__;exit;
        $this->shop = D('shop')->where(array('is_ding'=>1,'city_id'=>  $this->city_id,'audit'=>'1','closed'=>0))->select();
        $this->assign('shop', $this->shop);
		if($_GET['shop_id']){
			$eleproducts = $this->_getCartGoods($_GET['shop_id']);
			$total_money = "";
			$cart_num = "";
			$carts = array();
			foreach($eleproducts as $k=>$val){
				$total_money += $val['total_price'];
				$cart_num += $val['cart_num'];
				$carts[] =  $val['product_id'].'_'.$val['cart_num'];
			}
			
			$this->assign('total_money',$total_money);
			$this->assign('cartnum', $cart_num);
			$this->assign('eleproducts',$eleproducts);
		}
		
		$obj = D('Shopdingsetting');
		$this->assign('cfg',$obj->getCfg());
		$room = D('Shopdingroom');
		$this->assign('room',$room->getType());		
    }

	public function index()
	{
		$keyword = D('Keyword');
		$shop = D('Shop');
		$arr = $shop->get_tj($this->city_id);
		$this->assign('shop',$arr['shop']);
		$this->assign('cate',$arr['cat']);
		$this->assign('detail',$arr['details']);
		$this->assign('set',$arr['set']);
		$this->assign('kw',$shop->getshop('d1',$this->city_id));
		$this->assign('hj',$shop->getshop('d2',$this->city_id));
		$this->assign('fw',$shop->getshop('d3',$this->city_id));
		$this->assign('view',$shop->getshop('view',$this->city_id));
		$this->assign('time',date('Y-m-d'));
		$this->assign('keyword',D('Keyword')->where(array('type'=>'6'))->select());
		
		$this->display();
	}
    
	public function detail($shop_id)
	{
		$shop = D('Shop');
		if(!$detail = $shop->getbuyshopID($shop_id)){
			$this->error('该餐厅不存在');
		}else{
			D('Shop')->updateCount($shop_id, 'view');
			$room = D('Shopdingroom');
			$cate = D('Shopdingcate');
			$menu = D('Shopdingmenu');
			$pic = $shop->getphoto($shop_id,$detail['shop']['photo']);
			$menu_list = $menu->get_menu($shop_id);
			$get_cate = $menu->get_cate($shop_id);
			$get_count = $menu->get_count($shop_id);
			$this->assign('tuan',$shop->gettuan($shop_id));
			$this->assign('coupon',$shop->getcoupon($shop_id));
			$this->assign('pic',$pic);
			$this->assign('time',date('Y-m-d'));
			$this->assign('cate',$get_cate);
			$this->assign('menu',$menu_list);
			$this->assign('count',$get_count);
			$all_ping = D('Shopdingdianping')->where('shop_id ='.$shop_id)->count();
			$this->assign('all_ping',$all_ping);
			$this->assign('room',$room->shoptype($shop_id));
			$this->assign('room_detail',$room->getroom($shop_id));
			$this->assign('shop_time',D('Shopdingsetting')->get_time($shop_id));
			$this->assign('detail',$detail);
		}
		$this->display();
	}

	public function news()
	{
		$keyword = D('Keyword');
		$shop = D('Shop');
		
		import('ORG.Util.Page');
		$price = D('Shopdingsetting')->getprice();
		$this->assign('shop',$arr['shop']);
		$this->assign('cate',$arr['cat']);
		$this->assign('price_list',$price);
		$kw = D('Keyword')->where(array('type'=>'6'))->select();
		$this->assign('keyword',$kw);
		$linkArr = array();
        $keyw = $this->_param('keyword');
		$data = array('s.audit'=>1,'s.closed'=>0,'s.is_ding'=>1);
		$sql = "audit = 1 and closed=0 and is_ding=1 and city_id=".$this->city_id;
        if ($keyw) {
			foreach($kw as $k => $v){
				if($v['key_id'] == $keyw){
					$value = $v['keyword'];
				}
			}
			$sql.= " AND ( (s.tags LIKE '%".$value."%') OR (s.shop_name LIKE '%".$value."%'))";
            $this->assign('keyw', $keyw);
            $linkArr['keyword'] = $keyw;
        }
        $areas = D('Area')->fetchAll();
        if ($area_id = (int) $this->_param('area_id')) {
            //$data['area_id'] = $area_id;
			$sql.= " AND (s.`area_id`=".$area_id.")";
            $this->assign('area_id', $area_id);
            $linkArr['area_id'] = $area_id;
        }

		$price_selected = $this->_param('price');
		if ($price_selected) {
			$m = D('Shopdingsetting')->pricesql($price_selected);
			if($m['3']){
				if($m['3'] == '>='){
					$data['min_price'] = $m[1].'00';
					$sql.= " AND (d.`price`>=".$data['min_price'].")";
				}else{
					$data['max_price'] = $m[1].'00';
					$sql.= " AND (d.`price`<=".$data['max_price'].")";
				}
				
			}else{
				$data['min_price']=$m[1].'00';
				$data['max_price']=$m[2].'00';
				$sql.= " AND (d.`price`<=".$data['max_price'].") AND (d.`price`>=".$data['min_price'].")";
			}
            
            $this->assign('price', $price_selected);
            $linkArr['price'] = $price_selected;
        }

		$order = $this->_param('order');
		if ($order) {
			if($order == 2){
				$orderby = 's.ding_num desc';
			}elseif($order == 3){
				$orderby = 'd.price asc';
			}elseif($order == 4){
				$orderby = 's.d1 desc';
			}elseif($order == 5){
				$orderby = 's.d2 desc';
			}elseif($order == 6){
				$orderby = 's.d3 desc';
			}else{
				$orderby = 's.create_time desc';
			}
            $this->assign('order', $order);
            $linkArr['order'] = $order;
        }else{
			$orderby = 's.orderby desc';
		}
		$count = $shop->countDingShop($sql); // 查询满足要求的总记录数 
        $Page = new Page($count, 6); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
		$shop_list = $shop->get_ding_shop($sql,$orderby,$Page->firstRow,$Page->listRows);
		$this->assign('shop_list',$shop_list['shop']);
		$this->assign('cate',$shop_list['cat']);
		$this->assign('set',$shop_list['set']);
		$this->assign('view',$shop->getshop('view',$this->city_id));
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('linkArr',$linkArr);
		$this->display();
	}

	public function hot()
	{
		$keyword = D('Keyword');
		$shop = D('Shop');
		
		import('ORG.Util.Page');
		$price = D('Shopdingsetting')->getprice();
		$this->assign('shop',$arr['shop']);
		$this->assign('cate',$arr['cat']);
		$this->assign('price_list',$price);
		$kw = D('Keyword')->where(array('type'=>'6'))->select();
		$this->assign('keyword',$kw);
		$linkArr = array();
        $keyw = $this->_param('keyword');
		$data = array('s.audit'=>1,'s.closed'=>0,'s.is_ding'=>1);
		$sql = "audit = 1 and closed=0 and is_ding=1 and city_id=".$this->city_id;
        if ($keyw) {
			foreach($kw as $k => $v){
				if($v['key_id'] == $keyw){
					$value = $v['keyword'];
				}
			}
			$sql.= " AND ( (s.tags LIKE '%".$value."%') OR (s.shop_name LIKE '%".$value."%'))";
            $this->assign('keyw', $keyw);
            $linkArr['keyword'] = $keyw;
        }
        $areas = D('Area')->fetchAll();
        if ($area_id = (int) $this->_param('area_id')) {
            //$data['area_id'] = $area_id;
			$sql.= " AND (s.`area_id`=".$area_id.")";
            $this->assign('area_id', $area_id);
            $linkArr['area_id'] = $area_id;
        }

		$price_selected = $this->_param('price');
		if ($price_selected) {
			$m = D('Shopdingsetting')->pricesql($price_selected);
			if($m['3']){
				if($m['3'] == '>='){
					$data['min_price'] = $m[1].'00';
					$sql.= " AND (d.`price`>=".$data['min_price'].")";
				}else{
					$data['max_price'] = $m[1].'00';
					$sql.= " AND (d.`price`<=".$data['max_price'].")";
				}
				
			}else{
				$data['min_price']=$m[1].'00';
				$data['max_price']=$m[2].'00';
				$sql.= " AND (d.`price`<=".$data['max_price'].") AND (d.`price`>=".$data['min_price'].")";
			}
            
            $this->assign('price', $price_selected);
            $linkArr['price'] = $price_selected;
        }

		$order = $this->_param('order');
		if ($order) {
			if($order == 2){
				$orderby = 's.ding_num desc';
			}elseif($order == 3){
				$orderby = 'd.price asc';
			}elseif($order == 4){
				$orderby = 's.d1 desc';
			}elseif($order == 5){
				$orderby = 's.d2 desc';
			}elseif($order == 6){
				$orderby = 's.d3 desc';
			}else{
				$orderby = 's.create_time desc';
			}
            $this->assign('order', $order);
            $linkArr['order'] = $order;
        }else{
			$orderby = 's.ding_num desc';
		}
		$count = $shop->countDingShop($sql); // 查询满足要求的总记录数 
        $Page = new Page($count, 6); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
		$shop_list = $shop->get_ding_shop($sql,$orderby,$Page->firstRow,$Page->listRows);
		$this->assign('shop_list',$shop_list['shop']);
		$this->assign('cate',$shop_list['cat']);
		$this->assign('set',$shop_list['set']);
		$this->assign('view',$shop->getshop('view',$this->city_id));
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('linkArr',$linkArr);
		$this->display();
	}



	public function lists()
	{
		$keyword = D('Keyword');
		$shop = D('Shop');
		
		import('ORG.Util.Page');
		$price = D('Shopdingsetting')->getprice();
		$this->assign('shop',$arr['shop']);
		$this->assign('cate',$arr['cat']);
		$this->assign('price_list',$price);
		$kw = D('Keyword')->where(array('type'=>'6'))->select();
		$this->assign('keyword',$kw);
		$linkArr = array();
        $keyw = $this->_param('keyword');
		$sql = "audit = 1 and closed=0 and is_ding=1 and city_id=".$this->city_id;
        if ($keyw) {
			foreach($kw as $k => $v){
				if($v['key_id'] == $keyw){
					$value = $v['keyword'];
				}
			}
			$sql.= " AND ( (s.tags LIKE '%".$value."%') OR (s.shop_name LIKE '%".$value."%'))";
            $this->assign('keyw', $keyw);
            $linkArr['keyword'] = $keyw;
        }
        $areas = D('Area')->fetchAll();
        if ($area_id = (int) $this->_param('area_id')) {
            //$data['area_id'] = $area_id;
			$sql.= " AND (s.`area_id`=".$area_id.")";
            $this->assign('area_id', $area_id);
            $linkArr['area_id'] = $area_id;
        }

		$price_selected = $this->_param('price');
		if ($price_selected) {
			$m = D('Shopdingsetting')->pricesql($price_selected);
			if($m['3']){
				if($m['3'] == '>='){
					$data['min_price'] = $m[1].'00';
					$sql.= " AND (d.`price`>=".$data['min_price'].")";
				}else{
					$data['max_price'] = $m[1].'00';
					$sql.= " AND (d.`price`<=".$data['max_price'].")";
				}
				
			}else{
				$data['min_price']=$m[1].'00';
				$data['max_price']=$m[2].'00';
				$sql.= " AND (d.`price`<=".$data['max_price'].") AND (d.`price`>=".$data['min_price'].")";
			}
            
            $this->assign('price', $price_selected);
            $linkArr['price'] = $price_selected;
        }

		$order = $this->_param('order');
		if ($order) {
			if($order == 2){
				$orderby = 's.ding_num desc';
			}elseif($order == 3){
				$orderby = 'd.price asc';
			}elseif($order == 4){
				$orderby = 's.d1 desc';
			}elseif($order == 5){
				$orderby = 's.d2 desc';
			}elseif($order == 6){
				$orderby = 's.d3 desc';
			}else{
				$orderby = 's.orderby desc';
			}
            $this->assign('order', $order);
            $linkArr['order'] = $order;
        }else{
			$orderby = 's.orderby desc';
		}
		$count = $shop->countDingShop($sql); // 查询满足要求的总记录数 
        $Page = new Page($count, 6); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
		$shop_list = $shop->get_ding_shop($sql,$orderby,$Page->firstRow,$Page->listRows);
		$this->assign('shop_list',$shop_list['shop']);
		$this->assign('cate',$shop_list['cat']);
		$this->assign('set',$shop_list['set']);
		$this->assign('view',$shop->getshop('view',$this->city_id));
		$this->assign('page', $show); // 赋值分页输出
		$this->assign('linkArr',$linkArr);
		$this->display();
	}

	private function _getCartGoods($shop_id) {
		
        $carts = cookie($shop_id.'ding');
        if (empty($carts))
            return null;
        $carts = explode('|', $carts);
        $ids = $nums = array();
        foreach ($carts as $key => $val) {
            $local = explode('_', $val);
            $local[0] = (int) $local[0];
            $local[1] = (int) $local[1];
            if (!empty($local[0]) && !empty($local[1]) && $local[1] > 0) {
                $ids[$local[0]] = $local[0];
                $nums[$local[0]] = $local[1];
            }
        }
		$menu = D('Shopdingmenu');
        $eleproducts = $menu->itemsByIds($ids);
        foreach ($eleproducts as $k => $val) {
            $eleproducts[$k]['cart_num'] = $nums[$val['menu_id']];
            $eleproducts[$k]['total_price'] = $nums[$val['menu_id']] * $val['ding_price'];
        }
        $cookies = array();
        foreach ($nums as $k => $v) {
            $cookies[] = $k . '_' . $v;
        }
        $cookiestr = join('|', $cookies);
        //setcookie('eleproduct', join('|', $cookies),NOW_TIME+604800);
        cookie('eleproduct', join('|', $cookies),array('expire'=>NOW_TIME+604800));
        $_COOKIE['eleproduct'] = $cookiestr; //因为页面不刷新所以要赋值一下

        return $eleproducts;
    }

	public function yuyue($shop_id) {
        if (empty($this->uid)) {
            $this->ajaxReturn(array('status'=>'login'));
        }
		if (empty($shop_id)) {
            $this->ajaxReturn(array('status'=>'error','msg'=>'该商家不存在'));
        }
		$shop = D('shop')->find($shop_id);
        if (empty($shop)) {
            $this->ajaxReturn(array('status'=>'error','msg'=>'该商家不存在'));
        }
        
		$data = array();
        $num = $this->_post('num', false);
        /*if (empty($num)) {
            $this->ajaxReturn(array('status'=>'error','msg'=>'您还没有订餐呢'));
        }*/

		$date = $this->_post('date', false);
		if (empty($date) || strpos($date,'-') === false) {
            $this->ajaxReturn(array('status'=>'error','msg'=>'选择日期不正确'));
        }
		
		//后面改
		$time = $this->_post('time', false);
		$obj = D('Shopdingsetting');
		$room = D('Shopdingroom');
		$is_open = $obj->get_time($shop_id);
		$datetime = $date.' '.$time;
		$t = strtotime($datetime);
		if (empty($time)) { 
            $this->ajaxReturn(array('status'=>'error','msg'=>'请选择时间'));
        }else if($t<time()){
			$this->ajaxReturn(array('status'=>'error','msg'=>'预约时间已经过期，请选择正确的时间'));
		}else if(!(in_array($time,$is_open))){
			$this->ajaxReturn(array('status'=>'error','msg'=>'商家已经打烊，实在对不住客官'));
		}
		
		$reson_last = $room->shoptype($shop_id);
		$room_detail_last = $room->getroom($shop_id);
		
		$reson = $this->_post('reson', false);
		$roomid = $this->_post('roomid', false);
		$room_l = $this->_post('room', false);

		$is_reson_true = false;
		foreach($reson_last as $k => $v){
			if($v == $reson){
				$number = $k;
				$is_reson_true = true;
			}
		}

		if($is_reson_true == false){
			 $this->ajaxReturn(array('status'=>'error','msg'=>'人数不正确'));
		}

		if($roomid>0){
			if(!$room_l){
				$room_l = '1';
			}
			$get_is_room = $obj->get_is_room($shop_id,$_POST);
			if (empty($get_is_room) || !(in_array($time,$get_is_room))) {
				$this->ajaxReturn(array('status'=>'error','msg'=>'该包厢已约满，实在对不住客官'));
			}
		}else{
			if(!$room_l){
				$room_l = '0';
			}
			$roomid=0;
		}

		$last_time = $obj->get_time_k($time);

        $total = array(
            'money' => 0,
            'num' => 0,
        );
		if(!empty($num)){
			foreach ($num as $key => $val) {
				$key = (int) $key;
				$val = (int) $val;
				if ($val < 1 || $val > 99) {
					$this->ajaxReturn(array('status'=>'error','msg'=>'请选择正确的购买数量'));
				}
				$menu = D('Shopdingmenu')->where('shop_id='.$shop_id)->find($key);
				if (empty($menu)) {
					$this->ajaxReturn(array('status'=>'error','msg'=>'产品不正确'));
				}
				$menu_str .= $menu['menu_id'].':'.$val.'|';
				$menu['buy_num'] = $val;
				$products[$key] = $menu;
				$total['money'] += ($menu['ding_price'] * $val);

				$total['num'] += $val;
			}
		}

		$order = D('Shopdingorder');
		$order_no = $order->create_order_no();
        $ding_money = $obj->field('money')->where('shop_id ='.$shop_id)->find();
		
        if ($yuyue_id = D('Shopdingyuyue')->add(array(
            'user_id' => $this->uid,
            'shop_id' => $shop_id,
            'room_id' =>$roomid,
            'last_date' => $date,
			'menu' => $menu_str,
			'number'=> $number,
			'order_no' => $order_no,
            'last_t' => $last_time,
            'create_time' => NOW_TIME,
            'create_ip' => get_client_ip(),
            'is_pay' => 0,
         ))) {
			cookie("eleproduct", null);
			$order_id = $order->add(array(
				'order_no' => $order_no,
                                'shop_id' => $shop_id,
				'is_dianping' => 0,
				'status' => 0,
				'total_price' => $total['money'],
				'need_price' => $ding_money['money'],
				'user_id' => $this->uid,
				'ding_id' => $yuyue_id,
				'create_time' => NOW_TIME,
				'create_ip' => get_client_ip()
			 ));
			D('Shop')->updateCount($shop_id, 'ding_num');
            $this->ajaxReturn(array('status'=>'success','msg'=>'下单成功！去支付','url'=>U('ding/pay', array('order_id' => $order_id))));
        }
        $this->ajaxReturn(array('status'=>'error','msg'=>'创建订单失败'));
    }

	public function pay($order_id)
	{
		if (empty($this->uid)) {
            header("Location:" . U('passport/login'));
            die;
        }
        $order = D('Shopdingorder')->find($order_id);
        if (empty($order) || $order['status'] != 0 || $order['user_id'] != $this->uid) {
            $this->error('该订单不存在');
            die;
        }
		$order_yuyue = D('Shopdingyuyue')->where(array('order_no' => $order['order_no']))->find();
		$room = D('Shopdingroom');
		$setting = D('Shopdingsetting');
        $this->assign('shop', D('Shop')->find($order_yuyue['shop_id']));
		$this->assign('room_d',$room->get_room_d($order_yuyue['shop_id']));
        $this->assign('yuyue', $order_yuyue);
		$this->assign('order_id', $order_id);
        $this->assign('order', $order);
		$this->assign('setting', $setting->find($order_yuyue['shop_id']));
       
        $this->display();
	}

	public function pay2($order_id)
	{
		if (empty($this->uid)) {
			header("Location:" . U('passport/login'));
			die;
		}
		$order = D('Shopdingorder')->find($order_id);
		if (empty($order) || $order['status'] != 0 || $order['user_id'] != $this->uid) {
			$this->error('该订单不存在');
			die;
		}
		$data['name'] = $this->_post('name', false);
		$data['mobile'] = $this->_post('mobile', false);
		$data['sex'] = $this->_post('sex', false);
		$data['tip'] = $this->_post('tip', false);

		if(!$order['name'] && !$order['mobile']){
			if (empty($data['name'])) {
				$this->error('请填写姓名');
				die;
			}
			if (empty($data['mobile']) || !preg_match("/1[1-9]{1}\d{9}$/",$data['mobile'])) {
				$this->error('请填写正确的手机号码');
				die;
			}
			D('Shopdingorder')->where('order_id='.$order_id)->save($data);
		}
		
		$this->assign('order_id', $order_id);
		$this->assign('shop', D('Ele')->find($order_yuyue['shop_id']));
		$this->assign('order', $order);
		$this->assign('payment', D('Payment')->getPayments());
		$this->display();
		 
	}

	public function pay3($order_id) {
        if (empty($this->uid)) {
            $this->ajaxLogin();
        }
        $order = D('Shopdingorder')->find($order_id);
        if (empty($order) || $order['status'] != 0 || $order['user_id'] != $this->uid) {
            $this->error('该订单不存在');
            die;
        }
       
        if (!$code = $this->_post('code')) {
            $this->error('请选择支付方式！');
        }
        
		$payment = D('Payment')->checkPayment($code);
		if (empty($payment)) {
			$this->error('该支付方式不存在');
		}
		$logs = D('Paymentlogs')->getLogsByOrderId('ding', $order_id);
		if (empty($logs)) {
			$logs = array(
				'type' => 'ding',
				'user_id' => $this->uid,
				'order_id' => $order_id,
				'code' => $code,
				'need_pay' => $order['need_price'],
				'create_time' => NOW_TIME,
				'create_ip' => get_client_ip(),
				'is_paid' => 0
			);
			$logs['log_id'] = D('Paymentlogs')->add($logs);
		} else {
			$logs['need_pay'] = $order['need_price'];
			$logs['code'] = $code;
			D('Paymentlogs')->save($logs);
		}
		$data['use_integral'] = $code;
		D('Shopdingorder')->where('order_id='.$order_id)->save($data);


		$order = D('Shopdingorder')->find($order_id);
		$order_yuyue = D('Shopdingyuyue')->where(array('order_no' => $order['order_no']))->find();
		$shop_ids   = D('Shop')->getFieldByShop_id($order_yuyue['shop_id']);
		
		//====================微信支付通知===========================
			 $map         = array('shop_id'=>array('in',$shop_ids));
           	 $shop_name  = D('Shop')->where($map)->getField('shop_name',true);
           	 $shop_name  = implode(',', $shop_name);
             
            include_once "Baocms/Lib/Net/Wxmesg.class.php";
           $_data_order = array(//整体变更
                'url'       =>  "http://".$_SERVER['HTTP_HOST']."/mobile/ding/pay2/order_id/".$order_id.".html",
                'topcolor'  =>  '#F55555',
                'first'     =>  '恭喜订单创建成功！' ,
                'remark'    =>  '请在继续下一步完成付款！',
                'money'     =>  round($order['need_price']/100,2).'元',
                'goodsName' =>  '在'.$shop_name.'预定了座位',
                'payType'   =>  $payment['name'],
                'orderNum'  =>  '1-'.$order_id,
				'buyNum' 	=>  1,
            );
            $order_data = Wxmesg::order($_data_order);
            $return   = Wxmesg::net($this->uid, 'OPENTM202297555', $order_data);//结束

            //====================微信支付通知==============================

		

		$this->baoSuccess('选择支付方式成功！下面请进行支付！', U('payment/payment', array('log_id' => $logs['log_id'])));
        
    }

   

	public function room($shop_id,$date,$time,$reson)
	{
		$room = D('Shopdingroom');
		$this->assign('reson',$reson);
		$obj = D('Shopdingsetting');
		$room_detail = $room->getroom($shop_id,$date,$time,$reson);

		$getType = $room->getType();
		foreach($getType as $k => $v){
			if($v == $reson){
				$tt = $k;
			}
		}
		$tem = '';
		if($tt){
			$this->assign('tt',$tt);
		}else{
			foreach($room_detail as $k => $v){
				if(!$tem){
					$tem = $k;
					$this->assign('tt',$k);
				}
			}
		}
		$this->assign('room',$room->shoptype($shop_id));
		$this->assign('room_detail',$room_detail);
		$this->display();
	}
   
}