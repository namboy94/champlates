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
 * Class Script
 * Light wrapper around a JavaScript script for integration with other
 * HTML Elements
 * @package champlates_widgets
 */
class Script extends HtmlTemplate {

	/**
	 * Script constructor.
	 * @param string $script: The script to execute. Will only be wrapped
	 *                        in <script> tags.
	 */
	public function __construct(string $script) {
		parent::__construct(__DIR__ . "/templates/script.html", null);
		$this->bindParam("SCRIPT", $script);
	}

}