<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button information-oform">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<p class="info-total <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?>">Вартість: <span><?php echo $product->get_price_html(); ?></span></p>
	<button type="submit" class="single_add_to_cart_button button alt info-add-to-cart"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
	

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
	
</div>
