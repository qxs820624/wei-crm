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
        <li class="li2">基本设置</li>
        <li class="li2 li3">站点设置</li>
    </ul>
</div>
<p class="attention"><span>注意：</span>这个设置和全局有关系</p>
<form  target="baocms_frm" action="<?php echo U('setting/site');?>" method="post">
    <div class="mainScAdd">
        <div class="tableBox">
            <table  bordercolor="#dbdbdb" cellspacing="0" width="100%" border="1px"  style=" border-collapse: collapse; margin:0px; vertical-align:middle; background-color:#FFF;" >
                <tr>
                    <td class="lfTdBt">站点名称：</td>
                    <td class="rgTdBt"><input type="text" name="data[sitename]" value="<?php echo ($CONFIG["site"]["sitename"]); ?>" class="scAddTextName " />
                        <code>注意这个不是网站的Title，一般建议是网站的品牌名</code>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">站点网址：</td>
                    <td class="rgTdBt"><input type="text" name="data[host]" value="<?php echo ($CONFIG["site"]["host"]); ?>" class="scAddTextName " />
                        <code>例如：http://www.baocms.cn 如果你在二级目录下面就需要带上二级目录</code></td>
                </tr>
                <tr>
                    <td class="lfTdBt">图片域名：</td>
                    <td class="rgTdBt"><input type="text" name="data[imgurl]" value="<?php echo ($CONFIG["site"]["imgurl"]); ?>" class="scAddTextName " />
                        <code>例如：http://www.baocms.cn 一般情况下是和站点网址一样，如果做了CDN加速一般就可能是其他的域名</code></td>
                </tr>
                <tr>
                    <td class="lfTdBt">android下载地址：</td>
                    <td class="rgTdBt"><input type="text" name="data[android]" value="<?php echo ($CONFIG["site"]["android"]); ?>" class="scAddTextName " />
                        <code>android下载地址</code></td>
                </tr>
                <tr>
                    <td class="lfTdBt">IOS下载地址：</td>
                    <td class="rgTdBt"><input type="text" name="data[ios]" value="<?php echo ($CONFIG["site"]["ios"]); ?>" class="scAddTextName " />
                        <code>IOS下载地址</code></td>
                </tr>
         
                <tr>
                    <td class="lfTdBt">LOGO：</td>
                    <td class="rgTdBt"><div style="width: 300px; height: 100px; float: left;">
                            <input type="hidden" name="data[logo]" value="<?php echo ($CONFIG["site"]["logo"]); ?>" id="data_photo" />
                            <input id="photo_file" name="photo_file" type="file" multiple="true" value="" />
                        </div>
                        <div style="width: 300px; height: 100px; float: left;">
                            <img id="photo_img" width="200" height="80"  src="__ROOT__/attachs/<?php echo (($CONFIG["site"]["logo"])?($CONFIG["site"]["logo"]):'default.jpg'); ?>" />
                        </div>
                        <script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js?t=<?php echo ($nowtime); ?>"></script>

                        <link rel="stylesheet" href="__PUBLIC__/js/uploadify/uploadify.css">
                        <script>
                            $("#photo_file").uploadify({
                                'swf': '__PUBLIC__/js/uploadify/uploadify.swf?t=<?php echo ($nowtime); ?>',
                                'uploader': '<?php echo U("app/upload/uploadify",array("model"=>"setting"));?>',
                                'cancelImg': '__PUBLIC__/js/uploadify/uploadify-cancel.png',
                                'buttonText': '上传网站LOGO',
                                'fileTypeExts': '*.gif;*.jpg;*.png',
                                'queueSizeLimit': 1,
                                'onUploadSuccess': function (file, data, response) {
                                    $("#data_photo").val(data);
                                    $("#photo_img").attr('src', '__ROOT__/attachs/' + data).show();
                                }
                            });

                        </script></td>
                </tr>
                <tr>
                    <td class="lfTdBt">客服QQ：</td>
                    <td class="rgTdBt"><input type="text" name="data[qq]" value="<?php echo ($CONFIG["site"]["qq"]); ?>" class="scAddTextName " /></td>
                </tr>
                <tr>
                    <td class="lfTdBt">电话：</td>
                    <td class="rgTdBt"><input type="text" name="data[tel]" value="<?php echo ($CONFIG["site"]["tel"]); ?>" class="scAddTextName " /></td>
                </tr>
                <tr>
                    <td class="lfTdBt">邮件：</td>
                    <td class="rgTdBt"><input type="text" name="data[email]" value="<?php echo ($CONFIG["site"]["email"]); ?>" class="scAddTextName " /></td>
                </tr>
                <tr>
                    <td class="lfTdBt">整合UCENTER：</td>
                    <td class="rgTdBt">
                        <label><input type="radio" name="data[ucenter]" <?php if(($CONFIG["site"]["ucenter"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
                        <label><input type="radio" name="data[ucenter]"  <?php if(($CONFIG["site"]["ucenter"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />不开启</label>
                        <code>开启这个需要先在UCENTER接口配置先配置好！</code>
                    </td>
                </tr>
            
                   <tr>
                    <td class="lfTdBt">微信自动绑定账号：</td>
                    <td class="rgTdBt">
                        <label><input type="radio" name="data[weixin]" <?php if(($CONFIG["site"]["weixin"]) == "1"): ?>checked="checked"<?php endif; ?> value="1"  />开启</label>
                        <label><input type="radio" name="data[weixin]"  <?php if(($CONFIG["site"]["weixin"]) == "0"): ?>checked="checked"<?php endif; ?>  value="0"  />不开启</label>
                        <code>开启后微信端会自动跳转到绑定账号，如果已经绑定账号将自动登录！</code>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt">ICP备案：</td>
                    <td class="rgTdBt"><input type="text" name="data[icp]" value="<?php echo ($CONFIG["site"]["icp"]); ?>" class="scAddTextName " /></td>
                </tr>
                <tr>
                    <td class="lfTdBt">站点标题：</td>
                    <td class="rgTdBt"><input type="text" name="data[title]" value="<?php echo ($CONFIG["site"]["title"]); ?>" class="scAddTextName " /></td>
                </tr>
                <tr>
                    <td class="lfTdBt">站点关键字：</td>
                    <td class="rgTdBt"><textarea name="data[keyword]" cols="50" rows="5"><?php echo ($CONFIG["site"]["keyword"]); ?></textarea></td>
                </tr>
                <tr>
                    <td class="lfTdBt">网站头部信息：</td>
                    <td class="rgTdBt"><input type="text" name="data[headinfo]" value='<?php echo ($CONFIG["site"]["headinfo"]); ?>' class="scAddTextName " /></td>
                </tr>
                <tr>
                    <td class="lfTdBt">站点描述：</td>
                    <td class="rgTdBt"><textarea name="data[description]" cols="50" rows="5"><?php echo ($CONFIG["site"]["description"]); ?></textarea></td>
                </tr>
                <tr>
                    <td class="lfTdBt">统计代码：</td>
                    <td class="rgTdBt"><textarea name="data[tongji]" cols="50" rows="5"><?php echo ($CONFIG["site"]["tongji"]); ?></textarea></td>
                </tr>
                
                <tr>
                    <td class="lfTdBt">默认城市：</td>
                    <td class="rgTdBt">
                        <select name="data[city_id]" class="selectOption">
                            <?php  foreach($citys as $val){?>
                            <option <?php if($val['city_id'] == $CONFIG['site']['city_id']) echo 'selected="selected"' ;?> value="<?php echo ($val["city_id"]); ?>"><?php echo ($val["name"]); ?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="lfTdBt" style="padding-right: 0px;">城市中心地图坐标：</td>
                    <td class="rgTdBt">
                        经度  <input type="text" name="data[lng]" value="<?php echo ($CONFIG["site"]["lng"]); ?>" class="scAddTextName " />
                        纬度 <input type="text" name="data[lat]" value="<?php echo ($CONFIG["site"]["lat"]); ?>" class="scAddTextName " /></td>
                </tr>
     
            </table>
        </div>
        <div class="smtQr"><input type="submit" value="确认保存" class="smtQrIpt" /></div>
    </div>
</form>

</div>
</body>
</html>