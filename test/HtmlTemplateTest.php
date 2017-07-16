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
use chameleon\HtmlTemplate;
use PHPUnit\Framework\TestCase;


/**
 * Class HtmlTemplateTest
 * Tests the generation of various HTML Elements
 */
class HtmlTemplateTest extends TestCase {

	/**
	 * Tests generating an HTML Element in en and de languages
	 */
	public function testGeneratingHtml() {
		$dict = new Dictionary(__DIR__ . "/resources/translations/valid");
		$gen = new HtmlTemplate(__DIR__ . "/resources/html/base.html", $dict);
		$inner =
			new HtmlTemplate(__DIR__ . "/resources/html/inner.html", $dict);

		$gen->bindParams(
			["PLACEHOLDER" => "<h1>This was a placeholder</h1>"]);
		$gen->addInnerElements(["INNER" => $inner]);

		$en = file_get_contents(__DIR__ . "/resources/html/rendered-en.html");
		$de = file_get_contents(__DIR__ . "/resources/html/rendered-de.html");

		$this->assertEquals($en, $gen->render("en"));
		$this->assertEquals($de, $gen->render("de"));
	}

	/**
	 * Tests if rendering with a null Dictionary ignores
	 * any strings to translate
	 */
	public function testRenderingWithNullDictionary() {
		$template = __DIR__ . "/resources/html/nulldict.html";
		$gen = new HtmlTemplate($template, null);
		$this->assertEquals($gen->render("en"), file_get_contents($template));
	}

	/**
	 * Tests rendering a null inner element
	 */
	public function testRenderingNullInnerElement() {
		$dict = new Dictionary(__DIR__ . "/resources/translations/valid");
		$template = __DIR__ . "/resources/html/nullelement.html";
		$render = file_get_contents(__DIR__ .
			"/resources/html/nullelement-render.html");

		$gen = new HtmlTemplate($template, $dict);
		$gen->addInnerElement("NULL", null);

		$this->assertEquals($gen->render("en"), $render);
	}

	/**
	 * Tests rendering a HTML Element Collection
	 */
	public function testRenderingCollections() {
		$dict = new Dictionary(__DIR__ . "/resources/translations/valid");
		$template = __DIR__ . "/resources/html/collection.html";
		$innerTemplate = __DIR__ . "/resources/html/inner.html";
		$render = file_get_contents(__DIR__ .
			"/resources/html/collection-render.html");

		$inner = new HtmlTemplate($innerTemplate, $dict);

		$gen = new HtmlTemplate($template, $dict);
		$gen->addCollectionFromArray(
			"COLLECTION",
			[$inner, $inner]
		);

		$this->assertEquals($render, $gen->render("en"));
	}

}