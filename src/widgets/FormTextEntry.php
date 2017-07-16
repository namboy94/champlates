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
 * Class FormTextEntry
 * A text input for a Form
 * @package chameleon_widgets
 */
class FormTextEntry extends HtmlTemplate {

	/**
	 * FormTextEntry constructor.
	 * @param Dictionary $dictionary: The dictionary used for translation
	 * @param string $id: The ID to which the data will be POSTed
	 * @param string $name: The name of the entry
	 * @param string $type: The type of the entry data
	 * @param string $title: The title of the entry
	 * @param string $placeholder: A placeholder for the text field
	 * @SuppressWarnings functionMaxParameters
	 */
	public function __construct(Dictionary $dictionary,
								string $id,
								string $name,
								string $type,
								string $title,
								string $placeholder = "") {

		$template = __DIR__ . "/templates/form_text_entry.html";
		parent::__construct($template, $dictionary);
		$this->bindParams([
			"ID" => $id,
			"NAME" => $name,
			"TYPE" => $type,
			"TITLE" => $title,
			"PLACEHOLDER" => $placeholder
		]);
	}
}