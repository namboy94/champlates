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

namespace chameleon_widgets;
use chameleon\Dictionary;
use chameleon\HtmlTemplate;


/**
 * Class Header
 * Models the Header at the start of an HTML file.
 * @package chameleon_widgets
 */
class Header extends HtmlTemplate {

	/**
	 * Header constructor.
	 * @param Dictionary $dictionary: The dictionary used to translate strings
	 * @param string $title: The title of the web page
	 * @param string $icon: The icon of the web page
	 * @param array $scripts: The scripts executed at the start of the page
	 * @param array $stylesheets: The stylesheets included in this page
	 * @param array $googleFonts: The google fonts included in this page
	 * @SuppressWarnings functionMaxParameters
	 */
	public function __construct(Dictionary $dictionary,
								string $title,
								string $icon,
								array $scripts = [],
								array $stylesheets = [],
								array $googleFonts = []) {

		parent::__construct(__DIR__ . "/templates/header.html", $dictionary);
		$this->bindParams(["TITLE" => $title, "ICON" => $icon]);
		$this->addCollectionFromArray("SCRIPTS", $scripts);
		$this->addCollectionFromArray("STYLESHEETS", $stylesheets);
		$this->addCollectionFromArray("GOOGLEFONTS", $googleFonts);
	}
}