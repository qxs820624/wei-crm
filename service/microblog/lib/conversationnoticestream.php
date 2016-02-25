<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Notice stream for a conversation
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
 * @category  NoticeStream
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
 * Notice stream for a conversation
 *
 * @category  Stream
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */
class ConversationNoticeStream extends ScopingNoticeStream
{
    function __construct($id, $profile = -1)
    {
        if (is_int($profile) && $profile == -1) {
            $profile = Profile::current();
        }

        parent::__construct(new RawConversationNoticeStream($id),
                            $profile);
    }
}

/**
 * Notice stream for a conversation
 *
 * @category  Stream
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */
class RawConversationNoticeStream extends NoticeStream
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    function getNotices($offset, $limit, $sinceId = null, $maxId = null)
    {
        $all = Memcached_DataObject::listGet('Notice', 'conversation', array($this->id));
        $notices = $all[$this->id];
        // Re-order in reverse-chron
        usort($notices, array('RawConversationNoticeStream', '_reverseChron'));
        // FIXME: handle since and max
        $wanted = array_slice($notices, $offset, $limit);
        return new ArrayWrapper($wanted);
    }

    function getNoticeIds($offset, $limit, $since_id, $max_id)
    {
        $notice = $this->getNotices($offset, $limit, $since_id, $max_id);
        $ids = $notice->fetchAll('id');
        return $ids;
    }

    function _reverseChron($a, $b)
    {
        $at = strtotime($a->created);
        $bt = strtotime($b->created);
        
        if ($at == $bt) {
            return 0;
        } else if ($at > $bt) {
            return -1;
        } else {
            return 1;
        }
    }
}
