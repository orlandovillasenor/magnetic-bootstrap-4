<?php

namespace Magnetic;

class Assets {
    
    public static function register($assets)
    {
        
        $styles = $assets['styles'];

        $scripts = $assets['scripts'];

        if ( $styles )
        {
            foreach ( $styles as $style => $param)
            {
                $path = strpos( $param['path'], '//' ) !== false ? $param['path'] : get_template_directory_uri() . $param['path'];
                
                wp_register_style($style, $path, $param['dependencies'], $param['version'], $param['media'] );
                
                if( isset( $param['is_page'] ) && !empty( $param['is_page'] ) )
                {
                    foreach( $param['is_page'] as $page ) 
                    {
                        if( is_page( $page ) ) 
                        {
                            wp_enqueue_style( $style );
                        }
                    }
                    continue;
                }
                wp_enqueue_style($style);
            }
        }

        if ( $scripts )
        {
            foreach ( $scripts as $script => $param )
            {
                
                $path = strpos( $param['path'], '//' ) !== false ? $param['path'] : get_template_directory_uri() . $param['path'];
                
                wp_register_script($script, $path, $param['dependencies'], $param['version'], $param['in_footer'] );
                
                if( isset( $param['is_page'] ) && !empty( $param['is_page'] ) )
                {
                    foreach( $param['is_page'] as $page ) 
                    {
                        if( is_page( $page ) ) 
                        {
                            wp_enqueue_script( $script );
                        }
                    }
                    continue;
                }
                wp_enqueue_script( $script );
            }
            
        }

        if ( is_single() && comments_open() && get_option('thread_comments') ) 
        {
            wp_enqueue_script('comment-reply');
        }
    }
}
