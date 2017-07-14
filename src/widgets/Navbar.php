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

	/**
	 * @var array: An array of either NavbarButtons or NavbarDropdowns,
	 *             displayed on the right side of the navbar.
	 */
	private $rightElements;

	/**
	 * @var array: An array of either NavbarButtons or NavbarDropdowns,
	 *             displayed on the left side of the navbar.
	 */
	private $leftElements;

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

		$template = __DIR__ . "/templates/navbar.html";
		parent::__construct($template, $dictionary);
		$this->bindParams(["TITLE" => $title->text, "LINK" => $title->link]);
		$this->addInnerElement("LOGO", $logo);
		$this->rightElements = $rightElements;
		$this->leftElements = $leftElements;
	}

	/**
	 * Inserts the left and right Navbar elements before rendering
	 * @param string $language: The language in which to render
	 * @return string: The rendered HTML string
	 */
	public function render(string $language): string {

		$right = "";
		foreach ($this->rightElements as $rightElement) {
			$right .= $rightElement->render($language);
		}

		$left = "";
		foreach ($this->leftElements as $leftElement) {
			$right .= $leftElement->render($language);
		}

		$this->bindParams(["RIGHT" => $right, "LEFT" => $left]);
		return parent::render($language);
	}
}