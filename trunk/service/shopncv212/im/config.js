﻿var config = {};//数据库帐号设置

config['host']  	= 'localhost';//数据库地址
config['port']  	= '3306';//数据库端口
config['user']  	= '';//数据库用户名
config['password']  	= '';//数据库密码
config['database']  	= '';//mysql数据库名
config['tablepre']  	= 'shopwwi_';//表前缀
config['insecureAuth']  	= true;//兼容低版本
config['debug']  	= false;//默认false

exports.hostname = '';//授权连接的域名或IP,为空不限制
exports.port = 8090;//服务器所用端口号,默认8090
exports.config = config;
