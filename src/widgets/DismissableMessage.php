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
use InvalidArgumentException;
use chameleon\Dictionary;
use chameleon\HtmlTemplate;


/**
 * Class DismissableMessage
 * A dismissable Bootstrap message over 12 columns
 * @package chameleon_widgets
 */
class DismissableMessage extends HtmlTemplate {

	/**
	 * DismissableMessage constructor.
	 * @param Dictionary $dictionary: The dictionary to use for translation
	 * @param string $type: The type of message. Can be danger, success, info
	 *                      or warning
	 * @param string $title: The title of the message
	 * @param string $body: The body of the message
	 * @throws InvalidArgumentException: If a wrong $type was provided
	 */
	public function __construct(Dictionary $dictionary,
								string $type, string $title, string $body) {
		$template = __DIR__ . "/templates/dismissable_message.html";
		parent::__construct($template, $dictionary);

		if (!in_array($type, ["danger", "success", "info", "warning"])) {
			throw new InvalidArgumentException("Invalid message type");
		}

		$this->bindParams(
			["TYPE" => $type, "TITLE" => $title, "BODY" => $body]
		);
	}
}
