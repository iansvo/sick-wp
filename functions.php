<?php
// Update to get_stylesheet_directory() if you're using a child theme
$inc_directory = get_template_directory() . '/inc';

require_once "$inc_directory/inc/cleanup.php"; 
require_once "$inc_directory/inc/enqueues.php"; 
require_once "$inc_directory/inc/widgets.php"; 
require_once "$inc_directory/inc/menus.php"; 

// Add new requires below