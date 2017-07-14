<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 12:24 AM
 */

namespace chameleon_widgets;


/**
 * Class BootstrapScript
 * The Bootstrap Javascript Component
 * @package chameleon_widgets
 */
class BootstrapScript extends RemoteScript {

	/**
	 * @var string: The JQuery version to use
	 */
	private $jqueryVersion;

	/**
	 * BootstrapScript constructor.
	 * @param string $version: The Bootstrap Version to use
	 * @param string $jqueryVersion: The Jquery Version to use
	 */
	public function __construct(string $version = "3.3.7",
								string $jqueryVersion = "3.1.1") {

		$this->jqueryVersion = $jqueryVersion;
		$src = "https://maxcdn.bootstrapcdn.com/bootstrap/" . $version .
			"/js/bootstrap.min.js";
		parent::__construct($src);
	}

	/**
	 * Prepends the JQuery script because bootstrap depends on it
	 * @param string $language: The language in which to render
	 * @return string: The rendered HTML string
	 */
	public function render(string $language): string {
		$html = parent::render($language);
		$jquery = "<script src=\"https://ajax.googleapis.com/ajax/libs/" .
			"jquery/" . $this->jqueryVersion . "/jquery.min.js\"></script>";
		return $jquery . $html;
	}

}