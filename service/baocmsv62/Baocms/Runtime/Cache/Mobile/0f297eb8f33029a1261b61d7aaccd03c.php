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
	<header class="top-fixed bg-yellow bg-inverse">
		<div class="top-back">
			<a class="top-addr" href="<?php echo U('index/index');?>"><i class="icon-angle-left"></i></a>
		</div>
		<div class="top-title">
			在线订座
		</div>
	</header>
	<script>
		$(function () {
			$("#search-bar li").each(function (e) {
				$(this).click(function () {
					if ($(this).hasClass("on")) {
						$(this).parent().find("li").removeClass("on");
						$(this).removeClass("on");
						$(".serch-bar-mask").hide();
					}
					else {
						$(this).parent().find("li").removeClass("on");
						$(this).addClass("on");
						$(".serch-bar-mask").show();
					}
					$(".serch-bar-mask .serch-bar-mask-list").each(function (i) {

						if (e == i) {
							$(this).parent().find(".serch-bar-mask-list").hide();
							$(this).show();
						}
						else {
							$(this).hide();
						}
						$(this).find("li").click(function () {
							$(this).parent().find("li").removeClass("on");
							$(this).addClass("on");
						});
					});
				});
			});
		});
	</script>
    <!-- 筛选TAB -->
    <div id="search-bar" class="search-bar">
        <ul class="line">
            <li class="x3"><span>分类</span><i></i></li>
            <li class="x3"><span>地区</span><i></i></li>
            <li class="x3"><span>商圈</span><i></i></li>
            <li class="x3"><span>排序</span><i></i></li>
        </ul>
    </div>
    <div class="serch-bar-mask" style="display:none;">
        <div class="serch-bar-mask-list">
            <ul>
                <li <?php if(empty($cate)): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('ding/index',$linkArr,array('cate'=>0));?>">全部</a></li>
                <?php if(is_array($keywords)): $index = 0; $__LIST__ = $keywords;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($index % 2 );++$index;?><li <?php if($cate == $item[key_id]): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('ding/index',$linkArr,array('cate'=>$item[key_id]));?>"><?php echo ($item["keyword"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="serch-bar-mask-list">
            <ul>
                <li <?php if(empty($area)): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('ding/index',$linkArr,array('area'=>0,'business'=>0));?>">全部</a></li>
                <?php if(is_array($areas)): $i = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li <?php if($item['area_id'] == $area): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('ding/index',$linkArr,array('area'=>$item['area_id']));?>"><?php echo ($item["area_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php if(!empty($area)): ?><div class="serch-bar-mask-list">
                <ul>
                    <li <?php if(empty($business)): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('ding/index',$linkArr,array('area'=>$area,'business'=>0));?>">全部</a></li>
                    <?php if(is_array($bizs)): $i = 0; $__LIST__ = $bizs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["area_id"]) == $area): ?><li <?php if($item['business_id'] == $business): ?>class="on"<?php endif; ?> ><a href="<?php echo LinkTo('ding/index',$linkArr,array('area'=>$area,'business'=>$item['business_id']));?>"><?php echo ($item["business_name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        <?php else: ?>
            <div class="serch-bar-mask-list">
            </div><?php endif; ?>
        <div class="serch-bar-mask-list">
            <ul>
                <li <?php if($order > 4 || $order < 2): ?>class="on"<?php endif; ?>><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('ding/index',$linkArr,array('order'=>1));?>">默认排序</a></li>
                <li <?php if($order > 2): ?>class="on"<?php endif; ?>><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('ding/index',$linkArr,array('order'=>2));?>">距离最近</a></li>
                <li <?php if($order == 3): ?>class="on"<?php endif; ?>><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('ding/index',$linkArr,array('order'=>3));?>">销量最高<em class="em_up"></em></a></li>
                <li <?php if($order == 4): ?>class="on"<?php endif; ?>><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('ding/index',$linkArr,array('order'=>4));?>">价格最低<em></em></a></li>
            </ul>
        </div>
        <div class="serch-bar-mask-bg"></div>
    </div>
    <div class="blank-40"></div>
	
	<ul id="shop-list" class="shop-list"></ul>

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