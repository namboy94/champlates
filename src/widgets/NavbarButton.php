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
 * Class NavbarButton
 * A Button on a Navbar
 * @package chameleon_widgets
 */
class NavbarButton extends HtmlElement {

	/**
	 * NavbarButton constructor.
	 * @param Dictionary $dictionary: The dictionary used for translation
	 * @param Hyperlink $title: The title of the button
	 * @param bool $isSelected: The target link of the button
	 */
	public function __construct(Dictionary $dictionary,
								Hyperlink $title,
								bool $isSelected) {
		$template = __DIR__ . "/templates/navbar_button.html";
		parent::__construct($template, $dictionary);

		$active = $isSelected ? 'class="active"' : '';
		$this->bindParams([
			"TITLE" => $title->text,
			"LINK" => $title->link,
			"SELECTED" => $active
		]);
	}
}