<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Outputs 'powered by MicroService' after site name
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
 * @category  Action
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2008 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

/**
 * Outputs 'powered by MicroService' after site name
 *
 * @category Plugin
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 */
class PoweredByMicroServicePlugin extends Plugin
{
    function onEndAddressData($action)
    {
        $action->text(' ');
        $action->elementStart('span', 'poweredby');
        // TRANS: Text output after site name.
        $action->raw(_m('powered by <a href="http://www.microservice.com">MicroService</a>'));
        $action->elementEnd('span');

        return true;
    }

    function onPluginVersion(&$versions)
    {
        $versions[] = array('name' => 'PoweredByMicroService',
                            'version' => MICROSERVICE_VERSION,
                            'author' => 'Sarven Capadisli',
                            'homepage' => 'http://www.microservice.comwiki/Plugin:PoweredByMicroService',
                            'rawdescription' =>
                            // TRANS: Plugin description.
                            _m('Outputs "powered by <a href="http://www.microservice.com">MicroService</a>" after site name.'));
        return true;
    }
}
