<?php
/**
 * Copyright Hermann Krumrey <hermann@krumreyh.com> 2017
 *
 * This file is part of champlates.
 *
 * champlates is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * champlates is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with champlates.  If not, see <http://www.gnu.org/licenses/>.
 */

use chameleon\Script;
use PHPUnit\Framework\TestCase;
use chameleon\Header;
use chameleon\BootstrapScript;
use chameleon\BootstrapStyleSheet;
use chameleon\GoogleAnalyticsScript;
use chameleon\ReCaptchaScript;
use chameleon\GoogleFont;

/**
 * Class HeaderTest
 * Tests Header-related functionality
 */
class HeaderTest extends TestCase {

	/**
	 * Tries creating a header with all the pre-defined scripts
	 * and stylesheets
	 */
	public function testCreatingHeader() {

		$bootstrapJs = new BootstrapScript();
		$bootstrapCss = new BootstrapStyleSheet();

		$analytics = new GoogleAnalyticsScript("ANA");
		$recaptcha = new ReCaptchaScript();
		$font = new GoogleFont("Font");

		$script = new Script("AAA");

		$header = new Header(null, "Title", "iconfile",
			[$bootstrapJs, $analytics, $recaptcha, $script],
			[$bootstrapCss, $font]);

		$this->assertEquals($header->render(""), file_get_contents(__DIR__ .
			"/results/header.html"));
	}

}