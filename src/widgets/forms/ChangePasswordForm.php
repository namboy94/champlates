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
 * Class ChangePasswordForm
 * Form that allows a user to change their password
 * @package chameleon
 */
class ChangePasswordForm extends Form {

	/**
	 * @var string: The old password
	 */
	public static $oldPassword = "old_password";

	/**
	 * @var string: The new password
	 */
	public static $newPassword = "new_password";

	/**
	 * @var string: The new password once more for checking
	 */
	public static $newPasswordRepeat = "new_password_repeat";

	/**
	 * ChangePasswordForm constructor.
	 * @param Dictionary|null $dictionary: Dictionary used for translation
	 * @param string $title: The title of the form
	 * @param string $target: The target action of the form
	 */
	public function __construct(
		? Dictionary $dictionary, string $title, string $target
	) {

		// Shorter Variable Names
		$oldId = self::$oldPassword;
		$newId = self::$newPassword;
		$repeatId = self::$newPasswordRepeat;

		$old = new FormTextEntry($dictionary, $oldId, $oldId,
			"password",
			"@{CHANGE_PASSWORD_OLD_TITLE}",
			"@{CHANGE_PASSWORD_OLD_PLACEHOLDER}"
		);

		$new = new FormTextEntry($dictionary, $newId, $newId,
			"password",
			"@{CHANGE_PASSWORD_NEW_TITLE}",
			"@{CHANGE_PASSWORD_NEW_PLACEHOLDER}"
		);

		$repeat = new FormTextEntry($dictionary, $repeatId, $repeatId,
			"password",
			"@{CHANGE_PASSWORD_REPEAT_TITLE}",
			"@{CHANGE_PASSWORD_REPEAT_PLACEHOLDER}"
		);

		$confirm = new FormButton($dictionary,
			"@{CHANGE_PASSWORD_CONFIRM_TITLE}");

		$formElements = [$old, $new, $repeat, $confirm];
		parent::__construct($dictionary, $title, $target, $formElements);
	}

}