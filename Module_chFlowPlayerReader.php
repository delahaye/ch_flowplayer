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
 * Class Module_chFlowPlayerReader 
 *
 * @copyright  de la Haye 2009 
 * @author     Christian de la Haye <service@delahaye.de> 
 * @package    Controller
 */
class Module_chFlowPlayerReader extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_ch_flowplayer_reader';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### FLOWPLAYER READER ###';
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->title;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$this->ch_playlists = deserialize($this->ch_playlists, true);

		// Return if there are no playlists
		if (!is_array($this->ch_playlists) || count($this->ch_playlists) < 1)
		{
			return '';
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{

		global $objPage;

		$this->Template->back = $GLOBALS['TL_LANG']['MSC']['goBack'];
		$this->Template->referer = 'javascript:history.go(-1)';

		$size = deserialize($this->ch_playersize);

		$arrTemp = array
		(
			'id' => $this->id,
			'loadMovie' => false,
			'player_width' => $size[0],
			'player_height' => $size[1],
			'autoplay' => $this->ch_autoplay,
			'preview' => false
		);

		$objMovie = $this->Database->prepare("SELECT * FROM tl_ch_flowplayer_playlist WHERE pid IN(" . implode(',', $this->ch_playlists) . ") AND (id=? OR alias=?)" . (!BE_USER_LOGGED_IN ? " AND published=1" : ""))
								 ->limit(1)
								 ->execute((is_numeric($this->Input->get('movie')) ? $this->Input->get('movie') : 0), $this->Input->get('movie'));

		if ($objMovie->numRows > 0)
		{
			$arrTemp['title'] = $objMovie->title;
			$arrTemp['description'] = $objMovie->description;
			$arrTemp['movie'] = $this->Environment->base.$objMovie->movie;
			$arrTemp['params'] = $objMovie->params;

			// Add image
			if ($objMovie->addImage && is_file(TL_ROOT . '/' . $objMovie->singleSRC))
			{
				$arrTemp['preview'] = $this->Environment->base.$this->getImage($this->urlEncode($objMovie->singleSRC), $size[0], $size[1]);
			}

		}

		$this->Template->flowplayer = $arrTemp;
		$this->Template->title = $arrTemp['title'];
		$this->Template->description = $arrTemp['description'];

	}
}

?>