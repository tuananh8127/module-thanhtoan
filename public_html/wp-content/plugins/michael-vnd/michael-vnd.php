<?php
/*
Plugin Name: michael VND
Plugin URI: 
Description: loại bỏ 2 số 00 và chuyển về VND
Version: 1.0
Author: Michael Phan
Author URI: 
License: 
License URI: 
*/
function pw_edd_remove_decimals_on_vnd( $decimals ) {
	global $edd_options;

	$currency = isset( $edd_options['currency'] ) ? $edd_options['currency'] : 'USD';

	switch ( $currency ) {
		case 'VND' :
			$decimals = 0;
			break;
	}

	return $decimals;
}
add_filter( 'edd_format_amount_decimals', 'pw_edd_remove_decimals_on_vnd' );