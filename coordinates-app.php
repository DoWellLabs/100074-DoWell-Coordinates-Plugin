

function enqueue_my_plugin_scripts() {
    wp_enqueue_script('my-plugin-js', plugins_url('build/static/js/main.js', __FILE__), array('jquery'), '1.0', true);
    wp_enqueue_style('my-plugin-css', plugins_url('build/static/css/main.css', __FILE__), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_my_plugin_scripts');
