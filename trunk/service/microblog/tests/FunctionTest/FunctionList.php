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
define('APIROOT', 'http://115.29.226.162');

$functionList = array(
	'login' => array(
		'url' => APIROOT . '/api/account/verify_credentials.json',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'user_timeline' => array(
		'url' => APIROOT . '/api/statuses/user_timeline.as',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'user_show' => array(
		'url' => APIROOT . '/api/users/show.xml',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'friends_timeline' => array(
		'url' => APIROOT . '/api/statuses/friends_timeline.as',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'mentions' => array(
		'url' => APIROOT . '/api/statuses/mentions.as',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'favorites' => array(
		'url' => APIROOT . '/api/favorites.as',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'directory_messages' => array(
		'url' => APIROOT . '/api/direct_messages.atom',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'groups_list_all' => array(
		'url' => APIROOT . '/api/microservice/groups/list_all.xml?count=100',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'statuses_update' => array(
		'url' => APIROOT . '/api/statuses/update.json',
		'method' => HTTP_Request2::METHOD_POST,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
		'posts' => array(
			'status' => 'hello',
			'source' => 'micro service',
		),
	),
	'statuses_replies' => array(
		'url' => APIROOT . '/api/statuses/replies.json',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
	'statuses_public_timeline' => array(
		'url' => APIROOT . '/api/statuses/public_timeline.json',
		'method' => HTTP_Request2::METHOD_GET,
		'headers' => array(
			'Authorization' => 'Basic ZWdhb3RhbjE6ZWdhb3RhbjE=',
		),
	),
);

