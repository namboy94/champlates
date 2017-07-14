<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 11:56 PM
 */

namespace chameleon_widgets;


/**
 * Class GoogleFont
 * Enables the use of Google Fonts in Html Elements
 * @package chameleon_widgets
 */
class GoogleFont extends Stylesheet {

	/**
	 * GoogleFont constructor.
	 * @param string $fontFamily: The font family to use
	 */
	public function __construct($fontFamily) {
		$href = "https://fonts.googleapis.com/css?family=" . $fontFamily;
		parent::__construct($href);
	}

}