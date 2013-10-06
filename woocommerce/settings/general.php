<?php
/**
 * Realiza alterações no General Settings do WooCommerce.
 *
 * @author 		Alex Martins
 * @category 	Admin
 * @package 	ZoomStore/WooCommerce/Settings
 * @version     1.0
 */
 
function zs_remove_general( $settings ) {

	$updated_settings = array();
	
	foreach ( $settings as $section ) {

		if ( isset( $section['id'] ) && 'digital_download_options' == $section['id'] &&
		isset( $section['type'] ) && 'title' == $section['type'] ) {
			
			unset( $section );
			$updated_settings[] = $section;
    }
	
	if ( isset( $section['id'] ) && 'woocommerce_file_download_method' == $section['id'] ) {
			
			unset( $section );
			$updated_settings[] = $section;
    }
	
	if ( isset( $section['id'] ) && 'woocommerce_downloads_require_login' == $section['id'] ) {
			
			unset( $section );
			$updated_settings[] = $section;
    }
	
	if ( isset( $section['id'] ) && 'woocommerce_downloads_grant_access_after_payment' == $section['id'] ) {
			
			unset( $section );
			$updated_settings[] = $section;
    }
	
	if ( isset( $section['id'] ) && 'digital_download_options' == $section['id'] &&
		isset( $section['type'] ) && 'sectionend' == $section['type'] ) {
			
			unset( $section );
			$updated_settings[] = $section;
    }

    $updated_settings[] = $section;

  }

  return $updated_settings;
}
add_filter('woocommerce_general_settings', 'zs_remove_general');