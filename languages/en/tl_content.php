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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_content']['ch_params'] = array('Parameter', 'Parameters to according flowplayer.org that should only apply to this video. Entering parameters will override any settings defined above, such as autoplay. You may manually re-add them here.');
$GLOBALS['TL_LANG']['tl_content']['ch_movie'] = array('Source file', 'Select an FLV, MP4 or SWF file');
$GLOBALS['TL_LANG']['tl_content']['ch_playersize'] = array('Width and height', 'The width and height of the player.');
$GLOBALS['TL_LANG']['tl_content']['ch_description'] = array('Description', 'Further details about the video');
$GLOBALS['TL_LANG']['tl_content']['ch_autoplay'] = array('Autoplay', 'Start the video automatically when the page is loaded');
$GLOBALS['TL_LANG']['tl_content']['ch_preview'] = array('Source file', 'Choose a JPG or PNG file, which will be shown as the first frame of the video.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_content']['movie_legend'] = 'Video Settings';
$GLOBALS['TL_LANG']['tl_content']['preview_legend'] = 'Initial Frame Image';
$GLOBALS['TL_LANG']['tl_content']['params_legend'] = 'Parameters';


?>