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

namespace champlates;


/**
 * Class FormButton
 * A Simple Confirmation Button for a Form
 * @package champlates_widgets
 */
class FormButton extends HtmlTemplate {

	/**
	 * FormButton constructor.
	 * @param Dictionary $dictionary: The dictionary for translation purposes
	 * @param string $text: The text displayed on the button
	 */
	public function __construct(
		? Dictionary $dictionary,
		string $text
	) {
		$template = __DIR__ . "/templates/form_button.html";
		parent::__construct($template, $dictionary);
		$this->bindParam("TEXT", $text);
	}
}
