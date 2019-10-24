<?php

namespace Magnetic;

class FilterHooks {
    
    /**
     * Registers filter hooks with WordPress
     */
    public static function register()
    {
        // WordPress Action Hooks
        add_filter('template_include', array(__CLASS__, 'template_include'), 109);
        add_filter( 'image_size_names_choose', array(__CLASS__, 'image_size_names_choose'));
    }
    
    public static function template_include($main)
    {
        // Check for other filters returning null
        if (!is_string($main)) {
          return $main;
        }

        $base = basename($main, '.php');
        
        return new Wrapper($main, $base);
    }

    /**
     * Update admin menu to reflect the new image sizes
     */
    public static function image_size_names_choose($sizes)
    {
        return array_merge( $sizes, array(
	        'mobile' => __( 'Mobile' ),
	        'desktop' => __( 'Desktop' ),
	    ));    
    }
}