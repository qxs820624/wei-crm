<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo ($CONFIG["site"]["title"]); ?>管理后台</title>
        <meta name="description" content="<?php echo ($CONFIG["site"]["title"]); ?>管理后台" />
        <meta name="keywords" content="<?php echo ($CONFIG["site"]["title"]); ?>管理后台" />
        <!-- <link href="__TMPL__statics/css/index.css" rel="stylesheet" type="text/css" /> -->
        <link href="__TMPL__statics/css/style.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/land.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/pub.css" rel="stylesheet" type="text/css" />
        <link href="__TMPL__statics/css/main.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/js/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script> var BAO_PUBLIC = '__PUBLIC__'; var BAO_ROOT = '__ROOT__'; </script>
        <script src="__PUBLIC__/js/jquery.js"></script>
        <script src="__PUBLIC__/js/jquery-ui.min.js"></script>
        <script src="__PUBLIC__/js/my97/WdatePicker.js"></script>
        <script src="__PUBLIC__/js/admin.js?v=20150409"></script>
    </head>
    <body>
         <iframe id="baocms_frm" name="baocms_frm" style="display:none;"></iframe>
   <div class="main">
<div class="mainBt">
    <ul>
        <li class="li1">设置</li>
        <li class="li2">支付设置</li>
        <li class="li2 li3">缴费订单</li>
    </ul>
</div>
<div class="main-jsgl main-sc">
    <p class="attention"><span>注意：</span>人工处理缴费订单后在此处理订单状态</p>
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">
            <div class="right">
                <form action="<?php echo U('bill/billorder');?>" method="post" >
                    <div class="seleHidden" id="seleHidden">
                        <span> 缴费类型</span>
                        <select name="bill_type_id" class="selecttop w100">
                            <option value="0">全部</option>
                            <?php if(is_array($billtypes)): foreach($billtypes as $key=>$v): ?><option value="<?php echo ($v["bill_type_id"]); ?>" <?php if(($v["bill_type_id"]) == $bill_type_id): ?>selected="selected"<?php endif; ?> ><?php echo ($v["bill_type_name"]); ?></option><?php endforeach; endif; ?>
                        </select>

                        <span>状态</span>
                        <select name="status" class="selecttop w100">
                            <option value="-1">全部</option>
                            <option <?php if(($status) == ""): ?>selected="selected"<?php endif; ?> value="0">待处理</option>
                            <option <?php if(($status) == "1"): ?>selected="selected"<?php endif; ?> value="1">已成功</option>
                            <option <?php if(($status) == "2"): ?>selected="selected"<?php endif; ?> value="2">已退款</option>
                        </select>
                        <span>关键词</span>
                        <input type="text"  class="inptText" name="keyword" value="<?php echo ($keyword); ?>"  /><input type="submit" value="   搜索"  class="inptButton" />
                    </div> 
                    <a style="display: inline-block;" href="#" class="searchG">高级搜索</a>
                </form>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <form>
            <form action="<?php echo U('bill/billorder');?>"  method="post" >
                <div class="selectNr selectNr2">
                    <div class="left">
                        <div class="seleK">
                            <label>
                                <span>开始时间</span>
                                <input type="text"    name="bg_date" value="<?php echo (($bg_date)?($bg_date):''); ?>"  onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"  class="text w150" />
                                <span>结束时间</span>
                                <input type="text" name="end_date" value="<?php echo (($end_date)?($end_date):''); ?>" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'});"  class="text w150" />
                            </label>
                            <label>
                                <span>用户</span>
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo (($user_id)?($user_id):''); ?>" />
                                <input type="text" name="nickname" id="nickname"  value="<?php echo ($nickname); ?>"   class="text" />
                                <a  href="<?php echo U('user/select');?>" w="800" h="600" mini="select" class="sumit">选择用户</a>
                            </label>
                            <label>
                                <span class="spanOne">关键词</span>
                                <input type="text"  class="inptText w120" name="keyword" value="<?php echo ($keyword); ?>"  />
                            </label>
                        </div>
                    </div>
                    <div class="right">
                        <input type="submit" value="   搜索"  class="inptButton" />
                    </div>
            </form>
            <div class="clear"></div>
    </div>
    <form  target="baocms_frm" method="post">         
        <div class="tableBox">
            <table bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;"  >
                <tr>
                    <td class="w50">ID</td>
                    <td>类型</td>
                    <td>用户</td>
                    <td>城市</td>
                    <td>区域</td>
                    <td>手机</td>
                    <td>户名</td>
                    <td>编号</td>
                    <td>备注</td>
                    <td>金额</td>
                    <td>使用余额</td>
                    <td>使用利息</td>
                    <td>创建时间</td>
                    <td>创建IP</td>
                    <td>状态</td>
                    <td>处理时间</td>
                    <td>处理说明</td>
                    <td>操作</td>
                </tr>
                <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                        <td><?php echo ($var["bill_order_id"]); ?></td>
                        <td><?php echo ($billtypes[$var['bill_type_id']]['bill_type_name']); ?></td>
                        <td><?php echo ($users[$var['user_id']]['account']); ?>(UID:<?php echo ($var["user_id"]); ?>)</td>
                        <td><?php echo ($citys[$var['city_id']]['name']); ?></td>
                        <td><?php echo ($areas[$var['area_id']]['area_name']); ?></td>
                        <td><?php echo ($var["mobile"]); ?></td>
                        <td><?php echo ($var["realname"]); ?></td>
                        <td><?php echo ($var["account"]); ?></td>
                        <td><?php echo ($var["memo"]); ?></td>
                        <td><?php echo ($var['sum']/100); ?></td>
                        <td><?php echo ($var['money']/100); ?></td>
                        <td><?php echo ($var['interest']/100); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$var["create_time"])); ?></td>
                        <td><?php echo ($var["create_ip"]); ?></td>
                        <td><?php if(($var["status"]) == "0"): ?>待处理<?php else: if(($var["status"]) == "1"): ?>已成功<?php else: ?>已退款<?php endif; endif; ?></td>
                        <td><?php if($var['admin_time']): echo (date('Y-m-d H:i:s',$var["admin_time"])); endif; ?></td>
                        <td><?php echo ($var["admin_memo"]); ?></td>
                        <td>
                            <?php if($var['status'] == 0): ?><a class="remberBtn confirm"  href="javascript:void(0);" rel="<?php echo ($var["bill_order_id"]); ?>">确认</a>
                            <a class="remberBtn refund"  href="javascript:void(0);" rel="<?php echo ($var["bill_order_id"]); ?>">退款</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <?php echo ($page); ?>
        </div>
        <div class="selectNr" style="margin-bottom: 0px; border-bottom: none;">
            <div class="left">
            </div>
        </div>
        <script src="__PUBLIC__/js/layer/layer.js?v=20150718"></script>
        <script>
            $(document).ready(function () {
                layer.config({
                    extend: 'extend/layer.ext.js'
                });
                $(".confirm").click(function () {
                    var id = $(this).attr('rel');
                    var url = "<?php echo U('bill/process');?>";

                    layer.prompt({formType: 2, value: '', title: '请输入处理说明，并确认'}, function (value) {
                        //alert(value); //得到value
                        if (value != "" && value != null) {
                            $.post(url, {id: id, status: 1,value:value}, function (data) {
                                if(data.status == 'success'){
                                    layer.msg(data.msg, {icon: 1});
                                    setTimeout(function(){
                                        window.location.reload(true);
                                    },1000)
                                }else{
                                    layer.msg(data.msg, {icon: 2});
                                }
                            }, 'json')
                        } else {
                            layer.msg('请填写处理说明', {icon: 2});
                        }
                    });
                });

                $(".refund").click(function () {
                    var id = $(this).attr('rel');
                    var url = "<?php echo U('bill/process');?>";

                    layer.prompt({formType: 2, value: '', title: '请输入退款说明，并确认'}, function (value) {
                        //alert(value); //得到value
                        if (value != "" && value != null) {
                            $.post(url, {id: id, status: 2,value:value}, function (data) {
                                if(data.status == 'success'){
                                    layer.msg(data.msg, {icon: 1});
                                    setTimeout(function(){
                                        window.location.reload(true);
                                    },1000)
                                }else{
                                    layer.msg(data.msg, {icon: 2});
                                }
                            }, 'json')
                        } else {
                            layer.msg('请填写退款说明', {icon: 2});
                        }
                    });
                })
            })
        </script>
    </form>
</div>
</div>

</div>
</body>
</html>