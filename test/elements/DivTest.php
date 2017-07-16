<?php
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