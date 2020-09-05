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
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<h5 class="shopping-cart-title"><?php echo esc_html__( 'Shopping Cart', 'pangja' ); ?></h5>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

    <?php do_action( 'woocommerce_before_cart_table' ); ?>

    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
        <thead>
            <tr>
                <th class="product-thumbnail">
                    <?php echo esc_html__( 'Image', 'pangja' ); ?>
                </th>
                <th class="product-name"><?php echo esc_html__( 'Product', 'pangja' ); ?></th>
                <th class="product-price"><?php echo esc_html__( 'Price', 'pangja' ); ?></th>
                <th class="product-quantity"><?php echo esc_html__( 'Quantity', 'pangja' ); ?></th>
                <th class="product-subtotal"><?php echo esc_html__( 'Total', 'pangja' ); ?></th>
                <th class="product-remove">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

            <?php
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                ?>
            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                <td class="product-thumbnail">

                    <?php
                    /*print("<pre>".print_r($cart_item,true)."</pre>");*/
                    /*<a href="http://acme:8888/wp-content/uploads/wapf/0378b204dc3c3c29e7c3ae08c13e7e0d/2020/09/Die-cut-stickers-orange.png" target="_blank">Die-cut-stickers-orange.png</a>*/
                    /*print_r($cart_item[wapf][2][values][0][label]); */
                    $uploaded_thumbnail_code = $cart_item["wapf"][2]["values"][0]["label"];
                    /*string*/
                    /*
                    $uploaded_thumbnail_link = substr($uploaded_thumbnail_code, 9); 
                    echo $uploaded_thumbnail_link;*/
                    preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $uploaded_thumbnail_code, $match);
                    /* print_r($match[0]); */
                    $uploaded_thumbnail_link = implode($match[0]); 
                    /*echo $uploaded_thumbnail_link;*/
                    if ( ! $uploaded_thumbnail_link ) {
                        echo wp_kses_post( $thumbnail ); // PHPCS: XSS ok.
                    } else {
                    echo '
                        <img width="145" height="145" src='.$uploaded_thumbnail_link.' class="woocommerce-placeholder wp-post-image" alt="Placeholder" loading="lazy" srcset="'.$uploaded_thumbnail_link.'" sizes="(max-width: 145px) 100vw, 145px">
                        ';
                        } 
                    ?>

                            <?php
                            /*
                            $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(array('145','180')), $cart_item, $cart_item_key );

                            if ( ! $product_permalink ) {
                                echo wp_kses_post( $thumbnail ); // PHPCS: XSS ok.
                            } else {
                                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                            }
                            */
                            ?>
                </td>

                <td class="product-name" data-title="<?php echo esc_attr__( 'Product', 'pangja' ); ?>">
                    <?php
                            if ( ! $product_permalink ) {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', esc_html( $_product->get_name() ), $cart_item, $cart_item_key ) . '&nbsp;' );
                            } else {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), esc_html( $_product->get_name() ) ), $cart_item, $cart_item_key ) );
                            }

                            do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                            // Meta data
                            echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                            // Backorder notification
                            if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'pangja' ) . '</p>', $product_id ) );
                            }
                        ?>
                </td>

                <td class="product-price" data-title="<?php echo esc_attr__( 'Price', 'pangja' ); ?>">
                    <?php
                            echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                        ?>
                </td>

                <td class="product-quantity" data-title="<?php echo esc_attr__( 'Quantity', 'pangja' ); ?>">
                    <?php
                            if ( $_product->is_sold_individually() ) {
                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                            } else {
                                $product_quantity = woocommerce_quantity_input(
                                    array(
                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                        'input_value'  => $cart_item['quantity'],
                                        'max_value'    => $_product->get_max_purchase_quantity(),
                                        'min_value'    => '0',
                                        'product_name' => $_product->get_name(),
                                    ),
                                    $_product,
                                    false
                                );
                            }

                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                        ?>
                </td>

                <td class="product-subtotal" data-title="<?php echo esc_attr__( 'Total', 'pangja' ); ?>">
                    <?php
                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                        ?>
                </td>

                <td class="product-remove">
                    <?php
                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                'woocommerce_cart_item_remove_link', 
                                sprintf(
                                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_html__( 'Remove this item', 'pangja' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
                                ), 
                                $cart_item_key 
                            );
                        ?>
                </td>

            </tr>
            <?php
            }
        }

        ?>
            <?php do_action( 'woocommerce_cart_contents' ); ?>

            <tr>
                <td colspan="6" class="actions">

                    <?php if ( wc_coupons_enabled() ) { ?>
                    <div class="coupon">

                        <label for="coupon_code"><?php echo esc_html__( 'Coupon:', 'pangja' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php echo esc_attr__( 'Coupon code', 'pangja' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php echo esc_attr__( 'Apply Coupon', 'pangja' ); ?>"><?php echo esc_html__( 'Apply Coupon', 'pangja' ); ?></button>

                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                    </div>
                    <?php } ?>

                    <button type="submit" class="button" name="update_cart" value="<?php echo esc_attr__( 'Update Cart', 'pangja' ); ?>"><?php echo esc_html__( 'Update cart', 'pangja' ); ?></button>

                    <?php do_action( 'woocommerce_cart_actions' ); ?>

                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </td>
            </tr>

            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
        </tbody>
    </table>

    <?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">

    <?php
        /**
         * Cart collaterals hook.
         *
         * @hooked woocommerce_cross_sell_display
         * @hooked woocommerce_cart_totals - 10
         */
        do_action( 'woocommerce_cart_collaterals' );
    ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
