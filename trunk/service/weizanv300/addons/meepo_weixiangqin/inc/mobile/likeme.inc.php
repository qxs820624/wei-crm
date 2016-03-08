<?php
global $_GPC, $_W;
$weid      = $_W['weid'];
$openid    = $_W['openid'];
$page      = intval($_GPC['truepage']);
$pindex    = max(1, intval($_GPC['truepage']));
$psize     = 5;
$condition = '';
$tablename = tablename("meepo_hongnianglikes");
$myloves   = pdo_fetchall("SELECT * FROM " . $tablename . " WHERE  weid = :weid  AND toopenid=:toopenid {$condition} ORDER BY createtime DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, array(
    ':weid' => $weid,
    ':toopenid' => $openid
));
if (!empty($myloves)) {
    foreach ($myloves as $row) {
        $stores[] = $this->getusers($weid, $row['openid']);
    }
} else {
    echo json_encode(0);
    exit;
}
$julires = $this->getusers($weid, $openid);
if (!empty($stores)) {
    foreach ($stores as $row) {
        if (!empty($row['lat']) && !empty($row['lng'])) {
            if (!empty($julires['lat']) && !empty($julires['lng'])) {
                $juli[$row['id']] = "���: " . $this->getDistance($julires['lat'], $julires['lng'], $row['lat'], $row['lng']) . "km";
            } else {
                $juli[$row['id']] = "";
            }
        } else {
            $juli[$row['id']] = "";
        }
    }
}
$result_str = '';
foreach ($stores as $row) {
    $onclick2 = "'" . $row['from_user'] . "'";
    $result_str .= '<li class="indexItem"><span  class="linka" onclick="checkself(' . $onclick2 . ')">';
    if (preg_match('/http:(.*)/', $row['avatar'])) {
        $result_str .= '<img src="' . $row['avatar'] . '" alt="�û�ͷ��">';
    } elseif (preg_match('/images(.*)/', $row['avatar'])) {
        $result_str .= '<img src="' . $_W['attachurl'] . $row['avatar'] . '" alt="�û�ͷ��">';
    } else {
        $result_str .= '<img src="../addons/meepo_weixiangqin/template/mobile/tpl/static/friend/images/cdhn80.jpg" alt="�û�ͷ��">';
    }
    $result_str .= '<div class="itemc"><p class="hcolor" style="font-size:13px;">' . cutstr($row['realname'], 5, true);
    if ($row['gender'] == '1') {
        $result_str .= "&nbsp;&nbsp;��";
    } elseif ($row['gender'] == '2') {
        $result_str .= "&nbsp;&nbsp;Ů";
    } else {
        $result_str .= "&nbsp;&nbsp;����";
    }
    $onclick = "'" . $row['id'] . "','" . $row['from_user'] . "'";
    $result_str .= '<font id="shopspostion" style="color:red;font-size:12px;">&nbsp;&nbsp;' . $juli[$row['id']] . '</font></p>
          <p class="lcolor" style="font-size:13px;">΢��:' . cutstr($row['nickname'], 5, true) . '&nbsp;&nbsp;' . $row['resideprovincecity'] . '</p>
		  
        </div>
        <i class="arr"></i>
         </span>    
    	<div class="likebox">
    		<div class="likeit  fleft "><span class="hitlike" onclick="hitlikeone(' . $onclick . ');" id="' . $row['from_user'] . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['love'] . '</span></div>
    		<div class="likeit letterit fright"><a class="hitmail"  href="' . $this->createMobileUrl('hitmail', array(
        'toname' => $row['nickname'],
        'toopenid' => $row['from_user']
    )) . '" target="__blank" style="color:#fff">��һ��</a></div></div>
      
      </li><li class="dottedLine"></li>';
}
if ($result_str == '' || empty($stores) || empty($myloves)) {
    echo json_encode(0);
} else {
    echo json_encode($result_str);
}