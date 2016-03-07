<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Subscribe to a user via the API
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
 * @category  API
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2009-2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

require_once INSTALLDIR . '/lib/apiauth.php';

/**
 * Allows the authenticating users to follow (subscribe) the user specified in
 * the ID parameter.  Returns the befriended user in the requested format when
 * successful.  Returns a string describing the failure condition when unsuccessful.
 *
 * @category API
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 */
class ApiFriendshipsCreateAction extends ApiAuthAction
{
    var $other  = null;

    /**
     * Take arguments for running
     *
     * @param array $args $_REQUEST args
     *
     * @return boolean success flag
     *
     */
    function prepare($args)
    {
        parent::prepare($args);

        $this->user   = $this->auth_user;
        $this->other  = $this->getTargetProfile($this->arg('id'));

        return true;
    }

    /**
     * Handle the request
     *
     * Check the format and show the user info
     *
     * @param array $args $_REQUEST data (unused)
     *
     * @return void
     */
    function handle($args)
    {
        parent::handle($args);

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->clientError(
                // TRANS: Client error. POST is a HTTP command. It should not be translated.
                _('This method requires a POST.'),
                400,
                $this->format
            );
            return;
        }

        if (!in_array($this->format, array('xml', 'json'))) {
            $this->clientError(
                // TRANS: Client error displayed when coming across a non-supported API method.
                _('API method not found.'),
                404,
                $this->format
            );
            return;
        }

        if (empty($this->other)) {
            $this->clientError(
                // TRANS: Client error displayed when trying follow who's profile could not be found.
                _('Could not follow user: profile not found.'),
                403,
                $this->format
            );
            return;
        }

        if ($this->user->isSubscribed($this->other)) {
            $errmsg = sprintf(
                // TRANS: Client error displayed when trying to follow a user that's already being followed.
                // TRANS: %s is the nickname of the user that is already being followed.
                _('Could not follow user: %s is already on your list.'),
                $this->other->nickname
            );
            $this->clientError($errmsg, 403, $this->format);
            return;
        }

        $result = subs_subscribe_to($this->user, $this->other);

        if (is_string($result)) {
            $this->clientError($result, 403, $this->format);
            return;
        }

        $this->initDocument($this->format);
        $this->showProfile($this->other, $this->format);
        $this->endDocument($this->format);
    }
}