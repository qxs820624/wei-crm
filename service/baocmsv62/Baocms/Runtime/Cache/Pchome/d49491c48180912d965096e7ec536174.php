<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo ($CONFIG['site']['headinfo']); ?>
        <title><?php if($config['title'])echo $config['title'];else echo $seo_title; ?></title>
        <meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
        <meta name="description" content="<?php echo ($seo_description); ?>" />
        <link href="__TMPL__statics/css/style.css?v=20150718" rel="stylesheet" type="text/css">
        <script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__';</script>
        <script src="__TMPL__statics/js/jquery.js?v=20150718"></script>
        <script src="__PUBLIC__/js/layer/layer.js?v=20150718"></script>
        <script src="__TMPL__statics/js/jquery.flexslider-min.js?v=20150718"></script>
        <script src="__TMPL__statics/js/js.js?v=20150718"></script>
        <script src="__PUBLIC__/js/web.js?v=20150718"></script>
        <script src="__TMPL__statics/js/baocms.js?v=20150718"></script>
    </head>
    <body>
        <iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>  
<div class="topOne">

    <div class="nr">

        <?php if(empty($MEMBER)): ?><div class="left"><span class="welcome">您好，欢迎访问<?php echo ($CONFIG["site"]["sitename"]); ?></span><a href="<?php echo U('pchome/passport/login');?>">登陆</a>|<a href="<?php echo U('passport/register');?>">注册</a>

                <?php else: ?>

                <div class="left">欢迎 <b style="color: red;font-size:14px;"><?php echo ($MEMBER["nickname"]); ?></b> 来到<?php echo ($CONFIG["site"]["sitename"]); ?>&nbsp;&nbsp; <a href="<?php echo U('member/index/index');?>" >个人中心</a>|<a href="<?php echo U('pchome/passport/logout');?>" >退出登录</a><?php endif; ?>

                    <div class="topSm"> <span class="topSmt"><em>&nbsp;</em></span>

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

                        <li class="liOne"> <a class="liOneA" href="javascript:void(0);" style="color:#F00; font-weight:bold;">网站快捷导航<em>&nbsp;</em></a>

                            <div class="list">

                                <ul>

                                    <li><a href="<?php echo U('pchome/news/index');?>">新闻快报</a></li>

                                    <li><a href="<?php echo U('pchome/tieba/index');?>">贴吧圈子</a></li>

                                    <li><a href="<?php echo U('pchome/seller/index');?>">商家新闻</a></li>

                                    <li><a href="<?php echo U('pchome/community/index');?>">独立小区</a></li>
                                    
                                    <li><a href="<?php echo U('pchome/housekeeping/index');?>">预约管理</a></li>
                                    
                                    <li><a href="<?php echo U('pchome/life/index');?>">分类信息</a></li>
                                    
                                    <li><a href="<?php echo U('mcenter/charge/index');?>" style="color:#F00; font-weight:bold;">缴费服务</a></li>
                                    
                                    <li><a href="<?php echo U('mobile/village/index');?>" style="color:#F00; font-weight:bold;">政务活动</a></li>
                                    
                                    <li><a href="<?php echo U('Mobile/index/index');?>">手机版</a></li>
                                    

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
        	<!--<div class="changeCity_list_box">
            	<ul>
            	    <li class="on">热门城市</li>
                    <li>ABCD</li>
                    <li>EFGH</li>
                    <li>JKL</li>
                    <li>MNPQR</li>
                    <li>STW</li>
                    <li>XYZ</li>
        	    </ul>
                <div class="changeCity_list_pull">
                    <div class="list" style="display:block;">
                        <a href="#">北京北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                    </div>
                    <div class="list">
                        <a href="#">北京北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                        <a href="#">北京</a>
                    </div>
                    <div class="list">
                        <a href="#">广州</a>
                        <a href="#">广州</a>
                        <a href="#">广州</a>
                        <a href="#">广州</a>
                        <a href="#">广州</a>
                        <a href="#">广州</a>
                        <a href="#">广州</a>
                        <a href="#">广州</a>
                    </div>
                    <div class="list">
                        <a href="#">金华</a>
                        <a href="#">金华</a>
                        <a href="#">金华</a>
                        <a href="#">金华</a>
                        <a href="#">金华</a>
                        <a href="#">金华</a>
                        <a href="#">金华</a>
                        <a href="#">金华</a>
                    </div>
                    <div class="list">
                        <a href="#">南京</a>
                        <a href="#">南京</a>
                        <a href="#">南京</a>
                        <a href="#">南京</a>
                        <a href="#">南京</a>
                        <a href="#">南京</a>
                        <a href="#">南京</a>
                        <a href="#">南京</a>
                    </div>
                    <div class="list">
                        <a href="#">上海</a>
                        <a href="#">上海</a>
                        <a href="#">上海</a>
                        <a href="#">上海</a>
                        <a href="#">上海</a>
                        <a href="#">上海</a>
                        <a href="#">上海</a>
                        <a href="#">上海</a>
                    </div>
                    <div class="list">
                        <a href="#">西安</a>
                        <a href="#">西安</a>
                        <a href="#">西安</a>
                        <a href="#">西安</a>
                        <a href="#">西安</a>
                        <a href="#">西安</a>
                        <a href="#">西安</a>
                        <a href="#">西安</a>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
    <div class="left center">
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
        <div class="searchBox">
        	<form id="search_form"  method="post" action="<?php echo U('pchome/shop/index');?>">
            <div class="selectBox"> <span class="select"  id="selectBoxInput">商家</span>
                <div  class="selectList">
                    <ul>
<li><a href="javascript:void(0);" <?php if($ctl == 'shop'){?> cur='true'<?php }?> rel="<?php echo U('pchome/shop/index');?>">商家</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'tuan'){?> cur='true'<?php }?>rel="<?php echo U('pchome/tuan/index');?>">抢购</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'life'){?> cur='true'<?php }?>rel="<?php echo U('pchome/life/index');?>">生活</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'mall'){?> cur='true'<?php }?>rel="<?php echo U('pchome/mall/index');?>">商品</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'tieba'){?> cur='true'<?php }?>rel="<?php echo U('pchome/tieba/index');?>">贴吧</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'news'){?> cur='true'<?php }?>rel="<?php echo U('pchome/news/index');?>">旅游</a></li>
<li><a href="javascript:void(0);" <?php if($ctl == 'community'){?> cur='true'<?php }?>rel="<?php echo U('pchome/community/index');?>">小区</a></li>
                    </ul>        
                                
                </div>
            </div>
            <!--<div class="hotSearch">
                <?php $a =1; ?>
                <?php  $cache = cache(array('type'=>'File','expire'=> 43200)); $token = md5("Keyword,,0,3,43200,key_id desc,,"); if(!$items= $cache->get($token)){ $items = D("Keyword")->where("")->order("key_id desc")->limit("0,3")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; if($item['type'] == 0 or $item['type'] == 1): ?><a href="<?php echo U('pchome/shop/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                    <?php elseif($item['type'] == 2): ?>
                        <a href="<?php echo U('pchome/tuan/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                    <?php elseif($item['type'] == 3): ?>
                        <a href="<?php echo U('pchome/life/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a>
                    <?php elseif($item['type'] == 4): ?>
                        <a href="<?php echo U('pchome/mall/index',array('keyword'=>$item['keyword']));?>"><?php echo ($item["keyword"]); ?></a><?php endif; ?> <?php endforeach; ?>
            </div>-->
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
    </div>
    <div class="right topTwo_b">
    	<div class="tel">
            <p>7x24客服电话</p>
        	<p class="on"><?php echo ($CONFIG["site"]["tel"]); ?></p>
        </div>
    </div>
</div>
<div class="nav">
        <div class="navList">
            <ul>
                <li class="navListAll zy_navListAll"><i class="nav-bz left"></i><span class="navListAllt ">全部抢购分类<em></em></span>
                    <div class="shadowy navAll">
                        <div class="menu_fllist2">
    <?php $i=0; ?>             
    <?php if(is_array($tuancates)): foreach($tuancates as $key=>$item): if(($item["parent_id"]) == "0"): $i++;if($i <= 10){ ?>
        <div <?php if($i == 1): ?>class="item2 bo"<?php else: ?>class="item2"<?php endif; ?> >
            <h3>
                <div class="left"><span>&nbsp;</span><a class="menu_flt" title="<?php echo ($item["cate_name"]); ?>" target="_blank" href="<?php echo U('tuan/index',array('cat'=>$item['cate_id']));?>"><?php echo msubstr($item['cate_name'],0,2,'utf-8',false);?></a></div>
                <div class="right">
                    <?php $i2=0; ?>
                    <?php if(is_array($tuancates)): foreach($tuancates as $key=>$item2): if(($item2["parent_id"]) == $item["cate_id"]): $i2++;if($i2 <= 2){ ?>
                        <a title="<?php echo ($item2["cate_name"]); ?>" target="_blank" href="<?php echo U('tuan/index',array('cat'=>$item['cate_id'],'cate_id'=>$item2['cate_id']));?>"><?php echo msubstr($item2['cate_name'],0,4,'utf-8',false);?></a>
                        <?php } endif; endforeach; endif; ?>
                    &gt;</div>
            </h3>
            <div style="height: 458px;" class="menu_flklist2">
                <div class="menu_fl2t"><a title="<?php echo ($item["cate_name"]); ?>" target="_blank" href="<?php echo U('tuan/index',array('cat'=>$item['cate_id']));?>"><?php echo ($item["cate_name"]); ?></a></div>
                <div class="menu_fl2nr">
                    <ul>
                        <?php $k=0; ?>
                        <?php if(is_array($tuancates)): foreach($tuancates as $key=>$item2): if(($item2["parent_id"]) == $item["cate_id"]): $k++; ?>
                            <?php if($k%16 == 1): ?><li class="menu_fl2nrli">
                                    <ul> 
                                        <li><a title="<?php echo ($item2["cate_name"]); ?>" target="_blank" href="<?php echo U('tuan/index',array('cat'=>$item['cate_id'],'cate_id'=>$item2['cate_id']));?>"><?php echo ($item2['cate_name']); ?></a></li>
                                        <?php elseif($k%16 == 0): ?>
                                        <li><a title="<?php echo ($item2["cate_name"]); ?>" target="_blank" href="<?php echo U('tuan/index',array('cat'=>$item['cate_id'],'cate_id'=>$item2['cate_id']));?>"><?php echo ($item2['cate_name']); ?></a></li>
                                    </ul>
                                </li>
                                <?php else: ?>
                                <li><a title="<?php echo ($item2["cate_name"]); ?>" target="_blank" href="<?php echo U('tuan/index',array('cat'=>$item['cate_id'],'cate_id'=>$item2['cate_id']));?>"><?php echo ($item2['cate_name']); ?></a></li><?php endif; endif; endforeach; endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } endif; endforeach; endif; ?>
</div>

                    </div>
                </li>
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
        </div>
    </div>  
<div class="content zy_content">
    <div class="spxq_loca"><a href="<?php echo U('index/index');?>" target="_blank">首页</a> &gt; <a href="<?php echo U('huodong/index');?>" target="_blank">活动</a> &gt; <span><?php echo ($detail["title"]); ?></span></div>
    <div class="spxq_xqgm">
        <div class="left spxq_xqgm_l">
            <h3><?php echo ($detail["title"]); ?></h3>
            <div class="spxq_qg">
                <div class="left spxq_qg_l">
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.spxq_slider').flexslider({
                                slideshow: false,
                                controlNav: "thumbnails"
                            });
                        });
                        $(function () {
                            $(".sy_hotgzLi").hover(function () {
                                $(".spxq_slider .flex-direction-nav").show();
                            }, function () {
                                $(".spxq_slider .flex-direction-nav").hide();
                            });
                            $(".spxq_slider .flex-direction-nav").hover(function () {
                                $(".spxq_slider .flex-direction-nav").show();
                            }, function () {
                                $(".spxq_slider .flex-direction-nav").hide();
                            });
                        });
                    </script>
                    <div class="spxq_slider">
                        <ul class="slides">
                            <li class="sy_hotgzLi" data-thumb="__ROOT__/attachs/<?php echo ($detail["photo"]); ?>"><img src="__ROOT__/attachs/<?php echo ($detail["photo"]); ?>" width="470" height="285" /></li>
                            <?php $i=0; ?>
                            <?php if(is_array($detail["thumb"])): foreach($detail["thumb"] as $key=>$item): $i++;if($i<=3){ ?>
                                <li class="sy_hotgzLi" data-thumb="__ROOT__/attachs/<?php echo ($item); ?>"><img src="__ROOT__/attachs/<?php echo ($item); ?>" width="470" height="285" /></li>
                                <?php } endforeach; endif; ?>
                        </ul>
                        <?php if(empty($thumb)): ?><ol class="flex-control-nav flex-control-thumbs">
                            <li class="sy_hotgzLi" data-thumb="__ROOT__/attachs/<?php echo ($detail["photo"]); ?>"><img src="__ROOT__/attachs/<?php echo ($detail["photo"]); ?>" width="108" height="68" /></li>
                            <?php $i=0; ?>
                            <?php if(is_array($thumb)): foreach($thumb as $key=>$item): $i++;if($i<=3){ ?>
                                <li class="sy_hotgzLi" data-thumb="__ROOT__/attachs/<?php echo ($item); ?>"><img src="__ROOT__/attachs/<?php echo ($item); ?>" width="108" height="68" /></li>
                                <?php } endforeach; endif; ?>
                        </ol><?php endif; ?>
                    </div>
                </div>
                <div class="right spxq_qg_r hdxq_qg_r">
                    <div class="spxq_qgjgk"> <p class="spxq_xqjj hdxq_xqjj"><?php echo bao_msubstr($detail['intro'],0,60,true);?></p></div>
                    <div class="spxq_qgjgk"><p class="hdxq_p"><span class="detail_spxq_qg_tit">地址</span><?php echo ($detail["addr"]); ?></p></div>
                    <div class="spxq_qgjgk"><p class="hdxq_p"><span class="detail_spxq_qg_tit">商家</span><a target="_blank" href="<?php echo U('shop/detail',array('shop_id'=>$detail['shop_id']));?>#shop"><?php echo ($shop["shop_name"]); ?></a></p></div>
                    <div class="spxq_qgjgk">
                        <span class="detail_spxq_qg_tit">报名截止</span>截止至<?php echo ($detail["sign_end"]); ?>
                    </div>
                    <div class="spxq_qgjgk"> 
                        <div class="left hdsy_Licj_l"><em class="radius100"></em><?php echo ($shop["tel"]); if($shop['extension']): ?>转<?php echo ($shop['extension']); ?>分机<?php endif; ?></div>
                    </div>
                    <div class="hdsy_Licj hdxq_Licj">
                        <div class="hdsy_Licj_r">




                        
                        
<style>.hdsy_LicjA1 {background-color: #999;padding: 0px 25px;line-height: 40px;color: #fff;font-size: 18px;display: inline-block;}</style>

                        <?php if($detail['sign_end'] < $today): ?><!--结束时间小于今天-->
                       		 <a href="javascript:void(0);" class="hdsy_LicjA1 bm_btn1"><em class="hdxq_LicjAem"></em>报名结束</a><!--显示报名结束-->
                        <?php else: ?><!--否则显示立即报名-->
                       
                            <?php if(($detail['sign']) == "0"): ?><a href="javascript:void(0);" class="hdsy_LicjA bm_btn"><em class="hdxq_LicjAem"></em>立即报名</a>
                            <?php else: ?>
                            <a class="hdsy_LicjA" href="javascript:void(0);"><em class="hdxq_LicjAem"></em>已报名</a><?php endif; endif; ?><!--结束-->
                       
                        <span class="hdsy_LiP"><span class="hdsy_Libms"><?php echo ($detail["sign_num"]); ?></span>人已报名</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right spxq_xqgm_r">
            <?php $sd = D('ShopDetails'); $wx = $sd -> where('shop_id ='.$shop['shop_id']) -> getField('wei_pic'); ?>
            <div class="spxq_qgwx"><img width="120" height="120" src="<?php echo ($wx); ?>">
                <p>扫描商家微信</p>
                <p>轻松购享优惠</p>
            </div>
            <div class="share bdsharebuttonbox spxq_qgFx" data-tag="share_1"><a mini='act' class="spxq_qgFxA" href="<?php echo U('shop/favorites',array('shop_id'=>$detail['shop_id']));?>"><em>&nbsp;</em>收藏本店</a><a class="spxq_qgFxA" data-cmd="more" href="javascript:void(0);"><em>&nbsp;</em>分享到</a></div>
            <script>window._bd_share_config = {share: [{"tag": "share_1", 'bdCustomStyle': '__TMPL__statics/empty.css'}]};
                with (document)
                    0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
			</script>
        </div>
    </div>
    <div class="hdxq_xqnr" style="border:1px solid #dbdbdb;">
        <div class="hdxq_xqnrT">活动详情</div>      
        <?php echo ($detail["details"]); ?>
    </div>
</div>
<div class="mask_box dhPop_mask">
    <div class="dhPop" style="height: 300px; margin-top: 16%;">
        <h2><span class="bao_closed"></span>活动报名</h2>
        <form method="post" id="huodong_form">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="right">联系人：</td>
                    <td><input type="text" name="data[name]" class="dhInput" value="" /></td>
                </tr>
                <tr>
                    <td align="right">手机号：</td>
                    <td><input type="text" class="dhInput" name="data[mobile]" value="" /></td>
                </tr>
                <tr>
                    <td align="right">人数：</td>
                    <td>
                        <select name="data[num]" class="dhSelect">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td><input style="cursor: pointer; margin-bottom: 20px;" class="subBtn" type="button" value="确认报名" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(".bm_btn").click(function () {
            var url = "<?php echo U('huodong/sign',array('activity_id'=>$detail['activity_id']));?>";
            $(".dhPop_mask").show();
            $(".subBtn").click(function () {
                var huodng_form = $("#huodong_form").serialize();
                $.post(url, huodng_form, function (data) {
                    if(data.status == 'login'){
                        ajaxLogin();
                        $(".dhPop_mask").hide();
                    }else if (data.status == 'success') {
                        $(".dhPop_mask").hide();
                        layer.msg(data.msg, {icon: 1});
                            window.location.reload(true);
                    } else {
                        layer.msg(data.msg, {icon: 2});
                    }
                }, 'json')
            })
        });
        $(".bao_closed").click(function () {
            $(".dhPop_mask").hide();
        });
    })
</script>








<div class="footerOut">
    <?php if($ctl == index): ?><div class="foot_yqlj">
            友情链接：
            <?php  $cache = cache(array('type'=>'File','expire'=> 21600)); $token = md5("Links,,0,10,21600,orderby asc,,"); if(!$items= $cache->get($token)){ $items = D("Links")->where("")->order("orderby asc")->limit("0,10")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><a target="_blank" href="<?php echo ($item["link_url"]); ?>"><?php echo ($item["link_name"]); ?></a> <?php endforeach; ?>
        </div><?php endif; ?>
    <div class="footer">
        <div class="footNav">
            <div class="left">
                <div class="footNavLi">
                    <ul>
                    	<li class="footerLi foot_contact">
                            <h3><i class="ico_1"></i>联系我们</h3>
                			<div class="nr">
                            	<p>客服电话：<span class="fontcl1"><?php echo ($CONFIG["site"]["tel"]); ?></span></p>
                                <p class="graycl">免费长途</p>
                                <p>在线客服：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($CONFIG["site"]["qq"]); ?>&site=<?php echo ($CONFIG["site"]["host"]); ?>&menu=yes"><img src="__TMPL__statics/images/foot_btn.png"/></a></p>
                                <p>工作时间：周一至周日9:00-22:00</p>
                                <p class="graycl">法定节假日除外</p>
                            </div>
                        </li>
                        <li class="footerLi">
                            <h3><i class="ico_2"></i>公司信息</h3>
                            <ul class="list">
                                <li><a target="_blank" title="关于我们" href="<?php echo U('article/system',array('content_id'=>1));?>">关于我们</a></li>
                                <li><a target="_blank" title="联系我们" href="<?php echo U('article/system',array('content_id'=>3));?>">联系我们</a></li>
                                <li><a target="_blank" title="人才招聘" href="<?php echo U('article/system',array('content_id'=>2));?>">人才招聘</a></li>
                                <li><a target="_blank" title="免责声明" href="<?php echo U('article/system',array('content_id'=>6));?>">免责声明</a></li>
                            </ul>
                        </li>
                        <li class="footerLi">
                            <h3><i class="ico_3"></i>商户合作</h3>
                            <ul class="list">
                                <li><a href="<?php echo U('shop/apply');?>">商家入驻</a></li>
                                <li><a target="_blank" title="广告合作" href="<?php echo U('article/system',array('content_id'=>5));?>">广告合作</a></li>
                                <li><a href="<?php echo U('shangjia/index/index');?>">商家后台</a></li>
                            </ul>
                        </li>
                        <li class="footerLi">
                            <h3><i class="ico_4"></i>用户帮助</h3>
                            <ul class="list">
                                <li><a target="_blank" title="服务协议" href="<?php echo U('article/system',array('content_id'=>7));?>">服务协议</a></li>
                                <li><a target="_blank" title="退款承诺" href="<?php echo U('article/refund');?>">退款承诺</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
              
            </div>
            <div class="right"><p>扫一扫关注<?php echo ($CONFIG["site"]["sitename"]); ?></p><img src="__PUBLIC__/img/wx.png" width="149" height="149" /></div>
        </div>
    </div>
	<div class="footerCopy">copyright 2013-2113 <?php echo ($_SERVER['HTTP_HOST']); ?> All Rights Reserved <?php echo ($CONFIG["site"]["sitename"]); ?>版权所有 - <?php echo ($CONFIG["site"]["icp"]); ?> <?php echo ($CONFIG["site"]["tongji"]); ?></div>

</div>  
<div class="topUp">
    <ul>
    	<li class="kefu"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($CONFIG["site"]["qq"]); ?>&site=<?php echo ($CONFIG["site"]["host"]); ?>&menu=yes"><div class="kefu_open maincl">在线客服</div></a></li>
        <li class="topBack"><div class="topBackOn">回到<br />顶部</div></li>
        <li class="topUpWx"><div class="topUpWxk"><img src="__PUBLIC__/img/wx.png" width="149" height="149" /><p class="maincl">扫描二维码关注微信</p></div></li>
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
                if ($(window).scrollTop() > 165) {
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


</body>
</html>