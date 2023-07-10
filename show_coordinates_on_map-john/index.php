<?php
/**
Plugin Name: Dowell Coordinates
Plugin URI: https://github.com/DoWellUXLab/DoWell-Coordinates
Description: Display coordinates on map.
Version: 1.0.0
Author: DoWellResearch
Author URI: https://github.com/DoWellUXLab/DoWell-Coordinates
License: GPL-2.0+
License URI: https://github.com/DoWellUXLab/DoWell-Coordinates
Text Domain: my-plugin
Domain Path: /languages
**/
if (!defined('ABSPATH')) exit('No access allowed');

/*
Define Plugin Constants
*/
define('DC_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('DC_URL', trailingslashit(plugins_url('/', __FILE__)));

/*
Load Scripts
*/
function load_scripts()
{
    wp_enqueue_script( 'dowWell-Coordinates', DC_URL . 'react-front-end/dist/assets/index-5f2faf5c.js', ['wp-element','react'], wp_rand(), true );
    wp_enqueue_style( 'dowell-Coordinates', DC_URL . 'react-front-end/dist/assets/index-7106cf79.css', array(), '1.0.0' );
}



require_once DC_PATH . 'models/Dowell_Coordinates.php';
add_action('wp_enqueue_scripts', 'load_scripts');
