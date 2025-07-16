<?php

defined('ABSPATH') || exit;

class My_Simple_Plugin_Public
{

    public function __construct()
    {
        // Add plugin hooks here if needed
    }

    public function run()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets()
    {

        wp_enqueue_script('jquery');


        wp_enqueue_script(
            'eventmove',
            plugin_dir_url(__FILE__) . '../assets/twentytwenty/jquery.event.move.js',
            ['jquery'],
            '1.0.0',
            true
        );


        wp_enqueue_style(
            'twentytwenty',
            plugin_dir_url(__FILE__) . '../assets/twentytwenty/twentytwenty.css',
            [],
            '1.0.0'
        );

        $custom_css = get_option('custom-css');
        if (!empty($custom_css)) {
            wp_enqueue_style('twentytwenty');
            wp_add_inline_style('twentytwenty', $custom_css, 'after');
        }

        wp_enqueue_script(
            'twentytwenty',
            plugin_dir_url(__FILE__) . '../assets/twentytwenty/jquery.twentytwenty.js',
            ['jquery', 'eventmove'],
            '1.0.0',
            true
        );

        $custom_js = get_option('custom-js');
        if (!empty($custom_js)) {
            wp_enqueue_script('twentytwenty');
            wp_add_inline_script('twentytwenty', $custom_js, 'after');
        }


        wp_enqueue_style(
            'my-simple-plugin',
            plugin_dir_url(__FILE__) . '../assets/public.css',
            ['twentytwenty'],
            '1.0.0'
        );


        wp_enqueue_script(
            'my-simple-plugin',
            plugin_dir_url(__FILE__) . '../assets/public.js',
            ['jquery', 'twentytwenty'],
            '1.0.0',
            true
        );
    }
}
