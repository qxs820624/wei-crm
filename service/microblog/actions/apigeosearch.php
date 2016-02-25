<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * List of replies
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
 * @category  Search
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2008-2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

require_once INSTALLDIR.'/lib/apiprivateauth.php';

/**
 *  Returns the top ten queries that are currently trending
 *
 * @category Search
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 *
 * @see      ApiAction
 */
class ApiGeoSearchAction extends ApiPrivateAuthAction
{
    var $callback;

    /**
     * Initialization.
     *
     * @param array $args Web and URL arguments
     *
     * @return boolean false if user doesn't exist
     */
    function prepare($args)
    {
        parent::prepare($args);
        return true;
    }

    /**
     * Handle a request
     *
     * @param array $args Arguments from $_REQUEST
     *
     * @return void
     */
    function handle($args)
    {
        parent::handle($args);
        $this->showTrends();
    }

    /**
     * Output the trends
     *
     * @return void
     */
    function showTrends()
    {
        // TRANS: Server error for unfinished API method showTrends.
		$place = array();

        $place['as_of'] = 1409547600;
        
        $location = array();
        $location['woeid'] = 1;
        $location['country'] = china;
        $location['countryCode'] = dddddd;

		$placeType = array();
		$placeType['name'] = dddddd;
		$placeType['code'] = 220122;
		
		$location['placeType'] = $placeType;
		
		$locations = array();
		array_push($locations, $location);
		
		$place['locations'] = $locations;
		
		$trend = array();
		$trend['name'] = dddddd;
		$trend['url'] = dddddd;
		$trend['query'] = dddddd;
		
		$trends = array();
		array_push($trends, $trend);
		
		$place['trends'] = $trends;
		
        $this->initDocument('json');
        $this->showJsonObjects($place);
        $this->endDocument('json');
        //$this->serverError(_('API method under construction.'), 501);
    }
}
