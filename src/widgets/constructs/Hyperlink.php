<?php

/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 3:00 PM
 */

namespace chameleon_widgets;


/**
 * Class Hyperlink
 * Models a simple Hyperlink
 * @package chameleon
 */
class Hyperlink {

	/**
	 * Hyperlink constructor.
	 * @param string $text: The text of the hyperlink
	 * @param string $link: The link to which the hyperlink leads to
	 */
	public function __construct(string $text, string $link) {
		$this->text = $text;
		$this->link = $link;
	}

}
