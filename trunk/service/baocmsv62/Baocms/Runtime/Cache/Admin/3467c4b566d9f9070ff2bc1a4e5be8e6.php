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
        <li class="li1">信鸽</li>
        <li class="li2">APP推送管理</li>
        <li class="li2 li3">单发消息</li>
    </ul>
</div>
<div class="mainScAdd ">
    <div class="tableBox">
        <form  target="baocms_frm" action="<?php echo U('jpush/single');?>" method="post">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr class="jq_type_2">
                    <label>
                        <td class="lfTdBt">
                            选择会员
                        </td>
                        <td class="rgTdBt">
                        <input type="hidden" id="user_id" name="data[uid]" value="">
                        <input type="text" id="nickname" name="nickname" value="" class="text w150 sj">
                        <a mini="select" w="1000" h="600" href="/admin/user/selectapp.html" class="seleSj">选择用户</a>
                       </td>
                    </label>
                </tr>
                <tr class="jq_type_2">
                    <td class="lfTdBt">标题：</td>
                    <td class="rgTdBt">
                        <input  name="data[title]"  class="seleFl  jq_type" type="text" />
                    </td>
                </tr>
                <tr class="jq_type_2">
                    <td class="lfTdBt">链接地址：</td>
                    <td class="rgTdBt"><input type="text" name="data[url]" value="<?php echo (($detail["url"])?($detail["url"]):''); ?>" class="scAddTextName" />
                        <code>可以空置,空置默认打开APP</code>
                    </td>
                </tr>
                 <tr class="jq_type_2">
                    <td class="lfTdBt">
                <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
                <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                缩略图：
                </td>
                <td class="rgTdBt">
                    <div style="width: 300px;height: 100px; float: left;">
                        <input type="hidden" name="data[photo]" value="<?php echo ($detail["photo"]); ?>" id="data_photo" />
                        <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
                    </div>
                    <div style="width: 300px;height: 100px; float: left;">
                        <img id="photo_img" width="80" height="80"  src="__ROOT__/attachs/<?php echo (($detail["photo"])?($detail["photo"]):'default.jpg'); ?>" />
                        <a href="<?php echo U('setting/attachs');?>">缩略图设置</a>
                        建议尺寸<?php echo ($CONFIG["attachs"]["weixin"]["thumb"]); ?>
                    </div>
                    <script>
                        $("#photo_file").uploadify({
                            'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                            'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"weixin"));?>',
                            'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                            'buttonText': '上传缩略图',
                            'fileTypeExts': '*.gif;*.jpg;*.png',
                            'queueSizeLimit': 1,
                            'onUploadSuccess': function (file, data, response) {
                                $("#data_photo").val(data);
                                $("#photo_img").attr('src', '__ROOT__/attachs/' + data).show();
                            }
                        });
                    </script>
                </td>
                </tr>   
    

                <tr>
                    <td class="lfTdBt">详情：</td>
                    <td class="rgTdBt">
                        <textarea type="text/plain" id="data_details" name="data[contents]" style="width:800px;height:360px;"></textarea>
                    </td>
            </table>
            <div class="smtQr"><input type="submit" value="立刻发送" class="smtQrIpt" /></div>
        </form>
    </div>
</div>

</div>
</body>
</html>