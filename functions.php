<?php
// Update to get_stylesheet_directory() if you're using a child theme
$inc_directory = get_template_directory() . '/inc';

require_once "$inc_directory/cleanup.php"; 
require_once "$inc_directory/enqueues.php"; 
require_once "$inc_directory/widgets.php"; 
require_once "$inc_directory/menus.php"; 

// Add new requires below