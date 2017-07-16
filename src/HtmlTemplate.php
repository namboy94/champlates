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
 * Class HtmlTemplate
 * Class that provides base methods for HTML Element object, which can
 * be rendered to HTML
 * @package chameleon
 */
class HtmlTemplate {

	/**
	 * HtmlTemplate constructor.
	 * The identifiers are used to identify segments in the template that
	 * will be filled by strings, other HtmlElements or translated words.
	 * @param string $template : An HTML file that acts as a template for this
	 *                          HTML element
	 * @param Dictionary $dictionary : The dictionary used for translating
	 *                                words inside this element
	 * @param string $paramIdentifier: Identifier for strings to be inserted
	 * @param string $innerIdentifier: identifier for inner HtmlElements
	 * @SuppressWarnings functionMaxParameters
	 */
	public function __construct(string $template,
								? Dictionary $dictionary,
								string $paramIdentifier = "#{KEY}",
								string $innerIdentifier = "&{KEY}") {

		$this->template = $template;
		$this->dictionary = $dictionary;
		$this->paramIdentifier = $paramIdentifier;
		$this->innerIdentifier = $innerIdentifier;
		$this->params = [];
		$this->innerElements = [];
		$this->collections = [];
	}

	/**
	 * Adds a replacement string for a given key variable name
	 * @param string $name: The Key variable name
	 * @param string $value: The replacement value
	 */
	public function bindParam(string $name, string $value) {
		$this->params[$name] = $value;
	}

	/**
	 * Adds multiple replacement strings like bind_param does
	 * @param array $params: The parameters consisting of [name => value]
	 */
	public function bindParams(array $params) {
		foreach ($params as $name => $value) {
			$this->bindParam($name, $value);
		}
	}

	/**
	 * Adds a child HtmlTemplate and defines where it will be inserted
	 * Null Elements will replace with an empty string "".
	 * @param string $name: The identifier key for the element
	 * @param HtmlTemplate|null $element: The element itself
	 */
	public function addInnerElement(string $name, ? HtmlTemplate $element) {
		$this->innerElements[$name] = $element;
	}

	/**
	 * Adds multiple inner Html Elements
	 * @param array $elements: The elements to add
	 */
	public function addInnerElements(array $elements) {
		foreach ($elements as $name => $element) {
			$this->addInnerElement($name, $element);
		}
	}

	/**
	 * Adds a HtmlTemplateCollection to the HtmlTemplate
	 * @param HtmlTemplateCollection $collection: The Collection to add
	 */
	public function addCollection(HtmlTemplateCollection $collection) {
		$this->innerElements[$collection->name] = $collection;
	}

	/**
	 * Creates a HtmlTemplateCollection from an array and adds it
	 * @param string $name: The name of the collection
	 * @param array $elements: The elements in the collection
	 */
	public function addCollectionFromArray(string $name, array $elements) {
		$collection = new HtmlTemplateCollection($name, $elements);
		$this->addCollection($collection);
	}

	/**
	 * Renders the HTML Element to an HTML string. All inner HTML Elements
	 * are inserted as well as parameter string and then translated into the
	 * specified language
	 * @param string $language: The language into which to translate the HTML
	 *                          Element into
	 * @return string: The rendered HTML
	 */
	public function render(string $language) : string {
		$html = file_get_contents($this->template);

		foreach ($this->innerElements as $name => $element) {
			$search = $this->generateInnerKey($name);
			$innerHtml =
				($element !== null) ? $element->render($language) : "";
			$html = str_replace($search, $innerHtml, $html);
		}

		foreach ($this->params as $name => $value) {
			$search = $this->generateParamKey($name);
			$html = str_replace($search, $value, $html);
		}

		if ($this->dictionary === null) {
			return $html;
		} else {
			return $this->dictionary->translate($html, $language);
		}
	}

	/**
	 * Generates a string which can be used by str_replace to replace
	 * variable placeholder string/params
	 * @param string $name: The name of the param key
	 * @return string: The generated param replace key
	 */
	public function generateParamKey(string $name) : string {
		return str_replace("KEY", $name, $this->paramIdentifier);
	}

	/**
	 * Generates a string which can be used by str_replace to inner
	 * HtmlTemplate placeholders.
	 * @param string $name: The name of the inner element key
	 * @return string: The generated inner element replace key
	 */
	public function generateInnerKey(string $name) : string {
		return str_replace("KEY", $name, $this->innerIdentifier);
	}

	/**
	 * Echoes the HTML element content.
	 * @param string $language: The language in which to display the page in.
	 * @codeCoverageIgnore
	 */
	public function display(string $language) {
		echo $this->render($language);
	}

}