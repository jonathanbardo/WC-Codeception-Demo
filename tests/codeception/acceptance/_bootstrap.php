<?php

// Apply filters for browserstack credentials since we don't want to version it
self::$config['modules'] = [
	'config' => [
		'WebDriver' => [
			'url'     => apply_filters( 'webdriver_url', home_url() ),
			'browser' => apply_filters( 'webdriver_browser', 'firefox' ),
		],
		'BrowserStack' => [
			'url'        => apply_filters( 'browserstack_url', home_url() ),
			'username'   => apply_filters( 'browserstack_username', '' ),
			'access_key' => apply_filters( 'browserstack_accesskey', '' ),
		],
	],
];
