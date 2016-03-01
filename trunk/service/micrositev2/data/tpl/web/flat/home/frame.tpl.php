<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title><?php  if(empty($_W['setting']['copyright']['sitename'])) { ?>微擎 - 微信公众平台自助引擎 -  Powered by WE7.CC<?php  } else { ?><?php  echo $_W['setting']['copyright']['sitename'];?><?php  } ?></title>
<link rel="stylesheet" href="./resource/flat/css/bootstrap.min.css">
<link rel="stylesheet" href="./resource/flat/css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="./resource/flat/css/style.css">
<link rel="stylesheet" href="./resource/flat/css/themes.css">

<script src="./resource/flat/js/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="./resource/flat/js/jquery-ui/minified/jquery.ui.core.min.js"></script>
<script src="./resource/flat/js/jquery-ui/minified/jquery.ui.widget.min.js"></script>
<script src="./resource/flat/js/jquery-ui/minified/jquery.ui.mouse.min.js"></script>
<script src="./resource/flat/js/jquery-ui/minified/jquery.ui.resizable.min.js"></script>
<script src="./resource/flat/js/jquery-ui/minified/jquery.ui.sortable.min.js"></script>
<!-- Bootstrap -->
<script src="./resource/flat/js/bootstrap.min.js"></script>
<!-- Theme framework -->
<script src="./resource/flat/js/eakroko.js"></script>
<!-- Theme scripts -->
<script src="./resource/flat/js/application.js"></script>
    
</head>

<body>
<div id="navigation">
  <div class="container-fluid"> <a href="#" id="brand">微擎公众平台</a> <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
    <ul class='main-nav'>
      <li class="<?php  if($do == 'profile') { ?>active<?php  } ?>"><a href="./?do=profile"><span>当前公众号</span></a></li>
      <li class="<?php  if($do == 'global') { ?>active<?php  } ?>"><a href="./?do=global"><span>全局设置</span></a></li>
      <li><a data-toggle="dropdown" class='dropdown-toggle' href="#"><span>常用</span><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php  if($_W['isfounder']) { ?>
          <li><a target="mainframe" href="<?php  echo create_url('cloud/upgrade')?>">自动更新</a></li>
          <?php  } ?>
          <li><a target="mainframe" href="test.php">调试工具</a></li>
          <li><a target="mainframe" href="<?php  echo create_url('setting/updatecache')?>">更新缓存</a></li>
        </ul>
      </li>
      <?php  if(IMS_FAMILY == 'v' || $_W['isfounder']) { ?>
      <li> <a href="#" data-toggle="dropdown" class='dropdown-toggle'> <span>微擎论坛</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
          <li><a href="http://bbs.we7.cc/forum-2-1.html" target="_blank">官方动态</a></li>
          <li><a href="http://bbs.we7.cc/forum-51-1.html" target="_blank">悬赏任务</a></li>
          <li><a href="http://bbs.we7.cc/forum-36-1.html" target="_blank">功能模块</a></li>
          <li><a href="http://bbs.we7.cc/forum-46-1.html" target="_blank">风格模版</a></li>
          <li><a href="http://bbs.we7.cc/forum-47-1.html" target="_blank">常用服务（API）</a></li>
          <li><a href="http://bbs.we7.cc/forum-38-1.html" target="_blank">安装使用</a></li>
          <li><a href="http://bbs.we7.cc/forum-39-1.html" target="_blank">BUG反馈</a></li>
          <li><a href="http://bbs.we7.cc/forum-44-1.html" target="_blank">开发者交流</a></li>
          <li><a href="http://bbs.we7.cc/forum-49-1.html" target="_blank">前端交流</a></li>
          <li><a href="http://bbs.we7.cc/forum-41-1.html" target="_blank">运营交流</a></li>
        </ul>
      </li>
      <?php  } ?>
      <li><a href="https://mp.weixin.qq.com/" target="_blank">公众平台</a></li>
      <?php  if($_W['isfounder']) { ?>
      <li><a href="#" data-toggle="dropdown" class='dropdown-toggle'>帮助 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="http://bbs.we7.cc/" target="_blank">微擎论坛</a></li>
          <li><a href="http://www.we7.cc/docs" target="_blank">微擎开发文档</a>
          <li><a href="http://mp.weixin.qq.com/wiki/index.php" target="_blank">微信开发者文档</a>
        </ul>
      </li>
      <?php  } ?>
    </ul>
    <div class="user">
      <ul class="icon-nav">
        <li class='dropdown'> <a href="#" class='dropdown-toggle' data-toggle="dropdown"><span><?php  if($_W['account']) { ?><?php  echo $_W['account']['name'];?><?php  } else { ?>请切换公众号<?php  } ?></span>&nbsp;<span class=" icon-chevron-down"></span></a>
          <ul class="dropdown-menu pull-right">
            <?php  if(is_array($wechats)) { foreach($wechats as $account) { ?>
            <li><a href="<?php  echo create_url('account/switch', array('id' => $account['weid']))?>" onclick="return ajaxopen(this.href, function(s) {switchHandler(s)})"><?php  echo $account['name'];?></a></li>
            <?php  } } ?>
          </ul>
        </li>
        <li class='dropdown colo'> <a href="#" class='dropdown-toggle' data-toggle="dropdown">风格&nbsp;<i class="icon-tint"></i></a>
          <ul class="dropdown-menu pull-right theme-colors">
            <li class="subtitle"> Predefined colors </li>
            <li> <span class='red'></span> <span class='orange'></span> <span class='green'></span> <span class="brown"></span> <span class="blue"></span> <span class='lime'></span> <span class="teal"></span> <span class="purple"></span> <span class="pink"></span> <span class="magenta"></span> <span class="grey"></span> <span class="darkblue"></span> <span class="lightred"></span> <span class="lightgrey"></span> <span class="satblue"></span> <span class="satgreen"></span> </li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php  echo $_W['username'];?>&nbsp;<i class="icon-user"></i></a>
          <ul class="dropdown-menu pull-right">
            <li> <a href="<?php  echo create_url('member/logout')?>">退出</a> </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="container-fluid" id="content">
  <div id="left">
    
    <!----> 
    <?php  if(is_array($mset)) { foreach($mset as $g) { ?>
    <?php  if($g['menus']) { ?> 
    
    <?php  if(is_array($g['menus'])) { foreach($g['menus'] as $menu) { ?>
    <div class="subnav"> <?php  if(is_array($menu['title'])) { ?>
      <div class="subnav-title"> <a href="<?php  echo $menu['title']['1'];?>" target="mainframe" class=''><span><?php  echo $menu['title']['0'];?></span></a> </div>
      <?php  } else { ?>
      <div class="subnav-title"> <a href="" class='toggle-subnav'><i class="icon-angle-down"></i><span><?php  echo $menu['title'];?></span></a> </div>
      <?php  } ?>
      
      <?php  if(!empty($menu['items'])) { ?>
      <ul class="subnav-menu">
        <?php  if(is_array($menu['items'])) { foreach($menu['items'] as $item) { ?>
        <li class="snav-list"><a href="<?php  echo $item['1'];?>" target="mainframe"><?php  echo $item['0'];?><i class="arrow"></i></a></li>
        <?php  } } ?>
      </ul>
      <?php  } else { ?>
      
      <?php  } ?> </div>
    <?php  } } ?>
    <?php  } ?>
    <?php  } } ?> 
    
    <!----> 
    
  </div>
  <div id="main">
    <iframe  scrolling="no" width="100%" frameborder="0" name="mainframe" id="mainframe" src="<?php  echo $iframe;?>"></iframe>
  </div>
</div>
<script>
$(function() {
	var leftheight=$("#left").height();
	
	$("#mainframe").load(function(){         
		var fh=$(this).contents().find("body").height() + 40;
        $(this).height( fh);
		if(fh>leftheight){
			$("#left").height(fh+50);
		}
    });  
	
});

</script>
</body>
</html>
