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
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['title'] = array('Titel', 'Titel des Films');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['alias'] = array('Film-Alias', 'Der Film-Alias ist eine eindeutige Referenz, die anstelle der numerischen Movie-Id aufgerufen werden kann.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['description'] = array('Beschreibung', 'Nähere Angaben zum Film');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['movie'] = array('Filmdatei', ' Wählen Sie eine FLV-, SWF- oder MP4-Datei aus.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['preview'] = array('Vorschau', 'Bild für die Filmvorschau. Wählen Sie eine JPG- oder PNG-Datei aus.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['params'] = array('Parameter', 'Parameter gemäß flowplayer.org, die nur für diesen Film gelten sollen.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['published'] = array('Veröffentlicht', 'Der Film ist veröffentlicht.');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['addImage']     = array('Ein Bild hinzufügen', 'Dem Film ein (Vorschau-)Bild hinzufügen.');


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['new']    = array('Neuer Film', 'Einen neuen Film anlegen');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['edit']   = array('Film bearbeiten', 'Film ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['copy']   = array('Film duplizieren', 'Film ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['delete'] = array('Film löschen', 'Film ID %s löschen');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['show']   = array('Filmdetails', 'Details des Films ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['cut']        = array('Film verschieben ', 'Film ID %s verschieben');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['pasteafter'] = array('Oben einfügen', 'Nach dem Film ID %s einfügen');
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['pastenew']   = array('Neuen Film oben erstellen', 'Neues Element nach dem Film ID %s erstellen');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['title_legend']   = 'Titel und Alias';
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['movie_legend']   = 'Film-Einstellungen';
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['params_legend']  = 'Parameter-Einstellungen';
$GLOBALS['TL_LANG']['tl_ch_flowplayer_playlist']['publish_legend']   = 'Veröffentlichung';

?>