<?php
/**
 * Public XRDS for OpenID
 *
 * PHP version 5
 *
 * @category Action
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2009 Free Software Foundation, Inc http://www.fsf.org
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

require_once INSTALLDIR.'/plugins/OpenID/openid.php';
require_once INSTALLDIR.'/lib/xrdsoutputter.php';

/**
 * Public XRDS
 *
 * @category Action
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2009 Free Software Foundation, Inc http://www.fsf.org
 * @license  http://www.fsf.org/licensing/licenses/agpl.html AGPLv3
 * @link     http://www.microservice.com
 *
 * @todo factor out similarities with XrdsAction
 */
class PublicxrdsAction extends Action
{
    /**
     * Is read only?
     *
     * @return boolean true
     */
    function isReadOnly($args)
    {
        return true;
    }

    /**
     * Class handler.
     *
     * @param array $args array of arguments
     *
     * @return nothing
     */
    function handle($args)
    {
        parent::handle($args);
        $xrdsOutputter = new XRDSOutputter();
        $xrdsOutputter->startXRDS();
        Event::handle('StartPublicXRDS', array($this,&$xrdsOutputter));
        Event::handle('EndPublicXRDS', array($this,&$xrdsOutputter));
        $xrdsOutputter->endXRDS();
    }
}

