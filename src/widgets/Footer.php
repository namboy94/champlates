<?php
/**
 * Created by PhpStorm.
 * User: hermann
 * Date: 7/15/17
 * Time: 1:54 AM
 */

namespace chameleon_widgets;
use chameleon\Dictionary;


/**
 * Class Footer
 * A Navbar that acts as a footer
 * @package chameleon_widgets
 */
class Footer extends Navbar {

	/**
	 * Footer constructor.
	 * @param Dictionary $dictionary: The dictionary to use when translating
	 * @param Hyperlink $title: The title of the footer
	 * @param array $leftElements: The elements on the left side of the footer
	 * @param array $rightElements: The elements on the right side o.t. footer
	 */
	public function __construct(Dictionary $dictionary,
								Hyperlink $title,
								array $leftElements = [],
								array $rightElements = []) {
		parent::__construct(
			$dictionary, $title, $leftElements, $rightElements, null);
		$this->template = __DIR__ . "/templates/footer.html";
	}

}