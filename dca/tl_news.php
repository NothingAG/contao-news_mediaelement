<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Nothing GmbH 2012
 * @author     Stefan Pfister <red@nothing.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


/**
 * Listing
 */
$GLOBALS['TL_DCA']['tl_news']['list']['sorting']['child_record_callback'] = array('tl_news_video', 'listNewsArticles');


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][]		= 'addVideo';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['addVideo']		= 'video_headline,mejs_youtube,mejs_size';

foreach($GLOBALS['TL_DCA']['tl_news']['palettes'] as $k => $v)
{
    $GLOBALS['TL_DCA']['tl_news']['palettes'][$k] = str_replace('addEnclosure;', '{video_legend:hide},addVideo;addEnclosure', $GLOBALS['TL_DCA']['tl_news']['palettes'][$k]);
}

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_news']['fields']['addVideo'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_news']['addVideo'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_news']['fields']['video_headline'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_news']['video_headline'],
    'exclude'                 => true,
    'inputType'               => 'inputUnit',
    'options'                 => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
    'eval'                    => array('maxlength'=>255),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['mejs_size'] = array
(
    'label'			=> &$GLOBALS['TL_LANG']['tl_news']['mejs_size'],
    'exclude'		=> true,
    'inputType'		=> 'text',
    'eval'			=> array('mandatory'=>true, 'multiple'=>true, 'size'=>2, 'maxlength'=>10),
);

$GLOBALS['TL_DCA']['tl_news']['fields']['mejs_youtube'] = array
(
    'label'			=> &$GLOBALS['TL_LANG']['tl_news']['mejs_youtube'],
    'exclude'		=> true,
    'inputType'		=> 'text',
    'eval'			=> array('mandatory'=>true, 'maxlength'=>16, 'tl_class'=>'w50'),
);

class tl_news_video extends Backend
{

    public function listNewsArticles($arrRow)
    {
        $time = time();
        $key = ($arrRow['published'] && ($arrRow['start'] == '' || $arrRow['start'] < $time) && ($arrRow['stop'] == '' || $arrRow['stop'] > $time)) ? 'published' : 'unpublished';
        $date = $this->parseDate($GLOBALS['TL_CONFIG']['datimFormat'], $arrRow['date']);

        return '
<div class="cte_type ' . $key . '"><strong>' . $arrRow['headline'] . '</strong> - ' . $date . ($arrRow['addGallery'] ? ' <img src="system/modules/newsgallery/html/images.png" alt="" style="position:absolute; margin-left:10px" />' : '') . ($arrRow['addVideo'] ? ' <img src="system/modules/newsmediaelement/html/video.png" alt="Video" style="position:absolute; margin-left:' . ($arrRow['addGallery'] ? '30px' : '10px') . '" />' : '') . '</div>
<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h64' : '') . '">
' . (($arrRow['text'] != '') ? $arrRow['text'] : $arrRow['teaser']) . '
</div>' . "\n";
    }

}
