<?php
/**
 * MicroService - the distributed open-source microblogging tool
 * Copyright (C) 2011, MicroService, Inc.
 *
 * Add a new Question
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
 * @category  QnA
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
 * Add a new Question
 *
 * @category  Plugin
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://www.microservice.com
 */
class QnanewquestionAction extends Action
{
    protected $user        = null;
    protected $error       = null;
    protected $complete    = null;
    protected $title       = null;
    protected $description = null;

    /**
     * Returns the title of the action
     *
     * @return string Action title
     */
    function title()
    {
        // TRANS: Title for Question page.
        return _m('New question');
    }

    /**
     * For initializing members of the class.
     *
     * @param array $argarray misc. arguments
     *
     * @return boolean true
     */
    function prepare($argarray)
    {
        parent::prepare($argarray);

        $this->user = common_current_user();

        if (empty($this->user)) {
            throw new ClientException(
                // TRANS: Client exception thrown trying to create a Question while not logged in.
                _m('You must be logged in to post a question.'),
                403
            );
        }

        if ($this->isPost()) {
            $this->checkSessionToken();
        }

        $this->title       = $this->trimmed('title');
        $this->description = $this->trimmed('description');

        return true;
    }

    /**
     * Handler method
     *
     * @param array $argarray is ignored since it's now passed in in prepare()
     *
     * @return void
     */
    function handle($argarray=null)
    {
        parent::handle($argarray);

        if ($this->isPost()) {
            $this->newQuestion();
        } else {
            $this->showPage();
        }

        return;
    }

    /**
     * Add a new Question
     *
     * @return void
     */
    function newQuestion()
    {
        if ($this->boolean('ajax')) {
            MicroService::setApi(true);
        }
        try {
            if (empty($this->title)) {
                // TRANS: Client exception thrown trying to create a question without a title.
                throw new ClientException(_m('Question must have a title.'));
            }

            // Notice options
            $options = array();

            // Does the heavy-lifting for getting "To:" information
            ToSelector::fillOptions($this, $options);

            $saved = QnA_Question::saveNew(
                $this->user->getProfile(),
                $this->title,
                $this->description,
                $options
            );
        } catch (ClientException $ce) {
            $this->error = $ce->getMessage();
            $this->showPage();
            return;
        }

        if ($this->boolean('ajax')) {
            header('Content-Type: text/xml;charset=utf-8');
            $this->xw->startDocument('1.0', 'UTF-8');
            $this->elementStart('html');
            $this->elementStart('head');
            // TRANS: Page title after sending a notice.
            $this->element('title', null, _m('Question posted'));
            $this->elementEnd('head');
            $this->elementStart('body');
            $this->showNotice($saved);
            $this->elementEnd('body');
            $this->elementEnd('html');
        } else {
            common_redirect($saved->bestUrl(), 303);
        }
    }

    /**
     * Output a notice
     *
     * Used to generate the notice code for Ajax results.
     *
     * @param Notice $notice Notice that was saved
     *
     * @return void
     */
    function showNotice($notice)
    {
        $nli = new NoticeQuestionListItem($notice, $this);
        $nli->show();
    }

    /**
     * Show the Question form
     *
     * @return void
     */
    function showContent()
    {
        if (!empty($this->error)) {
            $this->element('p', 'error', $this->error);
        }

        $form = new QuestionForm(
            $this,
            $this->title,
            $this->description
        );

        $form->show();

        return;
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
        if ($_SERVER['REQUEST_METHOD'] == 'GET' ||
            $_SERVER['REQUEST_METHOD'] == 'HEAD') {
            return true;
        } else {
            return false;
        }
    }
}

class NoticeQuestionListItem extends NoticeListItem
{
    /**
     * constructor
     *
     * Also initializes the profile attribute.
     *
     * @param Notice $notice The notice we'll display
     */
    function __construct($notice, $out=null)
    {
        parent::__construct($notice, $out);
    }

    function showEnd()
    {
        $this->out->element('ul', 'notices threaded-replies xoxo');
        parent::showEnd();
    }
}
