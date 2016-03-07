<?php
/**
 * DB error action.
 *
 * PHP version 5
 *
 * @category Action
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl.html AGPLv3
 * @link     http://www.microservice.com
 *
 * MicroService - the distributed open-source microblogging tool
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

if (!defined('MICROSERVICE')) {
    exit(1);
}

require_once INSTALLDIR.'/lib/servererroraction.php';

/**
 * Class for displaying DB Errors
 *
 * This only occurs if there's been a DB_DataObject_Error that's
 * reported through PEAR, so we try to avoid doing anything that connects
 * to the DB, so we don't trigger it again.
 *
 * @category Action
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl.html AGPLv3
 * @link     http://www.microservice.com
 */
class DBErrorAction extends ServerErrorAction
{
    function __construct($message='Error', $code=500)
    {
        parent::__construct($message, $code);
    }

    function title()
    {
        // TRANS: Page title for when a database error occurs.
        return _('Database error');
    }

    function getLanguage()
    {
        // Don't try to figure out user's language; just show the page
        return common_config('site', 'language');
    }

    function showPrimaryNav()
    {
        // don't show primary nav
    }
}