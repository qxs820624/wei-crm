<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2010, MicroService, Inc.
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
 * PHP version 5
 *
 * @category  Action
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPLv3
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

/**
 * Takes parameters:
 *
 *    - feed: a profile ID
 *    - token: session token to prevent CSRF attacks
 *    - ajax: boolean; whether to return Ajax or full-browser results
 *
 * Only works if the current user is logged in.
 *
 * @category  Action
 * @package   MicroService
 * @copyright 2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPLv3
 * @link      http://www.microservice.com
 */
class AddMirrorAction extends BaseMirrorAction
{
    var $feedurl;

    /**
     * Check pre-requisites and instantiate attributes
     *
     * @param Array $args array of arguments (URL, GET, POST)
     *
     * @return boolean success flag
     */
    function prepare($args)
    {
        parent::prepare($args);
        $feedurl = $this->getFeedUrl();
        $this->feedurl = $this->validateFeedUrl($feedurl);
        $this->profile = $this->profileForFeed($this->feedurl);
        return true;
    }

    function getFeedUrl()
    {
        $provider = $this->trimmed('provider');
        switch ($provider) {
        case 'feed':
            return $this->trimmed('feedurl');
        case 'twitter':
            $screenie = $this->trimmed('screen_name');
            $base = 'http://api.twitter.com/1/statuses/user_timeline.atom?screen_name=';
            return $base . urlencode($screenie);
        default:
            // TRANS: Exception thrown when a feed provider could not be recognised.
            throw new Exception(_m('Internal form error: Unrecognized feed provider.'));
        }
    }

    function saveMirror()
    {
        if ($this->oprofile->subscribe()) {
            SubMirror::saveMirror($this->user, $this->profile);
        } else {
            // TRANS: Exception thrown when a subscribing to a feed fails.
            $this->serverError(_m('Could not subscribe to feed.'));
        }
    }
}
