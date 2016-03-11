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
            <?php if(!empty($CONFIG['site']['logo'])): ?><h1><a href="<?php echo U('index/index');?>"><img width="214" height="53" src="__ROOT__/attachs/<?php echo ($CONFIG["site"]["logo"]); ?>" /></a></h1>
                <?php else: ?>
                <h1><a href="<?php echo U('index/index');?>"><img width="214" height="53" src="__PUBLIC__/img/logo_03.png" /></a></h1><?php endif; ?> 
            <div class="changeCity"><a href="<?php echo U('pchome/city/index');?>" class="changeCity_name"><?php echo ($city_name); ?></a></div>
        </div>
        <div class="left center">
            <div class="searchBox">
                <script>
                    $(document).ready(function () {
                        $(".selectList li a").click(function () {
                            $("#search_form").prop('action', $(this).attr('rel'));
                            $("#selectBoxInput").html($(this).html());
                            $('.selectList').hide();
                        });
                    });
                </script>
                <form id="search_form"  method="post" action="<?php echo U('shop/index');?>">
                    <div class="selectBox"> 
                        <span class="select"  id="selectBoxInput">商家</span>
                        <div  class="selectList">
                            <ul>
                                <li><a href="javascript:void(0);" rel="<?php echo U('shop/index');?>">商家</a></li>
                                <li><a href="javascript:void(0);" rel="<?php echo U('tuan/index');?>">抢购</a></li>
                                <li><a href="javascript:void(0);" rel="<?php echo U('life/index');?>">生活信息</a></li>
                                <li><a href="javascript:void(0);" rel="<?php echo U('mall/index');?>">商品</a></li>
                                <li><a href="javascript:void(0);" rel="<?php echo U('share/index');?>">分享</a></li>
                            </ul>
                        </div>
                    </div>
                    <input type="text" class="text" value="输入您要搜索的内容" onclick="if (value == defaultValue) {
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
        <div class="rightss right"><a class="radius20" href="<?php echo U('mall/cart');?>">购物车<span id="num" class="radius100"><?php echo (($cartnum)?($cartnum):'0'); ?></span></a></div>
    </div>

<div class="nav">

    <div class="navList">

        <ul>

            <li class="navListAll"><span class="navListAllt">全部商品分类<em></em></span>
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
<li class="navLi"><a <?php if($ctl == 'mall'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="商城" href="<?php echo U('pchome/mall/main');?>" >商城</a></li>
<li class="navLi"><a <?php if($ctl == 'ele'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="外卖" href="<?php echo U('pchome/ele/index');?>" >外卖</a></li>
<li class="navLi"><a <?php if($ctl == 'ding'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="订座" href="<?php echo U('pchome/ding/index');?>" >订座</a></li>
<li class="navLi"><a <?php if($ctl == 'life'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="分类" href="<?php echo U('pchome/life/main');?>" >分类</a></li>
<li class="navLi"><a <?php if($ctl == 'community'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="券" href="<?php echo U('community/index');?>" >小区</a></li>
<li class="navLi"><a <?php if($ctl == 'coupon'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="券" href="<?php echo U('pchome/housekeeping/index');?>" >预约</a></li>  
<li class="navLi"><a <?php if($ctl == 'coupon'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="券" href="<?php echo U('pchome/tieba/index');?>" >同城交流</a></li>                

        </ul>

    </div>

</div>

<!--top END-->



<div class="content zy_content">

    <div class="left zy_content_l">

        <div class="goods_flBox" id="shopping">

            <ul>

                <?php if(!empty($selArr)): ?><li class="goods_flListLf">

                        <ul>

                            <li class="goods_flLi"><a class="goods_flLiA" href="<?php echo U('mall/index');?>">全部</a></li>

                            <li class="goods_flLi goods_flLix">&gt;</li>

                            <script>

                                $(function () {

                                    $('.goods_flLiLf .goods_flLiA').hover(function () {

                                        $(this).parent().find('.goods_flLiLfk').show();

                                        $(this).addClass("on");

                                    });

                                    $('.goods_flLiLf').hover(function () {

                                    }, function () {

                                        $(this).find('.goods_flLiLfk').hide();

                                        $(this).children(".goods_flLiA").removeClass("on");

                                    });

                                    $('.goods_flLiFl').hover(function () {

                                        $(this).parent().find('.goods_flLiLfk').hide();

                                        $(this).parent().find(".goods_flLiA").removeClass("on");

                                    });

                                });

                            </script>



                            <?php if(!empty($cat)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>0,'cate_id'=>0));?>"><?php echo ($goodscate[$cat]['cate_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>0,'cates'=>0,'cate_id'=>0));?>" class="goods_flLiFl">ｘ</a>

                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>0,'cates'=>0,'cate_id'=>0));?>">全部</a>

                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == "0"): ?>|<a <?php if(($item["cate_id"]) == $cat): ?>class="on"<?php endif; ?>  href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$item['cate_id'],'cates'=>0,'cate_id'=>0));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>

                                    </div>

                                </li>

                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>
                             <?php if(!empty($cates)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$cates));?>"><?php echo ($goodscate[$cates]['cate_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>0));?>" class="goods_flLiFl">ｘ</a>

                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>0));?>">全部</a>

                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): ?>|<a <?php if(($item["cate_id"]) == $cates): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$item['cate_id'],'cate_id'=>0));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>

                                    </div>

                                </li>

                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>

                            <?php if(!empty($cate_id)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$cates,'cate_id'=>$cate_id));?>"><?php echo ($goodscate[$cate_id]['cate_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$cates,'cate_id'=>0));?>" class="goods_flLiFl">ｘ</a>

                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$cates,'cate_id'=>0));?>">全部</a>

                                        <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cates): ?>|<a <?php if(($item["cate_id"]) == $cate_id): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$cates,'cate_id'=>$item['cate_id']));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>

                                    </div>

                                </li>

                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>

                            <?php if(!empty($area_id)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id));?>"><?php echo ($areas[$area_id]['area_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>0,'business'=>0));?>" class="goods_flLiFl">ｘ</a>

                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>0));?>">全部</a>

                                        <?php if(is_array($areas)): foreach($areas as $key=>$item): if(($item["city_id"]) == $city_id): ?>|<a <?php if(($item["area_id"]) == $area_id): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$item['area_id'],'business'=>0));?>"><?php echo ($areas[$item['area_id']]['area_name']); ?></a><?php endif; endforeach; endif; ?>

                                    </div>

                                </li>

                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>

                            <?php if(!empty($business_id)): ?><li class="goods_flLi goods_flLiLf"><a class="goods_flLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>$business_id));?>"><?php echo ($bizs[$business_id]['business_name']); ?><em></em></a><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>0));?>" class="goods_flLiFl">ｘ</a>

                                    <div class="goods_flLiLfk"><a href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>0));?>">全部</a>

                                        <?php if(is_array($bizs)): foreach($bizs as $key=>$item): if(($item["area_id"]) == $area_id): ?>|<a <?php if(($item["business_id"]) == $business_id): ?>class="on"<?php endif; ?> href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$area_id,'business'=>$item['business_id']));?>"><?php echo ($bizs[$item['business_id']]['business_name']); ?></a><?php endif; endforeach; endif; ?>

                                    </div>

                                </li>

                                <li class="goods_flLi goods_flLix">&gt;</li><?php endif; ?>

                          

                        </ul>

                    </li><?php endif; ?>

                <?php if(empty($cat)): ?><li class="goods_flList">

                        <div class="left goods_flList_l">分类：</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr);?>">全部</a>

                            <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == "0"): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$item['cate_id']));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>

                        </div>

                    </li><?php endif; ?>
                 <?php if(!empty($cat) and empty($cates)): ?><li class="goods_flList">

                        <div class="left goods_flList_l">分类：</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat));?>">全部</a>

                            <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cat): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$item['cate_id']));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>

                        </div>

                    </li><?php endif; ?>

                <?php if(!empty($cates) and empty($cate_id)): ?><li class="goods_flList">

                        <div class="left goods_flList_l">分类：</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$cates));?>">全部</a>

                            <?php if(is_array($goodscate)): foreach($goodscate as $key=>$item): if(($item["parent_id"]) == $cates): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('cat'=>$cat,'cates'=>$cates,'cate_id'=>$item['cate_id']));?>"><?php echo ($goodscate[$item['cate_id']]['cate_name']); ?></a><?php endif; endforeach; endif; ?>

                        </div>

                    </li><?php endif; ?>
                <?php if(!empty($cate_id) && !empty($cate['select1'])): ?><li class="goods_flList">

                        <div class="left goods_flList_l"><?php echo ($cate['select1']); ?>:</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('s1'=>0));?>">全部</a>

                           <?php if(is_array($attrs["select1"])): foreach($attrs["select1"] as $key=>$item): ?><a class='goods_flListA <?php if(($s1) == $item["attr_id"]): ?>on<?php endif; ?>' href="<?php echo LinkTo('mall/index',$linkArr,array('s1'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a><?php endforeach; endif; ?>
                            

                        </div>

                    </li><?php endif; ?>
                  <?php if(!empty($cate_id) && !empty($cate['select2'])): ?><li class="goods_flList">

                        <div class="left goods_flList_l"><?php echo ($cate['select2']); ?>:</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('s2'=>0));?>">全部</a>

                           <?php if(is_array($attrs["select2"])): foreach($attrs["select2"] as $key=>$item): ?><a class='goods_flListA <?php if(($s2) == $item["attr_id"]): ?>on<?php endif; ?>' href="<?php echo LinkTo('mall/index',$linkArr,array('s2'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a><?php endforeach; endif; ?>
                            

                        </div>

                    </li><?php endif; ?>
                  <?php if(!empty($cate_id) && !empty($cate['select3'])): ?><li class="goods_flList">

                        <div class="left goods_flList_l"><?php echo ($cate['select3']); ?>:</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('s3'=>0));?>">全部</a>

                           <?php if(is_array($attrs["select3"])): foreach($attrs["select3"] as $key=>$item): ?><a class='goods_flListA <?php if(($s3) == $item["attr_id"]): ?>on<?php endif; ?>' href="<?php echo LinkTo('mall/index',$linkArr,array('s3'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a><?php endforeach; endif; ?>
                            

                        </div>

                    </li><?php endif; ?>
                  <?php if(!empty($cate_id) && !empty($cate['select4'])): ?><li class="goods_flList">

                        <div class="left goods_flList_l"><?php echo ($cate['select4']); ?>:</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('s4'=>0));?>">全部</a>

                           <?php if(is_array($attrs["select4"])): foreach($attrs["select4"] as $key=>$item): ?><a class='goods_flListA <?php if(($s4) == $item["attr_id"]): ?>on<?php endif; ?>' href="<?php echo LinkTo('mall/index',$linkArr,array('s4'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a><?php endforeach; endif; ?>
                            

                        </div>

                    </li><?php endif; ?>
                 <?php if(!empty($cate_id) && !empty($cate['select5'])): ?><li class="goods_flList">

                        <div class="left goods_flList_l"><?php echo ($cate['select5']); ?>:</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr,array('s5'=>0));?>">全部</a>

                           <?php if(is_array($attrs["select5"])): foreach($attrs["select5"] as $key=>$item): ?><a class='goods_flListA <?php if(($s5) == $item["attr_id"]): ?>on<?php endif; ?>' href="<?php echo LinkTo('mall/index',$linkArr,array('s5'=>$item['attr_id']));?>"><?php echo ($item["attr_name"]); ?></a><?php endforeach; endif; ?>
                            

                        </div>

                    </li><?php endif; ?>

                <?php if(empty($area_id)): ?><li class="goods_flList">

                        <div class="left goods_flList_l">地区：</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr);?>">全部</a>

                            <?php if(is_array($areas)): foreach($areas as $key=>$item): if($item['city_id'] == $city_id){ ?>
                                <a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('area'=>$item['area_id']));?>"><?php echo ($item["area_name"]); ?></a>
							<?php } endforeach; endif; ?>

                        </div>

                    </li><?php endif; ?>

                <?php if(!empty($area_id) and empty($business_id)): ?><li class="goods_flList">

                        <div class="left goods_flList_l">商圈：</div>

                        <div class="left goods_flList_r">

                            <a class="goods_flListA on" href="<?php echo LinkTo('mall/index',$linkArr);?>">全部</a>

                            <?php if(is_array($bizs)): foreach($bizs as $key=>$item): if(($item["area_id"]) == $area_id): ?><a class="goods_flListA" href="<?php echo LinkTo('mall/index',$linkArr,array('business'=>$item['business_id']));?>"><?php echo ($item["business_name"]); ?></a><?php endif; endforeach; endif; ?>

                        </div>

                    </li><?php endif; ?>

            

            </ul>

        </div>

        <div class="nearbuy_sxk">

            <ul>

                <li class="nearbuy_sxkLi <?php if(empty($order) or $order == d): ?>on<?php endif; ?> "><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'d'));?>">默认排序</a></li>

                <li class="nearbuy_sxkLi <?php if(($order) == "s"): ?>on<?php endif; ?>"><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'s'));?>">销量排序<em class="em_up"></em></a></li>

                <li class="nearbuy_sxkLi <?php if(($order) == "p"): ?>on<?php endif; ?>"><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'p'));?>">价格排序<em></em></a></li>

                <li class="nearbuy_sxkLi <?php if(($order) == "v"): ?>on<?php endif; ?>"><a class="nearbuy_sxkLiA" href="<?php echo LinkTo('mall/index',$linkArr,array('order'=>'v'));?>">人气排序<em class="em_up"></em></a></li>

            </ul>

        </div>

        <div class="qg-sp-listBox">

            <div class="qg-sp-list">

                <ul>

                    <?php if(is_array($list)): foreach($list as $key=>$item): ?><li>

                            <div class="qg-sp-liBox">

                                <div class="img"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item["photo"]); ?>" /></a></div>
		<?php if($item['num'] == 0): ?><span class="mallmgl"></span><?php endif; ?>
                                <p class="rap"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><?php echo bao_msubstr($item['title'],0,12,false);?></a></p>                                
                               

                                <div class="sc_cpList_gj">

                                    <span class="left">

                                        <span class="sc_cpList_gjj">

                                            <i>￥</i>

                                            <?php echo ($item["mall_price"]); ?>

                                        </span>

                                        <span class="sc_cpList_yj">

                                            ￥

                                            <del><?php echo ($item["price"]); ?></del>

                                        </span>

                                    </span>

                                    <span class="right">

                                       <div class="num"><a class="jq_addcart" href="<?php echo U('mall/cartadd3',array('goods_id'=>$item['goods_id']));?>"><img src="__TMPL__statics/images/tp_33.png"></a></div>

                                    </span>

                                </div>

                            </div>

                        </li><?php endforeach; endif; ?>

                </ul>

            </div>

        </div>
					<script>

                                var num = '<?php echo ($cartnum); ?>';

                   $(document).ready(function () {
                        $(document).on('click', '.jq_addcart', function (e) {
                            e.preventDefault();
                            $.get($(this).attr('href'), function (data) {
                                if (data.msg) {
                                    num++;
                                    $("#num").html(num);
									layer.msg(data.msg);
                                } else {
                                    layer.msg(data.msg);
                                }
                            }, 'json');
                        });
                    });
                </script>

        <div class="x">

            <?php echo ($page); ?>

        </div>

    </div>

    <div class="right zy_content_r">

        <div class="qg-sp-tab-box">

            <script>

                $(function () {

                    $(".qg-sp-tab span").each(function (e) {

                        $(this).click(function () {

                            $(this).parent().find("span").removeClass("on");

                            $(this).addClass("on");

                            $(".qg-sp-tab-nr .qg-sp-tab-nrList").each(function (i) {

                                if (e == i) {

                                    $(this).parent().find(".qg-sp-tab-nrList").hide();

                                    $(this).show();

                                }

                                else {

                                    $(this).hide();

                                }

                            });

                        });

                        $(".qg-sp-tab span").eq(0).click();

                    });

                });

            </script>

            <div class="qg-sp-tab">

                <span class="on">人气排行</span>

                <span>销售排行</span>

            </div>

            <div class="qg-sp-tab-nr">

                <div class="qg-sp-tab-nrList">

                    <ul>

                        <?php  $cache = cache(array('type'=>'File','expire'=> 3600)); $token = md5("Goods,views desc,end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}',3600,0,6,,"); if(!$items= $cache->get($token)){ $items = D("Goods")->where("end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}'")->order("views desc")->limit("0,6")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><li>

                                <div class="qg-sp-liBox">

                                    <div class="img"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item["photo"]); ?>" /></a><?php if($item['num'] == 0): ?><span class="mallmgl"></span><?php endif; ?></div>

                                    <p class="rap"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><?php echo bao_msubstr($item['title'],0,12,false);?></a></p>

                                    <div class="sc_cpList_gj">

                                        <span class="left">

                                            <span class="sc_cpList_gjj">

                                                <i>￥</i><?php echo round($item['mall_price']/100,2);?>

                                            </span>

                                            <span class="sc_cpList_yj">

                                                ￥<del><?php echo round($item['price']/100,2);?></del>

                                            </span>

                                        </span>

                                        <span class="right">

                                           <div class="num"><a class="jq_addcart" href="<?php echo U('mall/cartadd3',array('goods_id'=>$item['goods_id']));?>"><img src="__TMPL__statics/images/tp_33.png"></a></div>

                                        </span>

                                    </div>

                                </div>

                            </li> <?php endforeach; ?>

                    </ul>

                </div>

                <div class="qg-sp-tab-nrList">

                    <ul>

                        <?php  $cache = cache(array('type'=>'File','expire'=> 3600)); $token = md5("Goods,sold_num desc,end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}',3600,0,6,,"); if(!$items= $cache->get($token)){ $items = D("Goods")->where("end_date >= '{$today}' AND audit=1 AND closed=0 AND city_id = '{$city_id}'")->order("sold_num desc")->limit("0,6")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><li>

                                <div class="qg-sp-liBox">

                                    <div class="img"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item["photo"]); ?>" /></a><?php if($item['num'] == 0): ?><span class="mallmgl"></span><?php endif; ?></div>

                                    <p class="rap"><a target="_blank" href="<?php echo U('mall/detail',array('goods_id'=>$item['goods_id']));?>"><?php echo bao_msubstr($item['title'],0,12,false);?></a></p>

                                    <div class="sc_cpList_gj">

                                        <span class="left">

                                            <span class="sc_cpList_gjj">

                                                <i>￥</i><?php echo round($item['mall_price']/100,2);?>

                                            </span>

                                            <span class="sc_cpList_yj">

                                                ￥<del><?php echo round($item['price']/100,2);?></del>

                                            </span>

                                        </span>

                                        <span class="right">

                                            <div class="num"><a class="jq_addcart" href="<?php echo U('mall/cartadd3',array('goods_id'=>$item['goods_id']));?>"><img src="__TMPL__statics/images/tp_33.png"></a></div>

                                        </span>

                                    </div>

                                </div>

                            </li> <?php endforeach; ?>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>


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