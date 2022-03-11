<?php

add_action('after_theme_setup', function() {
  register_nav_menus([
    'header-menu' => __( 'Header Menu', 'sick-wp' ),
    'footer-menu' => __( 'Footer Menu', 'sick-wp' ),
  ]);
});

