<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 12:24 AM
 */

namespace chameleon_widgets;


/**
 * Class ReCaptchaScript
 * Script that integrates Google's ReCaptcha
 * @package chameleon_widgets
 */
class ReCaptchaScript extends RemoteScript {

	/**
	 * ReCaptchaScript constructor.
	 */
	public function __construct() {
		parent::__construct("https://www.google.com/recaptcha/api.js");
	}

}