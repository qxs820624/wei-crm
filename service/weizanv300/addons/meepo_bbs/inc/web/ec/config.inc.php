<?php /*站长吧源码论坛 www.admin8.co*/
global $_W,$_GPC;
$setting = getSet();
if($_W['ispost']){
	if(!empty($_GPC['settingnew'])){
		foreach ($_GPC['settingnew'] as $key=>$s){
			$setting['settingnew'][$key] = $s;
		}
	}
	updateSet($setting);
	message('提交成功',referer(),success);
}