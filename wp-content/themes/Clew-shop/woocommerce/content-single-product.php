<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<div class="section__single-product-card">
	<div class="inner">
			<div class="product-card-slider">
				<div class="owl-carousel owl-theme">
					<?php if(get_field('gallery')): ?>

						<?php while(the_repeater_field('gallery')): ?>

							<div>
								<div class="item"><img src=" <?php echo the_sub_field('img'); ?>" alt=""></div>
							</div>

						<?php endwhile; ?>

					<?php endif; ?>
                </div>

                <div class="top-banner__controls">

                    <a href="#" class="topsl-prev top-banner__control">
                        <svg width="12" height="14" viewBox="0 0 12 14" fill="#000" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.53355 13.7105L1.26695 8.33412C0.914683 8.10502 0.727907 7.71099 0.74304 7.31586C0.727907 6.92073 0.914683 6.5267 1.26695 6.2976L9.53355 0.921218C10.0586 0.579706 10.7526 0.733977 11.0836 1.26579C11.4145 1.79761 11.2572 2.50558 10.7321 2.84709L3.86097 7.31586L10.7321 11.7846C11.2572 12.1261 11.4145 12.8341 11.0836 13.3659C10.7526 13.8977 10.0586 14.052 9.53355 13.7105ZM2.20615 6.28309C2.20631 6.28314 2.20646 6.28319 2.20661 6.28324L9.79775 1.34617C10.0914 1.15521 10.4794 1.24147 10.6644 1.53883C10.7244 1.63518 10.7557 1.74186 10.7606 1.84857C10.7558 1.74172 10.7245 1.63487 10.6644 1.53839C10.4794 1.24103 10.0913 1.15477 9.79773 1.34573L2.20615 6.28309ZM3.40252 7.61402L10.4679 12.2091C10.6503 12.3278 10.7534 12.5256 10.7609 12.7297C10.7532 12.5258 10.6502 12.3282 10.4679 12.2097L3.40212 7.61429L3.40252 7.61402Z" />
                        </svg>
                    </a>
                    <a href="#" class="topsl-next top-banner__control">
                        <svg width="12" height="14" viewBox="0 0 12 14" fill="#000" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.46645 13.7105L10.7331 8.33412C11.0853 8.10502 11.2721 7.71099 11.257 7.31586C11.2721 6.92073 11.0853 6.5267 10.7331 6.2976L2.46645 0.921218C1.94135 0.579706 1.24738 0.733977 0.91642 1.26579C0.585461 1.79761 0.742844 2.50558 1.26794 2.84709L8.13903 7.31586L1.26794 11.7846C0.742844 12.1261 0.585461 12.8341 0.91642 13.3659C1.24738 13.8977 1.94135 14.052 2.46645 13.7105ZM9.79385 6.28309C9.79369 6.28314 9.79354 6.28319 9.79339 6.28324L2.20225 1.34617C1.90864 1.15521 1.52061 1.24147 1.33555 1.53883C1.27559 1.63518 1.2443 1.74186 1.23938 1.84857C1.24424 1.74172 1.27553 1.63487 1.33557 1.53839C1.52063 1.24103 1.90866 1.15477 2.20227 1.34573L9.79385 6.28309ZM8.59748 7.61402L1.53212 12.2091C1.34969 12.3278 1.24663 12.5256 1.23914 12.7297C1.24679 12.5258 1.34983 12.3282 1.53211 12.2097L8.59788 7.61429L8.59748 7.61402Z" />
                        </svg>
                    </a>

            </div>
		</div>
		<div class="single-product__information">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked add_header_composition - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta_delete - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
</div>

	


