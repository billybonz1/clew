<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<?php
	// echo "<pre>";
	// print_r($available_variations); 
	// echo "</pre>";
?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>

			<div class="information__variation">
			
				<div class="variation__wrap">

					<span class="var-title">Оберіть кількість</span>

					<div class="variation-quantity">
					
						<?php
							do_action( 'woocommerce_before_add_to_cart_quantity' );

							woocommerce_quantity_input( array(
								'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
								'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
								'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
							) );
								
							do_action( 'woocommerce_after_add_to_cart_quantity' );
							
						?>

					</div>

				</div>


				<div class="variation__wrap">

				<span class="var-title">Оберіть розмір</span>
				
					<?php foreach ( $attributes as $attribute_name => $options ) {?>
						<div class="product-attribute">
							<?php $tax = get_taxonomy( $attribute_name );?>
					
							<!--<h3>?php echo $tax->labels->singular_name; ?</h3>-->
							<div class="product-options var-size">
								<?php foreach($options as $key=>$option){?>
								<a class="product-option-select <?php if($key == 0){?>active<?php } ?>" data-id="<?php echo $available_variations[$key]['variation_id']; ?>"><?php echo $option; ?></a>
								<?php } ?>
							</div>
							
						</div>
						
					<?php } ?>
				
				</div>
			
			</div>

			<script>
				(function($){
					$(document).ready(function(){
						$(document).on("click",".product-option-select", function(){
							var variation_id = $(this).data("id"); 
							$("[name='variation_id']").val(variation_id);
							$(this).addClass("active").siblings().removeClass("active");
						});


						var qInput  = $('[name="quantity"]');
						qInput.after("<div class='q-plus quant'>+</div>");
						qInput.before("<div class='q-minus quant'>-</div>");
						$(document).on("click",".quant", function(){
							var q = parseInt(qInput.val());
							if($(this).hasClass("q-plus")){
								q++;
							} else if($(this).hasClass("q-minus") && q >= 2){
								q--;
							}
							qInput.val(q);
						});
					});
				})(window.jQuery)
			</script>
		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>
	


<?php
do_action( 'woocommerce_after_add_to_cart_form' );
