<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Class for user rights
 *
 * PHP version 5
 *
 * LICENCE: This program is free software: you can redistribute it and/or modify
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
 *
 * @category  Authorization
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2009 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

/**
 * class for rights
 *
 * Mostly for holding the rights constants
 *
 * @category Authorization
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 */

class Right
{
    const DELETEOTHERSNOTICE = 'deleteothersnotice';
    const CONFIGURESITE      = 'configuresite';
    const DELETEUSER         = 'deleteuser';
    const SILENCEUSER        = 'silenceuser';
    const SANDBOXUSER        = 'sandboxuser';
    const NEWNOTICE          = 'newnotice';
    const PUBLICNOTICE       = 'publicnotice';
    const NEWMESSAGE         = 'newmessage';
    const SUBSCRIBE          = 'subscribe';
    const EMAILONREPLY       = 'emailonreply';
    const EMAILONSUBSCRIBE   = 'emailonsubscribe';
    const EMAILONFAVE        = 'emailonfave';
    const MAKEGROUPADMIN     = 'makegroupadmin';
    const GRANTROLE          = 'grantrole';
    const REVOKEROLE         = 'revokerole';
    const DELETEGROUP        = 'deletegroup';
    const BACKUPACCOUNT      = 'backupaccount';
    const RESTOREACCOUNT     = 'restoreaccount';
    const DELETEACCOUNT      = 'deleteaccount';
    const MOVEACCOUNT        = 'moveaccount';
    const CREATEGROUP        = 'creategroup';
    const WEBLOGIN           = 'weblogin';
    const API                = 'api';
    const REVIEWSPAM         = 'reviewspam';
    const TRAINSPAM          = 'trainspam';
}

