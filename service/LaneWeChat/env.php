<?php
$log_file = fopen("log.txt", "a+");

fwrite($log_file, "44444\n");

include 'lanewechat.php';

/**
 * 自定义菜单
 */
//设置菜单

fwrite($log_file, "11111\n");


$menuList = array(
    array('id'=>'1', 'pid'=>'0',  'name'=>'神州产品', 'type'=>'click', 'code'=>'key_1'),
    array('id'=>'2', 'pid'=>'0',  'name'=>'需求论坛', 'type'=>'', 'code'=>'key_2'),
    array('id'=>'3', 'pid'=>'1',  'name'=>'神州数码ESB', 'type'=>'view', 'code'=>'http://www.lanecn.com'),
    array('id'=>'4', 'pid'=>'1',  'name'=>'神州数码MAIL', 'type'=>'view', 'code'=>'http://www.lanecn.com'),
    array('id'=>'5', 'pid'=>'1',  'name'=>'其他产品', 'type'=>'view', 'code'=>'http://www.lanecn.com'),
    array('id'=>'6', 'pid'=>'0',  'name'=>'我的', 'type'=>'', 'code'=>'key_6'),
    array('id'=>'7', 'pid'=>'1',  'name'=>'我的帖子', 'type'=>'view', 'code'=>'http://www.lanecn.com'),
    array('id'=>'8', 'pid'=>'1',  'name'=>'我的关注', 'type'=>'view', 'code'=>'http://www.lanecn.com'),
);
\LaneWeChat\Core\Menu::setMenu($menuList);

fwrite($log_file, "22222\n");

echo "menu set ok";

fwrite($log_file, "33333\n");

fclose($log_file);

?>

