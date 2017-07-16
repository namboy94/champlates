<?php
use PHPUnit\Framework\TestCase;
use chameleon_bootstrap\Col;
use chameleon_bootstrap\Row;
use chameleon_bootstrap\Container;


/**
 * Class BootstrapElementsTest
 * Tests the various Bootstrap Elements
 */
class BootstrapElementsTest extends TestCase {

	/**
	 * Tests creating a Col from an int size value
	 */
	public function testCreatingColFromInt() {
		$col = new Col([], 3, ["a"], "b");
		$this->assertEquals(
			"<div class=\"col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 a\" " .
			"id=\"b\"></div>",
			$col->render("en")
		);
	}

	/**
	 * Tests creating a Col from an array of size values
	 */
	public function testCreatingColFromArray() {
		$col = new Col([], [1, 2, 3, 4, 5], ["a"], "b");
		$this->assertEquals(
			"<div class=\"col-1 col-sm-2 col-md-3 col-lg-4 col-xl-5 a\" " .
			"id=\"b\"></div>",
			$col->render("en")
		);
	}

	/**
	 * Tests creating a Col with invalid size values
	 */
	public function testCreatingColWithInvalidSizeValues() {

		$errors = [
			"Not an int or array" => "5",
			"Invalid amount of size parameters" => [1, 2, 3, 4],
			"Invalid Bootstrap column Size1" => [1, 2, 3, 4, 100],
			"Invalid Bootstrap column Size2" => [0, 1, 2, 3, 4],
			"Invalid Bootstrap column Size3" => [1, 2, -3, 4, 5]
		];

		foreach ($errors as $message => $sizeValue) {
			try {
				new Col([], $sizeValue);
				$this->fail();
			} catch (InvalidArgumentException $e) {
				$this->assertStringStartsWith($e->getMessage(), $message);
			}
		}
	}

	/**
	 * Test generating Bootstrap Containers
	 */
	public function testGeneratingContainers() {
		$fluid = new Container([], true);
		$nonFluid = new Container([]);

		$this->assertEquals($fluid->render("en"),
			"<div class=\"container-fluid\"></div>");
		$this->assertEquals($nonFluid->render("en"),
			"<div class=\"container\"></div>");

	}

	/**
	 * Tests generating a Bootstrap row
	 */
	public function testGeneratingRow() {
		$row = new Row([]);
		$this->assertEquals($row->render("en"), "<div class=\"row\"></div>");
	}

}