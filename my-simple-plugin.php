<?php

/**
 * Plugin Name: My Simple Plugin
 * Description: A simple, extendable boilerplate plugin.
 * Version: 1.0.0
 * Author: Your Name
 * Text Domain: my-simple-plugin
 */

defined('ABSPATH') || exit;

require_once plugin_dir_path(__FILE__) . 'includes/class-my-simple-plugin-admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-my-simple-plugin-public.php';

function run_my_simple_plugin()
{

    $pluginAdmin = new My_Simple_Plugin_Admin();
    $pluginAdmin->run();

    $pluginPublic = new My_Simple_Plugin_Public();
    $pluginPublic->run();
}
run_my_simple_plugin();
