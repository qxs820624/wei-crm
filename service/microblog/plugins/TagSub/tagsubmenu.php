<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Menu to show tags you're subscribed to
 *
 * PHP version 5
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
 * @category  Menu
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    // This check helps protect against security problems;
    // your code file can't be executed directly from the web.
    exit(1);
}

/**
 * Class comment
 *
 * @category  General
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */
class TagSubMenu extends MoreMenu
{
    protected $user;
    protected $tags;

    function __construct($out, $user, $tags)
    {
        parent::__construct($out);
        $this->user = $user;
        $this->tags = $tags;
    }

    function getItems()
    {
        $items = array();
        
        foreach ($this->tags as $tag) {
            if (!empty($tag)) {
                $items[] = array('tag',
                                 array('tag' => $tag),
                                 sprintf('#%s', $tag),
                                 // TRANS: Menu item title. %s is a tag.
                                 sprintf(_('Notices tagged with "%s".'), $tag));
            }
        }

        return $items;
    }

    function tag()
    {
        return 'tagsubs';
    }
    
    function seeAllItem()
    {
        return array('tagsubs',
                     array('nickname' => $this->user->nickname),
                     _('See all'),
                     _('See all tags you are following'));
    }
}
