<?php
//dezend by http://www.yunlu99.com/ QQ:270656184
function yesalert($msg, $URL)
{
	echo '<script>';
	echo 'parent.alert("' . $msg . '");';
	echo 'parent.location.href="' . $URL . '"';
	echo '</script>';
	exit();
}

function erroralert($msg)
{
	echo '<script>';
	echo 'parent.alert("' . $msg . '");';
	echo '</script>';
	exit();
}

if (ini_get('magic_quotes_gpc')) {
	function stripslashesRecursive(array $array)
	{
		foreach ($array as $k => $v) {
			if (is_string($v)) {
				$array[$k] = stripslashes($v);
			}
			else if (is_array($v)) {
				$array[$k] = stripslashesrecursive($v);
			}
		}

		return $array;
	}
	$_GET = stripslashesrecursive($_GET);
	$_POST = stripslashesrecursive($_POST);
}

define('ROOT', '../');
header('Content-type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Shanghai');
error_reporting(0);
ini_set('display_errors', '0');
define('NOW_TIME', $_SERVER['REQUEST_TIME']);
define('TODAY', date('Y-m-d', NOW_TIME));

if (file_exists(ROOT . 'attachs/install.lock')) {
	header('Location: ../index.php');
	exit();
}

switch ($_GET['action']) {
case 2:
	$is_through = true;
	$sys = php_uname('s');
	$web_server = (function_exists('apache_get_version') ? apache_get_version() : '');
	$PHP_GD = '';

	if (extension_loaded('gd')) {
		if (function_exists('imagepng')) {
			$PHP_GD .= 'png';
		}

		if (function_exists('imagejpeg')) {
			$PHP_GD .= ' jpg';
		}

		if (function_exists('imagegif')) {
			$PHP_GD .= ' gif';
		}
	}

	$CURL = '';

	if (function_exists('curl_init')) {
		$CURL = 1;
	}

	$test_dir = array(ROOT . 'attachs/', ROOT . 'Baocms/Runtime/', ROOT . 'Baocms/Conf/');
	$tmp_test_dir = array();

	foreach ($test_dir as $k => $v) {
		$is_write = 0;

		if (is_dir($v)) {
			$hd = fopen($v . 'helloword.txt', 'w+');

			if ($hd) {
				$is_write = 1;
				fclose($hd);
				unlink($v . 'helloword.txt');
			}
			else {
				$is_through = false;
			}
		}
		else {
			$is_through = false;
		}

		$tmp_test_dir[$v] = $is_write;
	}

	$test_file = array(ROOT . 'install/data/datas.sql', ROOT . 'install/data/datas2.sql', ROOT . 'install/data/table.sql');
	$tmp_test_file = array();

	foreach ($test_file as $k => $v) {
		$is_write = 1;
		$a = fopen($v, 'r+');

		if ($a === false) {
			$is_write = 0;
			$is_through = false;
		}
		else {
			fclose($a);
		}

		$tmp_test_file[$v] = $is_write;
	}

	$result = array_merge($tmp_test_file, $tmp_test_dir);
	require './template/action2.html';
	break;

case 3:
	require './template/action3.html';
	break;

case 4:
	$_POST['dbhost'] = isset($_POST['dbhost']) ? trim($_POST['dbhost']) : '';
	$_POST['dbport'] = isset($_POST['dbport']) ? trim($_POST['dbport']) : '';
	$_POST['dbuser'] = isset($_POST['dbuser']) ? trim($_POST['dbuser']) : '';
	$_POST['dbpw'] = isset($_POST['dbpw']) ? trim($_POST['dbpw']) : '';
	$_POST['dbname'] = isset($_POST['dbname']) ? trim($_POST['dbname']) : '';
	$_POST['pre'] = isset($_POST['pre']) ? trim($_POST['pre']) : '';
	$_POST['manager'] = isset($_POST['manager']) ? trim($_POST['manager']) : '';
	$_POST['manager_pwd'] = isset($_POST['manager_pwd']) ? trim($_POST['manager_pwd']) : '';
	$_POST['manager_mobile'] = isset($_POST['manager_mobile']) ? trim($_POST['manager_mobile']) : '';

	if (strlen($_POST['dbhost']) == 0) {
		erroralert('请填写 数据库服务器地址');
	}

	if (strlen($_POST['dbuser']) == 0) {
		erroralert('请填写 数据库服务器用户名');
	}

	if (strlen($_POST['dbpw']) == 0) {
		erroralert('请填写 数据库服务器密码');
	}

	if (strlen($_POST['dbname']) == 0) {
		erroralert('请填写 数据库名');
	}

	if ($_POST['pre'] !== '') {
		if (!preg_match('~^[A-Za-z][A-Za-z]*[a-z0-9_]*$~', $_POST['pre'])) {
			erroralert('数据库表前缀 必须以字母开头，只允许字母、数字、下划线');
		}
	}

	if (strlen($_POST['manager_pwd']) == 0) {
		erroralert('请填写管理员密码');
	}

	if (strlen($_POST['manager_pwd']) < 6) {
		erroralert('密码太短');
	}

	if (20 < strlen($_POST['manager_pwd'])) {
		erroralert('密码太长');
	}

	if (!mysql_connect($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpw'])) {
		erroralert('服务器用户名 或 服务器密码 不正确');
	}

	if (!mysql_select_db($_POST['dbname'])) {
		if (!mysql_query('CREATE DATABASE ' . $_POST['dbname'])) {
			erroralert('已连接数据库服务器，但不能创建数据库');
		}

		mysql_select_db($_POST['dbname']);
	}

	mysql_query('set names utf8');
	$_auth = md5(uniqid());
	$str = "<?php\n    return  array(\n    'DB_TYPE'   =>  'mysql',\n    'DB_HOST'   =>  '" . $_POST['dbhost'] . "',\n    'DB_NAME'   =>  '" . $_POST['dbname'] . "',\n    'DB_USER'   =>  '" . $_POST['dbuser'] . "',\n    'DB_PWD'    =>  '" . $_POST['dbpw'] . "',\n    'DB_PORT'   =>   " . $_POST['dbport'] . " ,\n    'DB_CHARSET'=>  'utf8',\n    'DB_PREFIX' =>  '" . $_POST['pre'] . "',\n    'AUTH_KEY'  =>  '" . $_auth . "', //这个KEY只是保证部分表单在没有SESSION 的情况下判断用户本人操作的作用\n    'BAO_KEY'   => '" . $_POST['bao_key'] . "',\n);";
	file_put_contents(ROOT . 'Baocms/Conf/db.php', $str);
	$structure = file_get_contents(ROOT . 'install/data/table.sql');

	if ($_POST['is_data']) {
		$init_database = file_get_contents(ROOT . 'install/data/datas2.sql');
	}
	else {
		$init_database = file_get_contents(ROOT . 'install/data/datas.sql');
	}

	if ($_POST['pre'] != 'bao_') {
		$structure = str_replace('`bao_', '`' . $_POST['pre'], $structure);
		$init_database = str_replace('`bao_', '`' . $_POST['pre'], $init_database);
	}

	$structure = explode(";\n", $structure);
	$rs = array();

	foreach ($structure as $k => $v) {
		$v = trim($v);

		if (empty($v)) {
			continue;
		}

		mysql_query($v);

		if (mysql_error()) {
			erroralert(mysql_error());
		}
	}

	$sql = array();
	$sql[] = 'insert into ' . $_POST['pre'] . 'role (role_id,role_name) values (\'1\', \'系统管理员\')';
	$_POST['manager_pwd'] = md5($_POST['manager_pwd']);
	$sql[] = 'insert into ' . $_POST['pre'] . 'admin(admin_id,username,password,role_id,mobile,create_time,create_ip) values(\'1\',\'' . $_POST['manager'] . '\',\'' . $_POST['manager_pwd'] . '\',\'1\',\'' . $_POST['manager_mobile'] . '\',\'' . time() . '\',\'' . $_SERVER['REMOTE_ADDR'] . '\')';

	foreach ($sql as $v) {
		mysql_query($v);
	}

	$init_database = explode(";\n", $init_database);

	foreach ($init_database as $k => $v) {
		$v = trim($v);

		if (empty($v)) {
			continue;
		}

		mysql_query($v);

		if (mysql_error()) {
			erroralert('操作失败' . mysql_error());
		}
	}

	file_put_contents(ROOT . 'attachs/install.lock', 1);
	yesalert('安装成功', 'index.php?action=5');
	break;

case 5:
	require './template/action5.html';
	break;

default:
	require './template/index.html';
	break;
}

?>
