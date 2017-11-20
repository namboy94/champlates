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

namespace champlates_bootstrap;
use champlates\Div;


/**
 * Class Row
 * A Bootstrap Row
 * @package champlates_bootstrap
 */
class Row extends Div {

	/**
	 * Row constructor.
	 * @param array $content: The content inside this row
	 * @param array $classes: Additional classes for this row
	 * @param string|null $id: Optional ID for the tag
	 */
	public function __construct(array $content,
								array $classes = [],
								? string $id = null) {
		$this->addClass("row");
		parent::__construct($content, $classes, $id);
	}

}