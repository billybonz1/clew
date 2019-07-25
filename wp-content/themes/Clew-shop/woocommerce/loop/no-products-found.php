<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="product-notfound" >
	<span class="nf-title">нажаль  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/notf.png" alt="">   По Вашому запиту, <br> нічого не знайдено</span>
	<a class="nf-btn" href="<?php echo get_home_url(); ?>">На головну</a>
</div>
