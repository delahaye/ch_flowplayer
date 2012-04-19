<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  de la Haye 2009 
 * @author     Christian de la Haye <service@delahaye.de> 
 * @package    FlowPlayer 
 * @license    LGPL 
 * @filesource
 */


/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['ch_flowplayer'] = '{type_legend},type,headline;{movie_legend:hide},ch_movie,ch_description,ch_autoplay,ch_playersize;{preview_legend:hide},ch_preview;{params_legend:hide},ch_params;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['ch_autoplay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ch_autoplay'],
	'exclude'                 => true,
	'inputType'               => 'checkbox'
);
$GLOBALS['TL_DCA']['tl_content']['fields']['ch_movie'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ch_movie'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>true, 'extensions'=>'flv,mp4,swf')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['ch_preview'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ch_preview'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>false, 'extensions'=>'jpg,png,swf')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['ch_description'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ch_description'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array('mandatory'=>false, 'rte'=>'tinyMCE', 'helpwizard'=>true),
	'explanation'             => 'insertTags'
);
$GLOBALS['TL_DCA']['tl_content']['fields']['ch_playersize'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ch_playersize'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_content']['fields']['ch_params'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['ch_params'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array('mandatory'=>false)
);


?>