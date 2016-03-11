<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<title><?php if(!empty($seo_title)): echo ($seo_title); ?>_<?php endif; echo ($CONFIG["site"]["sitename"]); ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<?php if($CONFIG[site][concat] != 1): ?><link rel="stylesheet" href="/static/default/wap/css/base.css">
		<link rel="stylesheet" href="/static/default/wap/css/<?php echo ($ctl); ?>.css"/>
		<script src="/static/default/wap/js/jquery.js"></script>
		<script src="/static/default/wap/js/base.js"></script>
		<script src="/static/default/wap/other/layer.js"></script>
		<script src="/static/default/wap/other/roll.js"></script>
		<script src="/static/default/wap/js/public.js"></script>
		<?php else: ?>
		<link rel="stylesheet" href="/static/default/wap/css/??base.css,<?php echo ($ctl); ?>.css" />
		<script src="/static/default/wap/js/??jquery.js,base.js,roll.js,layer.js,public.js"></script><?php endif; ?>
        
        
		 <script>
            function bd_encrypt(gg_lat, gg_lon)   // 百度地图测距偏差 问题修复
            {
				var page =  "/mobile/near/dingwei/lat/"+gg_lat+"/lng/"+gg_lon+".html";
				$.get(page, function (data) {
					if(data == '1'){
						$("#local").html("附近");
					}
				}, 'html');
            }
            navigator.geolocation.getCurrentPosition(function (position) {
                bd_encrypt(position.coords.latitude, position.coords.longitude);
            });
        </script>
	</head>
	<body>
<link rel="stylesheet" href="/static/default/wap/css/shop.css">
    <script>
		$(function(){
			$("#search-btn").click(function(){
				if($(".top-search").css("display")=='block'){
					$(".top-search").hide();
					$(".top-title").show(200);
				}
				else{
					$(".top-search").show();
					$(".top-title").hide(200);
				}
			});
			$("#search-bar li").each(function(e){
				$(this).click(function(){
					if($(this).hasClass("on")){
						$(this).parent().find("li").removeClass("on");
						$(this).removeClass("on");
						$(".serch-bar-mask").hide();
					}
					else{
						$(this).parent().find("li").removeClass("on");
						$(this).addClass("on");
						$(".serch-bar-mask").show();
					}
					$(".serch-bar-mask .serch-bar-mask-list").each(function(i){
						
						if(e==i){
							$(this).parent().find(".serch-bar-mask-list").hide();
							$(this).show();
						}
						else{
							$(this).hide();
						}
						$(this).find("li").click(function(){
							$(this).parent().find("li").removeClass("on");
							$(this).addClass("on");
						});
					});
				});
			});
		});
    </script>

	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('index/index');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			活动列表
		</div>
		
		<div class="top-signed">
			<a id="search-btn" href="javascript:void(0);"><i class="icon-search"></i></a>
		</div>
	</header>
    
    
	<div id="search-bar" class="search-bar">
		<ul class="line">
			<li class="x6"><span>全部分类</span><i></i></li>
			<li class="x5"><span>全部时间</span><i></i></li>
		</ul>
	</div>
    <div class="serch-bar-mask" style="display:none;">
        <div class="serch-bar-mask-list">
            <ul>
                <li class="on"><a class="<?php if(empty($cat)): ?>on<?php endif; ?> "><a href="<?php echo LinkTo('huodong/index',$linkArr,array('cat'=>0));?>" >全部分类</a></li>
                <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li <?php if($item['cate_id'] == $cat): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('huodong/index',$linkArr,array('cat'=>$item['cate_id']));?>"><?php echo ($item["cate_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                
                   
                   
            </ul>
        </div>
        <div class="serch-bar-mask-list">
            <ul>
                <li><a href="#" class="<?php if(empty($area_id)): ?>on<?php endif; ?>">全部地区</a></li>
               

                 <li <?php if(empty($bg_time)): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('huodong/index',$linkArr,array('bg_time'=>0));?>">全部</a></li>
                <li <?php if($bg_time == 1): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('huodong/index',$linkArr,array('bg_time'=>1));?>">今天</a></li>
                <li <?php if($bg_time == 2): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('huodong/index',$linkArr,array('bg_time'=>2));?>">昨天</a></li>
                <li <?php if($bg_time == 3): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('huodong/index',$linkArr,array('bg_time'=>3));?>">一周内</a></li>
                <li <?php if($bg_time == 4): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('huodong/index',$linkArr,array('bg_time'=>4));?>">一月内</a></li>
                <li <?php if($bg_time == 5): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('huodong/index',$linkArr,array('bg_time'=>5));?>">一月前</a></li>
        
              
            </ul>
        </div>
        
        
        <div class="serch-bar-mask-bg"></div>
    </div>

	<div class="blank-40"></div>
	<div class="container">
		<div id="shop-list" class="shop-list"></div>
	</div>
	<script>
		$(document).ready(function () {
			loaddata('<?php echo ($nextpage); ?>', $("#shop-list"), true);
		});
	</script>


    
    <footer class="foot-fixed">		
    <a class="foot-item <?php if(($ctl == 'index') AND ($act != 'more')): ?>active<?php endif; ?>" href="<?php echo U('index/index');?>">		
    	<span class="icon icon-home"></span>		
        	<span class="foot-label">首页</span>		
            </a>		
            
         <a class="foot-item <?php if(($ctl) == "near"): ?>active<?php endif; ?>" href="<?php echo U('community/index');?>">			<span class="icon icon-tasks"></span>			<span class="foot-label">小区</span>		</a>	
            
            <a class="foot-item <?php if(($ctl) == "favorites"): ?>active<?php endif; ?>" href="<?php echo U('favorites/index');?>">			<span class="icon icon-heart"></span>			<span class="foot-label">关注</span>		</a>		
            
            <a class="foot-item <?php if(($ctl) == "mcenter"): ?>active<?php endif; ?>" href="<?php echo U('mcenter/index/index');?>">			<span class="icon icon-user"></span>			<span class="foot-label">我的</span>		</a>		
            
            <a class="foot-item <?php if(($ctl == 'index') AND ($act == 'more')): ?>active<?php endif; ?>" href="<?php echo U('index/more');?>">			<span class="icon icon-ellipsis-h"></span>			<span class="foot-label">更多</span>		</a>	
            
            </footer>	
            
            	<iframe id="x-frame" name="x-frame" style="display:none;"></iframe>
                </body>
                
                </html>