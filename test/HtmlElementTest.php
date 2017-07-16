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

use PHPUnit\Framework\TestCase;
use chameleon\HtmlElement;


/**
 * Class HtmlElementTest
 * Tests the HtmlElement functionality
 */
class HtmlElementTest extends TestCase {

	/**
	 * Tests generating a simple h1 element
	 */
	public function testGeneratingH1Element() {
		$element = new HtmlElement("h1", []);
		$this->assertEquals("<h1></h1>", $element->render("en"));
	}

	/**
	 * Tests generating an HTML element
	 */
	public function testGeneratingWithCustomClassesAndId() {
		$element = new HtmlElement("tag", [], ["a-class"], "a-id");
		$this->assertEquals(
			"<tag class=\"a-class\" id=\"a-id\"></tag>",
			$element->render("en")
		);
	}

	/**
	 * Tests changing the id, tag and classes after object creation
	 */
	public function testChangingParameters() {
		$element = new HtmlElement("tag", [], ["a-class"], "a-id");
		$element->changeTag("p");
		$element->changeId("tag");
		$element->addClass("test");
		$this->assertEquals(
			"<p class=\"a-class test\" id=\"tag\"></p>",
			$element->render("en")
		);
	}

}