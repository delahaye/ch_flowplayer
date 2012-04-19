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
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['title'] = array('Title', 'Title of the video');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['alias'] = array('Video alias', 'The video alias is a unique reference that can be called instead of the numeric video ID.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['description'] = array('Description', 'Further details about the video.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['movie'] = array('Source file', 'Select an FLV, MP4 or SWF file');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['preview'] = array('Preview', 'Image for the movie trailer. Please choose a JPG or PNG file.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['params'] = array('Parameter', 'Parameters to according flowplayer.org that should only apply to this video. Entering parameters will override any settings defined above, such as autoplay. You may manually re-add them here.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['published'] = array('Published', 'The video is published.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['addImage']     = array('Add an image', 'Add an image to this video.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['new']    = array('New Video', 'Create a new video');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['edit']   = array('Edit Video', 'Edit video ID %s');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['copy']   = array('Duplicate Video', 'Duplicate video ID %s');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['delete'] = array('Delete Video', 'Delete video ID %s');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['show']   = array('Video Details', 'Details of video ID %s');
$GLOBALS['TL_LANG']['tl_style']['cut']        = array('Move video', 'Move video ID %s');
$GLOBALS['TL_LANG']['tl_style']['pasteafter'] = array('Paste at the top', 'Paste after video ID %s');
$GLOBALS['TL_LANG']['tl_style']['pastenew']   = array('Add new at the top', 'Add new after video ID %s');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['title_legend']   = 'Title and Alias';
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['movie_legend']   = 'Video Settings';
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['params_legend']  = 'Parameter Settings';
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['publish_legend']   = 'Publication';

?>