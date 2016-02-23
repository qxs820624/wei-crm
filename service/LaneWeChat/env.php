<?php

include 'lanewechat.php';

/**
 * 自定义菜单
 */
//设置菜单

$menuList = array(
    array('id'=>'1', 'pid'=>'0',  'name'=>'神州产品', 'type'=>'click', 'code'=>'key_1'),
    array('id'=>'2', 'pid'=>'0',  'name'=>'需求论坛', 'type'=>'', 'code'=>'key_2'),
    array('id'=>'3', 'pid'=>'2',  'name'=>'神州数码ESB', 'type'=>'view', 'code'=>'http://115.173.207.75/www/web/index.php?r=post/view&class_id=1'),
    array('id'=>'4', 'pid'=>'2',  'name'=>'神州数码MAIL', 'type'=>'view', 'code'=>'http://115.173.207.75/www/web/index.php?r=post/view&class_id=2'),
    array('id'=>'5', 'pid'=>'2',  'name'=>'其他产品', 'type'=>'view', 'code'=>'http://115.173.207.75/www/web/index.php?r=post/view&class_id=3'),
    array('id'=>'6', 'pid'=>'0',  'name'=>'我的', 'type'=>'', 'code'=>'key_6'),
    array('id'=>'7', 'pid'=>'6',  'name'=>'我的帖子', 'type'=>'view', 'code'=>'http://115.173.207.75/www/web/index.php?r=user/post'),
    array('id'=>'8', 'pid'=>'6',  'name'=>'我的关注', 'type'=>'view', 'code'=>'http://115.173.207.75/www/web/index.php?r=user/subscriber'),
);
\LaneWeChat\Core\Menu::setMenu($menuList);

?>

