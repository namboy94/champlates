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
use champlates\DismissableMessage;


/**
 * Class DismissableMessageTest
 * Tests the DismissableMessage widget
 */
class DismissableMessageTest extends TestCase {

	/**
	 * Tests generating Dismissable messages of every type
	 */
	public function testGeneratingDismissableMessage() {

		foreach (["danger"] as $type) {
			$msg = new DismissableMessage(null, $type, "A", "B");
			$this->assertEquals($msg->render("en"),
				file_get_contents(__DIR__ .
				"/results/dismissable_" . $type . ".html"));
		}
	}

	/**
	 * Tests generating an invalid Dismissable Message
	 */
	public function testGeneratingInvalidDismissableMessage() {
		try {
			new DismissableMessage(null, "blargh", "A", "B");
			$this->fail();
		} catch (InvalidArgumentException $e) {
			$this->assertEquals($e->getMessage(), "Invalid message type");
		}
	}
}