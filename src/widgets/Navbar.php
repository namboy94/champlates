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
 * Class Navbar
 * Models a bootstrap Navbar
 * @package chameleon_widgets
 */
class Navbar extends HtmlTemplate {

	/**
	 * Navbar constructor.
	 * @param Dictionary $dictionary: The dictionary used to translate
	 * @param Hyperlink $title: The title of the navbar
	 * @param array $leftElements: The left elements of the navbar.
	 * @param array $rightElements: The right elements of the navbar.
	 * @param NavbarLogo|null $logo: The logo of the navbar. Can be left empty.
	 * @SuppressWarnings functionMaxParameters
	 */
	public function __construct(Dictionary $dictionary,
								Hyperlink $title,
								array $leftElements = [],
								array $rightElements = [],
								? NavbarLogo $logo = null) {

		parent::__construct(__DIR__ . "/templates/navbar.html", $dictionary);
		$this->bindParams(["TITLE" => $title->text, "LINK" => $title->link]);
		$this->addInnerElement("LOGO", $logo);
		$this->addCollectionFromArray("LEFT", $leftElements);
		$this->addCollectionFromArray("RIGHT", $rightElements);
	}
}