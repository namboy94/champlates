<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 11:56 PM
 */

namespace chameleon_widgets;
use chameleon\HtmlElement;


/**
 * Class Stylesheet
 * Light wrapper around a stylesheet for better integration with other
 * HTML Elements
 * @package chameleon_widgets
 */
class Stylesheet extends HtmlElement {

	/**
	 * Stylesheet constructor.
	 * @param string $href: The location of the CSS file
	 */
	public function __construct(string $href) {
		parent::__construct(__DIR__ . "/templates/stylesheet.html", null);
		$this->bindParam("HREF", $href);
	}
}
