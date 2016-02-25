<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * First bookmark form, with just the URL
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
 * @category  Form
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
 * First bookmark form, with just the URL
 *
 * @category  General
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2011 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */

class InitialBookmarkForm extends Form
{
    function __construct($out=null)
    {
        parent::__construct($out);
    }

    function id()
    {
        return 'form_initial_bookmark';
    }

    function formClass()
    {
        return 'form_settings ajax';
    }

    function action()
    {
        return common_local_url('bookmarkforurl');
    }

    function formData()
    {
        $this->out->elementStart('fieldset', array('id' => 'initial_bookmark_data'));
        $this->out->elementStart('ul', 'form_data');

        $this->li();
        $this->out->input('initial-bookmark-url',
                          // TRANS: Field label on form for adding a new bookmark.
                          _m('LABEL','URL'),
                          null,
                          null,
                          'url');
        $this->unli();

        $this->out->elementEnd('ul');
        $this->out->elementEnd('fieldset');
    }

    function formActions()
    {
        // TRANS: Button text for action to save a new bookmark.
        $this->out->submit('initial-bookmark-submit', _m('BUTTON', 'Add'), 'submit', 'submit');
    }
}
