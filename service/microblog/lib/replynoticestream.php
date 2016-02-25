<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Stream of mentions of me
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
 * @category  Stream
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
 * Stream of mentions of me
 *
 * @category  Stream
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class ReplyNoticeStream extends ScopingNoticeStream
{
    function __construct($userId, $profile=-1)
    {
        if (is_int($profile) && $profile == -1) {
            $profile = Profile::current();
        }
        parent::__construct(new CachingNoticeStream(new RawReplyNoticeStream($userId),
                                                    'reply:stream:' . $userId),
                            $profile);
    }
}

/**
 * Raw stream of mentions of me
 *
 * @category  Stream
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class RawReplyNoticeStream extends NoticeStream
{
    protected $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }

    function getNoticeIds($offset, $limit, $since_id, $max_id)
    {
        $reply = new Reply();
        $reply->profile_id = $this->userId;

        Notice::addWhereSinceId($reply, $since_id, 'notice_id', 'modified');
        Notice::addWhereMaxId($reply, $max_id, 'notice_id', 'modified');

        $reply->orderBy('modified DESC, notice_id DESC');

        if (!is_null($offset)) {
            $reply->limit($offset, $limit);
        }

        $ids = array();

        if ($reply->find()) {
            while ($reply->fetch()) {
                $ids[] = $reply->notice_id;
            }
        }

        return $ids;
    }
}