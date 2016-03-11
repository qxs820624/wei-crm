<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="zh-cn">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="renderer" content="webkit">

		<title><?php echo ($seo_title); ?></title>

		<meta name="keywords" content="<?php echo ($seo_keywords); ?>" />

		<meta name="description" content="<?php echo ($seo_description); ?>" />

		<link rel="stylesheet" href="/static/default/pc/css/base.css" />

		<link rel="stylesheet" href="/static/default/pc/css/<?php echo ($ctl); ?>.css" />

		<script src="/static/default/pc/js/jquery.js"></script>

		<script src="/static/default/pc/js/respond.js"></script>

        

		<script src="/static/default/pc/js/load.js"></script>

		<script src="/static/default/pc/js/base.js"></script>
        
        
            

       
<!-- 兼容搜索下拉的写法 -->
        <script src="__TMPL__statics/js/js.js"></script>
<!-- 兼容搜索下拉的写法  -->




	</head>

	<body>

		<iframe id="x-frame" name="x-frame" style="display:none;"></iframe>

		<!-- 顶部导航 -->

	  

		

		<!-- LOGO栏 -->

		<div class="topOne">
    <div class="nr">
        <?php if(empty($MEMBER)): ?><div class="left"><span class="welcome">您好，欢迎访问<?php echo ($CONFIG["site"]["sitename"]); ?></span><a href="<?php echo U('pchome/passport/login');?>">登陆</a>|<a href="<?php echo U('passport/register');?>">注册</a>
                <?php else: ?>
                <div class="left">欢迎 <b style="color: red;font-size:14px;"><?php echo ($MEMBER["nickname"]); ?></b> 来到<?php echo ($CONFIG["site"]["sitename"]); ?>&nbsp;&nbsp; <a href="<?php echo U('member/index/index');?>" >个人中心</a>|<a href="<?php echo U('pchome/passport/logout');?>" >退出登录</a><?php endif; ?>
                    <div class="topSm"> <span class="topSmt"><em>&nbsp;</em>手机CMS</span>
                        <div class="topSmnr"><img src="__PUBLIC__/img/wx.png" width="100" height="100" />
                            <p>扫描下载客户端</p>
                        </div>
                    </div>
                </div>
                <div class="right">                    
                    <ul>
                        <li class="liOne"><a class="liOneB" href="<?php echo U('member/order/index');?>" >我的订单</a><em>&nbsp;</em></li>
                        <li class="liOne"><a class="liOneA" href="javascript:void(0);">我的服务<em>&nbsp;</em></a>
                            <div class="list">
                                <ul>
                                    <li><a href="<?php echo U('member/order/index');?>">我的订单</a></li>
                                    <li><a href="<?php echo U('member/ele/index');?>">我的外卖</a></li>
                                    <li><a href="<?php echo U('member/yuyue/index');?>">我的预约</a></li>
                                    <li><a href="<?php echo U('member/dianping/index');?>">我的评价</a></li>
                                    <li><a href="<?php echo U('member/favorites/index');?>">我的收藏</a></li>                                    
                                    <li><a href="<?php echo U('member/myactivity/index');?>">我的活动</a></li>
                                    <li><a href="<?php echo U('member/life/index');?>">会员服务</a></li>
                                    <li><a href="<?php echo U('member/set/nickname');?>">帐号设置</a></li>
                                </ul>
                            </div>
                        </li>
                        <span>|</span>
                        <li class="liOne liOne_visit"><a class="liOneA" href="javascript:void(0);">最近浏览<em>&nbsp;</em></a>
                            <div class="list liOne_visit_pull">
                                <ul>
                                    <?php
 $views = unserialize(cookie('views')); $views = array_reverse($views, TRUE); if($views){ foreach($views as $v){ ?>
                                    <li class="liOne_visit_pull_li">
                                        <a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><img src="__ROOT__/attachs/<?php echo ($v["photo"]); ?>" width="80" height="50" /></a>
                                        <h5><a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><?php echo ($v["title"]); ?></a></h5>
                                        <div class="price_box"><a href="<?php echo U('tuan/detail',array('tuan_id'=>$v['tuan_id']));?>"><em class="price">￥<?php echo ($v["tuan_price"]); ?></em><span class="old_price">￥<?php echo ($v["price"]); ?></span></a></div>
                                    </li>
                                    <?php }?>
                                </ul>
                                <p class="empty"><a href="javascript:;" id="emptyhistory">清空最近浏览记录</a></p>
                                <?php }else{?>
                                <p class="empty">您还没有浏览记录</p>
                                <?php } ?>
                            </div>
                        </li>
                        <span>|</span>
                        <li class="liOne"> <a class="liOneA" href="javascript:void(0);">我是商家<em>&nbsp;</em></a>
                            <div class="list">
                                <ul>
                                    <li><a href="<?php echo U('shangjia/login/index');?>">商家登陆</a></li>
                                    <li><a href="<?php echo U('shangjia/index/index');?>">微信营销</a></li>
                                </ul>
                            </div>
                        </li>
                        <span>|</span>
                        <li class="liOne"> <a class="liOneA" href="javascript:void(0);">快捷导航<em>&nbsp;</em></a>
                            <div class="list">
                                <ul>
                                    <li><a href="<?php echo U('pchome/news/index');?>">新闻快报</a></li>
                                    <li><a href="<?php echo U('pchome/shop/index');?>">商家列表</a></li>
                                    <li><a href="<?php echo U('pchome/jifen/index');?>">积分商城</a></li>
                                    <li><a href="<?php echo U('pchome/billboard/index');?>">商家榜单</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
<script>
    $(document).ready(function(){
        $("#emptyhistory").click(function(){
            $.get("<?php echo U('tuan/emptyviews');?>",function(data){
                if(data.status == 'success'){
                    $(".liOne_visit_pull ul li").remove();
                    $(".liOne_visit_pull p.empty").html("您还没有浏览记录");
                }else{
                    layer.msg(data.msg,{icon:2});
                }
            },'json')
            //$.cookie('views', '', { expires: -1 }); 
            //$(".liOne_visit_pull ul li").remove();
            //$(".liOne_visit_pull p.empty").html("您还没有浏览记录");
        })
    });
</script>    
    <div class="topTwo">
        <div class="left">
            <?php if(!empty($CONFIG['site']['logo'])): ?><h1><a href="<?php echo U('pchome/index/index');?>"><img width="214" height="53" src="__ROOT__/attachs/<?php echo ($CONFIG["site"]["logo"]); ?>" /></a></h1>
                <?php else: ?>
                <h1><a href="<?php echo U('pchome/index/index');?>"><img width="214" height="53" src="__PUBLIC__/img/logo_03.png" /></a></h1><?php endif; ?> 
             <div class="changeCity"><a href="<?php echo U('pchome/city/index');?>" class="changeCity_name"><?php echo ($city_name); ?></a>
        	
        </div>
        </div>
        <div class="left center">
            <div class="searchBox">
                <script>
                    $(document).ready(function () {
                        $(".selectList li a").click(function () {
                            $("#search_form").attr('action', $(this).attr('rel'));
                            $("#selectBoxInput").html($(this).html());
                            $('.selectList').hide();
                        });
                        $(".selectList a").each(function(){
                            if($(this).attr("cur")){
                                $("#search_form").attr('action', $(this).attr('rel'));
                                $("#selectBoxInput").html($(this).html());                                
                            }
                        })
                    });
                </script>
                <form id="search_form"  method="post" action="<?php echo U('pchome/shop/index');?>">
                    <div class="selectBox">
                        <span class="select" id="selectBoxInput">商家</span>
                        <div  class="selectList">
                            <ul>
<li><a href="javascript:void(0);" <?php if($ctl == 'shop'){?> cur='true'<?php }?> rel="<?php echo U('pchome/shop/index');?>">商家</a></li><li><a href="javascript:void(0);" <?php if($ctl == 'shop'){?> cur='true'<?php }?> rel="<?php echo U('pchome/shop/index');?>">商家</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'tuan'){?> cur='true'<?php }?>rel="<?php echo U('pchome/tuan/index');?>">抢购</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'life'){?> cur='true'<?php }?>rel="<?php echo U('pchome/life/index');?>">生活</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'mall'){?> cur='true'<?php }?>rel="<?php echo U('pchome/mall/index');?>">商品</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'tieba'){?> cur='true'<?php }?>rel="<?php echo U('pchome/tieba/index');?>">贴吧</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'news'){?> cur='true'<?php }?>rel="<?php echo U('pchome/news/index');?>">旅游</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'community'){?> cur='true'<?php }?>rel="<?php echo U('pchome/community/index');?>">小区</a></li>
                            </ul>
                        </div>
                    </div>
                    <input type="text" class="text" <?php if($ctl != ding): ?>name="keyword" value="<?php echo (($keyword)?($keyword):'输入您要搜索的内容'); ?>"<?php endif; ?> onclick="if (value == defaultValue) {
                                value = '';
                                this.style.color = '#000'
                            }"  onBlur="if (!value) {
                                        value = defaultValue;
                                        this.style.color = '#999'
                                    }" />
                    <input type="submit" class="submit" value="搜索" />
                </form>
            </div>
            <div class="hotSearch">
                <?php $a =1; ?>
                <?php  $cache = cache(array('type'=>'File','expire'=> 43200)); $token = md5("Keyword,,0,6,43200,key_id desc,,"); if(!$items= $cache->get($token)){ $items = D("Keyword")->where("")->order("key_id desc")->limit("0,6")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; if($item['type'] == 0 or $item['type'] == 1): ?><a href="<?php echo U('pchome/shop/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                    <?php elseif($item['type'] == 2): ?>
                        <a href="<?php echo U('pchome/tuan/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                    <?php elseif($item['type'] == 3): ?>
                        <a href="<?php echo U('pchome/life/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                    <?php elseif($item['type'] == 4): ?>
                        <a href="<?php echo U('pchome/mall/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                        <?php elseif($item['type'] == 5): ?>
                        <a href="<?php echo U('pchome/tieba/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                        <?php elseif($item['type'] == 6): ?>
                        <a href="<?php echo U('pchome/news/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a><?php endif; ?> <?php endforeach; ?>
            </div>
        </div>
        <div class="right topTwo_b">
<!--			<div class="topTwo_tel">
				服务热线：<big>055-456879852</big>
			</div>
-->			<div class="clear"></div>
           <div class="rightss right"><a class="radius20" href="<?php echo U('mall/cart');?>">购物车<span id="num" class="radius100"><?php echo (($cartnum)?($cartnum):'0'); ?></span></a></div>
        </div>
    </div> 
		

	
﻿		<div class="layout">
			<div class="navbar">
				<div class="container">			
					<div class="navbar-body">
						<div class="main-drop float-left">
							<span class="main-drop-title">信息分类 <span class="arrow"></span></span>
							<div class="main-drop-menu out-index">
								<?php $k = 0; ?>
								<?php if(is_array($channelmeans)): foreach($channelmeans as $key=>$item): $k++; ?>
								<dl>
									<dt><a href="<?php echo U('life/main',array('channel'=>$key));?>"><?php echo ($item); ?></a></dt>
									<dd class="sub-nav">
										<?php $i=0; ?>
										<?php if(is_array($cates)): foreach($cates as $key=>$var): if($var['channel_id'] == $k): $i++; ?>
										<?php if($i < 5): ?><a href="<?php echo U('life/main',array('channel'=> $k,'cat'=>$var['cate_id']));?>"><?php echo ($var['cate_name']); ?></a><?php endif; endif; endforeach; endif; ?>
									</dd>
									<dd class="pop-nav">
										<span><?php echo ($item); ?></span>
										<ul>
											<?php if(is_array($cates)): foreach($cates as $key=>$var): if($var['channel_id'] == $k): ?><li><a href="<?php echo U('life/main',array('channel'=> $k,'cat'=>$var['cate_id']));?>"><?php echo ($var['cate_name']); ?></a></li><?php endif; endforeach; endif; ?>
										</ul>
									</dd>
									<span class="icon icon-angle-right"></span>
								</dl><?php endforeach; endif; ?>
							</div>
						</div>
						<ul class="nav nav-inline nav-menu">

							<li class="navLi"><a <?php if($ctl == 'index'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="首页" href="<?php echo U('pchome/index/index');?>" >首页</a></li>
<li class="navLi"><a <?php if($ctl == 'tuan'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="抢购" href="<?php echo U('pchome/tuan/nearby');?>" >抢购</a></li>
<li class="navLi"><a <?php if($ctl == 'huodong'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="活动" href="<?php echo U('pchome/huodong/index');?>" >活动</a></li>
<li class="navLi"><a <?php if($ctl == 'shop'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="商家" href="<?php echo U('shop/index');?>" >商家</a></li>
<li class="navLi"><a <?php if($ctl == 'mall'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="商城" href="<?php echo U('pchome/mall/main');?>" >商城</a></li>
<li class="navLi"><a <?php if($ctl == 'ele'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="外卖" href="<?php echo U('pchome/ele/index');?>" >外卖</a></li>
<li class="navLi"><a <?php if($ctl == 'ding'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="订座" href="<?php echo U('pchome/ding/index');?>" >订座</a></li>
<li class="navLi"><a <?php if($ctl == 'life'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="分类" href="<?php echo U('pchome/life/main');?>" >分类</a></li>
<li class="navLi"><a <?php if($ctl == 'coupon'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="券" href="<?php echo U('pchome/coupon/index');?>" >领劵</a></li>
<li class="navLi"><a <?php if($ctl == 'news'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="新闻" href="<?php echo U('news/index');?>" >新闻</a></li>
<li class="navLi"><a <?php if($ctl == 'lifeservice'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="券" href="<?php echo U('lifeservice/index');?>" >预约</a></li>
<li class="navLi"><a <?php if($ctl == 'community'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="券" href="<?php echo U('community/index');?>" >小区</a></li>

						</ul>
						<?php if($ctl == 'index'): ?><div class="navbar-text navbar-right"><a class="dialogs" href="javascript:;" data-toggle="click" data-target="#shop-cate" data-mask="1" data-width="60%"><i class="icon icon-bars"></i> 选商家</a></div><?php endif; ?>
					</div>
				</div>
			</div>
		</div> 
	<div class="blank-10"></div>
	<div class="container">
		<div class="menu-table">
			<div class="filter-section">
				<?php foreach($areas as $va){ if($va['area_id'] == $area){ $are = $va; } } foreach($cates as $ca){ if($ca['business_id'] == $cat){ $cate = $ca; } } if(!empty($s1)){ foreach($attrs['select1'] as $s){ if($s['attr_id'] == $s1){ $attr1 = $s; } } } if(!empty($s2)){ foreach($attrs['select2'] as $s){ if($s['attr_id'] == $s2){ $attr2 = $s; } } } if(!empty($s3)){ foreach($attrs['select3'] as $s){ if($s['attr_id'] == $s3){ $attr3 = $s; } } } if(!empty($s4)){ foreach($attrs['select4'] as $s){ if($s['attr_id'] == $s4){ $attr4 = $s; } } } if(!empty($business)){ foreach($bizs as $b){ if($b['business_id'] == $business){ $biz = $b; } } } ?>

				<?php if(!empty($cat) || !empty($area) || !empty($channel) || !empty($s1) || !empty($s2) || !empty($s3) || !empty($s4)): ?><div class="filter-bread">
					<a class="button button-small" href="<?php echo U('life/main');?>">全部</a>
					<?php if(!empty($channel)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('channel'=>0));?>"><?php echo ($channelmeans[$channel]); ?> <i class="icon icon-times"></i></a><?php endif; ?>
					<?php if(!empty($cat)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('cat'=>0));?>"><?php echo ($cate['cate_name']); ?> <i class="icon icon-times"></i></a><?php endif; ?>
					<?php if(!empty($area)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('area'=>0));?>"><?php echo ($are['area_name']); ?> <i class="icon icon-times"></i></a><?php endif; ?>
					<?php if(!empty($cat) AND !empty($s1)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('s1'=>0));?>"><?php echo ($attr1['attr_name']); ?> <i class="icon icon-times"></i></a><?php endif; ?>
					<?php if(!empty($cat) AND !empty($s2)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('s2'=>0));?>"><?php echo ($attr2['attr_name']); ?> <i class="icon icon-times"></i></a><?php endif; ?>
					<?php if(!empty($cat) AND !empty($s3)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('s3'=>0));?>"><?php echo ($attr3['attr_name']); ?> <i class="icon icon-times"></i></a><?php endif; ?>
					<?php if(!empty($cat) AND !empty($s4)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('s4'=>0));?>"><?php echo ($attr4['attr_name']); ?> <i class="icon icon-times"></i></a><?php endif; ?>
					<?php if(!empty($business)): ?><a class="button button-small" href="<?php echo LinkTo('life/main',$linkArr,array('business'=>0));?>"><?php echo ($biz['business_name']); ?> <i class="icon icon-times"></i></a><?php endif; ?>
				</div><?php endif; ?>
				

				<div class="filter-list filter-first">
					<div class="list-label">
						信息频道：
					</div>
					<ul class="list-sect">
						<li <?php if(($channel) == ""): ?>class="current"<?php endif; ?> ><a href="<?php echo LinkTo('life/main',$linkArr,array('channel'=>0,'cat'=>0));?>">不限</a></li>   
						<?php if(is_array($channelmeans)): foreach($channelmeans as $key=>$item): ?><li <?php if(($channel) == $key): ?>class="current"<?php endif; ?> ><a href="<?php echo LinkTo('life/main',$linkArr,array('channel'=> $key,'cat'=>0));?>" ><?php echo ($item); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>

				
                <?php if(!empty($channel)): ?><div class="filter-list filter-first">
					<div class="list-label">
						信息分类：
					</div>
					<ul class="list-sect">
						<li><a href="<?php echo LinkTo('life/main',$linkArr,array('cat'=>0));?>" >全部</a></li> 
						<?php if(is_array($cates)): foreach($cates as $key=>$item): if(($item["channel_id"]) == $channel): ?><li <?php if(($cat) == $item["cate_id"]): ?>class="current"<?php endif; ?> ><a href="<?php echo LinkTo('life/main',$linkArr,array('cat'=>$item['cate_id']));?>"><?php echo ($item["cate_name"]); ?></a></li><?php endif; endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
				
				
                <?php if(!empty($cat) && !empty($cate['select1'])): ?><div class="filter-list filter-first">
					<div class="list-label">
						<?php echo ($cate['select1']); ?>：
					</div>
					<ul class="list-sect">
						<li <?php if(($s1) == ""): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s1'=>0));?>" >全部</a></li>  
						<?php if(is_array($attrs["select1"])): foreach($attrs["select1"] as $key=>$item): ?><li  <?php if(($s1) == $item["attr_id"]): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s1'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
				
				
                <?php if(!empty($cat) && !empty($cate['select2'])): ?><div class="filter-list filter-first">
					<div class="list-label">
						<?php echo ($cate['select2']); ?>：
					</div>
					<ul class="list-sect">
						<li <?php if(($s2) == ""): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s2'=>0));?>" >全部</a></li>  
						<?php if(is_array($attrs["select2"])): foreach($attrs["select2"] as $key=>$item): ?><li  <?php if(($s2) == $item["attr_id"]): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s2'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
				
                <?php if(!empty($cat) && !empty($cate['select3'])): ?><div class="filter-list filter-first">
					<div class="list-label">
						<?php echo ($cate['select3']); ?>：
					</div>
					<ul class="list-sect">
						<li <?php if(($s3) == ""): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s3'=>0));?>" >全部</a></li>  
						<?php if(is_array($attrs["select3"])): foreach($attrs["select3"] as $key=>$item): ?><li  <?php if(($s3) == $item["attr_id"]): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s3'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
				
                <?php if(!empty($cat) && !empty($cate['select4'])): ?><div class="filter-list filter-first">
					<div class="list-label">
						<?php echo ($cate['select4']); ?>：
					</div>
					<ul class="list-sect">
						<li <?php if(($s4) == ""): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s4'=>0));?>" >全部</a></li>  
						<?php if(is_array($attrs["select4"])): foreach($attrs["select4"] as $key=>$item): ?><li  <?php if(($s4) == $item["attr_id"]): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('s4'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
				
				
				<div class="filter-list">
					<div class="list-label">
						所在地区：
					</div>
					<ul class="list-sect">
						<li <?php if(($area) == ""): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('area'=>0,'business'=>0));?>" <?php if(($area) == "0"): ?>class="cur"<?php endif; ?>>全部</a>    
						<?php if(is_array($areas)): foreach($areas as $key=>$item): ?></li>   
                        <?php if($item['city_id'] == $city_id){ ?>
						<li  <?php if(($area) == $item["area_id"]): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('area'=>$item['area_id'],'business'=>0));?>"><?php echo ($item["area_name"]); ?></a></li> 
                        <?php } endforeach; endif; ?>
					</ul>
				</div>
				
				<?php if(!empty($area)): ?><div class="filter-list">
					<div class="list-label">
						所在商圈：
					</div>
					<ul class="list-sect">
						<li <?php if(($business) == ""): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('business'=>0));?>" <?php if(($business) == "0"): ?>class="cur"<?php endif; ?>>全部</a></li> 
						<?php if(is_array($bizs)): foreach($bizs as $key=>$item): if(($item["area_id"]) == $area): ?><li <?php if(($business) == $item["business_id"]): ?>class="current"<?php endif; ?>><a href="<?php echo LinkTo('life/main',$linkArr,array('business'=>$item['business_id']));?>"><?php echo ($item["business_name"]); ?></a><?php endif; ?></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>

			</div>
		</div>
		
		<div class="main-list">
			<dl class="life-list">
				<dt>
					<span class="a">信息主题</span>
					<span class="b">区域</span>
					<span class="c">发布时间</span>
				</dt>
				<?php $i=0; ?>
                <?php if(is_array($list)): foreach($list as $key=>$var): $i++; ?>
				<?php if($i%2 == 1): ?><dd>
				<?php else: ?>
				<dd class="odd"><?php endif; ?>
					<span class="a">
						<cite>[ <?php echo ($cates[$var['cate_id']]['cate_name']); ?> ]</cite>
						<a title="<?php echo ($var["title"]); ?>" href="<?php echo U('life/detail',array('life_id'=>$var['life_id']));?>" target="_blank"><?php echo ($var['title']); ?></a>
						<?php if(!empty($var['photo'])): ?><em class="p">图</em><?php endif; ?>
						<?php if(!empty($var['is_shop'])): ?><em class="s">商</em><?php endif; ?>
						<?php if(($var["urgent_date"]) > $today): ?><em class="q">急</em><?php endif; ?>
						<?php if(($var["top_date"]) > $today): ?><em class="d">顶</em><?php endif; ?>
					</span>
					<span class="b"><?php echo ($areas[$var['area_id']]['area_name']); echo ($bizs[$var['business_id']]['business_name']); ?></span>
					<span class="c"><?php echo (date('Y-m-d',$var["create_time"])); ?></span>
				</dd><?php endforeach; endif; ?>
			</dl>
			<div class="blank-20"></div>
			<div class="text-center">
				<div class="pagination">
					<?php echo ($page); ?>
				</div>
			</div>
			<div class="blank-20"></div>
		</div>
	</div>




	<?php if($ctl == 'index'): ?><!--商家分类选择对话框-->

	 <div id="shop-cate">

		<div class="dialog radius">

			<div class="dialog-head">

				<span class="close rotate-hover"></span>

				<strong>选择商家分类</strong>

			</div>

			<div class="dialog-body">

				<?php if(is_array($shopcate)): foreach($shopcate as $key=>$item): if(($item["parent_id"]) == "0"): ?><div class="cate-dialog">

					<span><a href="<?php echo U('shop/index',array('cat'=>$item['cate_id']));?>"><?php echo ($item[cate_name]); ?></a></span>

					<?php if(is_array($shopcate)): foreach($shopcate as $key=>$var): if(($var["parent_id"]) == $item[cate_id]): ?><a href="<?php echo U('shop/index',array('cat'=>$var['cate_id']));?>"><?php echo ($var[cate_name]); ?></a><?php endif; endforeach; endif; ?>

				</div><?php endif; endforeach; endif; ?>

			</div>

			<div class="dialog-foot">

				<button class="button dialog-close">关闭</button>

			</div>

		</div>

	</div><?php endif; ?>

	



	

	

	<style>

.m-btn,.m-lbtn,.m-nbtn,.m-new-btn,.m-new-lbtn,.m-new-nbtn,.m-new-rbtn,.m-new-ubtn,.m-rbtn{height:34px;line-height:34px;padding-left:4px;cursor:pointer;text-decoration:none;float:left;zoom:1;border-radius:2px;font-weight:700;font-size:14px}
.tg-footer{clear:both;width:100%; margin-top:20px;}
.tg-footer .tg-footer-list{height:188px;border:1px solid #eaeaea;border-width:1px 0;background-color:#fafafa;width:100%}
.tg-cont{width:1180px;margin:0 auto}
.tg-footer .tg-footer-list .tg-footer-item-wide{width:209px;height:138px;margin-top:25px;border-right:1px solid #eaeaea;float:left;overflow:hidden}
.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-advice i{background-position:-5px -1528px;background-repeat:no-repeat;overflow:hidden;display:block;width:38px;height:44px;float:left}
.tg-footer .tg-footer-list .tg-footer-item-wide a i{float:left}
.icon1{background-image:url(http://si1.s1.dpfile.com/t/cssnew/newhome/sprites/global.28b8ff1175abaac1bb77e0874cb5f8aa.png)}
.tg-footer .tg-footer-list .tg-footer-item-wide a p{display:block;float:right;width:130px;font-size:14px;text-align:left;color:#999;}
.Fix:after{display:block;content:'\20';height:0;clear:both}
.tg-footer .tg-footer-list .tg-footer-item-wide a{width:190px;display:block;margin:0 auto 42px;position:relative;margin: 0 5px 15px 5px;}
.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-call i{background-position:-5px -1335px;background-repeat:no-repeat;overflow:hidden;display:block;width:36px;height:36px}
.b-lbtn,.m-lbtn,.tg-lbtn{background-color:#fff;border:1px solid #d9d9d9;color:#ff8400}
.tg-footer .tg-footer-list .tg-footer-item-narrow{width:174px;height:138px;margin-top:25px;border-right:1px solid #eaeaea;float:left}
.tg-footer .tg-footer-list .tg-footer-item-narrow dl{width:90px;margin:0 auto}
.tg-footer .tg-footer-list .tg-footer-item-narrow dl dt{font-size:14px;color:#333;line-height:30px;position:relative;margin-top:-8px}
.tg-footer .tg-footer-list .tg-footer-item-narrow dl dd{font-size:12px;color:#999;line-height:20px; padding:0px;}
.tg-footer .tg-footer-list .tg-footer-item-narrow dl dd a{color:#999}
.tg-footer .tg-footer-copyright{text-align:center;line-height:60px;height:60px;display:block;color:#999}
.tg-footer .tg-footer-credit-box{text-align:center;display:block;padding-bottom:30px}
.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-coop i{background-position:-5px -1381px;background-repeat:no-repeat;overflow:hidden;display:block;width:51px;height:37px}
.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-customer i{background-position:-5px -1428px;background-repeat:no-repeat;overflow:hidden;display:block;width:41px;height:38px}
.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-customer p,.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-customer span{width:120px}
.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-customer span{margin-top:-6px}
.tg-footer .tg-footer-list .tg-footer-item-wide a span{display:block;float:right;width:130px;text-align:left;color:#333;font-size:18px;line-height:27px;position:relative}
.tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-customer .m-lbtn{height:20px;line-height:25px;padding:0 15px;margin-left:20px;color:#333;font-weight:400}

.tg-footer .tg-footer-list .tg-footer-item-wide a p, .tg-footer .tg-footer-list .tg-footer-item-wide a span, .tg-footer .tg-footer-list .tg-footer-item-wide a span, .tg-footer .tg-footer-list .tg-footer-item-narrow dl dt, .tg-footer .tg-footer-list .tg-footer-item-narrow dl dt, .tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-customer .m-lbtn, .tg-footer .tg-footer-list .tg-footer-item-wide .tg-footer-customer .m-lbtn {font:12px/1.5 'Microsoft Yahei','Simsun',Tahoma;}

</style>

<div class="footer-content">
<div id="footer" class="footer">
<div class="footer-inner clearfix flexible">
<div class="footer-size">
<h3>公司信息</h3>
<ul>
 <li><a target="_blank" title="关于我们" href="<?php echo U('article/system',array('content_id'=>1));?>">关于我们</a></li>
<li><a target="_blank" title="联系我们" href="<?php echo U('article/system',array('content_id'=>3));?>">联系我们</a></li>
<li><a target="_blank" title="人才招聘" href="<?php echo U('article/system',array('content_id'=>2));?>">人才招聘</a></li>
<li><a target="_blank" title="免责声明" href="<?php echo U('article/system',array('content_id'=>6));?>">免责声明</a></li>
</ul>
</div>
<div class="footer-size-2">
<h3>商户合作</h3>
<ul>
<li><a href="<?php echo U('shop/apply');?>">商家入驻</a></li>
<li><a target="_blank" title="广告合作" href="<?php echo U('article/system',array('content_id'=>5));?>">广告合作</a></li>
<li><a href="<?php echo U('news/index');?>">商家新闻</a></li>
</ul>
</div>
<div class="footer-size-2">
<h3>用户帮助</h3>
<ul>
<li><a target="_blank" title="服务协议" href="<?php echo U('article/system',array('content_id'=>7));?>">服务协议</a></li>
<li><a target="_blank" title="退款承诺" href="<?php echo U('news/index');?>">退款承诺</a></li>
</ul>
</div>
<div class="footer-size-2">
<h3>关于我们</h3>
<ul>
 <li><a target="_blank" title="关于我们" href="<?php echo U('community/index');?>">智慧小区</a></li>
<li><a target="_blank" title="联系我们" href="<?php echo U('news/index');?>">旅游信息</a></li>
<li><a target="_blank" title="人才招聘" href="<?php echo U('pchome/life/main');?>">分类信息</a></li>
</ul>
</div>
<div class="footer-size-3">
<h3><?php echo ($CONFIG["site"]["tel"]); ?></h3>
<ul>
<li>周一至周日&nbsp;9:00-22:00</li>
<li>客服电话&nbsp;免长途费</li>
</ul>
<a href="##" class="mobile-btn">手机专享优惠</a>
</div>
</div>
</div>
<div class="clear"></div>
<div id="copyright-info">
<div class="site-info">
<span class="copyright">
©</span>2015&nbsp;<?php echo ($_SERVER['HTTP_HOST']); ?>&nbsp;<?php echo ($CONFIG["site"]["sitename"]); ?>版权所有 - <?php echo ($CONFIG["site"]["icp"]); ?> 
<?php echo ($CONFIG["site"]["tongji"]); ?>
</div>

</div>
</div>

<div class="topUp">
    <ul>
        <li class="topBack"><div class="topBackOn">回到<br />顶部</div></li>
        <li class="topUpWx"><div class="topUpWxk"><img src="__PUBLIC__/img/wx.png" width="149" height="149" /><p>扫描二维码关注微信</p></div></li>
    </ul>
</div>

<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".topUp").show();
                $(".indexpop").show();
            } else {
                $(".topUp").hide();
                $(".indexpop").hide();
            }
            var ctl = "<?php echo ($ctl); ?>";
            if(ctl == 'coupon'){
                if ($(window).scrollTop() > 665) {
                    $(".spxq_xqT2").show();
                } else {
                    $(".spxq_xqT2").hide();
                }
            }else{
                if ($(window).scrollTop() > '<?php echo ($height_num); ?>') {
                    $(".spxq_xqT2").show();
                } else {
                    $(".spxq_xqT2").hide();
                }
            }
        });

        $(".topBack").click(function () {
           $("html,body").animate({scrollTop: 0}, 200);
        });
		$(window).scroll(function(){
			var top = $(document).scrollTop();          //定义变量，获取滚动条的高度
			var menu = $(".topUp");                      //定义变量，抓取topUp
			var items = $(".footerOut");    //定义变量，查找footerOut 
			items.each(function(){
				var m=$(this);
				var itemsTop = m.offset().top;      //定义变量，获取当前类的top偏移量
				if(itemsTop-360 <= top-360){
					menu.css('bottom','360px');
					menu.css('top','auto');
				}else{
					menu.css('bottom','0px');
					menu.css('top','auto');
				}
			});
		});		
    });
</script>
	



	

	

	<script src="/static/default/pc/js/mod/<?php echo ($ctl); ?>.js"></script>

	</body>

</html>