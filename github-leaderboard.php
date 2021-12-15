<?php
/*
Plugin Name: Github Leaderboard
Plugin Uri: https://simonandro.github.io/github-leaderboard/
Description: Github Leaderboard / WP Github Leaderboard  is a plugin to add github users' contributions ranking feature to any wordpress post or page via a shortcode
Author: Nakibinge Simon
Author URI: https://simonandro.github.io/
Version: 1.0
Text Domain: github_leaderboard
Tags: WordPress leaderboard, github contributions, responsive leaderboard, create leaderboard, rank, ranks, ranking, coding, programming, competition, wordpress leaderboard, widget
Licence: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*###############################################################
Github Leaderboard  1.0  (A Complete github user contributions ranking System)
##############################################################*/

/*********Plugin Initialization*/
require_once ABSPATH . 'wp-admin/includes/plugin.php';

/**ACTIVATOR*/
register_activation_hook(__FILE__, 'github_leaderboard_activate');

//Leaderboard Activation
if (!function_exists('github_leaderboard_activate')) {
    function github_leaderboard_activate()
    {
    }
} else {
    $plugin = dirname(__FILE__) . '/github-leaderboard.php';
    deactivate_plugins($plugin);
    wp_die('<div class="plugins"><h2>ghLeaderboard 3.0 Plugin Activation Error!</h2><p style="background: #ffef80;padding: 10px 15px;border: 1px solid #ffc680;">We Found that you are using Our Plugin\'s Another Version, Please Deactivate That Version & than try to re-activate it. Don\'t worry free plugins data will be automatically migrate into this version. Thanks!</p></div>', 'Plugin Activation Error', array('response' => 200, 'back_link' => true));
}

/**ACTIVATOR*/
register_activation_hook(__FILE__, 'github_leaderboard_deactivate');

//E Leaderboard Deactivation
if (!function_exists('github_leaderboard_deactivate')) {
    function github_leaderboard_deactivate()
    {
    }
}

if (!function_exists('github_leaderboard_plugin_conf')) {
    //Global File Attach
    function github_leaderboard_plugin_conf()
    {
        if (!isset($_SESSION)) {@session_start();}

        if (!function_exists('github_leaderboard_system')) {

            function github_leaderboard_system()
            {

                include_once 'backend/github_leaderboard_setting.php';

            }

        }
    }
    add_action('init', 'github_leaderboard_plugin_conf');
}


if (!function_exists('github_leaderboard_create_board')) {
    function github_leaderboard_create_board()
    {
        $labels = array(
            'name' => _x('Leaderboard', 'Post Type General Name', 'github_leaderboard'),
            'singular_name' => _x('Leaderboard', 'Post Type Singular Name', 'github_leaderboard'),
            'menu_name' => __('gLeaderboard', 'github_leaderboard'),
            'name_admin_bar' => __('gLeaderboard', 'github_leaderboard'),
            'parent_item_colon' => __('Parent Leaderboard:', 'github_leaderboard'),
            'all_items' => __('All Leaderboards', 'github_leaderboard'),
            'add_new_item' => __('Add New Leaderboard', 'github_leaderboard'),
            'add_new' => __('Add New', 'github_leaderboard'),
            'new_item' => __('New Leaderboard', 'github_leaderboard'),
            'edit_item' => __('Edit Leaderboard', 'github_leaderboard'),
            'update_item' => __('Update Leaderboard', 'github_leaderboard'),
            'view_item' => __('View Leaderboard', 'github_leaderboard'),
            'search_items' => __('Search Leaderboard', 'github_leaderboard'),
            'not_found' => __('Not found', 'github_leaderboard'),
            'not_found_in_trash' => __('Not found in Trash', 'github_leaderboard'),
        );
        $args = array(
            'label' => __('Leaderboard', 'github_leaderboard'),
            'description' => __('Leaderboard Description', 'github_leaderboard'),
            'labels' => $labels,
            'supports' => array('title', 'thumbnail', 'revisions'),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-chart-bar',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'rewrite' => array('slug' => 'gitrank'),
            'capability_type' => 'page',
        );
        register_post_type('github_leaderboard', $args);
        flush_rewrite_rules(true);
    }

	// Hook into the 'init' action
    add_action('init', 'github_leaderboard_create_board', 0);
}

//Add ghLeaderboard Admin Scripts
if (!function_exists('github_leaderboard_js_register')) {

    add_action('admin_enqueue_scripts', 'github_leaderboard_js_register');
    function github_leaderboard_js_register()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('thickbox');
        wp_register_script('github_leaderboard_js', plugins_url('/assets/js/github_leaderboardv1.js', __FILE__), array('jquery', 'media-upload', 'wp-color-picker', 'thickbox'));

        wp_enqueue_script('github_leaderboard_js');

        wp_register_script('github_leaderboard_contact_builder', plugins_url('/assets/js/github_leaderboard_contact_builderv1.js', __FILE__), array('jquery', 'thickbox'));
        wp_enqueue_script('github_leaderboard_contact_builder');
    }
}

//Add ghLeaderboard Admin Style
if (!function_exists('github_leaderboard_css_register')) {

    add_action('admin_enqueue_scripts', 'github_leaderboard_css_register');
    function github_leaderboard_css_register()
    {
        wp_register_style('github_leaderboard_css', plugins_url('/assets/css/github_leaderboardv1.css', __FILE__));
        wp_enqueue_style(array('thickbox', 'github_leaderboard_css'));
    }
}

//Add ghLeaderboard Frontend Style
if (!function_exists('github_leaderboard_enqueue_style')) {

    add_action('wp_enqueue_scripts', 'github_leaderboard_enqueue_style');
    function github_leaderboard_enqueue_style()
    {
        wp_enqueue_style('github_leaderboard_style', plugins_url('/assets/css/github_leaderboard_frontendv1.css', __FILE__), false);
        wp_enqueue_style('github_leaderboard_style_3p', plugins_url('/assets/css/4.6.0.bootstrap.min.css', __FILE__), false);
    }
}

//Add ghLeaderboard Frontend Script
if (!function_exists('github_leaderboard_enqueue_script')) {
    add_action('wp_enqueue_scripts', 'github_leaderboard_enqueue_script');
    function github_leaderboard_enqueue_script()
    {
       wp_enqueue_script('github_leaderboard_script', plugins_url('/assets/js/github_leaderboard_frontendv1.js', __FILE__), false);
        wp_enqueue_script('github_leaderboard_script_3p', plugins_url('/assets/js/4.6.0.bootstrap.bundle.min.js', __FILE__), false);
    }
}

include_once 'backend/github_leaderboard_metaboxes.php';
include_once 'frontend/github_leaderboard.php';

if (!function_exists('get_github_leaderboard_template')) {

    add_filter('single_template', 'get_github_leaderboard_template');
    function get_github_leaderboard_template($single_template)
    {
        global $post;

        if ($post->post_type == 'github_leaderboard') {
            $single_template = dirname(__FILE__) . '/frontend/github_leaderboard-template.php';
        }
        return $single_template;
    }
}



//Adding Columns to ghLeaderboard cpt
if (!function_exists('set_custom_edit_github_leaderboard_columns')) {
    add_filter('manage_github_leaderboard_posts_columns', 'set_custom_edit_github_leaderboard_columns');
    function set_custom_edit_github_leaderboard_columns($columns)
    {
        $columns['total_account'] = __('Total accounts', 'github_leaderboard');
        $columns['leaderboard_status'] = __('Ranking Period', 'github_leaderboard');
        $columns['shortcode'] = __('Shortcode', 'github_leaderboard');
        return $columns;
    }
}

if (!function_exists('custom_github_leaderboard_column')) {
    // Add the data to the custom columns for the book post type:
    add_action('manage_github_leaderboard_posts_custom_column', 'custom_github_leaderboard_column', 10, 2);
    function custom_github_leaderboard_column($column, $post_id)
    {
        switch ($column) {

            case 'shortcode':
                $code = '<code>[github_leaderboard id="' . $post_id . '"][/github_leaderboard]</code>';
                if (is_string($code)) {
                    echo $code;
                } else {
                    _e('Unable to get shortcode', 'github_leaderboard');
                }

                break;
            case 'leaderboard_status':
                echo "<span style='text-transform:uppercase'>" . get_post_meta(get_the_id(), 'github_leaderboard_status', true) . "</span>";
                break;
            case 'total_account':
                if (get_post_meta($post_id, 'github_leaderboard_account', true)) {
                    $total_opt = sizeof(get_post_meta($post_id, 'github_leaderboard_account', true));
                } else {
                    $total_opt = 0;
                }
                echo $total_opt;
                break;

        }
    }
}

if (!function_exists('github_leaderboard_register_button')) {
    function github_leaderboard_register_button($buttons)
    {
        array_push($buttons, "|", "github_leaderboard");
        return $buttons;
    }
}

if (!function_exists('github_leaderboard_add_plugin')) {
    function github_leaderboard_add_plugin($plugin_array)
    {
        $plugin_array['github_leaderboard'] = plugins_url('/assets/js/github_leaderboard_tinymce_btn.js', __FILE__);
        return $plugin_array;
    }
}

if (!function_exists('github_leaderboard_tinymce_setup')) {
    function github_leaderboard_tinymce_setup()
    {

        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }

        if (get_user_option('rich_editing') == 'true') {
            add_filter('mce_external_plugins', 'github_leaderboard_add_plugin');
            add_filter('mce_buttons', 'github_leaderboard_register_button');
        }

    }
    add_action('init', 'github_leaderboard_tinymce_setup');
}

// Shortens a number and attaches K, M, B, etc. accordingly
if (!function_exists('github_leaderboard_number_shorten')) {

    function github_leaderboard_number_shorten($num)
    {
        if ($num > 1000) {

            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;

        }
        return $num;
    }
}

include_once 'backend/github_leaderboard_widget.php';
