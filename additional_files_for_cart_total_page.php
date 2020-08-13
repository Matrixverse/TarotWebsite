<?php


/* Checkout minimum order business account Vladan - this action need to be called from
function.php file of your theme */


add_action( 'woocommerce_checkout_process', 'wdm_wu_minimum_order_amount' );

function wdm_wu_minimum_order_amount() {

    $current_screen_user = wp_get_current_user();
    if( in_array( 'zakelijk_account', $current_screen_user->roles ) ) {

      $minimum = 50;

    if ( WC()->cart->subtotal < $minimum ) {
       if( is_cart() ) {
           wc_print_notice(
               sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' ,

                   wc_price( $minimum ),
                   wc_price( WC()->cart->subtotal )
               ), 'error'
           );

       } else {
           wc_add_notice(
               sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' ,

                   wc_price( $minimum ),
                   wc_price( WC()->cart->subtotal )

               ), 'error'
           );
       } } } }
  ?>
