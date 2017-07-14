<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 1:44 AM
 */

namespace chameleon_widgets;
use chameleon\Dictionary;
use chameleon\HtmlElement;


/**
 * Class TitleJumboTron
 * A Jumbotron with Text imposed on it and an optional image background
 * @package chameleon_widgets
 */
class TitleJumboTron extends HtmlElement {

	/**
	 * TitleJumboTron constructor.
	 * @param Dictionary $dictionary: The Dictionary to use for translations
	 * @param string $title: The title of the jumbotron
	 * @param null|string $image: The image displayed as background
	 */
	public function __construct(Dictionary $dictionary,
								string $title,
								? string $image = null) {

		$template = __DIR__ . "/templates/title_jumbotron.html";
		parent::__construct($template, $dictionary);

		if ($image === null) {
			$imageStyle = "";
		} else {
			$imageStyle = "style=\"background-image: url(" . $image .
				"); background-size: cover;\"";
		}

		$this->bindParams(
			["BACKGROUND_IMAGE" => $imageStyle, "TITLE" => $title]
		);

	}

}