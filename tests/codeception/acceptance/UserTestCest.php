<?php

class AdminTestCest {

	/**
	 * Helping function to login without checking cookie since not compatible
	 * with browserstack ie8-9
	 *
	 * @param AcceptanceTester $I
	 */
	protected function login( AcceptanceTester $I ) {

		//Check if cookie first
		static $cookie = null;

		if ( ! is_null( $cookie ) ) {

			$I->setCookie( AUTH_COOKIE, $cookie );

			return;

		}

		$I->wantTo( 'Log into WordPress admin' );

		// Let's start on the login page
		$I->amOnPage( wp_login_url() );

		// Populate the login form's user id field
		$I->fillField( [ 'id' => 'user_login' ], 'admin' );

		// Populate the login form's password field
		$I->fillField( [ 'id' => 'user_pass' ], 'password' );

		// Submit the login form
		$I->click( [ 'name' => 'wp-submit' ] );

		// Wait for page to load [Hack for Safari and IE]
		$I->waitForElementVisible( [ 'css' => 'body.index-php' ], 5 );

		$cookie = $I->grabCookie( AUTH_COOKIE );

	}

	/**
	 * Validate front end site description is present
	 *
	 * @param AcceptanceTester $I
	 */
	public function validateFrontEndSiteDescription( \AcceptanceTester $I ) {

		$I->wantTo( 'Make sure the site description is "Codeception demo"' );

	}

	/**
	 * Validate that our admin menu has the right text
	 *
	 * @param AcceptanceTester $I
	 */
	public function validateAdminMenu( \AcceptanceTester $I ) {

		$I->wantTo( 'Make sure the Dashboard admin menu text is "Codeception demo"' );

	}

}
