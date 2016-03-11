<?php if (!defined('THINK_PATH')) exit(); $seo_title = $detail['title']; ?>
<!DOCTYPE html>
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
			热点资讯
		</div>
		<div class="top-share">
			<a href="javascript:void(0);" id="cate-btn"><i class="icon-bars"></i></a>
		</div>
	</header>
	
    <div class="serch-bar-mask" id="cate_menu" style="display:none;top:50px;">
		<div class="serch-bar-mask-list">
			<ul>
				<li class="<?php if(empty($cat)): ?>on<?php endif; ?> "><a href="<?php echo U('news/index');?>" >全部新闻</a></li>
				<?php if(is_array($cates)): foreach($cates as $key=>$item): if(($item["parent_id"]) == "0"): ?><li>
					<a  href="<?php echo U('news/cate',array('cat'=>$item['cate_id']));?>"><?php echo ($item["cate_name"]); ?></a>
				</li><?php endif; endforeach; endif; ?>
			</ul>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$("#cate-btn").click(function () {
				$("#cate_menu").toggle();
			});
			
			$("#cate_menu ul li a").click(function () {
				$("#cate_menu").toggle();
			});

		});
	</script>

	<div id="roll" class="roll">
		<div class="bd">
			<ul>
				<?php $i=0; ?>
				<?php  $cache = cache(array('type'=>'File','expire'=> 43200)); $token = md5("Article,isroll = 1 AND photo != '',0,5,43200,article_id desc,,"); if(!$items= $cache->get($token)){ $items = D("Article")->where("isroll = 1 AND photo != ''")->order("article_id desc")->limit("0,5")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; $i++; if($i==1){ $first = $item['title']; } ?>
				<li>
					<a class="pic" href="<?php echo U('news/detail',array('article_id'=>$item['article_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item['photo']); ?>" /></a>
					<a class="tit" href="<?php echo U('news/detail',array('article_id'=>$item['article_id']));?>"><?php echo ($item['title']); ?></a>
				</li> <?php endforeach; ?>
			</ul>
		</div>
		<div class="hd">
			<ul></ul>
		</div>
	</div>
	
	<div class="blank-10"></div>
	<div class="sec-title">	
		<div class="divider"></div>	
		<span>热门推荐</span>
	</div>
	
	<div class="row">	
		<?php  $cache = cache(array('type'=>'File','expire'=> 43200)); $token = md5("Article,istop = 1 AND photo !='',0,6,43200,article_id desc,,"); if(!$items= $cache->get($token)){ $items = D("Article")->where("istop = 1 AND photo !=''")->order("article_id desc")->limit("0,6")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><a class="col" href="<?php echo U('news/detail',array('article_id'=>$item['article_id']));?>">	
			<div class="cover">
				<img src="__ROOT__/attachs/<?php echo ($item['photo']); ?>" class="cover" />	
				<div class="title"><?php echo ($item['title']); ?></div>	
			</div>
		</a> <?php endforeach; ?>
	</div>
	
	<div class="blank-10"></div>
	<div class="sec-title">	
		<div class="divider"></div>	
		<span>最新资讯</span>
	</div>
	
	<div class="news-list">
		<?php if(is_array($list)): foreach($list as $key=>$var): ?><a class="item media media-x" href="<?php echo U('news/detail',array('article_id'=>$var['article_id']));?>">
			<span class="float-left">
				<img class="radius" src="__ROOT__/attachs/<?php echo (($var['photo'])?($var['photo']):'default.jpg'); ?>" />	
			</span>
			<div class="media-body">
				<strong><?php echo ($var["title"]); ?></strong>
				<p class="desc"><?php echo bao_Msubstr($var['details'],0,100);?></p>
				<p class="info">
					<i class="icon-commenting-o"></i> <em><?php echo ($var["views"]); ?></em>
					<i class="icon-clock-o"></i> <em><?php echo (date('Y-m-d',$var["create_time"])); ?></em>
				</p>
			</div>
		</a><?php endforeach; endif; ?>
	</div>
	
	<script type="text/javascript">	
		TouchSlide({ 
			slideCell:"#roll",
			titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
			mainCell:".bd ul", 
			effect:"leftLoop", 
			autoPage:true //自动分页
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