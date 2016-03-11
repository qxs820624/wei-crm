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
			在线商城
		</div>
		<div class="top-search" style="display:none;">
			<form method="post" action="<?php echo U('mall/index');?>">
				<input name="keyword" placeholder="输入商品的关键字"  />
				<button type="submit" class="icon-search"></button> 
			</form>
		</div>
		<div class="top-signed">
			<a id="search-btn" href="javascript:void(0);"><i class="icon-search"></i></a>
		</div>
	</header>
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
	});
	</script>

	<div class="line">
		<div class="x3">
			<ul id="main-cate" class="main-cate">
			<?php if(is_array($goodscates)): foreach($goodscates as $key=>$var): if(($var["parent_id"]) == "0"): ?><li><a rel="<?php echo ($var["cate_id"]); ?>" href="javascript:;"><?php echo ($var["cate_name"]); ?></a></li><?php endif; endforeach; endif; ?>
			</ul>
		</div>
		<div class="x9">
			<ul id="now-cate" class="now-cate">
			<?php $i=0; ?>
			<?php if(is_array($goodscates)): foreach($goodscates as $key=>$var): if($var['parent_id'] != 0): $i++; ?>
				<?php if($i <= 9): ?><li>
					<a href="<?php echo U('mall/index',array('cat'=>$var['cate_id']));?>">
						<img src="/static/default/wap/image/mall/cate-<?php echo ($var['cate_id']); ?>.png">
						<p><?php echo ($var["cate_name"]); ?></p>
					</a>
				</li><?php endif; endif; endforeach; endif; ?>
			</ul>
		</div>
	</div>

	<div class="mall-cart">
		<a href="<?php echo U('mall/cart');?>">
		<div class="round radius-circle bg-green"><div class="badge-corner"><i class="icon-shopping-cart"></i><span class="badge bg-red"><?php echo ($cartnum); ?></span></div></div>
		</a>
	</div>
	
	<script>
	$("#main-cate a").click(function(){
		var cateid = $(this).attr("rel");
		  $("#main-cate a").each(function(){
			$(this).removeClass("active");
		  });
		$(this).addClass("active");
		$("#now-cate").html("");
		loaddata('/mobile/mall/cate/cat/'+cateid+'.html', $("#now-cate"));
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