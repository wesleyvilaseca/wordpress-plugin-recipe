<?php

/**
 * Plugin Name:       Recipe CodeVilaTheme
 * Plugin URI:        https://codevila.com.br
 * Description:       A simple WordPress plugin that allows use to create recipes an rate those recipes
 * Version:           1.0
 * Author:            Wesley Vila Seca 
 * Author URI:        https://codevila.com.br
 * Text Domain:       recipe
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: 
 */

define('RECIPE_PLUGIN_URL', __FILE__);

if (!function_exists('add_action')) {
    echo "Hi there! I'm just a plugin not much I can do when called directly.";
    exit;
}

//setup


//includes
include('includes/activate.php');
include('includes/init.php');
include('process/save-post.php');
include('process/filter-content.php');
include('includes/front/enqueue.php');
include('process/rate-recipe.php');
include('includes/admin/init.php');



//hooks
register_activation_hook(__FILE__, 'r_activate_plugin');
add_action('init', 'recipe_init');
add_action('save_post_recipe', 'r_save_post_admin', 10, 3);
add_filter('the_content', 'r_filter_recipe_content');
add_action('wp_enqueue_scripts', 'r_enqueue_scripts', 100);
add_action('wp_ajax_r_rate_recipe', 'r_rate_recipe');
add_action('wp_ajax_nopriv_r_rate_recipe', 'r_rate_recipe');
add_action('admin_init', 'recipe_admin_init');

//shortcodes
