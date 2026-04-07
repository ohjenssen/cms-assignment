<?php
/**
 * Plugin Name: Lemonade Stand Tools
 * Description: My custom plugin
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) exit;

add_shortcode('lemonade_hello', function () {
    return '<p class="plugin">Hello world, this is Oskars custom plugin</p>';
});