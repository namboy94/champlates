<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/14/17
 * Time: 3:00 PM
 */

namespace chameleon;
use InvalidArgumentException;


/**
 * Class Dictionary
 * Handles translation of strings. The translations are provided by external
 * JSON files in the format:
 *
 * {
 *     "KEY": "VALUE",
 *     "KEY2": "VALUE2",
 *     ...
 * }
 *
 * The JSON files must end in .json and start with the language identifier
 * followed by a hyphen. Each file can only contain data for a single language
 *
 * @package chameleon
 */
class Dictionary {

	/**
	 * Dictionary constructor.
	 * Automatically constructs the translations from the provided translation
	 * file locations.
	 * @param string $translationFiles: The source file/directory for the
	 *                                  translations
	 * @param string $translationIdentifier: Identifies sections in a string to
	 *                    translate when using the translate() method. Defaults
	 *                    to '@{KEY}'. If a custom identifier is set, it must
	 *                    contain 'KEY'.
	 * @throws InvalidArgumentException: If there is a problem with the input
	 */
	function __construct(string $translationFiles,
						 string $translationIdentifier = "@{KEY}") {

		$crawledTranslations = $this->crawlForTranslations($translationFiles);
		$languages = $this->determineLanguages($crawledTranslations);
		$this->translations = $this->readTranslations($languages);
		if (count($this->translations) === 0) {
			throw new InvalidArgumentException("No Translations Loaded");
		}
		elseif (strpos($translationIdentifier, "KEY") === false) {
			throw new InvalidArgumentException("No KEY in identifier");
		}

		$this->translationIdentifier = $translationIdentifier;

	}

	/**
	 * Recursively parses a directory/file for .json files and returns them
	 * in an array.
	 * @param $translationFiles: The file or directory to crawl
	 * @return array: The array of JSON files
	 * @throws InvalidArgumentException: If the argument passed was neither
	 *                                   a file path or a directory path
	 */
	public function crawlForTranslations($translationFiles) : array {

		// Strip trailing slashes
		$translationFiles = rtrim($translationFiles, "/");

		if (is_dir($translationFiles)) {
			$crawled = [];
			foreach (scandir($translationFiles) as $child) {
				if ($child !== "." && $child !== "..") {
					$childpath = $translationFiles . "/" . $child;

					$crawled = array_merge(
						$this->crawlForTranslations($childpath),
						$crawled);
				}
			}
			return $crawled;

		} elseif (is_file($translationFiles)) {
			if ($this->isJsonFile($translationFiles)) {
				return [$translationFiles];
			} else {
				return [];
			}

		} else {
			throw new InvalidArgumentException("Not a directory or file");
		}
	}

	/**
	 * Determines which languages are translated by which files
	 * @param $translationFiles: The array of json files previously crawled
	 *                           by crawlForTranslations()
	 * @return array: An associative array mapping the language identifiers
	 *                to corresponding JSON files.
	 */
	public function determineLanguages($translationFiles) : array {
		$languages = [];
		foreach ($translationFiles as $translationFile) {

			// Determine the language
			$language = explode("-", $translationFile)[0];
			$language = explode("/", $language);
			$language = $language[count($language) - 1];

			if (array_key_exists($language, $languages)) {
				array_push($languages[$language], $translationFile);
			} else {
				$languages[$language] = [$translationFile];
			}
		}
		return $languages;
	}

	/**
	 * Reads the content of the JSON files and maps their data to the
	 * individual languages
	 * @param array $languages: The language array previously defined by
	 *                          determineLanguages()
	 * @return array: An associative array mapping the
	 *                languages to the JSON data
	 * @throws InvalidArgumentException: If duplicate keys exist between the
	 *                                   JSON files for a language
	 */
	public function readTranslations(array $languages) : array {

		$translations = [];
		foreach ($languages as $language => $translationFiles) {
			$translations[$language] = [];
			foreach ($translationFiles as $translationFile) {
				$content = file_get_contents($translationFile);
				$json = json_decode($content, true);

				foreach (array_keys($json) as $key) {
					if (array_key_exists($key, $translations[$language])) {
						throw new InvalidArgumentException("Duplicate key");
					}
				}
				$translations[$language] += $json;
			}
		}
		return $translations;
	}

	/**
	 * Makes sure that a file is a JSON file
	 * @param string $file: The file to check
	 * @return bool: true of the file is a JSON file, false otherwise
	 */
	public function isJsonFile(string $file) {
		return substr($file, -5) === ".json";
	}

	/**
	 * Translates a given key using the given language
	 * @param string $key: The key/token/string to translate
	 * @param string $language: The language
	 * @return string
	 */
	public function get(string $key, string $language) {

		if (!array_key_exists($language, $this->translations)) {
			return "MISSINGLANGUAGE";
		} elseif (!array_key_exists($key, $this->translations[$language])) {
			return "MISSINGTRANSLATION";
		} else {
			return $this->translations[$language][$key];
		}
	}

	/**
	 * Translates a string using the translation data. Keys in the text
	 * are found using a simple replace operation. Which is why the
	 * keyIdentifier can be used to minimize false positives
	 * @param string $text: The text to translate
	 * @param string $language: The language to translate in
	 * @return string: The translated string
	 * @throws InvalidArgumentException: If the language specified does not
	 *                                   exist.
	 */
	public function translate(string $text, string $language) {

		$translated = $text;
		if (!array_key_exists($language, $this->translations)) {
			throw new InvalidArgumentException("Language not installed");
		} else {
			foreach ($this->translations[$language] as $key => $translation) {

				$search =
					str_replace("KEY", $key, $this->translationIdentifier);
				$translated = str_replace($search, $translation, $translated);
			}
			return $translated;
		}
	}
}