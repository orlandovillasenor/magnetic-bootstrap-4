<?php

namespace Magnetic;

class Widgets {
	
	public static function register($widgets)
	{
		
		if ( $widgets )
		{
			foreach ( $widgets as $widget => $param )
			{
				register_sidebar([
					'name' => __( $widget ),
					'description' => __( $param['description'] ),	 
					'id' => $param['id'], 
					'before_widget' => $param['before_widget'],
					'after_widget' => $param['after_widget'],
					'before_title' => $param['before_title'],
					'after_title' => $param['after_title'],
				]);	
			}
		}
	}
}
