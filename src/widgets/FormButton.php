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
 * Class FormButton
 * A Simple Confirmation Button for a Form
 * @package chameleon_widgets
 */
class FormButton extends HtmlElement {

	/**
	 * FormButton constructor.
	 * @param Dictionary $dictionary: The dictionary for translation purposes
	 * @param string $title: The title of the button
	 */
	public function __construct(Dictionary $dictionary, string $title) {
		$template = __DIR__ . "/templates/form_button.html";
		parent::__construct($template, $dictionary);
	}

}