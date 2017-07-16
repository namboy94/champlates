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

use PHPUnit\Framework\TestCase;
use chameleon\Div;


/**
 * Class DivTest
 * Tests the Div class
 */
class DivTest extends TestCase {

	/**
	 * Tests generating a Div object and checks the render result
	 */
	public function testDivGeneration() {
		$div = new Div([], ["a"], "b");
		$this->assertEquals(
			"<div class=\"a\" id=\"b\"></div>",
			$div->render("en")
		);
	}
}