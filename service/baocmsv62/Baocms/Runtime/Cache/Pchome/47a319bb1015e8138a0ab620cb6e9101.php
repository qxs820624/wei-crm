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
                <li class="navLi"><a <?php if($act == 'index' || $act == 'detail' ): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> href="<?php echo U('pchome/ding/index');?>">首页</a></li>
                <li class="navLi"><a <?php if($act == 'lists'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> href="<?php echo U('pchome/ding/lists');?>">订座</a></li>
                <li class="navLi"><a <?php if($act == 'news'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> href="<?php echo U('pchome/ding/news');?>">今日新单</a></li>
                <li class="navLi"><a <?php if($act == 'hot'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> href="<?php echo U('pchome/ding/hot');?>">热门疯抢</a></li>
                
                <!--<li class="navLi"><a <?php if($ctl == 'index'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="首页" href="<?php echo U('index/index');?>" >首页</a></li>
                <li class="navLi"><a <?php if($ctl == 'tuan'): ?>class="navA  on"<?php else: ?>class="navA"<?php endif; ?> title="身边抢购" href="<?php echo U('tuan/nearby');?>" >身边抢购</a></li>-->
                
            </ul>
        </div>
    </div>
<div class="content">
	<div class="seat-banner">
		<div class="seat-form-box">
			<div class="seat-form1">
			<form action="<?php echo U('ding/lists');?>" method="post">
				<div class="left seat-form1-l"> 
					<script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
					<input class="date" type="text" value="<?php echo ($time); ?>" name="date" value="<?php echo (($date)?($date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd'});"  />
					<select name="time" class="time">
						<?php if(is_array($cfg)): $i = 0; $__LIST__ = $cfg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($item); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="right seat-form1-r">
					<select name='area_id' class="city">
						<?php if(is_array($areas)): $i = 0; $__LIST__ = $areas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["city_id"]) == $city_id): ?><option value="<?php echo ($item["area_id"]); ?>"><?php echo ($item["area_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				</div>
				<div class="seat-form1">
					<div class="left seat-form1-l">
						<select name="number" class="number">
							<?php if(is_array($room)): $i = 0; $__LIST__ = $room;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($item); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<input class="search" name="name" type="text" placeholder="商户名" />
					</div>
					<div class="right seat-form1-r">
						<input class="seat-btn" type="submit" value="立刻订座" />
					</div>
				</div>
			</form>
			<div class="seat-form2"> <span>您还可以选择以下就餐类型：</span>
				<?php if(is_array($keyword)): $i = 0; $__LIST__ = $keyword;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><a href="<?php echo LinkTo('ding/lists',array('keyword'=>$item[key_id]));?>" 
					<?php if($key == 0): ?>class="on"<?php endif; ?>
					><?php echo ($item["keyword"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
	<div class="seat-box">
		<div class="left seat-box-l">
			<div class="seat-box-bt">
				<div class="left">
					<ul>
						<li class="on"><a>热门餐厅推荐</a></li>
					</ul>
				</div>
				<div class="right"><a class="more" href="<?php echo LinkTo('ding/lists');?>">更多&gt;&gt;</a></div>
				<div class="clear"></div>
			</div>
			<div class="seat-room">
				<ul>
					<?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="seat-room-list">
							<div class="seat-room-box">
								<div class="left seat-room-img"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><img width="210px;" height="146px;" src="__ROOT__/attachs/<?php echo ($item['photo']); ?>" /></a>
									<div class="sy_sjcpBq"><span class="sy_sjcpBq3">￥<?php echo round($set[$item['shop_id']]['money']/100,2);?></span></div>
								</div>
								<div class="left seat-room-content">
									<p class="rap title"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><?php echo ($item["shop_name"]); ?></a></p>
									<p><em class="ico-1"></em><?php echo bao_msubstr($item[addr],0,15);?></p>
									<p><em class="ico-2"></em>粉丝数：<span class="c1"><?php echo ($item["fans_num"]); ?></span> </p>
									<p><?php echo ($cate[$item['cate_id']]['d1']); ?>：<?php echo ($item["d1"]); ?>　<?php echo ($cate[$item['cate_id']]['d2']); ?>：<?php echo ($item["d2"]); ?>　<?php echo ($cate[$item['cate_id']]['d3']); ?>：<?php echo ($item["d3"]); ?></p>
									<p> <span class="state <?php if($set[$item['shop_id']]['is_ting'] == 0): ?>on<?php endif; ?>
										">大厅
										<?php if($set[$item['shop_id']]['is_ting'] == 0): ?>（已约满）
											<?php else: ?>
											（有空位）<?php endif; ?>
										</span><span class="state <?php if($set[$item['shop_id']]['is_bao'] == 0): ?>on<?php endif; ?>
										">包厢
										<?php if($set[$item['shop_id']]['is_bao'] == 0): ?>（已约满）
											<?php else: ?>
											（有空位）<?php endif; ?>
										</span></p>
								</div>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<script>
				$(function(){
					$(".seat-box-bt-tab li").each(function(e){
						$(this).click(function(){
							$(this).parent().find("li").removeClass("on");
							$(this).addClass("on");
							$(".seat-order-tab").each(function(i){
								if(e==i){
									$(".seat-order").hide();
									$(this).show();
								}
								else{
									$(this).hide();
								}
							});
						});
					});
					
				});
            </script>
			<div class="seat-box-bt seat-box-bt-tab">
				<div class="left">
					<ul>
						<li class="on"><a href="###">口味超赞</a></li>
						<li><a href="###">精品推荐</a></li>
						<li><a href="###">宴请首选</a></li>
					</ul>
				</div>
				<div class="right"><a class="more" href="#">更多&gt;&gt;</a></div>
				<div class="clear"></div>
			</div>
			<div class="seat-order seat-order-tab">
				<ul>
					<?php if(is_array($kw["shop"])): $i = 0; $__LIST__ = $kw["shop"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["closed"]) == "0"): ?><li class="seat-order-list">
							<div class="seat-order-img"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item['photo']); ?>" width="281" height="187" /></a>
								<div class="sy_sjcpBq"><span class="sy_sjcpBq3">￥<?php echo round($kw['set'][$item['shop_id']]['money']/100,2);?></span></div>
								<p class="rap title"><em></em><?php echo bao_msubstr($item[addr],0,15);?></p>
							</div>
							<div class="seat-order-content">
								<p class="rap title"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><?php echo ($item["shop_name"]); ?></a></p>
								<p class="row"><span><?php echo ($kw['cat'][$item['cate_id']]['d1']); echo ($item["d1"]); ?></span><span><?php echo ($kw['cat'][$item['cate_id']]['d2']); echo ($item["d2"]); ?></span><span><?php echo ($kw['cat'][$item['cate_id']]['d3']); echo ($item["d3"]); ?></span></p>
								<hr style=" border:none 0px; border-bottom: 1px solid #e0e0e0; margin-top:6px;" />
								<p class="sy_hottjJg"><span class="left">浏览数：<?php echo ($item["view"]); ?></span><span class="right"><a class="sy_hottjJd" href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>">立即预订</a></span></p>
							</div>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="seat-order seat-order-tab" style="display:none;">
				<ul>
					<?php if(is_array($hj["shop"])): $i = 0; $__LIST__ = $hj["shop"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["closed"]) == "0"): ?><li class="seat-order-list">
							<div class="seat-order-img"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item['photo']); ?>" width="281" height="187" /></a>
								<div class="sy_sjcpBq"><span class="sy_sjcpBq3">￥<?php echo round($hj['set'][$item['shop_id']]['money']/100,2);?></span></div>
								<p class="rap title"><em></em><?php echo bao_msubstr($item[addr],0,15);?></p>
							</div>
							<div class="seat-order-content">
								<p class="rap title"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><?php echo ($item["shop_name"]); ?></a></p>
								<p class="row"><span><?php echo ($hj['cat'][$item['cate_id']]['d1']); echo ($item["d1"]); ?></span><span><?php echo ($hj['cat'][$item['cate_id']]['d2']); echo ($item["d2"]); ?></span><span><?php echo ($hj['cat'][$item['cate_id']]['d3']); echo ($item["d3"]); ?></span></p>
								<hr style=" border:none 0px; border-bottom: 1px solid #e0e0e0; margin-top:6px;" />
								<p class="sy_hottjJg"><span class="left">浏览数：<?php echo ($item["view"]); ?></span><span class="right"><a class="sy_hottjJd" href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>">立即预订</a></span></p>
							</div>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="seat-order seat-order-tab" style="display:none;">
				<ul>
					<?php if(is_array($fw["shop"])): $i = 0; $__LIST__ = $fw["shop"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["closed"]) == "0"): ?><li class="seat-order-list">
							<div class="seat-order-img"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item['photo']); ?>" width="281" height="187" /></a>
								<div class="sy_sjcpBq"><span class="sy_sjcpBq3">￥<?php echo round($fw['set'][$item['shop_id']]['money']/100,2);?></span></div>
								<p class="rap title"><em></em><?php echo bao_msubstr($item[addr],0,15);?></p>
							</div>
							<div class="seat-order-content">
								<p class="rap title"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><?php echo ($item["shop_name"]); ?></a></p>
								<p class="row"><span><?php echo ($fw['cat'][$item['cate_id']]['d1']); echo ($item["d1"]); ?></span><span><?php echo ($fw['cat'][$item['cate_id']]['d2']); echo ($item["d2"]); ?></span><span><?php echo ($fw['cat'][$item['cate_id']]['d3']); echo ($item["d3"]); ?></span></p>
								<hr style=" border:none 0px; border-bottom: 1px solid #e0e0e0; margin-top:6px;" />
								<p class="sy_hottjJg"><span class="left">浏览数：<?php echo ($item["view"]); ?></span><span class="right"><a class="sy_hottjJd" href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>">立即预订</a></span></p>
							</div>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<div class="left seat-box-r">
			<div class="seat-ad-wx"><img src="__TMPL__statics/img/seat-wx.jpg" width="280" height="330" /></div>
			<div class="seat-ad"> 
				<script type="text/javascript">
                    $(document).ready(function () {
                        $('.seat-ad_flexslider').flexslider({
                            directionNav: true,
                            pauseOnAction: false,
                            /*slideshow: false,*/
                            /*manualControlEvent:"hover",*/
                        });
                        
                    });//首页轮播js
                </script>
				<div class="seat-ad_flexslider">
					<ul class="slides">
                                            <?php  $cache = cache(array('type'=>'File','expire'=> 21600)); $token = md5("Ad, bg_date <= '{$today}' AND  city_id IN ({$city_ids}) AND end_date >= '{$today}' AND closed=0 AND site_id=15,0,3,21600,orderby asc,,"); if(!$items= $cache->get($token)){ $items = D("Ad")->where(" bg_date <= '{$today}' AND  city_id IN ({$city_ids}) AND end_date >= '{$today}' AND closed=0 AND site_id=15")->order("orderby asc")->limit("0,3")->select(); $cache->set($token,$items); } ; $index=0; foreach($items as $item): $index++; ?><li class="sy_hotgzLi"><a target="_blank" href="<?php echo ($item["link_url"]); ?>"><img src="__ROOT__/attachs/<?php echo ($item["photo"]); ?>" width="280" height="87" /></a></li> <?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="seat-rank">
				<div class="title">人气排行榜</div>
				<div class="seat-rank-list">
					<div class="seat-rank_flexslider">
						<ul class="slides">
							<li class="sy_hotgzLi">
								<ul>
									<?php if(is_array($view["shop"])): $i = 0; $__LIST__ = $view["shop"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item['photo']); ?>" width="60" height="40" /> </a>
											<p class="rap"><a href="<?php echo U('ding/detail',array('shop_id'=>$item['shop_id']));?>"><?php echo ($item["shop_name"]); ?></a></p>
											<p><span class="spxq_qgpstarBg"><span class="spxq_qgpstar spxq_qgpstar<?php echo ($item["score"]); ?>"> </span></span></p>
											<div class="clear"></div>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</li>
							<div class="clear"></div>
						</ul>
					</div>
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