<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2012, MicroService, Inc.
 *
 * Spam notice stream
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
 * @category  Spam
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2012 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    // This check helps protect against security problems;
    // your code file can't be executed directly from the web.
    exit(1);
}

/**
 * Spam notice stream
 *
 * @category  Spam
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2012 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class SpamNoticeStream extends ScopingNoticeStream
{
    function __construct($tag, $profile = -1)
    {
        if (is_int($profile) && $profile == -1) {
            $profile = Profile::current();
        }
        parent::__construct(new CachingNoticeStream(new RawSpamNoticeStream(),
                                                    'spam_score:notice_ids'));
    }
}

/**
 * Raw stream of spammy notices
 *
 * @category  Stream
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class RawSpamNoticeStream extends NoticeStream
{
    function getNoticeIds($offset, $limit, $since_id, $max_id)
    {
        $ss = new Spam_score();

        $ss->is_spam = 1;

        $ss->selectAdd();
        $ss->selectAdd('notice_id');

        Notice::addWhereSinceId($ss, $since_id, 'notice_id');
        Notice::addWhereMaxId($ss, $max_id, 'notice_id');

        $ss->orderBy('notice_created DESC, notice_id DESC');

        if (!is_null($offset)) {
            $ss->limit($offset, $limit);
        }

        $ids = array();

        if ($ss->find()) {
            while ($ss->fetch()) {
                $ids[] = $ss->notice_id;
            }
        }

        return $ids;
    }
}
