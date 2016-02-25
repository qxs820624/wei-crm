<?php
/**
 * MicroService, the distributed open-source microblogging tool
 *
 * widget for displaying a list of notices
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
 * @category  UI
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPLv3
 * @link      http://www.microservice.com
 */

if (!defined('MICROSERVICE')) {
    exit(1);
}

require_once INSTALLDIR.'/lib/noticelist.php';

/**
 * MicroService, the distributed open-source microblogging tool
 *
 * Widget superclass for notice list items that remove rel=nofollow
 *
 * When nofollow|external = 'sometimes', notices get rendered and saved
 * with rel=nofollow for external links. We want to remove that relationship
 * on some pages (profile, single notice, faves). This superclass for
 * some noticelistitems will strip that bit of code out when showing
 * notice content
 *
 * @category  UI
 * @package   MicroService
 * @author   gaoyuan tan <gaoyuantan@163.com>
 * @copyright 2010 MicroService, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPLv3
 * @link      http://www.microservice.com
 */

class DoFollowListItem extends NoticeListItem
{
    /**
     * show the content of the notice
     *
     * Trims out the rel=nofollow for external links
     * if nofollow|external = 'sometimes'
     *
     * @return void
     */

    function showContent()
    {
        // FIXME: URL, image, video, audio
        $this->out->elementStart('p', array('class' => 'entry-content'));

        if (!empty($this->notice->rendered)) {
            $html = $this->notice->rendered;
        } else {
            $html = common_render_content($this->notice->content, $this->notice);
        }

        if (common_config('nofollow', 'external') == 'sometimes') {
            // remove the nofollow part
            // XXX: cache the results here

            $html = preg_replace('/rel="(.*)nofollow ?/', 'rel="\1', $html);
        }

        $this->out->raw($html);

        $this->out->elementEnd('p');
    }
}