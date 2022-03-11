<?php
// Initialize all hooks at a specific point in execution
add_action('after_setup_theme', function () {

  add_action('init', function () {
    // Optional: Remove category feeds
    // remove_action( 'wp_head', 'feed_links_extra', 3 );
    // Optional: Remove post and comment feeds
    // remove_action( 'wp_head', 'feed_links', 2 );

    // Remove EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // Remove Windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // Remove index link
    remove_action( 'wp_head', 'index_rel_link' );
    // Remove previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // Remove start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // Remove links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // Remove WP version
    remove_action( 'wp_head', 'wp_generator' );
  });

  // Remove additional inline styles for comments
  add_filter( 'wp_head', function () {
    global $wp_widget_factory;
  
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
      remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
  }, 1 );

  add_action('wp_head', function () {
    if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
       remove_filter('wp_head', 'wp_widget_recent_comments_style' );
    }
  }, 1);

  // Remove Inline styles
  add_filter('gallery_style', function ($css) {
    return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
  });

  // cleaning up excerpt
  add_filter('excerpt_more', function ($more) {
    global $post;
    // Modify as needed, typically a button or link is desirable.
    return '&hellip;';
  });

  // Remove all emoji output as this loads additional font assets you may not want.
  // Remove this hook if desired. 
  add_action( 'init', function () {
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', function ( $plugins ) {
      return is_array( $plugins ) ? array_diff( $plugins, ['wpemoji'] ) : [];
    });
  
    // filter to remove DNS prefetch
    add_filter( 'emoji_svg_url', '__return_false' );
  } );

}, 16);

