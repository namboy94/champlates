<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 9:38 PM
 */

namespace chameleon_widgets;
use chameleon\Dictionary;
use chameleon\HtmlElement;
use chameleon\Hyperlink;

/**
 * Class Navbar
 * Models a bootstrap Navbar
 * @package chameleon_widgets
 */
class Navbar extends HtmlElement {

	public function __construct(Dictionary $dictionary,
								Hyperlink $title,
								array $leftElements = [],
								array $rightElements = [],
								NavbarLogo $logo = null){

		$template = __DIR__ . "/templates/navbar.html";
		parent::__construct($template, $dictionary);
		$this->bindParams(["TITLE" => $title->text, "LINK" => $title->link]);
		$this->addInnerElement("LOGO", $logo);
	}

}