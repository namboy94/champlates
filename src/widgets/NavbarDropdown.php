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
 * Class NavbarDropdown
 * Models a Dropdown menu in a Navbar
 * @package chameleon_widgets
 */
class NavbarDropdown extends HtmlElement {

	/**
	 * @var array: A list of NavbarButtons
	 */
	private $entries;

	/**
	 * NavbarDropdown constructor.
	 * @param Dictionary $dictionary: The dictionary used for translation
	 * @param string $title: The title of the Dropdown
	 * @param array $entries: The elements inside the Dropdown
	 */
	public function __construct(Dictionary $dictionary,
								string $title,
								array $entries) {

		$template = __DIR__ . "/templates/navbar_dropdown.html";
		parent::__construct($template, $dictionary);
		$this ->entries = $entries;
		$this->bindParam("TITLE", $title);
		$this->addCollectionFromArray("ENTRIES", $entries);
	}


}