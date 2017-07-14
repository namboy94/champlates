<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 10:45 PM
 */

namespace chameleon_widgets;
use chameleon\Dictionary;
use chameleon\HtmlElement;


/**
 * Class NavbarButton
 * A Button on a Navbar
 * @package chameleon_widgets
 */
class NavbarButton extends HtmlElement {

	/**
	 * NavbarButton constructor.
	 * @param Dictionary $dictionary: The dictionary used for translation
	 * @param Hyperlink $title: The title of the button
	 * @param bool $isSelected: The target link of the button
	 */
	public function __construct(Dictionary $dictionary,
								Hyperlink $title,
								bool $isSelected){
		$template = __DIR__ . "/templates/navbar_button.html";
		parent::__construct($template, $dictionary);

		$active = $isSelected ? 'class="active"' : '';
		$this->bindParams([
			"TITLE" => $title->text,
			"LINK" => $title->link,
			"SELECTED" => $active
		]);
	}
}