<?php

return [
	
	'assets' => [
		
		'styles' => [

			'font_lato' => [
				'path' => '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic',
				'dependencies' => [],
				'version' => '',
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

	'widgets' => [
		
		// 'Blog Sidebar' => [
		// 	'id' =>	'widget-blog-sidebar',
		// 	'description' => 'Sidebar for blog',
		// 	'before_widget' => '<div class="widget %1$s %2$s">',
		// 	'after_widget' => '</div>',
		// 	'before_title' => '<h3>',
		// 	'after_title' => '</h3>',
		// ],
	],

	'autoload' => [
		'theme/Assets.php',
		'theme/Menus.php',
		'theme/Widgets.php',
		'theme/Walker.php',
		'theme/Actions.php',
		'theme/Filters.php',
		'theme/Wrapper.php',
	],

];