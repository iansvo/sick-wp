<?php
add_action( 'widgets_init', function() {
  /* Register the 'primary' sidebar. */
  register_sidebar(
      [
        'id'            => 'primary',
        'name'          => __( 'Primary Sidebar' ),
        'description'   => __( 'Default sidebar on loop templates.' ),
        'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="c-widget_title text-lg lg:text-xl xl:text-2xl">',
        'after_title'   => '</h3>',
      ]
  );
});