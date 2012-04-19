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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['ch_flowplayer_reader'] = '{title_legend},name,headline,type;{config_legend},ch_playlists,ch_autoplay,ch_playersize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['ch_flowplayer_list'] = '{title_legend},name,headline,type,jumpTo;{config_legend},ch_playlists;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['ch_playlists'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['ch_playlists'],
	'exclude'                 => true,
	'inputType'               => 'checkboxWizard',
	'foreignKey'              => 'tl_ch_flowplayer.title',
	'eval'                    => array('multiple'=>true, 'mandatory'=>true)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['ch_autoplay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['ch_autoplay'],
	'exclude'                 => true,
	'inputType'               => 'checkbox'
);
$GLOBALS['TL_DCA']['tl_module']['fields']['ch_playersize'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['ch_playersize'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
);

?>