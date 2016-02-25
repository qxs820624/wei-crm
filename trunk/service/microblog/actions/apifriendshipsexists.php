<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Show whether there is a friendship between two users
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

require_once INSTALLDIR . '/lib/apiprivateauth.php';

/**
 * Tests for the existence of friendship between two users. Will return true if
 * user_a follows user_b, otherwise will return false.
 *
 * @category API
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 */
class ApiFriendshipsExistsAction extends ApiPrivateAuthAction
{
    var $profile_a = null;
    var $profile_b = null;

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

        $this->profile_a = $this->getTargetProfile($this->trimmed('user_a'));
        $this->profile_b = $this->getTargetProfile($this->trimmed('user_b'));

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

        if (empty($this->profile_a) || empty($this->profile_b)) {
            $this->clientError(
                // TRANS: Client error displayed when supplying invalid parameters to an API call checking if a friendship exists.
                _('Two valid IDs or nick names must be supplied.'),
                400,
                $this->format
            );
            return;
        }

        $result = Subscription::exists($this->profile_a, $this->profile_b);

        switch ($this->format) {
        case 'xml':
            $this->initDocument('xml');
            $this->element('friends', null, $result);
            $this->endDocument('xml');
            break;
        case 'json':
            $this->initDocument('json');
            print json_encode($result);
            $this->endDocument('json');
            break;
        default:
            break;
        }
    }

    /**
     * Return true if read only.
     *
     * MAY override
     *
     * @param array $args other arguments
     *
     * @return boolean is read only action?
     */
    function isReadOnly($args)
    {
        return true;
    }
}
