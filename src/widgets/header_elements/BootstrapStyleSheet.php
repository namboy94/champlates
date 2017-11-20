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
 * Class BootstrapStyleSheet
 * Integrates the Bootstrap stylesheet
 * @package champlates_widgets
 */
class BootstrapStyleSheet extends Stylesheet {

	/**
	 * BootstrapStyleSheet constructor.
	 * @param string $version: The Bootrap Version to use
	 */
	public function __construct(string $version = "3.3.7") {
		$href = "https://maxcdn.bootstrapcdn.com/bootstrap/" . $version .
			"/css/bootstrap.min.css";
		parent::__construct($href);
	}

}