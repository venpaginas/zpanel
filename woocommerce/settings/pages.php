<?php
/**
 * Realiza alterações no Pages Settings do WooCommerce.
 *
 * @author 		Alex Martins
 * @category 	Admin
 * @package 	ZoomStore/WooCommerce/Settings
 * @version     1.0
 */
 
 //**************************************************************************************
function zs_remove_page( $tabs ) {
	
	$updated_tabs = array();
	
	foreach ( $tabs as $section ) {
    // at the bottom of the General Options section
		if ( isset( $section['pages'] ) && 'Pages' == $section['pages'] ) {
			
			unset( $section['pages'] );
			
    }
	
	$updated_tabs[] = $section;

  }

  return $updated_tabs;
}
//add_filter( 'woocommerce_settings_tabs_array', 'zs_remove_page' );