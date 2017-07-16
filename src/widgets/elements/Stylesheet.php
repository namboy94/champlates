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
 * Class Stylesheet
 * Light wrapper around a stylesheet for better integration with other
 * HTML Elements
 * @package chameleon_widgets
 */
class Stylesheet extends HtmlTemplate {

	/**
	 * Stylesheet constructor.
	 * @param string $href: The location of the CSS file
	 */
	public function __construct(string $href) {
		parent::__construct(__DIR__ . "/templates/stylesheet.html", null);
		$this->bindParam("HREF", $href);
	}
}
