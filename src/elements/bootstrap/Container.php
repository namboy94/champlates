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
 * Class Container
 * A Bootstrap Container. Can also be declared as a fluid container
 * @package champlates_bootstrap
 */
class Container extends Div {

	/**
	 * Container constructor.
	 * @param array $content: The Content inside the element
	 * @param bool $fluid: Declares if the container is fluid or not
	 * @param array $classes: Additional classes
	 * @param null|string $id: Optional ID for the Element
	 */
	public function __construct(array $content,
								bool $fluid = false,
								array $classes = [],
								? string $id = null) {
		$class = $fluid ? "container-fluid" : "container";
		$this->addClass($class);
		parent::__construct($content, $classes, $id);
	}

}