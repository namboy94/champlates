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
 * Class HtmlTemplateCollection
 * Wrapper around multiple HtmlElements that renders them in succession
 * @package chameleon
 */
class HtmlTemplateCollection {

	/**
	 * HtmlTemplateCollection constructor.
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