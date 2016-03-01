<?php

if(pdo_fieldexists('we7car_care', 'from_user')) {
	pdo_query("ALTER TABLE ".tablename('we7car_care')." CHANGE `from_user` `from_user` INT(10) UNSIGNED NOT NULL;");
}
if(pdo_fieldexists('we7car_order_list', 'from_user')) {
	pdo_query("ALTER TABLE ".tablename('we7car_order_list')." CHANGE `from_user` `from_user` INT(10) UNSIGNED NOT NULL;");
}
if(!pdo_fieldexists('we7car_care', 'car_mobile')) {
	pdo_query("ALTER TABLE ".tablename('we7car_order_list')." ADD `car_mobile` varchar(15) NOT NULL;");
}
if(!pdo_fieldexists('we7car_set', 'typethumb')) {
	pdo_query("ALTER TABLE ".tablename('we7car_set')." ADD `typethumb` varchar(70) NOT NULL;");
	pdo_query("ALTER TABLE ".tablename('we7car_set')." ADD `yuyue1thumb` varchar(70) NOT NULL;");
	pdo_query("ALTER TABLE ".tablename('we7car_set')." ADD `yuyue2thumb` varchar(70) NOT NULL;");
	pdo_query("ALTER TABLE ".tablename('we7car_set')." ADD `kefuthumb` varchar(70) NOT NULL;");
	pdo_query("ALTER TABLE ".tablename('we7car_set')." ADD `messagethumb` varchar(70) NOT NULL;");
	pdo_query("ALTER TABLE ".tablename('we7car_set')." ADD `carethumb` varchar(70) NOT NULL;");
}
