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
        <li class="li1">手机</li>
        <li class="li2">约会</li>
        <li class="li2 li3">活动列表</li>
    </ul>
</div>
<div class="main-jsgl main-sc">
    <div class="jsglNr">
        <div class="selectNr" style="margin-top: 0px; border-top:none;">
            <div class="left">
                <?php echo BA('hdmobile/create','','添加内容');?>
            </div>
            <div class="right">
                <form class="" method="post"  action="<?php echo U('hdmobile/index');?>"> 
                    <div class="seleHidden" id="seleHidden">
                        <span>活动标题</span>
                        <input type="text"  class="inptText" name="keyword" value="<?php echo ($keyword); ?>"  />
                        <input type="submit" value="  搜索"  class="inptButton" />
                    </div> 
                </form>
            </div>
            <div class="clear"></div>
        </div>
        <form  target="baocms_frm" method="post">
            <div class="tableBox">
                <table bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;"  >
                    <tr>
                        <td class="w50"><input type="checkbox" class="checkAll" rel="huodong_id" /></td>
                        <td class="w50">活动ID</td>
                        <td>活动类型</td>
                        <td class="w300">活动标题</td>
                        <td>活动图片</td>
                        <td>活动地址</td>
                        <td>是否审核</td>
                        <td>参加人数</td>
                        <td>活动时间</td>
                        <td>活动创建IP</td>
                        <td>操作</td>
                    <?php if(is_array($list)): foreach($list as $key=>$var): ?><tr>
                            <td><input class="child_huodong_id" type="checkbox" name="huodong_id[]" value="<?php echo ($var["huodong_id"]); ?>" /></td>
                            <td> <?php echo ($var["huodong_id"]); ?></td>
                            <td><?php if(is_array($getHuoCate)): $index = 0; $__LIST__ = $getHuoCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($index % 2 );++$index; if($huodong[$var['huodong_id']]['cate_id'] == $index): echo ($v); endif; endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                        <td><?php echo ($var["title"]); ?></td>
                        <td><img src="__ROOT__/attachs/<?php echo (($var["photo"])?($var["photo"]):'default.jpg'); ?>" class="w120" style="margin: 10px;" /></td>
                        <td><?php echo ($var["addr"]); ?></td>
                        <td><?php if(($var["audit"]) == "0"): ?>待确认<?php else: ?>已确认<?php endif; ?></td>
                        <td><?php echo ($var["sign_num"]); ?></td>
                        <td><?php echo ($var["time"]); ?></td>
                        <td><?php echo ($var["create_ip"]); ?></td>
                        <td>
                            <?php echo BA('hdmobilesign/index',array("huodong_id"=>$var["huodong_id"]),'查看报名','','remberBtn');?>
                            <?php echo BA('hdmobile/edit',array('huodong_id'=>$var['huodong_id']),'编辑','','remberBtn');?>
                            <?php echo BA('hdmobile/delete',array("huodong_id"=>$var["huodong_id"]),'删除','act','remberBtn');?>
                            <?php if(($var["audit"]) == "0"): echo BA('hdmobile/audit',array("huodong_id"=>$var["huodong_id"]),'审核','act','remberBtn'); endif; ?>
                        </td>
                        </tr><?php endforeach; endif; ?>
                </table>
                <?php echo ($page); ?>
            </div>
            <div class="selectNr" style="margin-bottom: 0px; border-bottom: none;">
                <div class="left">
                    <?php echo BA('hdmobile/delete','','批量删除','list','a2');?>
                    <?php echo BA('hdmobile/audit','','批量审核','list','remberBtn');?>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
</body>
</html>