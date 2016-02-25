<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Site access administration panel
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
 * @category Action
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

/**
 * Administer site access settings
 *
 * @category Action
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 */

class RedirectAction extends Action
{
    /**
     * These pages are read-only.
     *
     * @param array $args unused.
     *
     * @return boolean read-only flag (false)
     */

    function isReadOnly($args)
    {
        return true;
    }

    /**
     * Handle a request
     *
     * @param array $args array of arguments
     *
     * @return nothing
     */
    function handle($args)
    {
        common_redirect(common_local_url($this->arg('nextAction'), $this->arg('args')));
    }
}

