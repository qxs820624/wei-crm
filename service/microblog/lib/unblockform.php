<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Form for unblocking a user
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
 * @category  Form
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2009 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

/**
 * Form for unblocking a user
 *
 * @category Form
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 *
 * @see      BlockForm
 */
class UnblockForm extends ProfileActionForm
{
    /**
     * Action this form provides
     *
     * @return string Name of the action, lowercased.
     */
    function target()
    {
        return 'unblock';
    }

    /**
     * Title of the form
     *
     * @return string Title of the form, internationalized
     */
    function title()
    {
        // TRANS: Title for the form to unblock a user.
        return _m('TITLE','Unblock');
    }

    /**
     * Description of the form
     *
     * @return string description of the form, internationalized
     */
    function description()
    {
        // TRANS: Description of the form to unblock a user.
        return _('Unblock this user');
    }
}
