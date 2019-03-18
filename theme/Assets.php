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
                
                if ( isset( $param['admin'] ) && $param['admin'] === true && is_admin() )
                {
                    wp_enqueue_style($style, $path, $param['dependencies'], $param['version'], $param['media'] );    
                }
                
                // if ( ! is_admin() )
                // {
                //     wp_enqueue_style($style, $path, $param['dependencies'], $param['version'], $param['media'] );    
                // }
                 wp_enqueue_style($style, $path, $param['dependencies'], $param['version'], $param['media'] );
            }
        }

        if ( $scripts )
        {
            foreach ( $scripts as $script => $param )
            {
                
                $path = strpos( $param['path'], '//' ) !== false ? $param['path'] : get_template_directory_uri() . $param['path'];
                
                if ( isset( $param['admin'] ) && $param['admin'] === true && is_admin() )
                {
                    wp_enqueue_script($script, $path, $param['dependencies'], $param['version'], $param['in_footer'] );    
                }
                
                if ( ! is_admin() )
                {
                    wp_enqueue_script($script, $path, $param['dependencies'], $param['version'], $param['in_footer'] );    
                }
            }
            
        }

        if ( is_single() && comments_open() && get_option('thread_comments') ) 
        {
            wp_enqueue_script('comment-reply');
        }
    }
}
