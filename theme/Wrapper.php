<?php

namespace Magnetic;

/**
 * Theme wrapper
 *
 * @link https://roots.io/sage/docs/theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
*/

class Wrapper {
  // Stores the full path to the main template file
  public static $main_template;

  // Basename of template file
  public $slug;

  // Array of templates
  public $templates;

  // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
  public static $base;

  public function __construct($main, $base, $template = 'base.php') {
    
    self::$main_template = $main;
    self::$base = $base;

    if (self::$base === 'index') {
      self::$base = false;
    }
    
    $this->slug = basename($template, '.php');
    $this->templates = [$template];

    if (self::$base) {
      $str = substr($template, 0, -4);
      array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
    }
  }

  public function __toString() {
    $this->templates = apply_filters('magnetic/wrap_' . $this->slug, $this->templates);
    return locate_template($this->templates);
  }
}