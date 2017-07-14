<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 11:58 PM
 */

namespace chameleon_widgets;
use chameleon\HtmlElement;

/**
 * Class GoogleAnalyticsScript
 * The Google Analytics Initialization Script
 * @package chameleon_widgets
 */
class GoogleAnalyticsScript extends HtmlElement {

	/**
	 * GoogleAnalyticsScript constructor.
	 * @param string $trackingId: The Tracking Code for the website
	 */
	public function __construct(string $trackingId) {
		parent::__construct(__DIR__ . "/templates/google_analytics.html",
			null);
		$this->bindParam("TRACKING_CODE", $trackingId);
	}

}