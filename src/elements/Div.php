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
 * Class Div
 * A simple 'div' HTML Element
 * @package chameleon
 */
class Div extends HtmlElement {

	/**
	 * Div constructor.
	 * @param array $content: The content inside the div
	 * @param array $classes: The class of the div
	 * @param string|null $id: The id of the div
	 */
	public function __construct(array $content,
								array $classes = [],
								? string $id = null) {
		parent::__construct("div", $content, $classes, $id);
	}

}