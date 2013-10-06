<?php
/**
 * Realiza alterações no Payments Settings do WooCommerce.
 *
 * @author 		Alex Martins
 * @category 	Admin
 * @package 	ZoomStore/WooCommerce/Settings
 * @version     1.0
 */
 

function zs_remove_gateway_mijireh( $methods ) {
    // Search mijireh ID.
    $mijireh = array_search( 'WC_Gateway_Mijireh', $methods );
 
    // Remove mijireh
    unset( $methods[ $mijireh ] );
 
    return $methods;
}
 
add_filter( 'woocommerce_payment_gateways', 'zs_remove_gateway_mijireh' );
