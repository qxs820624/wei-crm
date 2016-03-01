<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title>微擎 - 微信公众平台自助引擎</title>
<link rel="stylesheet" href="./resource/flat/css/bootstrap.min.css">
<link rel="stylesheet" href="./resource/flat/css/style.css">
<link rel="stylesheet" href="./resource/flat/css/themes.css">
<script src="./resource/flat/js/jquery.min.js"></script>
<script src="./resource/flat/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./resource/script/common.js?v=<?php echo TIMESTAMP;?>"></script>
<script type="text/javascript">
cookie.prefix = '<?php  echo $_W['config']['cookie']['pre'];?>';
</script>
<script>
function formcheck() {
	if($('#remember:checked').length == 1) {
		cookie.set('remember-username', $(':text[name="username"]').val());
	} else {
		cookie.del('remember-username');
	}
	return true;
}
</script>
</head>

<body class='login'>
<div class="wrapper">
  <h1><a href="index.html">微擎</a></h1>
  <div class="login-body">
    <h2>用户登录</h2>
    <form action="" method="post" target="_top" onsubmit="return formcheck();">
      <div class="control-group">
        <div class="email controls">
          <input type="text"  autocomplete="off" name="username" placeholder="用户名" class='input-block-level' >
        </div>
      </div>
      <div class="control-group">
        <div class="pw controls">
          <input type="password"  autocomplete="off" name="password" placeholder="密码" class='input-block-level' >
        </div>
      </div>
      <div class="submit">
        <div class="remember">
          <label for="remember">
            <input type="checkbox" value="1" id="remember" checked>
            记住账号</label>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="登录"/>
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
      </div>
    </form>
    <div class="forget"><a href="<?php  echo create_url('member/register');?>"><span>注册一个新用户?</span></a></div>
  </div>
</div>
</body>
</html>
