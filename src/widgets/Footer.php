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
 * Class Footer
 * A Navbar that acts as a footer
 * @package champlates_widgets
 */
class Footer extends Navbar {

	/**
	 * Footer constructor.
	 * @param Dictionary $dictionary: The dictionary to use when translating
	 * @param Hyperlink $title: The title of the footer
	 * @param array $leftElements: The elements on the left side of the footer
	 * @param array $rightElements: The elements on the right side o.t. footer
	 * @param bool $fixed: Can be set to make the footer fixed-bottom.
	 * @SuppressWarnings functionMaxParameters
	 * @SuppressWarnings indentation
	 */
	public function __construct(
		? Dictionary $dictionary,
		Hyperlink $title,
		array $leftElements = [],
		array $rightElements = [],
		bool $fixed = false
	) {
		parent::__construct(
			$dictionary, $title, $leftElements, $rightElements, null);
		$this->changeTemplate(__DIR__ . "/templates/footer.html");
		$this->bindParam("NAVBAR_TYPE", $fixed ? "fixed-bottom" : "default");
	}

}