<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2008-2011, MicroService, Inc.
 *
 * Search subscription action.
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
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2008-2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPLv3
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

/**
 * Search unsubscription action
 *
 * Takes parameters:
 *
 *    - token: session token to prevent CSRF attacks
 *    - ajax: boolean; whether to return Ajax or full-browser results
 *
 * Only works if the current user is logged in.
 *
 * @category  Action
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2008-2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPLv3
 * @link      http://www.microservice.com
 */
class SearchunsubAction extends SearchsubAction
{
    /**
     * Handle request
     *
     * Does the subscription and returns results.
     *
     * @param Array $args unused.
     *
     * @return void
     */
    function handle($args)
    {
        // Throws exception on error

        SearchSub::cancel($this->user->getProfile(),
                       $this->search);

        if ($this->boolean('ajax')) {
            $this->startHTML('text/xml;charset=utf-8');
            $this->elementStart('head');
            // TRANS: Page title when search unsubscription succeeded.
            $this->element('title', null, _m('Unsubscribed'));
            $this->elementEnd('head');
            $this->elementStart('body');
            $subscribe = new SearchSubForm($this, $this->search);
            $subscribe->show();
            $this->elementEnd('body');
            $this->elementEnd('html');
        } else {
            $url = common_local_url('search',
                                    array('search' => $this->search));
            common_redirect($url, 303);
        }
    }
}
