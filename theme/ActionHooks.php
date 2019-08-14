<?php

namespace Magnetic;

class ActionHooks {

    protected static $assets;

    /**
     * Registers action hooks with WordPress
     */
    public static function register( $config )
    {
        self::$assets = $config['assets'];
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'));
        add_action('body_class', array(__CLASS__, 'body_class'));
        add_action('excerpt_more', array(__CLASS__, 'excerpt_more'));
        add_action('admin_menu', array(__CLASS__, 'admin_menu'));

        // Custom Theme Action Hooks
        add_action('magnetic_content', array(__CLASS__, 'magnetic_content'));
        add_action('magnetic_menu', array(__CLASS__, 'magnetic_menu'), 10, 2);
        add_action('magnetic_title', array(__CLASS__, 'magnetic_title'));
        add_action('magnetic_image', array(__CLASS__, 'magnetic_image'), 10, 3);        
        //add_action('magnetic_social_icons', array(__CLASS__, 'magnetic_social_icons'));
    }

    public static function enqueue_scripts()
    {
        Assets::register( self::$assets );
    }
    
    public static function magnetic_content()
    {
        include Wrapper::$main_template;
    }
    
    public static function magnetic_image( $id, $size = 'full', $atts = array('class' => 'img-fluid') )
    {
        echo wp_get_attachment_image( $id, $size, false, $atts );    
    }
    
    public static function magnetic_title()
    {
        if (is_home()) {
            if (get_option('page_for_posts', true)) {
                echo get_the_title(get_option('page_for_posts', true));
            } else {
                echo __('Latest Posts', 'magnetic');
            }
        } elseif (is_archive()) {
            echo get_the_archive_title();
        } elseif (is_search()) {
            echo sprintf(__('Search Results for %s', 'magnetic'), get_search_query());
        } elseif (is_404()) {
            echo __('Not Found', 'magnetic');
            } else {
            echo get_the_title();
        }        
    }
    
    public static function magnetic_menu($menu, $class = 'menu')
    {
        if ( has_nav_menu($menu) ) 
    	{
    	    wp_nav_menu([
                'theme_location' => $menu,
                'menu_class' => $class,
                'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => null,
                'walker' => new Walker(),
            ]);	
        }    
    }

    public static function magnetic_social_icons()
    {
        $social_media_accounts = (int) get_option('options_social_media_account');
  
        if( $social_media_accounts )
        {
            for( $i = 0; $i < $social_media_accounts; $i++ ) {
                $icon_id = get_option( 'options_social_media_account_' . $i . '_icon');
                $link = esc_url( get_option( 'options_social_media_account_' . $i . '_link' ) );
                echo '<a href="'.$link.'" target="_blank">' . wp_get_attachment_image($icon_id,'full') . '</a>';
            }
        }
    }

    /**
     * Add <body> classes
     */
    public static function body_class($classes)
    {
     	if (is_single() || is_page() && !is_front_page()) 
      	{
    		if (!in_array(basename(get_permalink()), $classes)) 
    		{
          		$classes[] = basename(get_permalink());
        	}
      	}
    
      	return $classes;   
    }
    
    /**
     * Clean up the_excerpt()
     */
    public static function excerpt_more()
    {
        return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'magnetic') . '</a>';
    }
    
    /**
     * Remove Comments from admin menu
     */
    public static function admin_menu()
    {
        remove_menu_page('edit-comments.php');
    }

}