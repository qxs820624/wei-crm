<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * For use by microapps to customize notice list item output
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
 * @category  Microapp
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
 * For use by microapps to customize NoticeListItem output
 *
 * @category  Microapp
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */
class NoticeListItemAdapter
{
    protected $nli;

    /**
     * Wrap a notice list item.
     *
     * @param NoticeListItem $nli item to wrap
     */
    function __construct($nli)
    {
        $this->nli = $nli;
    }

    /**
     * Delegate unimplemented methods to the notice list item attribute.
     *
     * @param string $name      Name of the method
     * @param array  $arguments Arguments called
     *
     * @return mixed Return value of the method.
     */
    function __call($name, $arguments)
    {
        return call_user_func_array(array($this->nli, $name), $arguments);
    }
}
