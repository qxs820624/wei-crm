<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * API method to check if a user belongs to a list.
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
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

require_once INSTALLDIR . '/lib/apibareauth.php';

/**
 * Action handler for Twitter list_memeber methods
 *
 * @category API
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 * @see      ApiBareAuthAction
 */
class ApiListMemberAction extends ApiBareAuthAction
{
    /**
     * Set the flags for handling the request. Show the profile if this
     * is a GET request AND the profile is a member of the list, add a member
     * if it is a POST, remove the profile from the list if method is DELETE
     * or if method is POST and an argument _method is set to DELETE. Act
     * like we don't know if the current user has no access to the list.
     *
     * Takes parameters:
     *     - user: the user id or nickname
     *     - list_id: the id of the tag or the tag itself
     *     - id: the id of the member being looked for/added/removed
     *
     * @return boolean success flag
     */
    function prepare($args)
    {
        parent::prepare($args);

        $this->user = $this->getTargetUser($this->arg('id'));
        $this->list = $this->getTargetList($this->arg('user'), $this->arg('list_id'));

        if (empty($this->list)) {
            // TRANS: Client error displayed when referring to a non-existing list.
            $this->clientError(_('List not found.'), 404, $this->format);
            return false;
        }

        if (empty($this->user)) {
            // TRANS: Client error displayed when referring to a non-existing user.
            $this->clientError(_('No such user.'), 404, $this->format);
            return false;
        }
        return true;
    }

    /**
     * Handle the request
     *
     * @return boolean success flag
     */
    function handle($args)
    {
        parent::handle($args);

        $arr = array('tagger' => $this->list->tagger,
                      'tag' => $this->list->tag,
                      'tagged' => $this->user->id);
        $ptag = Profile_tag::pkeyGet($arr);

        if(empty($ptag)) {
            $this->clientError(
                // TRANS: Client error displayed when referring to a non-list member.
                _('The specified user is not a member of this list.'),
                400,
                $this->format
            );
        }

        $user = $this->twitterUserArray($this->user->getProfile(), true);

        switch($this->format) {
        case 'xml':
            $this->showTwitterXmlUser($user, 'user', true);
            break;
        case 'json':
            $this->showSingleJsonUser($user);
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
        return true;
    }
}
