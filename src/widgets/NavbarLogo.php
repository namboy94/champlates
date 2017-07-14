<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 10:10 PM
 */

namespace chameleon_widgets;
use chameleon\Dictionary;
use chameleon\HtmlElement;


/**
 * Class NavbarLogo
 * Models a Logo in a Navbar
 * @package chameleon_widgets
 */
class NavbarLogo extends HtmlElement {

	/**
	 * NavbarLogo constructor.
	 * @param string $logoFile: The path to the logo's file
	 * @param string $logoLink: The URL that the logo points to
	 */
	public function __construct(string $logoFile,
								string $logoLink) {
		$template = __DIR__ . "/templates/navbar_logo.html";
		parent::__construct($template, null);
		$this->bindParams(["FILE" => $logoFile, "LINK" => $logoLink]);
	}

}