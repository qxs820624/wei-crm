<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Notice stream that's good for threading lists
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
 * @category  Notice stream
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
 * This notice stream filters notices by whether their conversation
 * has been seen before. It's a good (well, OK) way to get streams
 * for a ThreadedNoticeList display.
 *
 * @category  Notice stream
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class ThreadingNoticeStream extends FilteringNoticeStream
{
    protected $seen = array();

    function getNotices($offset, $limit, $sinceId=null, $maxId=null)
    {
        // Clear this each time we're called
        $this->seen = array();
        return parent::getNotices($offset, $limit, $sinceId, $maxId);
    }

    function filter($notice)
    {
        if (!array_key_exists($notice->conversation, $this->seen)) {
            $this->seen[$notice->conversation] = true;
            return true;
        } else {
            return false;
        }
    }
}
