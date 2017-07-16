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
 * Class SignupForm
 * A form that enables signing up with a username, password and email address.
 * @package chameleon
 */
class SignupForm extends Form {

	/**
	 * @var string: Identifier for the username
	 */
	public static $username = "signup_username";

	/**
	 * @var string: Identifier for the email address
	 */
	public static $email = "signup_email";

	/**
	 * @var string: Identifier for the password
	 */
	public static $password = "signup_password";

	/**
	 * @var string: Identifier for the password repeat
	 */
	public static $passwordRepeat = "signup_password_repeat";

	/**
	 * SignupForm constructor.
	 * @param Dictionary|null $dictionary: The dictionary used for translating
	 * @param string $title: The title of the form
	 * @param string $target: The target action of the form
	 * @param string|null $recaptchaSiteKey: The optional ReCaptcha Site key
	 */
	public function __construct(
		? Dictionary $dictionary,
		string $title,
		string $target, 
		? string $recaptchaSiteKey
	) {
		
		$username = $username = new FormTextEntry($dictionary,
			self::$username,
			self::$username,
			"text",
			"@{SIGNUPFORM_USERNAME_TITLE}",
			"@{SIGNUPFORM_USERNAME_PLACEHOLDER}"
		);
		
		$email = new FormTextEntry($dictionary,
			self::$email,
			self::$email,
			"text",
			"@{SIGNUPFORM_EMAIL_TITLE}",
			"@{SIGNUPFORM_EMAIL_PLACEHOLDER}"
		);

		$password = new FormTextEntry($dictionary,
			self::$password,
			self::$password,
			"password",
			"@{SIGNUPFORM_PASSWORD_TITLE}",
			"@{SIGNUPFORM_PASSWORD_PLACEHOLDER}"
		);

		$passwordConfirm = new FormTextEntry($dictionary,
			self::$passwordRepeat,
			self::$passwordRepeat,
			"password",
			"@{SIGNUPFORM_PASSWORD_CONFIRM_TITLE}",
			"@{SIGNUPFORM_PASSWORD_CONFIRM_PLACEHOLDER}"
		);

		$elements = [$username, $email, $password, $passwordConfirm];

		if ($recaptchaSiteKey !== null) {
			array_push($elements, new FormReCaptcha($recaptchaSiteKey));
		}

		array_push($elements,
			new FormButton($dictionary, "@{SIGNUPFORM_CONFIRM_TITLE}"));

		parent::__construct($dictionary, $title, $target, $elements);
	}

}
