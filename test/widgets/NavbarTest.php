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

use chameleon\NavbarLogo;
use PHPUnit\Framework\TestCase;
use chameleon\NavbarButton;
use chameleon\NavbarDropdown;
use chameleon\Navbar;
use chameleon\Hyperlink;
use chameleon\Footer;

/**
 * Class NavbarTest
 * Tests the Navbar* classes
 */
class NavbarTest extends TestCase {

	/**
	 * Tests the creation of a Navbar with buttons, dropdowns and icons
	 */
	public function testNavbarCreation() {

		$logo = new NavbarLogo("logo", "logolink");
		$leftButton = new NavbarButton(null, new Hyperlink("L", "l"), true);
		$rightButton = new NavbarButton(null, new Hyperlink("R", "r"), false);
		$dropDown = new NavbarDropdown(null, "Drop", [
			new NavbarButton(null, new Hyperlink("D", "d"), false)
		]);
		$navbar = new Navbar(
			null,
			new Hyperlink("N", "n"),
			[$leftButton],
			[$rightButton, $dropDown],
			$logo
		);

		$result = file_get_contents(__DIR__ . "/results/navbar.html");
		$this->assertEquals($result, $navbar->render(""));
	}

	/**
	 * Tests generating a Footer
	 */
	public function testFooter() {

		$footer = new Footer(null, new Hyperlink("F", "f"), [], []);
		$this->assertEquals(
			file_get_contents(__DIR__ . "/results/footer.html"),
			$footer->render("")
		);
		$footer = new Footer(null, new Hyperlink("F", "f"), [], [], true);
		$this->assertEquals(
			file_get_contents(__DIR__ . "/results/fixed_footer.html"),
			$footer->render("")
		);


	}

}