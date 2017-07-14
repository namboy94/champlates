<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 11:39 PM
 */

namespace chameleon_widgets;
use chameleon\Dictionary;
use chameleon\HtmlElement;


/**
 * Class Header
 * Models the Header at the start of an HTML file.
 * @package chameleon_widgets
 */
class Header extends HtmlElement {

	/**
	 * Header constructor.
	 * @param Dictionary $dictionary: The dictionary used to translate strings
	 * @param string $title: The title of the web page
	 * @param string $icon: The icon of the web page
	 * @param array $scripts: The scripts executed at the start of the page
	 * @param array $stylesheets: The stylesheets included in this page
	 * @param array $googleFonts: The google fonts included in this page
	 */
	public function __construct(Dictionary $dictionary,
								string $title,
								string $icon,
								array $scripts = [new BootstrapScript()],
								array $stylesheets =
								[new BootstrapStylesheet()],
								array $googleFonts = []) {

		parent::__construct(__DIR__ . "/templates/header.html", $dictionary);
		$this->bindParams(["TITLE" => $title, "ICON" => $icon]);
		$this->addCollectionFromArray("SCRIPTS", $scripts);
		$this->addCollectionFromArray("STYLESHEETS", $stylesheets);
		$this->addCollectionFromArray("GOOGLEFONTS", $googleFonts);
	}
}