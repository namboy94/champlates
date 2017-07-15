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
use chameleon\HtmlElement;


/**
 * Class NavbarDropdown
 * Models a Dropdown menu in a Navbar
 * @package chameleon_widgets
 */
class NavbarDropdown extends HtmlElement {

	/**
	 * @var array: A list of NavbarButtons
	 */
	private $entries;

	/**
	 * NavbarDropdown constructor.
	 * @param Dictionary $dictionary: The dictionary used for translation
	 * @param string $title: The title of the Dropdown
	 * @param array $entries: The elements inside the Dropdown
	 */
	public function __construct(Dictionary $dictionary,
								string $title,
								array $entries) {

		$template = __DIR__ . "/templates/navbar_dropdown.html";
		parent::__construct($template, $dictionary);
		$this->entries = $entries;
		$this->bindParam("TITLE", $title);
		$this->addCollectionFromArray("ENTRIES", $entries);
	}


}