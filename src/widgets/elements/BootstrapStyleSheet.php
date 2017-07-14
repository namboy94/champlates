<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 12:41 AM
 */

namespace chameleon_widgets;


/**
 * Class BootstrapStyleSheet
 * Integrates the Bootstrap stylesheet
 * @package chameleon_widgets
 */
class BootstrapStyleSheet extends Stylesheet {

	/**
	 * BootstrapStyleSheet constructor.
	 * @param string $version: The Bootrap Version to use
	 */
	public function __construct(string $version = "3.3.7") {
		$href = "https://maxcdn.bootstrapcdn.com/bootstrap/" . $version .
			"/css/bootstrap.min.css";
		parent::__construct($href);
	}

}