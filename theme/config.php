<?php

return [
	
	'assets' => [
		
		'styles' => [

			'font_lato' => [
				'path' => '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic',
				'dependencies' => [],
				'version' => null,
				'media' => '',
			],
			
			'main_css' => [
				'path' => '/dist/css/main.css',
				'dependencies' => ['wp-block-library', 'wp-block-library-theme'],
				'version' => wp_get_theme()->get('Version'),
				'media' => '',
			],
		],

		'scripts' => [
			
			'manifest_js' => [
				'path' => '/dist/js/manifest.js',
				'dependencies' => [],
				'version' => wp_get_theme()->get('Version'),
				'in_footer' => true,
			],
			
			'vendor_js' => [
				'path' => '/dist/js/vendor.js',
				'dependencies' => ['jquery', 'manifest_js'],
				'version' => wp_get_theme()->get('Version'),
				'in_footer' => true,
			],

			'main_js' => [
				'path' => '/dist/js/main.js',
				'dependencies' => ['jquery'],
				'version' => wp_get_theme()->get('Version'),
				'in_footer' => true,
			],
		],

	],

	'menus' => [
		
		'Primary Navigation' => 'primary_navigation',
	],

	'widgets' => [],

	'autoload' => [
		'theme/Assets.php',
		'theme/Menus.php',
		'theme/Widgets.php',
		'theme/Walker.php',
		'theme/ActionHooks.php',
		'theme/FilterHooks.php',
		'theme/Wrapper.php',
	],

];