<?php
function updateCartItem(){
    if($_REQUEST['action'] == "change_quantity"){
        $cart = WC()->instance()->cart;
        $var = $cart->set_quantity( $_REQUEST['cart_item_id'], $_REQUEST['q'] );
        exit();
    }

}
add_action("pre_get_posts", "updateCartItem");