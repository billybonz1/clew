<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="c-cart">

        <div class="inner">
			<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
			<?php do_action( 'woocommerce_before_cart_table' ); ?>
            <div class="section__title section__product-title bd-none bgc-f">
                <h2>Кошик:</h2>
                <button class="desktop-clear-cart"><input type="submit" class="button" name="clear-cart" value="<?php _e('Очистити кошик', 'woocommerce'); ?>" /></button>
            </div>

            <button class="mobile-clear-cart"><input type="submit" class="button" name="clear-cart" value="<?php _e('Очистити кошик', 'woocommerce'); ?>" /></button>

            <div class="cart__container">

                <div class="cart__header">
                    <span class="cart__header-thumb">Зображення</span>
                    <span class="cart__header-name">Назва</span>
                    <span class="cart__header-size">Розмір</span>
                    <span class="cart__header-quantity">Кількість</span>
                    <span class="cart__header-price">Ціна</span>
                    <span class="cart__header-delete">Видалити</span>
                </div>

                <div class="cart__list">

					<?php do_action( 'woocommerce_before_cart_contents' ); ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<?php 
								$variation = wc_get_product($cart_item['variation_id']);
								$size = $variation->get_variation_attributes()['attribute_pa_size'];
							?>
							<div class="cart__item woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<div class="cart__item-contain" data-key="<?php echo $cart_item_key; ?>">

								<div class="cart__thumb product-thumbnail">
								<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail; // PHPCS: XSS ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
								}
								?>
								</div>

								<div class="cart__name product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								<span class="mobile-name">Назва:</span>
								<?php
								if ( ! $product_permalink ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
								} else {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								}

								do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

								// Meta data.
								echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

								// Backorder notification.
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
								}
								?>
								</div>

								<div class="cart__size"><span class="mobile-name">Розмір:</span><span class="name-title"><?php
									echo $size;
								?></span></div>

								<div class="cart__quantity product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
								<span class="mobile-name">Кількість:</span>
								<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $_product->get_max_purchase_quantity(),
										'min_value'    => '0',
										'product_name' => $_product->get_name(),
									), $_product, false );
								}
								?>

								<div class="variation-quantity">
									<?php echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok. ?>
								</div>

								
								</div>

								<div class="cart__price product-subtotal" data-price="<?php echo $_product->get_regular_price(); ?>" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
									<span class="mobile-name">Ціна:</span>
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</div>
								<div class="cart__delete product-remove">
									<?php
										// @codingStandardsIgnoreLine
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M12.3043 0.786039C12.7337 1.19876 12.7386 1.8731 12.3153 2.2922L2.32689 12.1807C1.90355 12.5998 1.21225 12.6049 0.782832 12.1922C0.353413 11.7795 0.348485 11.1052 0.771826 10.6861L10.7602 0.797588C11.1836 0.378484 11.8749 0.373313 12.3043 0.786039Z"
												fill="black" />
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M12.3043 12.2494C12.7337 11.8366 12.7386 11.1623 12.3153 10.7432L2.32689 0.854732C1.90355 0.435628 1.21225 0.430457 0.782832 0.843183C0.353413 1.25591 0.348485 1.93024 0.771826 2.34934L10.7602 12.2378C11.1836 12.6569 11.8749 12.6621 12.3043 12.2494Z"
												fill="black" />
										</svg></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											__( 'Remove this item', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								</div>
								</div>
							</div>
							<?php
						}
					}
					?>

					<?php do_action( 'woocommerce_cart_contents' ); ?>

                </div>

                <div class="cart__added">
                    <div class="added-title">Додатково</div>
                    <div class="added__content">
                        <div class="ad-content__line">
                            <span class="added-info">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                            <input id="check1" type="checkbox">
                            <label for="check1">+ Stickers</label>
                            <a href="#" class="open-ad-info">i</a>
                        </div>
                        <div class="ad-content__line">
                            <span class="added-info">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                            <input id="check2" type="checkbox">
                            <label for="check2">+ Gift Packege</label>
                            <a href="#" class="open-ad-info">i </a>
                        </div>
                        <div class="ad-content__line">
                            <span class="added-info">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                            <input id="check3" type="checkbox">
                            <label for="check3">Купити в кредит</label>
                            <a href="#" class="open-ad-info">i </a>
                        </div>
                    </div>
                </div>

                <div class="cart__delivery">
                    <div class="added-title">Доставка</div>
                    <div class="delivery__content">
                        <div class="delivery__line">
                            <input id="radio1" type="radio" required name="group2">
                            <label for="radio1" class="label-delivery">
                                Самовивіз (Львів)
                            </label>
                        </div>

                        <div class="delivery__line">
                            <input id="radio2" type="radio" name="group2">
                            <label for="radio2" class="label-delivery">
                                Закордон
                            </label>
                        </div>
                        <div class="delivery__line">
                            <input id="radio3" type="radio" name="group2">
                            <label for="radio3" class="label-delivery">
                                Нова Пошта
                            </label>
                        </div>
                        <div class="delivery__line">
                            <input id="radio4" type="radio" name="group2">
                            <label for="radio4" class="label-delivery">
                                Укрпошта
                            </label>
                        </div>
                    </div>
                </div>

                <div class="cart__total">
                    <span class="mobile-name">Всього:</span>
                    <span class="mobile-total">350 грн</span>
                </div>
                
                <div class="cart__btn">

                    <div class="cart__continue"><a href="#">продовжити покупку</a></div>

                    <div class="cart__checkout"><a href="#">перейти до оформлення</a></div>

				</div>

			</div>
			
			</form>

        </div>

    </div>



<?php do_action( 'woocommerce_after_cart' ); ?>
