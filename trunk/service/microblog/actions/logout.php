<?php
/**
 * Logout action.
 *
 * PHP version 5
 *
 * @category Action
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
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

/**
 * Logout action class.
 *
 * @category Action
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl.html AGPLv3
 * @link     http://www.microservice.com
 */
class LogoutAction extends Action
{
    /**
     * This is read only.
     *
     * @return boolean true
     */
    function isReadOnly($args)
    {
        return false;
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
        if (!common_logged_in()) {
            // TRANS: Error message displayed when trying to perform an action that requires a logged in user.
            $this->clientError(_('Not logged in.'));
        } else {
            if (Event::handle('StartLogout', array($this))) {
                $this->logout();
            }
            Event::handle('EndLogout', array($this));

            if (common_config('singleuser', 'enabled')) {
                $user = User::singleUser();
                common_redirect(common_local_url('showstream',
                                                 array('nickname' => $user->nickname)));
            } else {
                common_redirect(common_local_url('public'), 303);
            }
        }
    }

    function logout()
    {
        common_set_user(null);
        common_real_login(false); // not logged in
        common_forgetme(); // don't log back in!
    }
}