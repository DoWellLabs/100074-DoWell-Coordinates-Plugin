<?php
/*
Plugin Name: Coordinates App
Plugin URI: [Enter your plugin URL]
Description: A plugin to display coordinates using ReactJS.
Version: 1.0
Author: [Your Name]
Author URI: [Your Website URL]
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Enqueue the ReactJS build files
function coordinates_app_enqueue_scripts() {
  wp_enqueue_script(
    'coordinates-app',
    plugin_dir_url(__FILE__) . 'build/index.js',
    array('wp-element'),
    '1.0',
    true
  );
  wp_enqueue_style(
    'coordinates-app',
    plugin_dir_url(__FILE__) . 'build/index.css',
    array(),
    '1.0'
  );
}
add_action('admin_enqueue_scripts', 'coordinates_app_enqueue_scripts');

// Add a menu item to the WordPress dashboard
function coordinates_app_menu() {
  add_menu_page(
    'Coordinates App',
    'Coordinates App',
    'manage_options',
    'coordinates-app',
    'coordinates_app_render_page',
    'dashicons-location',
    20
  );
}
add_action('admin_menu', 'coordinates_app_menu');

// Render the ReactJS app on the plugin page
function coordinates_app_render_page() {
  echo '
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
  crossorigin="anonymous"></script>
  <div id="root"></div>';

}

// Shortcode to display the ReactJS app on a post or page
function coordinates_app_shortcode() {
  ob_start();
  coordinates_app_render_page();
  return ob_get_clean();
}
add_shortcode('coordinates_app', 'coordinates_app_shortcode');
