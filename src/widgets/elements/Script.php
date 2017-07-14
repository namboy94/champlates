<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 11:56 PM
 */

namespace chameleon_widgets;
use chameleon\HtmlElement;


/**
 * Class Script
 * Light wrapper around a JavaScript script for integration with other
 * HTML Elements
 * @package chameleon_widgets
 */
class Script extends HtmlElement {

	/**
	 * Script constructor.
	 * @param string $script: The script to execute. Will only be wrapped
	 *                        in <script> tags.
	 */
	public function __construct(string $script) {
		parent::__construct(__DIR__ . "/templates/script.html", null);
		$this->bindParam("SCRIPT", $script);
	}

}