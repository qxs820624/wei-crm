<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * A snapshot of site stats that can report itself to headquarters
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
 * @category  Stats
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2009 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://www.microservice.com
 */

/**
 * A snapshot of site stats that can report itself to headquarters
 *
 * This class will collect statistics on the site and report them to
 * a statistics server of the admin's choice. (Default is the big one
 * at status.net.)
 *
 * It can either be called from a cron job, or run occasionally by the
 * Web site.
 *
 * @category Stats
 * @package  MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @license  http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link     http://www.microservice.com
 *
 */

require_once INSTALLDIR . '/lib/httpclient.php';

class FunctionTest
{
    var $stats = null;

    /**
     * Constructor for a snapshot
     */

    function __construct()
    {
    }

    /**
     * Reports statistics to headquarters
     *
     * Posts statistics to a reporting server.
     *
     * @return void
     */

    function run()
    {
        // XXX: Use OICU2 and OAuth to make authorized requests
        
        require_once 'FunctionList.php';
        
		foreach($functionList as $functionName => $functionParam) {
	        $reporturl = isset($functionParam['url']) ? $functionParam['url'] : null;
	        $method = isset($functionParam['method']) ? $functionParam['method'] : null;
	        $headers = isset($functionParam['headers']) ? $functionParam['headers'] : null;
	        $posts = isset($functionParam['posts']) ? $functionParam['posts'] : null;
	        try {
	            $request = new HTTP_Request2(null, HTTP_Request2::METHOD_GET);
	            $request->setUrl($reporturl);
	            $request->setMethod($method);
	            
		        if ($headers) {
		            foreach ($headers as $headerkey => $headervalue) {
		                $request->setHeader($headerkey, $headervalue);
		            }
		        }
		        
		        if ($posts) {
		            foreach ($posts as $postkey => $postvalue) {
		                $request->addPostParameter($postkey, $postvalue);
		            }
		        }

		        $response = $request->send();
		        
		        echo "===================================================================\n";
		        echo "url : " . $reporturl . "\n";
		        echo "method : " . $method . "\n";
		        echo "headers : ";
		        if ($headers) {
		            foreach ($headers as $headerkey => $headervalue) {
		            	echo $headerkey . " - " . $headervalue;
		            }
		        }
		        echo "\n";
		        
		        echo "posts : ";
		        if ($posts) {
		            foreach ($posts as $postkey => $postvalue) {
		                echo $postkey . " - " . $postvalue;
		            }
		        }
		        echo "\n";
		        
		        echo "function : " . $functionName . "\n";
		        echo "status : " . $response->getStatus() . "\n";
		        echo "body : " . $response->getBody() . "\n";
	
	        } catch (Exception $e) {
	            echo "Error in snapshot: " . $e->getMessage();
	        }
		}
    }

}
