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


/**
 * Class BootstrapScript
 * The Bootstrap Javascript Component
 * @package chameleon_widgets
 */
class BootstrapScript extends RemoteScript {

	/**
	 * @var string: The JQuery version to use
	 */
	private $jqueryVersion;

	/**
	 * BootstrapScript constructor.
	 * @param string $version: The Bootstrap Version to use
	 * @param string $jqueryVersion: The Jquery Version to use
	 */
	public function __construct(string $version = "3.3.7",
								string $jqueryVersion = "3.1.1") {

		$this->jqueryVersion = $jqueryVersion;
		$src = "https://maxcdn.bootstrapcdn.com/bootstrap/" . $version .
			"/js/bootstrap.min.js";
		parent::__construct($src);
	}

	/**
	 * Prepends the JQuery script because bootstrap depends on it
	 * @param string $language: The language in which to render
	 * @return string: The rendered HTML string
	 */
	public function render(string $language): string {
		$html = parent::render($language);
		$jquery = "<script src=\"https://ajax.googleapis.com/ajax/libs/" .
			"jquery/" . $this->jqueryVersion . "/jquery.min.js\"></script>";
		return $jquery . $html;
	}

}