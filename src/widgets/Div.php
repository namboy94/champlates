<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 10:11 PM
 */

namespace chameleon;


/**
 * Class Div
 * A Simple Div element
 * @package chameleon_widgets
 */
class Div extends HtmlTemplate {

	/**
	 * Div constructor.
	 * @param array $content: The content inside the div
	 * @param array $classes: The classes of the div, as an array of strings
	 */
	public function __construct(array $content, array $classes) {
		parent::__construct(__DIR__ . "/templates/div.html", null);

		$classDefinition = "";
		foreach ($classes as $class) {
			$classDefinition .= $class . " ";
		}
		$this->bindParam("CLASS", $classDefinition);
		$this->addCollectionFromArray("CONTENT", $content);
	}

}