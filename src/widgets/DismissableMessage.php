<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 1:21 AM
 */

namespace chameleon_widgets;
use InvalidArgumentException;
use chameleon\Dictionary;
use chameleon\HtmlElement;


/**
 * Class DismissableMessage
 * A dismissable Bootstrap message over 12 columns
 * @package chameleon_widgets
 */
class DismissableMessage extends HtmlElement {

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
