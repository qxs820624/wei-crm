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
        <li class="li1">APP</li>
        <li class="li2">APP管理</li>
        <li class="li2 li3">APP更新管理</li>
    </ul>
</div>
<div class="main-cate">
    <p class="attention"><span>注意：</span>这里配置是APP更新相关的信息</p>
</div>       
<div class="mainScAdd">
    <div class="tableBox">
        <form  target="baocms_frm" action="<?php echo U('setting/updateapp');?>" method="post">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr>
                    <td class="lfTdBt" >APP版本号：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[version]" value="<?php echo ($CONFIG["updateapp"]["version"]); ?>" class="scAddTextName " />
                        <code>本项为APP更新比对重要依据，请仔细填写</code>
                    </td>
                </tr>
                <tr>
                    <td  class="lfTdBt" >APP名称：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[name]" value="<?php echo ($CONFIG["updateapp"]["name"]); ?>" class="scAddTextName " />
                    </td>
                </tr>
                <tr>
                    <td  class="lfTdBt" >上传APP：</td>
                    <td class="rgTdBt">
                        <span >
                            <?php echo ($CONFIG["site"]["host"]); ?>/updateapp/app.apk
                        </span>                        <code>请通过FTP上传安卓版本到该路径，IOS版本请直接填入下方链接</code>
                    </td>
                </tr>  
                <tr>
                    <td class="lfTdBt">IOS版本地址：</td>
                    <td class="rgTdBt">
                        <input type="text" name="data[url]" value="<?php echo ($CONFIG["updateapp"]["url"]); ?>" class="scAddTextName " />
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">详情：</td>
                    <td class="rgTdBt">
                        <script type="text/plain" id="data_details" name="data[info]" style="width:800px;height:360px;"></script>
                    </td>
                </tr>
                <link rel="stylesheet" href="__PUBLIC__/umeditor/themes/default/css/umeditor.min.css" type="text/css">
                <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.config.js"></script>
                <script type="text/javascript" charset="utf-8" src="__PUBLIC__/umeditor/umeditor.min.js"></script>
                <script type="text/javascript" src="__PUBLIC__/umeditor/lang/zh-cn/zh-cn.js"></script>
                <script>
                        um = UM.getEditor('data_details', {
                            imageUrl: "<?php echo U('app/upload/editor');?>",
                            imagePath: '__ROOT__/attachs/editor/',
                            lang: 'zh-cn',
                            langPath: UMEDITOR_CONFIG.UMEDITOR_HOME_URL + "lang/",
                            focus: false
                        });
                </script>  
            </table>
            <div class="smtQr"><input type="submit" value="确认添加" class="smtQrIpt" /></div>
        </form>
    </div>
</div>

</div>
</body>
</html>