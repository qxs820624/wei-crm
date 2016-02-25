<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Base class for UI widgets
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
 * @category  Widget
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
 * Base class for UI widgets
 *
 * A widget is a cluster of HTML elements that provide some functionality
 * that's used on different parts of the site. Examples would be profile
 * lists, notice lists, navigation menus (tabsets) and common forms.
 *
 * @category Widget
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 *
 * @see      HTMLOutputter
 */

class Widget
{
    /**
     * HTMLOutputter to use for output
     */

    var $out = null;

    /**
     * Prepare the widget for use
     *
     * @param HTMLOutputter $out output helper, defaults to null
     */

    function __construct($out=null)
    {
        $this->out = $out;
    }

    /**
     * Show the widget
     *
     * Emit the HTML for the widget, using the configured outputter.
     *
     * @return void
     */

    function show()
    {
    }

    /**
     * Get HTMLOutputter
     *
     * Return the HTMLOutputter for the widget.
     *
     * @return HTMLOutputter the output helper
     */

    function getOut()
    {
        return $this->out;
    }

    /**
     * Delegate output methods to the outputter attribute.
     *
     * @param string $name      Name of the method
     * @param array  $arguments Arguments called
     *
     * @return mixed Return value of the method.
     */
    function __call($name, $arguments)
    {
        return call_user_func_array(array($this->out, $name), $arguments);
    }
}
