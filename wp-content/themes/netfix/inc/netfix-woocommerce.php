<?php
/**
 * [netfix_remove_hook description]
 * @return [type] [description]
 */
function netfix_remove_hook() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	add_action( 'netfix_before_shop_loop_item_thumb', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	add_action( 'woocommerce_sidebar', 'netfix_woocommerce_get_sidebar', 10 );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	add_action( 'woocommerce_single_product_summary', 'netfix_woo_rating', 5 );
	add_action( 'woocommerce_mid_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5 );
	add_action( 'netfix_woocommerce_mid_shop_loop_item_title', 'netfix_product_cart_button', 10 );
	add_action( 'netfix_woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'netfix_woocommerce_template_loop_price', 10 );

	remove_action( 'yith_wcqv_product_image', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'yith_wcqv_product_image', 'woocommerce_show_product_images', 20 );

	add_action( 'yith_wcqv_product_image', 'netfix_quick_view_images', 21 );

	remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 10 );
	add_action( 'yith_wcqv_product_summary', 'netfix_woo_rating', 10 );

	add_action( 'netfix_woocommerce_after_shop_loop_item', 'netfix_list_product_cart_button', 20 );
	add_action( 'netfix_woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 10 );

	remove_action( 'woocommerce_product_tabs', 'dokan_set_more_from_seller_tab', 10 );
    remove_action('woocommerce_product_tabs', 'dokan_seller_product_tab');
}

netfix_remove_hook();

add_filter( 'woocommerce_show_page_title', function () {
	return false;
} );


/**
 * Single Product
 */

if ( ! function_exists( 'netfix_quick_view_images' ) ) {

	/**
	 * Output the product image before the single product summary.
	 */
	function netfix_quick_view_images() { ?>
        <div class="bdevs-quick-view-images">
			<?php wc_get_template( 'single-product/product-image.php' );
			?>
        </div>
		<?php
	}
}


/**
 * [netfix_product_title description]
 * @return [type] [description]
 */
function netfix_product_title() {
	echo '<h6 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';
}

/**
 * [netfix_woo_rating description]
 * @return [type] [description]
 */


function netfix_woo_rating() {
	global $product;
	$rating = $product->get_average_rating();
	$review = 'Rating ' . $rating . ' out of 5';
	$html   = '';
	$html   .= '<div class="details-rating mb-10" title="' . $review . '">';
	for ( $i = 0; $i <= 4; $i ++ ) {
		if ( $i < floor( $rating ) ) {
			$html .= '<a href="#" class="active"><i class="fas fa-star"></i></a>';
		} else {
			$html .= '<a href="#"><i class="far fa-star"></i></a>';
		}
	}
	$html .= '<span>( ' . $rating . ' out of 5 )</span>';
	$html .= '</div>';
	print netfix_woo_rating_html( $html );
}

function netfix_woo_rating_html( $html ) {
	return $html;
}

/**
 * [netfix_woo_rating description]
 * @return [type] [description]
 */
function netfix_woo_shop_rating() {
	global $product;
	$rating = $product->get_average_rating();
	$review = esc_html( 'Rating ' . $rating . ' out of 5' );
	ob_start(); ?>
    <div class="shop-rating" title="<?php print esc_attr( $review ); ?>">
		<?php
		for ( $i = 0; $i <= 4; $i ++ ) {
			if ( $i < floor( $rating ) ) { ?>
                <a href="#"><i class="fas fa-star"></i></a>
				<?php
			} else { ?>
                <a href="#"><i class="far fa-star"></i></a>
				<?php
			}
		}
		?>
    </div>
	<?php
	return ob_get_clean();
}

function netfix_get_price() {
	ob_start(); ?>
    <h3 class="price"><?php print netfix_get_price_html(); ?></h3>
	<?php
	return ob_get_clean();
}

function netfix_get_price_html() {
	global $product;

	return $product->get_price_html();
}

/**
 * [netfix_comment_rating description]
 *
 * @param  [type] $rating [description]
 *
 * @return [type]         [description]
 */
function netfix_comment_rating( $rating ) {
	$review = 'Rating ' . $rating . ' out of 5';
	$html   = '';
	$html   .= '<div class="rating" title="' . $review . '">';
	for ( $i = 0; $i <= 4; $i ++ ) {
		if ( $i < floor( $rating ) ) {
			$html .= '<a href="#"><i class="fas fa-star"></i></a>';
		} else {
			$html .= '<a href="#"><i class="far fa-star"></i></a>';
		}
	}
	$html .= '</div>';

	return $html;
}


add_filter( 'add_to_cart_fragments', 'netfix_woocommerce_header_add_to_cart_fragment' );

/**
 * [netfix_woocommerce_header_add_to_cart_fragment description]
 *
 * @param  [type] $fragments [description]
 *
 * @return [type]            [description]
 */
function netfix_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
    <a class="cp-minicart" href="<?php echo wc_get_cart_url(); ?>"><i class="fas fa-shopping-cart"></i><span
                id="zibber-cart"
                class="mini-cart-items"><?php print WC()->cart->get_cart_contents_count(); ?></span></a>
	<?php
	$fragments['a.cp-minicart'] = ob_get_clean();

	return $fragments;
}

function netfix_vc_yith_wishlist() {

	global $product;

	$cssclass = 'wishlist-rd';
	$mar      = 'tanzim-mar-top';

	$id   = $product->get_id();
	$type = $product->get_type();
	$link = get_site_url();

	$img    = '<img src="' . esc_attr( $link ) . '/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading tanzim_wi_loder" alt="' . esc_attr( 'loading' ) . '" width="16" height="16" style="visibility:hidden">';
	$markup = '';

	if ( NETFIX_WISHLIST_ACTIVED ) {

		$markup .= '<div class="yith-wcwl-add-to-wishlist ' . $mar . ' add-to-wishlist-' . $id . '">';
		$markup .= '<div class="yith-wcwl-add-button wishlist show" style="display:block">';
		$markup .= '<a href="' . $link . '/shop/?add_to_wishlist=' . $id . '" rel="nofollow" data-product-id="' . $id . '" data-product-type="' . $type . '" class="add_to_wishlist ' . $cssclass . '">';
		$markup .= '<i class="fal fa-heart"></i></a>';
		$markup .= $img;
		$markup .= '</div>';
		$markup .= '<div class="yith-wcwl-wishlistaddedbrowse wishlist hide" style="display:none;">';
		$markup .= '<a href="' . $link . '/wishlist/view/" rel="nofollow" class=" ' . $cssclass . '"><i class="fal fa-heart"></i></a>';
		$markup .= $img;
		$markup .= '</div>';
		$markup .= '<div class="yith-wcwl-wishlistexistsbrowse wishlist  hide" style="display:none">';
		$markup .= '<a href="' . $link . '/wishlist/view/" rel="nofollow" class=" ' . $cssclass . '"><i class="fal fa-heart"></i></a>';
		$markup .= $img;
		$markup .= '</div>';
		$markup .= '<div style="clear:both"></div>';
		$markup .= '<div class="yith-wcwl-wishlistaddresponse"></div>';
		$markup .= '</div>';

	}

	return $markup;
}

add_filter( 'woocommerce_product_additional_information_heading', 'netfix_tab_heading' );
add_filter( 'woocommerce_product_description_heading', 'netfix_tab_heading' );

/**
 * [netfix_tab_heading description]
 *
 * @param  [type] $heading [description]
 *
 * @return [type]          [description]
 */
function netfix_tab_heading( $heading ) {
	return '';
}

/**
 * [netfix_woo_pagination description]
 *
 * @param  [type] $pagination [description]
 *
 * @return [type]             [description]
 */
function netfix_woo_pagination( $pagination ) {
	$pagi = '';
	if ( $pagination != '' ) {
		$pagi .= '<ul class="pagination justify-content-start">';
		foreach ( $pagination as $key => $pg ) {
			$pagi .= '<li class="page-item">' . $pg . '</li>';
		}
		$pagi .= '</ul>';
	}

	return $pagi;
}

function netfix_woocommerce_get_sidebar() {
	dynamic_sidebar( 'product-sidebar' );
}

function netfix_woocommerce_template_loop_price() {
	print '<div class="shop-item-content">';
	netfix_product_title();
	echo netfix_get_price();
	netfix_woo_rating();
	print '</div>';
}

function netfix_woocommerce_template_single_price() {
	print '<div class="price mt-15 mb-20">';
	print netfix_get_price_html();
	print '</div>';
}

function woocommerce_template_single_stock() {
	global $product;
	if ( $product->get_stock_quantity() > 0 ) {
		echo '<div class="cart-title">';
		echo '<h6>Availability: <span>In Stock</span></h6>';
		echo '</div>';
	} else {
		if ( $product->backorders_allowed() ) {
			echo '<div class="cart-title">';
			echo '<h6>Availability: <span>On Backorder</span></h6>';
			echo '</div>';
		} else {
			echo '<div class="cart-title">';
			echo '<h6>Availability: <span>Out of stock</span></h6>';
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'netfix_header_add_to_cart_fragment' ) ) {
	function netfix_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
        <span class="cart__count" id="zibber-cart-item">
			<?php echo esc_html( WC()->cart->cart_contents_count ); ?>
		</span>
		<?php
		$fragments['#zibber-cart-item'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'netfix_header_add_to_cart_fragment' );

if ( ! function_exists( 'netfix_header_add_to_cart_price' ) ) {
	function netfix_header_add_to_cart_price( $fragments ) {
		ob_start();
		?>
        <span class="cart__amount" id="zibber-total-price">
			<?php echo WC()->cart->get_cart_total(); ?>
		</span>
		<?php
		$fragments['#zibber-total-price'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'netfix_header_add_to_cart_price' );

function netfix_quick_view_button( $product_id ) {
	if ( NETFIX_QUICK_VIEW_ACTIVED ) {
		$product = wc_get_product( $product_id );
		$button  = '';
		if ( $product_id ) {

			$button = '<a href="#" class="button yith-wcqv-button" data-product_id="' . esc_attr( $product_id ) . '" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fal fa-eye"></i></a>';
			$button = apply_filters( 'yith_add_quick_view_button_html', $button, '', $product );
		}

		return $button;
	}
}

function netfix_product_compare_button( $product_id ) {
	if ( NETFIX_COMPARE_ACTIVED ) {
		$product = wc_get_product( $product_id );
		$button  = '';
		if ( $product_id ) {
			$url_args = array(
				'action' => 'yith-woocompare-add-product',
				'id'     => $product_id
			);
			$button   = sprintf( '<a href="%1$s" class="compare button" data-product_id="%2$s" rel="nofollow"><i class="fal fa-exchange"></i></a>',
				get_page_link() . '?action=yith-woocompare-add-product&amp;id=' . esc_attr( $product_id ),
				esc_attr( $product_id )
			);
		}

		return $button;
	}
}

add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
    <div class="header-mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['.header-mini-cart'] = ob_get_clean();
    return $fragments;
});