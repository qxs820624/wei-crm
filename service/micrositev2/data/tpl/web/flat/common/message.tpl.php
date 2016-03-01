<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title>微擎 - 微信公众平台自助引擎</title>
<link rel="stylesheet" href="./resource/flat/css/bootstrap.min.css">
<link rel="stylesheet" href="./resource/flat/css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="./resource/flat/css/style.css">
<link rel="stylesheet" href="./resource/flat/css/themes.css">
<script src="./resource/flat/js/jquery.min.js"></script>
<script src="./resource/flat/js/bootstrap.min.js"></script>
<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
</head>

<body class='error'>
<div class="wrapper">
  <div class="icon" style="font-size:36px; color:#FFF"><i class="<?php  if($type=='success') { ?>icon-ok<?php  } else if($type=='error') { ?>icon-remove<?php  } else if($type=='tips') { ?>icon-exclamation-sign<?php  } else if($type=='sql') { ?>icon-warning-sign<?php  } ?>"></i></div>
  <div class="desc"> <?php  if($type == 'sql') { ?>
    <h4>MYSQL 错误：</h4>
    <p><?php  echo cutstr($msg['sql'], 300, 1);?></p>
    <p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?>：</b><?php  echo $msg['error']['2'];?></p>
    <?php  } else { ?>
    <?php  echo $msg;?>
    
    <?php  } ?> </div>
  <?php  if($redirect) { ?>
  <div class="buttons"><a href="<?php  echo $redirect;?>" class="btn"><i class="icon-arrow-left"></i>没有自动跳转，请点击!</a></div>
  <script type="text/javascript">
			setTimeout(function () {
				location.href = "<?php  echo $redirect;?>";
			}, 3000);
		</script> 
  <?php  } else { ?>
  <p><a href="javascript:history.go(-1);" class="btn"><i class="icon-arrow-left"></i>点击这里返回上一页</a></p>
  <p><a href="./index.php?act=welcome" class="btn"><i class="icon-arrow-left"></i>首页</a></p>
  <?php  } ?> </div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38620714-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
