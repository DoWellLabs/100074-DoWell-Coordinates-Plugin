<?php
class Dowell_Coordinates {

public function __construct(){
    add_action('admin_menu', [$this, 'create_admin_menu']);
    add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
    
}

public function create_admin_menu(){
    add_menu_page(
        'Dowell Coordinates',
        'Dowell Coordinates',
        'manage_options',
        'dowell-coordinates',
        [$this, 'render_map_page'],
        'dashicons-location-alt'
    );
}

public function enqueue_admin_scripts() {
    wp_enqueue_script( 'admin_menu', DC_URL . 'react-front-end/dist/assets/index-5f2faf5c.js', ['wp-element','react'], wp_rand(), true );
    wp_enqueue_style( 'admin_menu', DC_URL . 'react-front-end/dist/assets/index-7106cf79.css', array(), '1.0.0' );
    }


public function render_map_page (){
    echo "<div class='wrap'><div class='map-container'><div id='dowell-map'></div></div></div>";
}
}

function dowell_coordinates_init() {
$plugin = new Dowell_Coordinates();
add_shortcode('dowell_coordinates', [$plugin, 'render_map_page']);
}

add_action('plugins_loaded', 'dowell_coordinates_init');
