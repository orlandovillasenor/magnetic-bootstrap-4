<?php

namespace Magnetic;

class Theme {
	
	private $config;
	
	private static $instance;
	
	private function __construct()
	{
		$this->config = require __DIR__.'/config.php';
		
		$this->autoload();
		
		add_action('after_setup_theme', array($this, 'after_setup_theme'));
		
		add_action('init', array($this, 'init'));
	}

	public static function get_instance()
	{
		if ( !(self::$instance instanceof self) )
		{
            self::$instance = new self;
        }
        return self::$instance;
	}

	private function autoload()
	{
		foreach($this->config['autoload'] as $file)
		{
			locate_template($file, true, true) ?: trigger_error(sprintf(__('Error locating %s for inclusion', 'magnetic'), $file), E_USER_ERROR);	
		}
	}
	
	public function after_setup_theme()
	{
		// Theme Support
		add_theme_support('title-tag');
    	add_theme_support('post-thumbnails');
    	add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);
    	add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		
    	add_image_size( 'mobile', 480 );
    	add_image_size( 'desktop', 1600 );	
	}
	
	public function init()
	{
		Menus::register($this->config['menus']);
		Widgets::register($this->config['widgets']);
		ActionHooks::register($this->config);
		FilterHooks::register();
	}
}

Theme::get_instance();