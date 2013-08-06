<?php load_theme_textdomain('atcf'); ?>
<?php
/**
 * Load up custom.css
 * @return void
 */
if ( !function_exists('sofa_child_enqueue_scripts') && !is_admin() ) {
	
	function sofa_child_enqueue_scripts() {
		wp_register_style( 'child_custom', get_stylesheet_directory_uri() . "/custom.css" );
        wp_enqueue_style( 'child_custom' );
	}

	add_action('wp_enqueue_scripts', 'sofa_child_enqueue_scripts', 99);
}

function sofa_edd_log_test_payment_stats() {
	return true;
}
// add_filter('edd_log_test_payment_stats', 'sofa_edd_log_test_payment_stats');

function getthecat() {
$category = get_the_category(); 
echo $category[0];
}

add_action('wp_login_failed', 'redirect_login_failed');
function redirect_login_failed() {
    wp_redirect(get_bloginfo('url') . '/saipass/' );
}

function pippin_extra_edd_currencies( $currencies ) {
	$currencies['VND'] = __('Việt Nam Đồng', 'franklin');
 
	return $currencies;
}
add_filter('edd_currencies', 'pippin_extra_edd_currencies');

function franklin_child_format_decimals() {
    return 0;
}
add_filter('edd_format_amount_decimals', 'franklin_child_format_decimals');
remove_filter( 'edd_format_amount_decimals', 'edd_currency_decimal_filter' );

function getcat(){
$category = get_the_category(); 
echo $category[0]->cat_name;
}