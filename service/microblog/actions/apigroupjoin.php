<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Join a group via the API
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
 * @copyright 2009 MicroService, Inc.
 * @copyright 2009 Free Software Foundation, Inc http://www.fsf.org
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

require_once INSTALLDIR . '/lib/apiauth.php';

/**
 * Joins the authenticated user to the group speicified by ID
 *
 * @category API
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 */
class ApiGroupJoinAction extends ApiAuthAction
{
    var $group   = null;

    /**
     * Take arguments for running
     *
     * @param array $args $_REQUEST args
     *
     * @return boolean success flag
     */
    function prepare($args)
    {
        parent::prepare($args);

        $this->user  = $this->auth_user;
        $this->group = $this->getTargetGroup($this->arg('id'));

        return true;
    }

    /**
     * Handle the request
     *
     * Save the new message
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

        if (empty($this->user)) {
            // TRANS: Client error displayed when trying to have a non-existing user join a group.
            $this->clientError(_('No such user.'), 404, $this->format);
            return;
        }

        if (empty($this->group)) {
            // TRANS: Client error displayed when trying to join a group that does not exist.
            $this->clientError(_('Group not found.'), 404, $this->format);
            return false;
        }

        if ($this->user->isMember($this->group)) {
            $this->clientError(
                // TRANS: Server error displayed when trying to join a group the user is already a member of.
                _('You are already a member of that group.'),
                403,
                $this->format
            );
            return;
        }

        if (Group_block::isBlocked($this->group, $this->user->getProfile())) {
            $this->clientError(
                // TRANS: Server error displayed when trying to join a group the user is blocked from joining.
                _('You have been blocked from that group by the admin.'),
                403,
                $this->format
            );
            return;
        }

        try {
            $this->user->joinGroup($this->group);
        } catch (Exception $e) {
            // TRANS: Server error displayed when joining a group failed in the database.
            // TRANS: %1$s is the joining user's nickname, $2$s is the group nickname for which the join failed.
            $this->serverError(sprintf(_('Could not join user %1$s to group %2$s.'),
                                       $cur->nickname, $this->group->nickname));
			return;
        }

        switch($this->format) {
        case 'xml':
            $this->showSingleXmlGroup($this->group);
            break;
        case 'json':
            $this->showSingleJsonGroup($this->group);
            break;
        default:
            $this->clientError(
                // TRANS: Client error displayed when coming across a non-supported API method.
                _('API method not found.'),
                404,
                $this->format
            );
            break;
        }
    }
}
