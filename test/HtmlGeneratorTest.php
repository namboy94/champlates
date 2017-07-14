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

use chameleon\Dictionary;
use chameleon\HtmlElement;
use PHPUnit\Framework\TestCase;


/**
 * Class HtmlGeneratorTest
 * Tests the generation of various HTML Elements
 */
class HtmlGeneratorTest extends TestCase {

	/**
	 * Tests generating an HTML Element in en and de languages
	 */
	public function testGeneratingHtml() {
		$dict = new Dictionary(__DIR__ . "/resources/translations/valid");
		$gen = new HtmlElement(__DIR__ . "/resources/html/base.html", $dict);
		$inner =
			new HtmlElement(__DIR__ . "/resources/html/inner.html", $dict);

		$gen->bindParams(
			["PLACEHOLDER" => "<h1>This was a placeholder</h1>"]);
		$gen->addInnerElements(["INNER" => $inner]);

		$en = file_get_contents(__DIR__ . "/resources/html/rendered-en.html");
		$de = file_get_contents(__DIR__ . "/resources/html/rendered-de.html");

		$this->assertEquals($en, $gen->render("en"));
		$this->assertEquals($de, $gen->render("de"));
	}
	
}