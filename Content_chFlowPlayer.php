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
 * Class Content_chFlowPlayer 
 *
 * @copyright  de la Haye 2009 
 * @author     Christian de la Haye <service@delahaye.de> 
 * @package    Controller
 */
class Content_chFlowPlayer extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_ch_flowplayer';


	/**
	 * Generate module
	 */
	protected function compile()
	{


		$size = deserialize($this->ch_playersize);

		$arrTemp = array
		(
			'id' => $this->id,
			'player_width' => $size[0],
			'player_height' => $size[1],
			'autoplay' => $this->ch_autoplay,
			'movie' => $this->Environment->base.$this->ch_movie,
			'params' => $this->ch_params,
			'preview' => false
		);

		// Add image
		if (is_file(TL_ROOT . '/' . $this->ch_preview))
		{
			$arrTemp['preview'] = $this->Environment->base.$this->getImage($this->urlEncode($this->ch_preview), $size[0], $size[1]);
		}

		$this->Template->flowplayer = $arrTemp;
		$this->Template->description = $this->ch_description;
		
		if (!$this->ch_movie) {
			$this->Template->error = '<p class="error">'.$GLOBALS['TL_LANG']['ch_flowplayer']['error'].'</p>';
		}
		
	}
}

?>