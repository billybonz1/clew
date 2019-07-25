<?php


add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
    'desktop-g'    => __( 'Desktop-general', 'clew' ),
    'toggle1' => __( 'Toggle1', 'clew' ),
    'toggle2' => __( 'Toggle2', 'clew' ),
    'mobile-g' => __( 'Mobile-general', 'clew' ),
    'footer1' => __( 'Footer 1', 'clew' ),
    'footer2' => __( 'Footer 2', 'clew' ),
    'footer3' => __( 'Footer 3', 'clew' ),
    'footer4' => __( 'Footer 4', 'clew' ),
) );

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
) );

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'audio',
) );

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Setup single product page

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count' , 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 20);

remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
add_action('woocommerce_shop_loop_item_title', 'abChangeProductsTitle', 10 );
function abChangeProductsTitle() {
    echo '<span class="product__item-name">' . get_the_title() . '</span>';
}

add_action('woocommerce_single_product_summary', 'add_header_composition', 10 );
function add_header_composition() {
    echo '<p class="header__composition">' . the_content() . '</p>';
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

add_action('woocommerce_single_product_summary', 'add_product_title', 5 );
function add_product_title(){
    echo '<h3 class="header__product-name">'. get_the_title() .'</h3>';
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action('woocommerce_single_product_summary', 'add_header_product_type', 5 );
function add_header_product_type() {
    echo '<span class="header__product-type">' . get_field('product_type') . '</span>';
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +
  
function woo_custom_single_add_to_cart_text() {
  
    return __( 'Додати до кошика', 'woocommerce' );
}
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );

// End Product page

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'UAH': $currency_symbol = ' грн'; break;
     }
     return $currency_symbol;
}

function wp_get_menu_array($current_menu) {

	$array_menus = wp_get_nav_menu_items($current_menu);
    $menu = array();
    
    print_r($array_menus);

	foreach ($array_menus as $array_menu) {
		if (empty($array_menu->menu_item_parent)){
			$curent_id = $array_menu->ID;
			$menu[$curent_id] = array(
				'id'         =>   $curent_id,
				'title'      =>   $array_menu->title,
				'href'        =>  $array_menu->url,
				'children'    =>   array()
			);
		}

		if (isset($curent_id) && $curent_id == $array_menu->menu_item_parent) {
			$submenu_id = $array_menu->ID;
			$menu[$curent_id]['children'][$array_menu->ID] = array(
				'id'         =>   $submenu_id,
				'title'      =>   $array_menu->title,
				'href'        =>  $array_menu->url,
				'children'    =>   array()
			);
		}
	}

	return $menu;
}

function woo_products_by_tags_shortcode( $atts, $content = null ) {
    // Получаем свойства
    extract(shortcode_atts(array(
    "tags" => ''
    ), $atts));
    ob_start();
    // Определяем параметры запроса
    $args = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'product_tag' => $tags
    );
    // Создаем новый запрос
    $loop = new WP_Query( $args );
    // Получаем количество товаров
    $product_count = $loop->post_count;
    // Если результат
    if( $product_count > 0 ) :
    echo '<div class="section__product-list">';
    // Начало цикла
    while ( $loop->have_posts() ) : $loop->the_post(); global $product;
    global $post;
    echo '<a href="" class="section__product-item">';
    echo "<p>" . $thePostID = $post->post_title. " </p>";
    if (has_post_thumbnail( $loop->post->ID ))
    echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
    else
    echo '<img src="'.$woocommerce->plugin_url().'/assets/images/placeholder.png" alt="" width="'.$woocommerce->get_image_size('shop_catalog_image_width').'px" height="'.$woocommerce->get_image_size('shop_catalog_image_height').'px" />';
    endwhile;
    echo '</div><!--/.products-->';
    else :
    _e('Товаров, удовлетворяющих заданные условия поиска, не найдено.');
    endif; // endif $product_count > 0
    return ob_get_clean();
    }
    add_shortcode("woo_products_by_tags", "woo_products_by_tags_shortcode");
    
    add_action('init', 'woocommerce_clear_cart_url');
    function woocommerce_clear_cart_url() {
    global $woocommerce;
        if( isset($_REQUEST['clear-cart']) ) {
        $woocommerce->cart->empty_cart();
        }
    }