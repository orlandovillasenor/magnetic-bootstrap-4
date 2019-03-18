<?php

namespace Magnetic;

class Menus {
	
	public static function register($menus)
	{
		
	  	if ( $menus ) {
	  		
	  		foreach ( $menus as $name => $menu )
	  		{
		  		register_nav_menus([
			    	$menu => __($name, 'magnetic')
			  	]);
		  	};
	  	};
		
	}

}