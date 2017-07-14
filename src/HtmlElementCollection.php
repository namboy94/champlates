<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 12:03 AM
 */

namespace chameleon;


/**
 * Class HtmlElementCollection
 * Wrapper around multiple HtmlElements that renders them in succession
 * @package chameleon
 */
class HtmlElementCollection {

	/**
	 * HtmlElementCollection constructor.
	 * @param string $name: The name of this collection. Will be used when
	 *                      replacing elements of the template
	 * @param array $elements : The elements to collect
	 */
	public function __construct(string $name, array $elements) {
		$this->name = $name;
		$this->elements = $elements;
	}

	/**
	 * Renders the individual elements and appends them to each other
	 * @param string $language: The language in which to render
	 * @return string: The rendered string
	 */
	public function render(string $language) {
		$content = "";
		foreach ($this->elements as $element) {
			$content .= $element->render($language);
		}
		return $content;
	}
}