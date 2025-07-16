<?php

defined('ABSPATH') || exit;

class My_Simple_Plugin_Admin
{

    public function __construct()
    {
        // Add plugin hooks here if needed
    }

    public function run()
    {
        add_action('admin_menu', [$this, 'add_menu']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function add_menu()
    {
        add_menu_page(
            'My Simple Plugin Settings',
            'My Simple Plugin',
            'manage_options',
            'my-simple-plugin',
            [$this, 'render_page'],
            'dashicons-admin-generic',
            80
        );
    }

    public function render_page()
    {
        include plugin_dir_path(__FILE__) . 'admin-settings-page.php';
    }

    function register_settings()
    {

        register_setting('my-simple-plugin-settings-group', 'custom-js');
        register_setting('my-simple-plugin-settings-group', 'custom-css');
    }



    public function enqueue_assets($hook_suffix)
    {

        if ($hook_suffix !== 'toplevel_page_my-simple-plugin') {
            return;
        }

        wp_enqueue_script('jquery');

        wp_enqueue_script(
            'beautify-js',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/beautify.min.js',
            [],
            '1.0.0',
            true
        );


        wp_enqueue_script(
            'beautify-css',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/beautify-css.min.js',
            [],
            '1.0.0',
            true
        );



        wp_enqueue_style(
            'codemirror5',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/codemirror.min.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'codemirror5',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/codemirror.min.js',
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'codemirror5-javascript',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/javascript.min.js',
            ['codemirror5'],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'codemirror5-css',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/css.js',
            ['codemirror5'],
            '1.0.0',
            true
        );

        wp_enqueue_style(
            'codemirror5-show-hint',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/show-hint.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'codemirror5-show-hint',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/show-hint.js',
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'codemirror5-css-hint',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/css-hint.js',
            [],
            '1.0.0',
            true
        );



        wp_enqueue_script(
            'codemirror5-javascript-hint',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/javascript-hint.js',
            [],
            '1.0.0',
            true
        );


        wp_enqueue_script(
            'codemirror5-jshint',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/jshint.js',
            [],
            '1.0.0',
            true
        );


        wp_enqueue_style(
            'codemirror5-lint-css',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/lint.min.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'codemirror5-lint-js',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/lint.min.js',
            [],
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'codemirror5-lint-javascript',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/javascript-lint.min.js',
            [],
            '1.0.0',
            true
        );



        wp_enqueue_style(
            'codemirror5-one-dark-theme',
            plugin_dir_url(__FILE__) . '../assets/codemirror5/one-dark.min.css',
            [],
            '1.0.0'
        );

        wp_enqueue_style(
            'my-simple-plugin-admin',
            plugin_dir_url(__FILE__) . '../assets/admin.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'my-simple-plugin-admin',
            plugin_dir_url(__FILE__) . '../assets/admin.js',
            ['jquery'],
            '1.0.0',
            true
        );
    }
}
