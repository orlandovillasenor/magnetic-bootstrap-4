<?php

namespace Magnetic;

class FilterHooks {
    
    /**
     * Registers filter hooks with WordPress
     */
    public static function register()
    {
        // WordPress Action Hooks
        add_filter( 'image_size_names_choose', array(__CLASS__, 'image_size_names_choose'));
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