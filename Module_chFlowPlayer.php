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
 * Class Module_chFlowPlayer 
 *
 * @copyright  de la Haye 2009 
 * @author     Christian de la Haye <service@delahaye.de> 
 * @package    Controller
 */
class Module_chFlowPlayer extends Frontend
{


	/**
	 * Add FAQs to the indexer
	 * @param array
	 * @param integer
	 * @return array
	 */
	public function getSearchablePages($arrPages, $intRoot=0)
	{
		$arrRoot = array();

		if ($intRoot > 0)
		{
			$arrRoot = $this->getChildRecords($intRoot, 'tl_page', true);
		}

		$time = time();
		$arrProcessed = array();

		// Get all possible modules
		$objMovies = $this->Database->execute("SELECT id, jumpTo, ch_playlists FROM tl_module WHERE type='ch_flowplayer_list'");

		// Walk through each module
		while ($objMovies->next())
		{
			if (is_array($arrRoot) && count($arrRoot) > 0 && !in_array($objMovies->jumpTo, $arrRoot))
			{
				continue;
			}

			// Get the URL of the jumpTo page
			if (!isset($arrProcessed[$objMovies->jumpTo]))
			{
				$arrProcessed[$objMovies->jumpTo] = false;

				// Get target page
				$objParent = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=? AND (start='' OR start<?) AND (stop='' OR stop>?) AND published=1")
											->limit(1)
											->execute($objMovies->jumpTo, $time, $time);

				// Determin domain
				if ($objParent->numRows)
				{
					$domain = $this->Environment->base;
					$objParent = $this->getPageDetails($objParent->id);

					if (strlen($objParent->domain))
					{
						$domain = ($this->Environment->ssl ? 'https://' : 'http://') . $objParent->domain . TL_PATH . '/';
					}

					$arrProcessed[$objMovies->jumpTo] = $domain . $this->generateFrontendUrl($objParent->row(), '/movie/%s');
				}
			}

			// Skip FAQs without target page
			if ($arrProcessed[$objMovies->jumpTo] === false)
			{
				continue;
			}

			$strUrl = $arrProcessed[$objMovies->jumpTo];

			// Get items

			$playlists = deserialize($objMovies->ch_playlists);
			foreach($playlists as $playlist)
			{
				$objItem = $this->Database->prepare("SELECT * FROM tl_ch_flowplayer_playlist WHERE pid=? AND published=1 ORDER BY sorting")
									  ->execute($playlist);

				// Add items to the indexer
				while ($objItem->next())
				{
					$arrPages[] = sprintf($strUrl, ((strlen($objItem->alias) && !$GLOBALS['TL_CONFIG']['disableAlias']) ? $objItem->alias : $objItem->id));
				}
			}

		}

		return $arrPages;
	}
}

?>