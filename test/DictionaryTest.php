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

use champlates\Dictionary;
use PHPUnit\Framework\TestCase;


/**
 * Class DictionaryTest
 * Tests the translation of strings
 * @property Dictionary dictionary: The dictionary used in testing
 * @property string translationDir: The directory containing translations
 *                                  for testing
 * @property string validDir: The directory containing valid translation files
 */
class DictionaryTest extends TestCase {

	/**
	 * Initializes a Dictionary object
	 */
	public function setUp() {
		parent::setUp();
		$this->translationDir = __DIR__ . "/resources/translations/";
		$this->validDir = $this->translationDir . "valid";
		$this->dictionary = new Dictionary($this->validDir);
	}

	/**
	 * Tests constructing A Dictionary object with valid arguments
	 */
	public function testConstructingValidDictionary() {
		$dirDictionary = new Dictionary($this->translationDir . "valid");
		$fileDictionary = new Dictionary($this->translationDir .
			"valid/en-test.json");

		$this->assertEquals(
			$dirDictionary->get("HELLO", "en"),
			$fileDictionary->get("HELLO", "en"),
			"World"
		);

		$this->assertEquals(
			$dirDictionary->get("GOOD", "en"),
			$fileDictionary->get("GOOD", "en"),
			"Day"
		);
	}

	/**
	 * Tests constructing a dictionary with invalid translation files.
	 * Tests: 1. A non-existent path
	 *        2. A path containing duplicate keys
	 *        3. A path containing no JSON files
	 */
	public function testConstructingInvalidDictionary() {

		$tests = [
			"doesn't exist" => "Not a directory or file",
			"invalid/duplicates" => "Duplicate key",
			"invalid/empty" => "No Translations Loaded"
		];

		foreach ($tests as $path => $errorMsg) {
			try {
				new Dictionary($this->translationDir . $path);
				$this->fail();
			} catch (InvalidArgumentException $e) {
				$this->assertEquals($e->getMessage(), $errorMsg);
			}
		}
	}

	/**
	 * Tests setting a bad translation identifier (without KEY in it).
	 */
	public function testBadCustomTranslationIdentifiers() {

		try {
			new Dictionary($this->validDir, "@{K}");
		} catch (InvalidArgumentException $e) {
			$this->assertEquals($e->getMessage(), "No KEY in identifier");
		}
	}

	/**
	 * Tests the Dictionary's get() method
	 */
	public function testGettingTranslatedKeys() {

		// Normal English
		$this->assertEquals($this->dictionary->get("HELLO", "en"), "World");

		// Second English File
		$this->assertEquals($this->dictionary->get("EXTRA", "en"), "Stuff");

		// German File
		$this->assertEquals($this->dictionary->get("HELLO", "de"), "Welt");

		// Missing Translation
		$this->assertEquals($this->dictionary->get("HELL", "en"),
			"MISSINGTRANSLATION");

		// Missing Language
		$this->assertEquals($this->dictionary->get("HELL)", "fr"),
			"MISSINGLANGUAGE");
	}

	/**
	 * Tests translating a text using the default key identifier
	 */
	public function testTranslatingTextStandard() {
		$text = "Hi from @{HELLO}!";
		$this->assertEquals($this->dictionary->translate($text, "en"),
			"Hi from World!");
		$this->assertEquals($this->dictionary->translate($text, "de"),
			"Hi from Welt!");
	}

	/**
	 * Tests translating a text using a custom key identifier
	 */
	public function testTranslatingTextStandardCustom() {

		$dict = new Dictionary($this->validDir, "{*KEY*}");

		$text = "Hi from {*HELLO*}!";
		$this->assertEquals($dict->translate($text, "en"), "Hi from World!");
		$this->assertEquals($dict->translate($text, "de"), "Hi from Welt!");
	}

	/**
	 * Tests if providing an invalid language raises an Exception or not
	 */
	public function testTranslatingInvalidLanguage() {
		try {
			$this->dictionary->translate("", "fr");
			$this->fail();
		} catch (InvalidArgumentException $e) {
			$this->assertEquals($e->getMessage(), "Language not installed");
		}
	}

	/**
	 * Tests generating a dictionary from a directory with
	 * hyphens in it.
	 */
	public function testGeneratingFromDirectoryWithHyphen() {
		$dict = new Dictionary(__DIR__ .
			"/resources/translations/valid-hyphen");
		$this->assertEquals($dict->translations["en"]["TEST"], "test");
	}
}