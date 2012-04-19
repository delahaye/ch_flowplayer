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
 * Class Module_chFlowPlayerList 
 *
 * @copyright  de la Haye 2009 
 * @author     Christian de la Haye <service@delahaye.de> 
 * @package    Controller
 */
class Module_chFlowPlayerList extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_ch_flowplayer_list';


	/**
	 * Target pages
	 * @var array
	 */
	protected $arrTargets = array();


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### FLOWPLAYER LIST ###';
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
		$objMovies = $this->Database->execute("SELECT tl_ch_flowplayer_playlist.id AS id, pid, tl_ch_flowplayer_playlist.title AS title, tl_ch_flowplayer.title AS listtitle, description, movie, addImage, singleSRC, size, alt, caption, floating, imagemargin, fullsize FROM tl_ch_flowplayer_playlist LEFT JOIN tl_ch_flowplayer ON(tl_ch_flowplayer.id=tl_ch_flowplayer_playlist.pid) WHERE pid IN(" . implode(',', $this->ch_playlists) . ")" . (!BE_USER_LOGGED_IN ? " AND published=1" : "") . " ORDER BY pid, sorting");

		if ($objMovies->numRows < 1)
		{
			$this->Template->playlist = array();
			return;
		}

		$arrMovies = array_fill_keys($this->ch_playlists, array());

		// Add Movies
		while ($objMovies->next())
		{

			$arrTemp = array
			(
				'title' => $objMovies->title,
				'description' => $objMovies->description,
				'preview' => $objMovies->preview,
				'link' => $this->generateMovieLink($objMovies),
				'addImage' => false
			);

			// Add image
			if ($objMovies->addImage && is_file(TL_ROOT . '/' . $objMovies->singleSRC))
			{
				$size = deserialize($objMovies->size);
				$src = $this->getImage($this->urlEncode($objMovies->singleSRC), $size[0], $size[1]);

				if (($imgSize = @getimagesize(TL_ROOT . '/' . $src)) !== false)
				{
					$arrTemp['imgSize'] = ' ' . $imgSize[3];
				}

				$arrTemp['src'] = $src;
				$arrTemp['href'] = $objMovies->singleSRC;
				$arrTemp['alt'] = htmlspecialchars($objMovies->alt);
				$arrTemp['fullsize'] = $objMovies->fullsize ? true : false;
				$arrTemp['margin'] = $this->generateMargin(deserialize($objMovies->imagemargin), 'padding');
				$arrTemp['float'] = in_array($objMovies->floating, array('left', 'right')) ? sprintf(' float:%s;', $objMovies->floating) : '';
				$arrTemp['caption'] = $objMovies->caption;
				$arrTemp['addImage'] = true;
			}

			$arrMovies[$objMovies->pid]['title'] = $objMovies->listtitle;
			$arrMovies[$objMovies->pid]['items'][] = $arrTemp;
		}

		$arrMovies = array_values($arrMovies);

		$list_count = 0;
		$list_limit = count($arrMovies);

		// Add classes
		foreach ($arrMovies as $k=>$v)
		{
			$count = 0;
			$limit = count($v['items']);

			for ($i=0; $i<$limit; $i++)
			{
				$arrMovies[$k]['items'][$i]['class'] = trim(((++$count == 1) ? ' first' : '') . (($count >= $limit) ? ' last' : '') . ((($count % 2) == 0) ? ' odd' : ' even'));
			}

			$arrMovies[$k]['class'] = trim(((++$list_count == 1) ? ' first' : '') . (($list_count >= $list_limit) ? ' last' : '') . ((($list_count % 2) == 0) ? ' odd' : ' even'));
			
			if(!is_array($arrMovies[$k]['items'])) {
				$arrMovies[$k]['items'] = array();
			}
		}

		$this->Template->playlists = $arrMovies;

	}


	/**
	 * Create links
	 * @param object
	 * @return string
	 */
	protected function generateMovieLink(Database_Result $objMovies)
	{
		if (!isset($this->arrTargets[$objMovies->id]))
		{
			if ($this->jumpTo < 1)
			{
				$pageid = $GLOBALS['objPage']->id;
			}
			else
			{
				$pageid = intval($this->jumpTo);
			}

			$objTarget = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
					 		->limit(1)
							->execute($pageid);

			if ($objTarget->numRows < 1)
			{
				$this->arrTargets[$objMovies->id] = ampersand($this->Environment->request, true);
			}

			$this->arrTargets[$objMovies->id] = ampersand($this->generateFrontendUrl($objTarget->fetchAssoc(), '/movie/' . ((strlen($objMovies->alias) && !$GLOBALS['TL_CONFIG']['disableAlias']) ? $objMovies->alias : $objMovies->id)));

		}

		return $this->arrTargets[$objMovies->id];
	}


}

?>