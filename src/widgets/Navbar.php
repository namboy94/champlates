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

/**
 * Class Navbar
 * Models a bootstrap Navbar
 * @package chameleon_widgets
 */
class Navbar extends HtmlElement {

	/**
	 * Navbar constructor.
	 * @param Dictionary $dictionary: The dictionary used to translate
	 * @param Hyperlink $title: The title of the navbar
	 * @param array $leftElements: The left elements of the navbar.
	 * @param array $rightElements: The right elements of the navbar.
	 * @param NavbarLogo|null $logo: The logo of the navbar. Can be left empty.
	 */
	public function __construct(Dictionary $dictionary,
								Hyperlink $title,
								array $leftElements = [],
								array $rightElements = [],
								? NavbarLogo $logo = null){

		parent::__construct(__DIR__ . "/templates/navbar.html", $dictionary);
		$this->bindParams(["TITLE" => $title->text, "LINK" => $title->link]);
		$this->addInnerElement("LOGO", $logo);
		$this->addCollectionFromArray("LEFT", $leftElements);
		$this->addCollectionFromArray("RIGHT", $rightElements);
	}
}