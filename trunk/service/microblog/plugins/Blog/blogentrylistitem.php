<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * NoticeListItem adapter for blog entries
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
 * NoticeListItem adapter for blog entries
 *
 * @category  General
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class BlogEntryListItem extends NoticeListItemAdapter
{
    function showNotice()
    {
        $out = $this->nli->out;
        $out->elementStart('div', 'entry-title');
        $this->showAuthor();
        $this->showContent();
        $out->elementEnd('div');
    }

    function showContent()
    {
        $notice = $this->nli->notice;
        $out    = $this->nli->out;

        $entry  = Blog_entry::fromNotice($notice);

        if (empty($entry)) {
            throw new Exception('BlogEntryListItem used for non-blog notice.');
        }

        $out->elementStart('h4', array('class' => 'blog-entry-title'));
        $out->element('a', array('href' => $notice->bestUrl()), $entry->title);
        $out->elementEnd('h4');

        // XXX: kind of a hack

        $actionName = $out->trimmed('action');

        if ($actionName == 'shownotice' ||
            $actionName == 'showblogentry' ||
            $actionName == 'conversation') {

            $out->elementStart('div', 'blog-entry-content');
            $out->raw($entry->content);
            $out->elementEnd('div');

        } else {

            if (!empty($entry->summary)) {
                $out->elementStart('div', 'blog-entry-summary');
                $out->raw($entry->summary);
                $out->elementEnd('div');
            }

            $url = ($entry->url) ? $entry->url : $notice->bestUrl();
            $out->element('a',
                          array('href' => $url,
                                'class' => 'blog-entry-link'),
                          _('More...'));
        }
    }
}
