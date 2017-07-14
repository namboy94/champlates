<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 12:36 AM
 */

namespace chameleon_widgets;
use chameleon\HtmlElement;


/**
 * Class RemoteScript
 * Light wrapper around a remote JavaScript script for better integration with
 * other HTML Elements
 * @package chameleon_widgets
 */
class RemoteScript extends HtmlElement {

	/**
	 * RemoteScript constructor.
	 * @param string $src: The URL for the remote script
	 */
	public function __construct(string $src) {
		parent::__construct(__DIR__ . "/templates/remote_script.html", null);
		$this->bindParam("SRC", $src);
	}

}