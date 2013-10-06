<?php

// LINK - LOGIN
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return 'Zoomstore';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


// FOOTER - ADMIN
function my_footer_admin () {
	echo '&copy; <a href="http://zoomstore.com.br/" target="_blank">Zoomstore</a> - Solu&ccedil;&atilde;o em e-commerce';
}
add_filter('admin_footer_text', 'my_footer_admin');

function change_footer_version() {
	echo 'Zoomstore &eacute; um produto <a href="http://zoombox.com.br/" target="_blank"><strong>Zoombox</strong></a>';
}
add_filter( 'update_footer', 'change_footer_version', 9999);


// SAUDACAO - ADMIN
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


// ITEM - WP ADMIN BAR
function remove_admin_bar_links() {
    global $wp_admin_bar;
	
	$url = plugin_dir_url(__FILE__);
	
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
	$wp_admin_bar->remove_menu('site-name');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('w3tc');
	
	$wp_admin_bar->add_menu( array('id' => 'zoomstore', 'title' => '<img src="'. $url .'/admin/images/logo-painel.png" />', 'href' => 'http://zoomstore.com.br/', 'meta' => array('target' => '_blank') ) );
	$wp_admin_bar->add_menu( array('id' => 'verloja', 'title' => 'Ver minha loja', 'href' => get_bloginfo('url')) );
	$wp_admin_bar->add_menu( array('id' => 'conta', 'title' => 'Minha conta', 'href' => get_admin_url()) );
	//$wp_admin_bar->add_menu( array('id' => 'faturas', 'parent' => 'conta', 'title' => 'Faturas', 'href' => get_admin_url().'faturas.php') );
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


// ITEM - MENU ADMIN
function adjust_the_wp_menu() {

	$url = plugin_dir_url(__FILE__);
	
	remove_menu_page( 'index.php' );
	remove_submenu_page( 'index.php', 'index.php' );
	remove_submenu_page( 'index.php', 'update-core.php' );
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'upload.php' );
	remove_submenu_page( 'upload.php', 'upload.php' );
	remove_submenu_page( 'upload.php', 'media-new.php' );
	remove_menu_page( 'edit.php?post_type=page' );
	remove_submenu_page( 'edit.php?post_type=page', 'edit.php?post_type=page' );
	remove_submenu_page( 'edit.php?post_type=page', 'post-new.php?post_type=page' );
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'themes.php' );
	remove_menu_page( 'plugins.php' );
	remove_submenu_page( 'plugins.php', 'plugins.php' );
	remove_submenu_page( 'plugins.php', 'plugin-install.php' );
	remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
	remove_menu_page( 'users.php' );
	remove_menu_page( 'tools.php' );
	remove_menu_page( 'options-general.php' );
	remove_menu_page( 'woocommerce' );
	remove_menu_page( 'edit.php?post_type=product' );
	
	add_menu_page( 'painel', 'Painel', 'manage_options', 'index.php', '', plugins_url('zoomstore/admin/images/icones/painel.png'), 0 );
	add_menu_page( 'pedidos', 'Pedidos', 'manage_options', 'edit.php?post_type=shop_order', '', plugins_url('zoomstore/admin/images/icones/pedidos.png'), 5 );
	add_menu_page( 'clientes', 'Clientes', 'manage_options', 'users.php?role=customer', '', plugins_url('zoomstore/admin/images/icones/clientes.png'), 10 );
	add_menu_page( 'produtos', 'Produtos', 'manage_options', 'edit.php?post_type=product', '', plugins_url('zoomstore/admin/images/icones/produtos.png'), 15 );
	add_menu_page( 'cupons', 'Cupons', 'manage_options', 'edit.php?post_type=shop_coupon', '', plugins_url('zoomstore/admin/images/icones/cupons.png'), 20 );
	add_menu_page( 'paginas', 'P&aacute;ginas', 'manage_options', 'edit.php?post_type=page', '', plugins_url('zoomstore/admin/images/icones/paginas.png'), 25 );
	add_menu_page( 'midia', 'M&iacute;dia', 'manage_options', 'upload.php', '', plugins_url('zoomstore/admin/images/icones/midia.png'), 30 );
	add_menu_page( 'aparencia', 'Apar&ecirc;ncia', 'manage_options', 'themes.php', '', plugins_url('zoomstore/admin/images/icones/aparencia.png'), 35 );
	add_menu_page( 'plugins', 'Plugins', 'manage_options', 'plugins.php', '', plugins_url('zoomstore/admin/images/icones/plugins.png'), 40 );
	add_menu_page( 'preferencias', 'Prefer&ecirc;ncias', 'manage_options', 'admin.php?page=woocommerce_settings', '', plugins_url('zoomstore/admin/images/icones/preferencias.png'), 45 );
	
}
add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );


/* ESCONDER PLUGINS - ADMIN
function mytest() {
  global $wp_list_table;
  $hidearr = array('woocommerce/woocommerce.php');
  $myplugins = $wp_list_table->items;
  foreach ($myplugins as $key => $val) {
    if (in_array($key,$hidearr)) {
      unset($wp_list_table->items[$key]);
    }
  }
}
add_action( 'pre_current_active_plugins', 'mytest' );*/


// REMOVER OPCOES DE TELA E AJUDA
function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
add_filter('screen_options_show_screen', '__return_false');

?>