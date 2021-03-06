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

namespace champlates;


/**
 * Class ChangeUsernameForm
 * Form that allows a user to change their username
 * @package champlates
 */
class ChangeUsernameForm extends Form {

	/**
	 * @var string: The username id/name, i.e. the variable name in $_POST
	 */
	public static $newUsername = "new_username";

	/**
	 * ChangeUsernameForm constructor.
	 * @param Dictionary|null $dictionary: The dictionary used in translation
	 * @param string $title: The title of the form
	 * @param string $target: The target of the username change action
	 */
	public function __construct(
		? Dictionary $dictionary, string $title, string $target
	) {

		$id = self::$newUsername;
		$newUsername = new FormTextEntry($dictionary, $id, $id,
			"text",
			"@{NEW_USERNAME_ENTRY_TITLE}",
			"@{NEW_USERNAME_ENTRY_PLACEHOLDER}"
		);

		$confirm =
			new FormButton($dictionary, "@{NEW_USERNAME_CONFIRM_TITLE}");


		$formElements = [$newUsername, $confirm];

		parent::__construct($dictionary, $title, $target, $formElements);
	}

}