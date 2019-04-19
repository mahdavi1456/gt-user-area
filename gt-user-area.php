<?php
/*
 * Plugin Name: gt-users-area
 * Version: 1
 * Plugin URI: http://gratech.ir/
 * Description: سیستم مدیریت کاربران
 * Author: Gratech Team
 * Author URI: http://gratech.ir/
 * Text Domain: gratech
 */
defined('ABSPATH') || exit('No Direct Access!!');
define('GT_USER_DIR', plugin_dir_path(__FILE__));
define('GT_USER_URL', plugin_dir_URL(__FILE__));
define('GT_USER_CSS_URL', trailingslashit(GT_USER_URL . 'assets/css'));
define('GT_USER_JS_URL', trailingslashit(GT_USER_URL . 'assets/js'));
define('GT_USER_IMG_URL', trailingslashit(GT_USER_URL . 'assets/img'));
define('GT_USER_INC', trailingslashit(GT_USER_DIR . 'include'));
define('GT_USER_ADMIN_DIR', trailingslashit(GT_USER_DIR . 'admin'));
require_once(ABSPATH . 'wp-includes/pluggable.php');
require_once(ABSPATH . "wp-content/plugins/wp-parsidate/wp-parsidate.php");

/* functions */
include GT_USER_INC . "functions.php";
include GT_USER_INC . "upload.php";
include GT_USER_INC . "user.php";

/* pages */
include GT_USER_DIR . "assets/register.php";
include GT_USER_DIR . "assets/login.php";
include GT_USER_DIR . "assets/forget.php";
include GT_USER_DIR . "assets/profile.php";
include GT_USER_DIR . "assets/edit-profile.php";

function add_theme_scripts() {
	wp_enqueue_style('style', GT_USER_CSS_URL . 'style.css');
	wp_enqueue_script('scrollScript', GT_USER_JS_URL . 'jquery.scrollTo.min.js', array('jquery'));
	wp_enqueue_script('global', GT_USER_JS_URL . 'global.js', array('jquery'));
	wp_enqueue_script('script', GT_USER_JS_URL . 'script.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');