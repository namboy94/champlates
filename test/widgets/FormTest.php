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

use champlates\ChangeEmailForm;
use champlates\ChangePasswordForm;
use champlates\ChangeUsernameForm;
use PHPUnit\Framework\TestCase;
use champlates\Form;
use champlates\LoginForm;
use champlates\SignupForm;
use champlates\ForgottenPasswordForm;
use champlates\FormButton;


/**
 * Class FormTest
 * Tests the various Form* classes
 */
class FormTest extends TestCase {

	/**
	 * Tests generating a very basic Form
	 */
	public function testGeneratingSimpleForm() {
		$button = new FormButton(null, "BUTTON");
		$form = new Form(null, "Title", "target.php", [$button]);
		$this->assertEquals($form->render("en"),
			file_get_contents(__DIR__ . "/results/simple_form.html"));
	}

	/**
	 * Tests generating a Login Form
	 */
	public function testLoginForm() {
		$form = new LoginForm(null, "Login", "login.php");
		$result = __DIR__ . "/results/login_form.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}

	/**
	 * Tests generating a signup form
	 */
	public function testSignupForm() {
		$form = new SignupForm(null, "Signup", "signup.php", null);
		$result = __DIR__ . "/results/signup_form.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}

	/**
	 * Tests generating a signup form with Recaptcha enabled
	 */
	public function testSignupFormWithRecaptcha() {
		$form = new SignupForm(null, "Signup", "signup.php", "AAA");
		$result = __DIR__ . "/results/signup_form_recaptcha.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}

	/**
	 * Tests generating a forgotten password form
	 */
	public function testForgottenPasswordForm() {
		$form = new ForgottenPasswordForm(null, "Forgot", "forgot.php", null);
		$result = __DIR__ . "/results/forgot_form.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}

	/**
	 * Tests generating a forgotten password form with recaptcha enabled
	 */
	public function testForgottenPasswordFormWithRecaptcha() {
		$form = new ForgottenPasswordForm(null, "Forgot", "forgot.php", "AAA");
		$result = __DIR__ . "/results/forgot_form_recaptcha.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}

	/**
	 * Tests the Password Changing Form
	 */
	public function testPasswordChangeForm() {
		$form = new ChangePasswordForm(null, "A", "B");
		$result = __DIR__ . "/results/password_change_form.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}

	/**
	 * Tests the Username Changing Form
	 */
	public function testUsernameChangeForm() {
		$form = new ChangeUsernameForm(null, "A", "B");
		$result = __DIR__ . "/results/username_change_form.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}

	/**
	 * Tests the Username Changing Form
	 */
	public function testEmailChangeForm() {
		$form = new ChangeEmailForm(null, "A", "B");
		$result = __DIR__ . "/results/email_change_form.html";
		$this->assertEquals(file_get_contents($result), $form->render(""));
	}
}