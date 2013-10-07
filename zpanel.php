<?php

/*
Plugin Name: ZPanel
Plugin URI: http://zoomstore.com.br/
Description: Plugin criado exclusivamente para a Zoomstore.
Version: 1.1
Author: Zoombox
Author URI: http://zoombox.com.br/
*/

require_once('functions.php');
require_once('woocommerce/settings/general.php');
require_once('woocommerce/settings/pages.php');
require_once('woocommerce/settings/payments.php');

function load_custom_wp_login_style_js(){
	$url = plugin_dir_url(__FILE__);

	wp_register_script( 'typekit_js', 'http://use.typekit.com/pgf3epu.js' );
	wp_register_script( 'jquery_js', $url .'admin/js/jquery.min.js' );
	wp_register_script( 'login_js', $url.'admin/js/login.js' );
	wp_register_style( 'custom_login_css', $url .'admin/style.css' );
	
	wp_enqueue_script( 'typekit_js' );
	wp_enqueue_script( 'jquery_js' );
	wp_enqueue_script( 'login_js' );
	wp_enqueue_style( 'custom_login_css' );
}
add_action('login_head', 'load_custom_wp_login_style_js');

function load_custom_wp_admin_style(){
	$url = plugin_dir_url(__FILE__);

	wp_register_style( 'custom_admin_css', $url .'admin/wp-admin.css' );
	
	wp_enqueue_style( 'custom_admin_css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

?>