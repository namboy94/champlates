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
 * Class Form
 * A Form containing various Form elements. The form will perform a POST
 * to the target.
 * @package champlates_widgets
 */
class Form extends HtmlTemplate {

	/**
	 * Form constructor.
	 * @param Dictionary $dictionary: The dictionary used to translate text
	 * @param string $title: The title of the form
	 * @param string $target: The target endpoint of the form
	 * @param array $formElements: The elements included in this form
	 */
	public function __construct(
		? Dictionary $dictionary,
		string $title,
		string $target,
		array $formElements
	) {
		parent::__construct(__DIR__ . "/templates/form.html", $dictionary);
		$this->bindParams(["TITLE" => $title, "TARGET" => $target]);
		$this->addCollectionFromArray("ELEMENTS", $formElements);
	}

}