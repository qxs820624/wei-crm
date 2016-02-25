<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Offline backup
 * 
 * PHP version 5
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
 *
 * @category  Backup
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    // This check helps protect against security problems;
    // your code file can't be executed directly from the web.
    exit(1);
}

/**
 * Offline backup
 *
 * Instead of a big 
 *
 * @category  General
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class OfflineBackupPlugin extends Plugin
{
    function onAutoload($cls)
    {
        $dir = dirname(__FILE__);

        switch ($cls)
        {
        case 'OfflinebackupAction':
            include_once $dir . '/' . strtolower(mb_substr($cls, 0, -6)) . '.php';
            return false;
        case 'OfflineBackupQueueHandler':
            include_once $dir . '/'.strtolower($cls).'.php';
            return false;
        default:
            return true;
        }
    }

    function onRouterInitialized($m)
    {
        $m->connect('main/backupaccount',
                    array('action' => 'offlinebackup'));
        return true;
    }

    /**
     * Add our queue handler to the queue manager
     *
     * @param QueueManager $qm current queue manager
     *
     * @return boolean hook value
     */

    function onEndInitializeQueueManager($qm)
    {
        $qm->connect('backoff', 'OfflineBackupQueueHandler');
        return true;
    }

    function onPluginVersion(&$versions)
    {
        $versions[] = array('name' => 'OfflineBackup',
                            'version' => MICROSERVICE_VERSION,
                            'author' => 'Evan Prodromou',
                            'homepage' => 'http://www.microservice.comwiki/Plugin:OfflineBackup',
                            'rawdescription' =>
                          // TRANS: Plugin description.
                            _m('Backup user data in offline queue and email when ready.'));
        return true;
    }
}
