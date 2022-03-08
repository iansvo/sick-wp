<?php

/**
 * get_theme_file_version
 * 
 * Retreives the modified timestamp of the file if it exists. 
 * Returns an empty string if the file isn't found.
 *
 * @param string $theme_file
 * @param [string] $path_base The base path for the file, parent theme assumed to be used
 *
 * @return void
 */
function get_theme_file_version($theme_file = '', $path_base = null) {
  $path_base = $path_base ?? get_template_directory(); 
  $path      = path_join($path_base, $theme_file);

  return file_exists($path) ? filemtime($path) : '';
}


add_action('wp_enqueue_scripts', function() {
  // Register assets

  // Enqueue assets
  wp_enqueue_style('theme', get_theme_file_uri('dist/css/theme.css'), '', get_theme_file_version('dist/css/theme.css'));
});