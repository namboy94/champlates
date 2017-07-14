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


class Header extends HtmlElement {

	public function __construct(Dictionary $dictionary,
								string $title,
								string $icon,
								bool $useCaptcha = false,
								bool $useBootstrap = true,
								array $scripts = [],
								array $stylesheets = [],
								array $googleFonts = []) {

		parent::__construct(__DIR__ . "/templates/header.html", $dictionary);
		$this->bindParams(["TITLE" => $title, "ICON" => $icon]);

		if ($useCaptcha) {

		}
		if ($useBootstrap) {

		}

	}

}