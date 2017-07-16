<?php
/**
 * Copyright Hermann Krumrey <hermann@krumreyh.com> 2017
 *
 * This file is part of champlates.
 *
 * champlates is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * champlates is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with champlates.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace chameleon;


/**
 * Class TitleJumboTron
 * A Jumbotron with Text imposed on it and an optional image background
 * @package chameleon_widgets
 */
class TitleJumboTron extends HtmlTemplate {

	/**
	 * TitleJumboTron constructor.
	 * @param Dictionary $dictionary: The Dictionary to use for translations
	 * @param string $title: The title of the jumbotron
	 * @param null|string $image: The image displayed as background
	 * @SuppressWarnings checkWhiteSpaceBefore
	 */
	public function __construct(? Dictionary $dictionary,
								string $title,
								? string $image = null) {

		$template = __DIR__ . "/templates/title_jumbotron.html";
		parent::__construct($template, $dictionary);

		if ($image === null) {
			$imageStyle = "";
		} else {
			$imageStyle = "style=\"background-image: url(" . $image .
				"); background-size: cover;\"";
		}

		$this->bindParams(
			["BACKGROUND_IMAGE" => $imageStyle, "TITLE" => $title]
		);

	}

}