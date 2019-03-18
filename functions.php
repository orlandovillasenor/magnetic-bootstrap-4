<?php

/**
 * Register theme and load all files, hooks and assets.
 * Theme config file is located in theme/config.php
 */
require_once __DIR__.'/theme/Theme.php';

/**
 * Create Options Page for the home page if Advanced Custom fields is activated.
 */
// if( function_exists('acf_add_options_page') ) 
// {
// 	acf_add_options_page(array(
// 		'page_title' 	=> 'Theme Settings',
// 		'menu_title'	=> 'Theme Settings',
// 		'menu_slug' 	=> 'theme-settings',
//         'position'      => 4
// 	));
// }