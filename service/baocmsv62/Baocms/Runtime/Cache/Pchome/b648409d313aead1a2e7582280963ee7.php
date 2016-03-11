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
<script>
    $(function () {
        $('#selectBoxInput').click(function () {
            $('.selectList').toggle(300);
        });
        $(".selectList li a").click(function () {
            $("#selectBoxInput").html($(this).html());
            $('.selectList').hide();
        });
    });//头部搜索框js
    $(function () {
        $('.sy_flsxAll').click(function () {
            $('.sy_flsxAllList').toggle();
        });
    });
</script>
<div class="nav">
    <div class="navList">
        <!--<div class="navListBg">&nbsp;</div>-->
        <ul>
            <li class="navListAll zy_navListAll"><span class="navListAllt">全部抢购分类<em></em></span>
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
            <li class="navLi"><a class="navA <?php if($ctl == tuan and $act == index): ?>on<?php endif; ?> " href="<?php echo U('tuan/index');?>">首页</a></li>
            <li class="navLi"><a class="navA <?php if($ctl == tuan and $act == nearby): ?>on<?php endif; ?>" href="<?php echo U('tuan/nearby');?>">身边抢购</a></li>
            <li class="navLi"><a class="navA " href="<?php echo U('tuan/index',array('new'=>1));?>">今日新单</a></li>
            <li class="navLi"><a class="navA" href="<?php echo U('tuan/index',array('hot'=>1));?>">热门疯抢</a></li>
        </ul>
    </div>
</div>
<div class="content zy_content">
    <div class="locaTop">
        <div class="left locaTop_l">
            <p class="locaTopP">在地图上<span>选择位置</span>，查看<span>附近抢购</span></p>
            <?php if(empty($MEMBER)): ?><p class="locaTopDl">想查看之前保存位置的附近抢购。请<a href="<?php echo U('passport/login');?>">登录</a></p><?php endif; ?>
        </div>
        <div class="right locaTop_r"><span>微信扫一扫，<br />随时随地查看附近抢购</span>
            <img src="__PUBLIC__/img/wx.png" width="81" height="81" /></div>
    </div>
    <div class="locaNr">
        <div class="left locaNr_l">
            <p class="locaNr_serT">我的位置：</p>
            <form method="post" action="<?php echo U('tuan/position');?>">
                <div id="r-result" class="locaNr_serK">
                    <input type="text" id="suggestId" name="name" class="locaNr_serInt mapinputs" value="请输入完整地址" onblur="if (!value) {
                                value = defaultValue;
                                this.style.color = '#999'
                            }" onclick="if (value == defaultValue) {
                                        value = '';
                                        this.style.color = '#000'
                                    }" />
                    <input type="button" class="locaNr_serAn selectbotton" value="定位" />

                </div>
            </form>
            <div class="locaNr_serNr">
                <!--<p class="locaNr_serJg">共有760条结果</p> -->
                <ul id="locaNr_serUl" class="locaNr_serUl">

                </ul>
            </div>
        </div>
        <div class="left locaNr_r">
            <p class="locaNr_serMapP"><span class="left"><em></em>手机微信扫一扫，随时随地查看附近抢购</span><span class="right">您可以点击地图直接定位</span></p>
            <div class="locaNr_serMap">
                <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=7b92b3afff29988b6d4dbf9a00698ed8"></script>
                <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
                <div id="allmap" style="width: 845px; height:560px;"></div>
                <script type="text/javascript">
                                        // 百度地图API功能
                                        var map = new BMap.Map("allmap");
                                        var addr = null;
                                        var lng = "<?php echo ($city['lng']); ?>";
                                        var lat = "<?php echo ($city['lat']); ?>";
                                        if (!lng && !lat) {
                                            map.centerAndZoom("<?php echo ($city_name); ?>");
                                            var point = new BMap.Point(117.260852, 31.825717);
                                        } else {
                                            map.centerAndZoom(new BMap.Point(lng, lat), 15);
                                            var point = new BMap.Point(lng, lat);
                                        }
                                        map.centerAndZoom(point, 15);
                                        function showPoint(e) {
                                            map.clearOverlays();
                                            map.centerAndZoom(e.point, 16);
                                            var market = new BMap.Marker(e.point);
                                            map.addOverlay(market);

                                            var circle = new BMap.Circle(e.point, 500, {fillColor: "#2fbdaa;", strokeWeight: 1, fillOpacity: 0.3, strokeOpacity: 0.3});
                                            map.addOverlay(circle);
                                            var local = new BMap.LocalSearch(map, {renderOptions: {map: map, autoViewport: false}});

                                            local.searchNearby(e.point, 500);
                                    //mk.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                                    var geoc = new BMap.Geocoder();
                                    geoc.getLocation(p, function (rs) {
                                        var addComp = rs.addressComponents;
                                        addr = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
                                        var opts = {
                                            width: 200, // 信息窗口宽度
                                            height: 80, // 信息窗口高度
                                            enableMessage: false,
                                        }
                                        var infoWindow = new BMap.InfoWindow("<div id='addr' style='height:48px; line-height:24px;'>地址:" + addr + "</div>" + "\r\n<div style='height:24px; line-height:24px; text-align:center; padding:0px 15px; border:1px solid #dedede; width:100px; margin:0px auto;'><a id='search_tuan' href='javascript:void(0);'>查看附近抢购</a></div>", opts);  // 创建信息窗口对象 
                                        map.openInfoWindow(infoWindow, p); //开启信息窗口
                                        setTimeout(function () {
                                            $('#search_tuan').on('click', function () {
                                                var href = window.location.href;
                                                var param = href.split('/location');
                                                SetCookie('addr', escape(addr));
                                                SetCookie('lng', e.point.lng);
                                                SetCookie('lat', e.point.lat);
                                                window.location.href = param[0] + '/nearby.html';
                                            });
                                        }, 100);
                                    });
                                }
                                map.enableScrollWheelZoom(true);
                                map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
                                map.addEventListener("click", showPoint);

                                $(document).on('click', '.jq_li', function () {
                                    var addr = $(this).children('p').html();
                                    var myGeo = new BMap.Geocoder();
                                    // 将地址解析结果显示在地图上,并调整地图视野
                                    myGeo.getPoint(addr, function (point) {
                                        if (point) {
                                            map.clearOverlays();
                                            map.centerAndZoom(point, 16);
                                            var market = new BMap.Marker(point);
                                            map.addOverlay(market);
                                            var opts = {
                                                width: 200, // 信息窗口宽度
                                                height: 80, // 信息窗口高度
                                                enableMessage: false,
                                            }
                                            var infoWindow = new BMap.InfoWindow("<div id='addr' style='height:48px; line-height:24px;'>地址:" + addr + "</div>" + "\r\n<div style='height:24px; line-height:24px; text-align:center; padding:0px 15px; border:1px solid #dedede; width:100px; margin:0px auto;'><a id='search_tuan' href='javascript:void(0);'>查看附近抢购</a></div>", opts);  // 创建信息窗口对象 
                                            map.openInfoWindow(infoWindow, point); //开启信息窗口
                                            setTimeout(function () {
                                                $('#search_tuan').on('click', function () {
                                                    var href = window.location.href;
                                                    var param = href.split('/location');
                                                    SetCookie('addr', escape(addr));
                                                    SetCookie('lng', point.lng);
                                                    SetCookie('lat', point.lat);
                                                    window.location.href = param[0] + '/nearby.html';
                                                });
                                            }, 100);
                                        }
                                    }, "<?php echo ($city["name"]); ?>");

                                });



                                function G(id) {
                                    return document.getElementById(id);
                                }
                                var ac = new BMap.Autocomplete(//建立一个自动完成的对象
                                        {"input": "suggestId"
                                            , "location": map
                                        });

                                ac.addEventListener("onhighlight", function (e) {  //鼠标放在下拉列表上的事件
                                    var str = "";
                                    var _value = e.fromitem.value;
                                    var value = "";
                                    if (e.fromitem.index > -1) {
                                        value = _value.province + _value.city + _value.district + _value.street + _value.business;
                                    }
                                    str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

                                    value = "";
                                    if (e.toitem.index > -1) {
                                        _value = e.toitem.value;
                                        value = _value.province + _value.city + _value.district + _value.street + _value.business;
                                    }
                                    str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
                                    G("searchResultPanel").innerHTML = str;
                                });

                                var myValue;
                                ac.addEventListener("onconfirm", function (e) {    //鼠标点击下拉列表后的事件
                                    var _value = e.item.value;
                                    myValue = _value.province + _value.city + _value.district + _value.street + _value.business;
                                    G("searchResultPanel").innerHTML = "onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

                                    setPlace();
                                });

                                function SetCookie(name, value)//两个参数，一个是cookie的名子，一个是值
                                {
                                    var Days = 3650; //此 cookie 将被保存 10年
                                    var exp = new Date();    //new Date("December 31, 9998");
                                    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
                                    document.cookie = name + "=" + value + ";expires=" + exp.toGMTString();
                                }

                                function setPlace() {
                                    map.clearOverlays();    //清除地图上所有覆盖物


                                    var options = {
                                        onSearchComplete: function (results) {
                                            if (local.getStatus() == BMAP_STATUS_SUCCESS) {
                                                // 判断状态是否正确      
                                                var s = [];
                                                for (var i = 0; i < results.getCurrentNumPois(); i++) {
                                                    s.push("<li class='jq_li'><em></em><a class='locaNr_look' href='javascript:void(0);'>查看附近抢购</a><h3>" + results.getPoi(i).title + "</h3><p class='jq_addr'>地址：" + results.getPoi(i).address + "</p></li>");
                                                }
                                                //var r = ["<p class='locaNr_serJg'>共有" + results.getNumPois() + "条结果</p>"];
                                                //var p = ["<div class='x'>"+results.getPageIndex()+"</div>"];
                                                document.getElementById("locaNr_serUl").innerHTML = s.join("");
                                            }
                                        }
                                    };
                                    var local = new BMap.LocalSearch(map, options);
                                    local.setPageCapacity(6);
                                    local.search(myValue);
                                }

                </script>
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