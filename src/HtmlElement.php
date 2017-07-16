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
 * A simple PHP representation of an HTML element
 * @package chameleon
 */
class HtmlElement extends HtmlTemplate {

	/**
	 * @var array: The classes of this Html Element
	 */
	public $classes = [];

	/**
	 * HtmlElement constructor.
	 * @param string $tag : The tag of the element. For example, h1 or div etc.
	 * @param array $content : The content of the Html Element. Can be
	 *                        other HtmlElements, HtmlTemplates or even
	 *                        HtmlTemplateCollections.
	 * @param array $classes : Optionally defines the classes of the element.
	 * @param null|string $id: Optionally defines the id of the element.
	 */
	public function __construct(string $tag,
								array $content,
								array $classes = [],
								? string $id = null) {

		parent::__construct(__DIR__ . "/templates/html_element.html", null);

		$this->addClasses($classes);
		$this->bindParam("TAG", $tag);
		$this->changeId($id);
		$this->addCollectionFromArray("CONTENT", $content);
	}

	/**
	 * Adds a CSS class to the Html Element
	 * @param string $class: The class to as
	 */
	public function addClass(string $class) {
		array_push($this->classes, $class);
	}

	/**
	 * Adds multiple classes
	 * @param array $classes: The classes to add
	 */
	public function addClasses(array $classes) {
		foreach ($classes as $class) {
			$this->addClass($class);
		}
	}

	/**
	 * Changes the HTML tag type
	 * @param string $tag: The new tag
	 */
	public function changeTag(string $tag) {
		$this->params["TAG"] = $tag;
	}

	/**
	 * Changes the Html Element's ID
	 * @param string|null $id: The new ID
	 */
	public function changeId(
		? string $id
	) {
		$this->params["ID"] = ($id === null) ? "" : " id=\"" . $id . "\"";
	}

	/**
	 * Renders the HTML representation of the Element. Before that, the
	 * CSS class string is generated
	 * @param string $language: The language in which to render
	 * @return string: The rendered HTML
	 */
	public function render(string $language): string {

		$classString = "";
		if (count($this->classes) > 0) {
			$classString = " class=\"";
			foreach ($this->classes as $class) {
				$classString .= $class . " ";
			}

			// Remove trailing space
			$classString = substr($classString, 0, -1);

			$classString .= "\"";
		}
		$this->bindParam("CLASS", $classString);
		return parent::render($language);
	}
}