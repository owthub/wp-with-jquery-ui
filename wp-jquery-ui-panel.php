<?php

/*
  Plugin Name: Jquery UI With WP
  Description: This is a simple plugin for purpose of learning
  Version: 1.0.0
  Author: Online Web Tutor
 */

define("JQUERY_UI_WP_PATH", plugin_dir_path(__FILE__));
define("JQUERY_UI_WP_URL", plugin_dir_url(__FILE__));

add_action("admin_menu", "jquery_ui_menus");

function jquery_ui_menus() {

    add_menu_page("Jquery UI WP", "Jquery UI WP", "manage_options", "wp-jquery-ui", "wp_jquery_ui_callback_fn");

    add_submenu_page("wp-jquery-ui", "Accordion", "Accordion", "manage_options", "wp-jquery-ui", "wp_jquery_ui_callback_fn");

    add_submenu_page("wp-jquery-ui", "Autocomplete", "Autocomplete", "manage_options", "wp-jquery-ui-autocomplete", "wp_jquery_ui_callback_fn_autocomplete");

    add_submenu_page("wp-jquery-ui", "Datepicker", "Datepicker", "manage_options", "wp-jquery-ui-datepicker", "wp_jquery_ui_callback_fn_datepicker");
}

function wp_jquery_ui_callback_fn_datepicker() {

    ob_start();

    include_once JQUERY_UI_WP_PATH . 'views/datepicker.php';
    $template = ob_get_contents();

    ob_end_clean();

    echo $template;
}

function wp_jquery_ui_callback_fn_autocomplete() {

    ob_start();

    include_once JQUERY_UI_WP_PATH . 'views/autocomplete.php';
    $template = ob_get_contents();

    ob_end_clean();

    echo $template;
}

function wp_jquery_ui_callback_fn() {

    ob_start();
    include_once JQUERY_UI_WP_PATH . 'views/accordion.php';
    $template = ob_get_contents();
    ob_end_clean();

    echo $template;
}

function jquery_ui_js_files() {

    wp_enqueue_style("jquery-wp-css", JQUERY_UI_WP_URL . "assets/jquery-ui.min.css");

    wp_enqueue_script("jquery");
    wp_enqueue_script("jquery-ui-accordion");
    wp_enqueue_script("jquery-ui-autocomplete");
    wp_enqueue_script("jquery-ui-datepicker");
    wp_enqueue_script("custom-script", JQUERY_UI_WP_URL . "assets/script.js", array('jquery'), "1.0.0", true);
}

add_action("admin_enqueue_scripts", "jquery_ui_js_files");
