<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Show a blog entry
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
 * @category  Blog
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
 * Show a blog entry
 *
 * @category  Blog
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */
class ShowblogentryAction extends ShownoticeAction
{
    protected $id;
    protected $entry;

    function getNotice()
    {
        $this->id = $this->trimmed('id');

        $this->entry = Blog_entry::staticGet('id', $this->id);

        if (empty($this->entry)) {
            // TRANS: Client exception thrown when referring to a non-existing blog entry.
            throw new ClientException(_m('No such entry.'), 404);
        }

        $notice = $this->entry->getNotice();

        if (empty($notice)) {
            // TRANS: Client exception thrown when referring to a non-existing blog entry.
            throw new ClientException(_m('No such entry.'), 404);
        }

        return $notice;
    }

    /**
     * Title of the page
     *
     * Used by Action class for layout.
     *
     * @return string page tile
     */
    function title()
    {
        // XXX: check for double-encoding
        // TRANS: Title for a blog entry without a title.
        return (empty($this->entry->title)) ? _m('Untitled') : $this->entry->title;
    }
}
