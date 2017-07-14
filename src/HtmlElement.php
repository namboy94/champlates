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
 * Class HtmlElement
 * Class that provides base methods for HTML Element object, which can
 * be rendered to HTML
 * @package chameleon
 */
class HtmlElement {

	/**
	 * HtmlElement constructor.
	 * @param string $template: An HTML file that acts as a template for this
	 *                          HTML element
	 * @param Dictionary $dictionary: The dictionary used for translating
	 *                                words inside this element
	 * @param string $variableIdentifier: Can be customized to use different
	 *                                    identifying structures for inner
	 *                                    variables. The 'VAR' will be replaced
	 *                                    with the actual variable name
	 */
	public function __construct(string $template,
								Dictionary $dictionary,
								string $variableIdentifier = "@{VAR}") {

		$this->template = $template;
		$this->dictionary = $dictionary;
		$this->variableIdentifier = $variableIdentifier;
		$this->params = [];
		$this->innerElements = [];
	}

	/**
	 * Adds a replacement string for a given key variable name
	 * @param string $name: The Key variable name
	 * @param string $value: The replacement value
	 */
	public function bind_param(string $name, string $value) {
		$this->params[$name] = $value;
	}

	/**
	 * Adds multiple replacement strings like bind_param does
	 * @param array $params: The parameters consisting of [name => value]
	 */
	public function bind_params(array $params) {
		foreach ($params as $name => $value) {
			$this->bind_param($name, $value);
		}
	}

	/**
	 * Adds a child HtmlElement and defines where it will be inserted
	 * @param string $name: The identifier key for the element
	 * @param HtmlElement $element: The element itself
	 */
	public function addInnerElement(string $name, HtmlElement $element) {
		$this->innerElements[$name] = $element;
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
			$innerHtml = $element->render($language);
			$search = $this->generateReplaceKey($name);
			$html = str_replace($search, $innerHtml, $html);
		}

		foreach ($this->params as $name => $value) {
			$search = $this->generateReplaceKey($name);
			$html = str_replace($search, $value, $html);
		}

		return $this->dictionary->translate($html, $language);
	}

	/**
	 * Generates a string which can be used by str_replace to replace
	 * variable placeholders
	 * @param string $name: The name of the key
	 * @return string: The generated replace key
	 */
	public function generateReplaceKey(string $name) : string {
		return str_replace("VAR", $name, $this->variableIdentifier);
	}

	/**
	 * Echoes the HTML element content.
	 * @param string $language: The language in which to display the page in.
	 */
	public function display(string $language) {
		echo $this->render($this->render($language));
	}

}