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
use InvalidArgumentException;


/**
 * Class Col
 * A Boostrap Col Element with configurable sizes
 * @package champlates_bootstrap
 */
class Col extends Div {

	/**
	 * Col constructor.
	 * @param array $content: The content inside the Div tag
	 * @param int|array $sizes: The size definition of the col. Can be either a
	 *                          5-part array for different sizes
	 *                          (XS, S, M, L, Xl), or a single integer that is
	 *                          applied to all sizes.
	 * @param array $classes: Additional classes for the Html Element
	 * @param string|null $id: Optional ID
	 * @throws InvalidArgumentException: If a wrong size parameter was provided
	 */
	public function __construct(array $content,
								$sizes,
								array $classes = [],
								? string $id = null) {

		// Generate Array from int
		if (!is_array($sizes)) {
			if (is_int($sizes)) {
				$sizes = [$sizes, $sizes, $sizes, $sizes, $sizes];
			} else {
				throw new InvalidArgumentException("Not an int or array");
			}
		}

		// Check if valid
		// Make sure that values for all 5 sizes are available
		if (count($sizes) !== 5) {
			throw new InvalidArgumentException(
				"Invalid amount of size parameters"
			);
		}
		// Make sure that sizes are in valid range
		foreach ($sizes as $size) {
			if ($size < 1 || $size > 12) {
				throw new InvalidArgumentException(
					"Invalid Bootstrap column Size"
				);
			}
		}

		$classXs = "col-" . (string) $sizes[0];
		$classS = "col-sm-" . (string) $sizes[1];
		$classM = "col-md-" . (string) $sizes[2];
		$classL = "col-lg-" . (string) $sizes[3];
		$classXL = "col-xl-" . (string) $sizes[4];

		$this->addClasses([$classXs, $classS, $classM, $classL, $classXL]);
		parent::__construct($content, $classes, $id);
	}
}