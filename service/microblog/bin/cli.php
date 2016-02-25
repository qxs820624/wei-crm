<?php
/*
 * Created on May 4, 2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

define('MICROSERVICE', true);
define('BIN', dirname(__FILE__));
define('INSTALLDIR', BIN . '/../');
define('EXTLIBDIR', INSTALLDIR . '/extlib/');
define('FUNCTIONTESTDIR', INSTALLDIR . '/tests/FunctionTest');

$s = get_include_path();
set_include_path($s . PATH_SEPARATOR . EXTLIBDIR . PATH_SEPARATOR . FUNCTIONTESTDIR);

try
{
	require_once 'FunctionTest.php';
	$ft = new FunctionTest();
	$ft->run();
}
catch(Exception $e)
{
	exit;
}

