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
 * Class ForgottenPasswordForm
 * Models a Form for sending a password reset link
 * @package chameleon
 */
class ForgottenPasswordForm extends Form {

	/**
	 * @var string: Identifier for the email address
	 */
	public static $email = "forgotten_password_email";

	/**
	 * ForgottenPasswordForm constructor.
	 * @param Dictionary|null $dictionary: Dictionary used to translate strings
	 * @param string $title: The title of the form
	 * @param string $target: The target action for this form
	 * @param string|null $recaptchaSiteKey: The ReCaptcha Site Key
	 */
	public function __construct(
		? Dictionary $dictionary,
		string $title, 
		string $target, 
		? string $recaptchaSiteKey) {

		$elements = [new FormTextEntry($dictionary, self::$email, self::$email,
			"text",
			"@{FORGOTPASSFORM_EMAIL_TITLE}",
			"@{FORGOTPASSFORM_EMAIL_PLACEHOLDER}"
		)];

		if ($recaptchaSiteKey !== null) {
			array_push($elements, new FormReCaptcha($recaptchaSiteKey));
		}

		array_push($elements,
			new FormButton($dictionary, "@{FORGOTPASSFORM_CONFIRM_TITLE}"));
		
		parent::__construct($dictionary, $title, $target, $elements);
	}

}