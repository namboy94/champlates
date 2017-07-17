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

namespace chameleon;


/**
 * Class LoginForm
 * Models a simple Login Form
 * @package chameleon
 */
class LoginForm extends Form {

	/**
	 * @var string: The username identifier
	 */
	public static $username = "login_username";

	/**
	 * @var string: The password identifier
	 */
	public static $password = "login_password";

	/**
	 * LoginForm constructor.
	 * @param Dictionary|null $dictionary: The dictionary for translating
	 * @param string $title: The title of the form
	 * @param string $target: The target for the completed form
	 */
	public function __construct(
		? Dictionary $dictionary,
		$title,
		$target
	) {

		$username =
			new FormTextEntry($dictionary, self::$username, self::$username,
			"text",
			"@{LOGINFORM_USERNAME_TITLE}",
			"@{LOGINFORM_USERNAME_PLACEHOLDER}"
		);

		$password =
			new FormTextEntry($dictionary, self::$password, self::$password,
			"password",
			"@{LOGINFORM_PASSWORD_TITLE}",
			"@{LOGINFORM_PASSWORD_PLACEHOLDER}"
		);

		$confirm = new FormButton($dictionary, "@{LOGINFORM_CONFIRM_TITLE}");

		parent::__construct($dictionary, $title, $target,
			[$username, $password, $confirm]);
	}

}