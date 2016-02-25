#!/usr/bin/env php
<?php
/*
 * MicroService - a distributed open-source microblogging tool
 * Copyright (C) 2008, 2009, MicroService, Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define('INSTALLDIR', realpath(dirname(__FILE__) . '/..'));

$helptext = <<<END_OF_SHOWTABLE_HELP
showtable.php <tablename>
Shows the structure of a table

END_OF_SHOWTABLE_HELP;

require_once INSTALLDIR.'/scripts/commandline.inc';

if (count($args) != 1) {
    show_help();
}

$name = $args[0];

$schema = Schema::get();

$td = $schema->getTableDef($name);

print_r($td);
