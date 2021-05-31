<?php

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    //Declare WooCommerce support
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }



    //Columns Settings based on Theme Options
    add_filter( 'loop_shop_columns', 'loop_columns' );
    if ( ! function_exists( 'loop_columns' ) ) {

        function loop_columns() {
            $ale_column = ale_get_option( 'woo_columns' );

            switch ( $ale_column ) {
                case '1' :
                    return 1;
                    break;
                case '2' :
                    return 2;
                    break;
                case '3' :
                    return 3;
                    break;
                case '4' :
                    return 4;
                    break;
                case '5' :
                    return 5;
                    break;
            }
        }
    }

    //Related products count based on columns option settings
    add_filter( 'woocommerce_output_related_products_args', 'ale_related_products_args' );
    function ale_related_products_args( $args ) {
        $ale_column = ale_get_option( 'woo_columns' );

        switch ( $ale_column ) {
            case '1' :
                $args['posts_per_page'] = 1;
                $args['columns']        = 1;

                return $args;
                break;
            case '2' :
                $args['posts_per_page'] = 2;
                $args['columns']        = 2;

                return $args;
                break;
            case '3' :
                $args['posts_per_page'] = 3;
                $args['columns']        = 3;

                return $args;
                break;
            case '4' :
                $args['posts_per_page'] = 4;
                $args['columns']        = 4;

                return $args;
                break;
            case '5' :
                $args['posts_per_page'] = 5;
                $args['columns']        = 5;

                return $args;
                break;
        }
    }

    //Up sells Products columns based on options columns
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

    if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
        function woocommerce_output_upsells() {
            $ale_column = ale_get_option( 'woo_columns' );

            switch ( $ale_column ) {
                case '1' :
                    woocommerce_upsell_display( 1, 1 );
                    break;
                case '2' :
                    woocommerce_upsell_display( 2, 2 );
                    break;
                case '3' :
                    woocommerce_upsell_display( 3, 3 );
                    break;
                case '4' :
                    woocommerce_upsell_display( 4, 4 );
                    break;
                case '5' :
                    woocommerce_upsell_display( 5, 5 );
                    break;
            }
        }
    }

    //Custom Styles
    function ale_custom_woo_styles() {
        echo "<style type='text/css'>";

        echo "
        .woocommerce span.onsale {
            background-color:#000;
            top:0;
            left:0;
            margin:0;
            border-radius:0;
        }
        .products .product {
            text-align:center;
        }
        .products a:hover {
            opacity:1;
        }
        .products .product .border_style {
            margin-bottom:30px;
        }
        .woo_category {
            color:#acacac;
            font-size:12px;
        }
        .woo_category a {
            color:inherit;
            transition:all 300ms ease-in-out;
        }
        .woo_category a:hover {
            opacity:0.6;
            transition:all 300ms ease-in-out;
        }
        .products .product h3 {
            font-size:16px;
            color:#000000;
            font-style:normal;
            font-weight:500;
            margin-bottom:0;
        }
        woocommerce .price {
            color:#000!important;
        }
        .price del .amount {
            font-size:14px;
        }
        .price ins {
            text-decoration:none;
        }
        .price .amount {
            font-size:18px;
            font-weight:700;
            color:#000;
            text-decoration:none;
        }
        .products .product .price {
            display:block;
            text-align:center;
            margin-bottom:15px;
            line-height:22px;
        }
        .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
            background:#FFF;
            border:3px solid #000;
            border-radius:0;
            color:#000;
            font-weight:900;
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:0.26em;
            padding: 1em 1.2em;
        }
        .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover {
            background-color:#000;
            color:#FFF;
            opacity:1;
        }
        .woocommerce a.added_to_cart {
            font-size:12px;
        }
        .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
            background-color:#FFF;
            color:#000;
        }
        .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
            background-color:#000;
            color:#FFF;
        }
        .woocommerce nav.woocommerce-pagination ul li {
            border:0;
            margin:5px;
            border: 2px solid #f3f4f4;
            border-radius:3px;
        }
        .woocommerce nav.woocommerce-pagination ul {
            border:0;
            margin:20px 0;
        }
        .woocommerce nav.woocommerce-pagination ul li a {
            color:inherit;
            width:25px;
            height:25px;
            line-height:25px;
            padding:0;
        }
        .woocommerce nav.woocommerce-pagination ul li span {
            width:25px;
            height:25px;
            line-height:25px;
            padding:0;
        }
        .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current {
            color:#000;
            background-color:#f3f4f4;
            opacity:1;
        }
        .ale_single_product_page h1.product_title {
            color:#000000;
            font-style:normal;
            font-weight:700;
            font-size:18px;
            margin-bottom:5px;
        }
        .ale_single_product_page h2, .ale_single_product_page h3, .cart-collaterals h2, .woocommerce-checkout h3 {
            color:#000000;
            font-style:normal;
            font-weight:700;
            font-size:16px;
            margin-bottom:20px;
        }
        .woocommerce-Reviews ol li {
            list-style:none;
        }
        .woocommerce .quantity .qty,#add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text {
            min-height:35px;
            border: 1px solid #f2f2f2;
            border-bottom:4px solid #f2f2f2;
            box-sizing: border-box;
            padding: 10px;
            font-size: 14px;
            color:#898989;
            margin-right:15px;
        }
        .cart input[type=submit] {
            height:auto;
        }
        .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals {
            width:auto;
            float:left;
        }
        .woocommerce table.shop_table {
            border-radius:0;
            border-collapse: collapse;
            border:0;
            margin-top:20px;
            margin-bottom:50px;
        }
        .woocommerce #respond input#submit.loading:after, .woocommerce a.button.loading:after, .woocommerce button.button.loading:after, .woocommerce input.button.loading:after {
            top:auto;
        }
        .ale_single_product_page .product_meta > span {
            display:block;
        }
        .ale_single_product_page .product_meta {
            color:#acacac;
            font-size:12px;
        }
        .ale_single_product_page .product_meta a {
            color:inherit;
            transition:all 300ms ease-in-out;
        }
        .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover {
            background-color:#000;
            color:#FFF;
        }
        .woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] {
            padding:1em 1.2em;
        }
        .reset_variations {
            margin-left:15px;
        }
        .woocommerce-variation-price {
            margin-bottom:15px;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs:before {
            border-bottom:4px solid #f2f2f2;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs li {
            border:4px solid #f2f2f2;
            background-color:#f2f2f2;
            border-radius:0;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs li:before,.woocommerce div.product .woocommerce-tabs ul.tabs li:after {
            display:none;
        }
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
            border-bottom-color:#f2f2f2;
        }
        .woocommerce .cart-collaterals .cross-sells, .woocommerce-page .cart-collaterals .cross-sells {
            width:100%;
            float:none;
            margin-bottom:50px;
        }
        #add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button {
            font-size:12px;
        }
        #add_payment_method #payment ul.payment_methods li, .woocommerce-cart #payment ul.payment_methods li, .woocommerce-checkout #payment ul.payment_methods li {
            list-style:none;
        }


        /* Vintage Grid Style */
        /* ================== */

        .products .vintage-item .image_holder {
            position: relative;
            display:inline-block;
            transition:all 300ms ease-in-out;
            margin-bottom:20px;
        }
        .products .vintage-item .image_holder::before {
            content: '';
            display: block;
            position: absolute;
            top:3px;
            left:3px;
            right:3px;
            bottom:3px;
            border:1px solid #FFF;
            transition:all 300ms ease-in-out;
            z-index: 9;
        }
        .products .vintage-item .image_holder::after {
            content: '';
            display: block;
            position: absolute;
            top:7px;
            left:7px;
            right:7px;
            bottom:7px;
            border:1px solid #FFF;
            transition:all 300ms ease-in-out;
            z-index: 9;
        }
        .products .vintage-item .image_holder span.onsale {
            z-index:10;
        }
        .products .vintage-item .image_holder img {
            transition:all 300ms ease-in-out;
        }
        .products .vintage-item .image_holder:hover::after {
            top:14px;
            left:14px;
            right:14px;
            bottom:14px;
            transition:all 300ms ease-in-out;
        }
        .products .vintage-item .image_holder:hover::before {
            top:10px;
            left:10px;
            right:10px;
            bottom:10px;
            transition:all 300ms ease-in-out;
        }
        .products .vintage-item .image_holder:hover img {
            -webkit-filter: sepia(0.6);
            filter: sepia(0.6);
            transition:all 300ms ease-in-out;
        }
        .products .vintage-item .woocommerce-LoopProduct-link h3 {
            font-size:28px;
            color:#262526;
            letter-spacing: 0.025em;
            margin-bottom:5px;
            transition:all 300ms ease-in-out;
        }
        .products .vintage-item .woocommerce-LoopProduct-link {
            display:inline-block;
        }
        .products .vintage-item .woocommerce-LoopProduct-link:hover h3 {
            opacity:0.7;
            transition:all 300ms ease-in-out;
        }
        .products .vintage-item .woo_category {
            display:block;
            font-size:13px;
            font-style:italic;
        }
        .products .vintage-item .shop_separator {
            width:100%;
            height:3px;
            border-top:1px solid #f2f2f2;
            border-bottom:1px solid #f2f2f2;
            margin:25px 0;
        }
        .products .vintage-item .bottom_shop_item {

        }
        .products .vintage-item .bottom_shop_item .price {
            display:inline-block;
            padding:0.4em 2em;
            border:1px solid #f2f2f2;
        }
        .products .vintage-item .bottom_shop_item .button,
        .products .vintage-item:hover .bottom_shop_item .price {
            display:none;
        }
        .products .vintage-item:hover .bottom_shop_item .button {
            display:inline-block;
            font-weight:400;
            font-size:13px;
            border:1px solid #f2f2f2;
        }
        .woocommerce .vintage-item-style div.product .product_title {
            font-size:28px;
            color:#262526;
            font-weight:400;
        }
        .woocommerce .vintage-item-style div.product .price,.woocommerce .vintage-item-style div.product .price .amount {
            color:#262526;
            font-weight:400;
        }
        .woocommerce .vintage-item-style div.product .woocommerce-product-rating {
            display:flex;
        }
        .woocommerce .vintage-item-style div.product .woocommerce-product-rating .woocommerce-review-link {
            order:1;
            margin-right:10px;
            font-weight:400;
            font-style:italic;
            color:#898989;
            font-size:13px;
        }
        .woocommerce .vintage-item-style div.product .woocommerce-product-rating .star-rating {
            order:2;
            margin: 0.4em 4px 0 0;
        }
        .woocommerce .vintage-item-style div.product .images .woocommerce-main-image {
            position: relative;
            display:inline-block;
            transition:all 300ms ease-in-out;
        }
        .woocommerce .vintage-item-style div.product .images .woocommerce-main-image::before {
            content: '';
            display: block;
            position: absolute;
            top:3px;
            left:3px;
            right:3px;
            bottom:3px;
            border:1px solid #FFF;
            transition:all 300ms ease-in-out;
            z-index: 9;
        }
        .woocommerce .vintage-item-style div.product .images .woocommerce-main-image::after {
            content: '';
            display: block;
            position: absolute;
            top:7px;
            left:7px;
            right:7px;
            bottom:7px;
            border:1px solid #FFF;
            transition:all 300ms ease-in-out;
            z-index: 9;
        }
        .woocommerce .vintage-item-style div.product .images .woocommerce-main-image img {
            transition:all 300ms ease-in-out;
        }
         .woocommerce .vintage-item-style div.product .images .woocommerce-main-image:hover::after {
            top:14px;
            left:14px;
            right:14px;
            bottom:14px;
            transition:all 300ms ease-in-out;
        }
         .woocommerce .vintage-item-style div.product .images .woocommerce-main-image:hover::before {
            top:10px;
            left:10px;
            right:10px;
            bottom:10px;
            transition:all 300ms ease-in-out;
        }
         .woocommerce .vintage-item-style div.product .images .woocommerce-main-image:hover img {
            -webkit-filter: sepia(0.6);
            filter: sepia(0.6);
            transition:all 300ms ease-in-out;
        }
        .woocommerce .vintage-item-style #respond input#submit, .woocommerce .vintage-item-style a.button, .woocommerce .vintage-item-style button.button, .woocommerce .vintage-item-style input.button,
         .vintage-item-style .woocommerce input.button, .woocommerce-cart.vintage-item-style .wc-proceed-to-checkout a.checkout-button {
            background:#FFF;
            border:1px solid #f2f2f2;
            border-radius:0;
            color:#000;
            font-weight:400;
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:0.26em;
            padding: 1em 1.2em;
        }
        .woocommerce .vintage-item-style .quantity .qty,
        .vintage-item-style .woocommerce  .quantity .qty,
        .vintage-item-style #add_payment_method table.cart td.actions .coupon .input-text,
        .woocommerce-cart.vintage-item-style  table.cart td.actions .coupon .input-text,
        .woocommerce-checkout.vintage-item-style table.cart td.actions .coupon .input-text,
         .vintage-item-style .woocommerce input.button {
            min-height:35px;
            border: 1px solid #f2f2f2;
            box-sizing: border-box;
            height:auto;
            font-size: 13px;
            color:#898989;
            margin-right:15px;
        }
        .woocommerce .vintage-item-style div.product .woocommerce-tabs ul.tabs:before {
            border-bottom:1px solid #f2f2f2;
            position:absolute;
            left:0;
            top:100%;
            width:100%;
            margin-top:3px;
        }
        .woocommerce .vintage-item-style div.product .woocommerce-tabs ul.tabs {
            border-bottom:1px solid #f2f2f2;
            position:relative;
            overflow:visible;
        }
        .woocommerce .vintage-item-style div.product .woocommerce-tabs ul.tabs li {
            border:0;
            background:transparent;
        }
        .woocommerce .vintage-item-style  div.product .woocommerce-tabs ul.tabs li.active a {
            color:#898989;
        }
        .woocommerce .vintage-item-style div.product .woocommerce-tabs .panel {
            margin-bottom:4em;
        }
        .woocommerce .vintage-item-style .related h2 {
            text-align:center;
            text-transform:uppercase;
            margin-bottom:30px;
            font-weight:400;
            letter-spacing:0.025em;
        }


        /* Minimal Grid Styles */
        /* =================== */

        .products.shop_grid_minimal {
            overflow:hidden;
        }
        .products .minimal-item {
            box-sizing:border-box;
            margin:0!important;
            border:1px solid #a3875b;
            background-color:#f2f2f2!important;
            margin:-1px!important;
        }
        .products .minimal-item .product_holder {
            position:relative;
            height:100%;
            overflow:hidden;
        }

        .products .minimal-item .product_holder:hover .cart_hover {
            top:0;
            height:100%;
            transition:all 200ms ease-in-out;
        }
        .products .minimal-item .product_holder .cart_hover {
            position:absolute;
            top:-100%;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.3);
            display:flex;
            justify-content: center;
            align-items: center;
            transition:all 200ms ease-in-out;
        }
        .products .minimal-item .product_holder .cart_hover .added_to_cart {
            margin-left:10px;

        }
        .products .minimal-item h3 {
            margin-top:10px;
            font-size:18px;
            font-weight:400;
            text-transform:uppercase;
            margin-bottom:10px;
        }
        .products .minimal-item .price {
            min-height:20px;
            font-size:14px;
            font-weight:400;
        }
        .products .minimal-item .price .amount {font-size:14px;font-weight:400;}

        .products .minimal-item .onsale , .minimal-item-style span.onsale{
            margin-left:10px;
            margin-top:10px;
            background-color:#a3875b;
            -webkit-border-radius: 100%;
            -moz-border-radius: 100%;
            border-radius: 100%;
        }
        .shop_grid_minimal .gutter-sizer {
          width: 0;
        }
        .ale_blog_columns_5.shop_grid_minimal .gutter-sizer {
          width: 0;
        }
        .ale_blog_columns_4.shop_grid_minimal .gutter-sizer {
          width: 0;
        }
        .ale_blog_columns_3.shop_grid_minimal .gutter-sizer {
          width: 0;
        }
        .ale_blog_columns_2.shop_grid_minimal .gutter-sizer {
          width:0;
        }
        .ale_blog_columns_5.shop_grid_minimal .grid-sizer,
        .ale_blog_columns_5.shop_grid_minimal .minimal-item {
          width: calc(20% + 2px);
          float: left;
        }
        .ale_blog_columns_4.shop_grid_minimal .grid-sizer,
        .ale_blog_columns_4.shop_grid_minimal .minimal-item {
          width: calc(25% + 2px);
          float: left;
        }
        .ale_blog_columns_3.shop_grid_minimal .grid-sizer,
        .ale_blog_columns_3.shop_grid_minimal .minimal-item {
          width: 33.3333%;
          float: left;
        }
        .ale_blog_columns_2.shop_grid_minimal .grid-sizer,
        .ale_blog_columns_2.shop_grid_minimal .minimal-item {
          width: 50%;
          float: left;
        }
        .woocommerce .minimal-item-style #respond input#submit, .woocommerce .minimal-item-style a.button,
        .woocommerce .minimal-item-style button.button, .woocommerce .minimal-item-style input.button,
         .minimal-item-style .woocommerce input.button,
         .woocommerce-cart.minimal-item-style .wc-proceed-to-checkout a.checkout-button,
          .products .minimal-item a.button,
          .woocommerce .minimal-item-style div.product form.cart .button {
            background:#f2f2f2;
            border:none;
            border-radius:0;
            color:#191919;
            font-weight:400;
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:0;
            padding: 1em 2.2em;
             -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        .woocommerce .minimal-item-style #respond input#submit:hover, .woocommerce .minimal-item-style a.button:hover,
        .woocommerce .minimal-item-style button.button:hover, .woocommerce .minimal-item-style input.button:hover,
         .minimal-item-style .woocommerce input.button:hover,
         .woocommerce-cart.minimal-item-style .wc-proceed-to-checkout a.checkout-button:hover,
          .products .minimal-item a.button:hover,
           .woocommerce .minimal-item-style div.product form.cart .button:hover {
            background-color:#191919;
            color:#FFF;
          }
        .woocommerce .minimal-item-style .quantity .qty,
        .minimal-item-style .woocommerce  .quantity .qty,
        .minimal-item-style #add_payment_method table.cart td.actions .coupon .input-text,
        .woocommerce-cart.minimal-item-style  table.cart td.actions .coupon .input-text,
        .woocommerce-checkout.minimal-item-style table.cart td.actions .coupon .input-text,
         .minimal-item-style .woocommerce input.button {
            min-height:35px;
            border: 1px solid #f2f2f2;
            box-sizing: border-box;
            height:auto;
            font-size: 13px;
            color:#898989;
            margin-right:15px;
        }
        .woocommerce .minimal-item-style div.product div.images div.thumbnails {
            padding-top:0;
        }
        .woocommerce .minimal-item-style div.product div.images div.thumbnails a {
            margin:0!important;
            width:33.333%!important;
        }
        .woocommerce .minimal-item-style .related .products,.woocommerce .minimal-item-style .up-sells .products {
            border:1px solid #a3875b;
        }
        .woocommerce .minimal-item-style div.product .product_title {
            font-size:18px;
            font-weight:400;
            text-transform:uppercase;
            letter-spacing:0.15em;
            margin-bottom:10px;
        }
       .woocommerce .minimal-item-style div.product .price {
            font-size:14px;
            font-weight:400;
        }
        .woocommerce .minimal-item-style div.product .amount {font-size:14px;font-weight:400;}
        .woocommerce .minimal-item-style .related h2,.woocommerce .minimal-item-style .up-sells h2 {
            font-size:20px;
            text-transform:uppercase;
            letter-spacing:0.15em;
            padding-top:40px;
            margin-bottom:80px;
            position:relative;
            font-weight:400;
        }
        .woocommerce .minimal-item-style .related h2::before,.woocommerce .minimal-item-style .up-sells h2::before {
            content:'';
            display:block;
            position:absolute;
            left:0;
            top:100%;
            margin-top:30px;
            width:100px;
            border-top:1px solid #e3dbcd;
        }
        .minimal-accordion-container {margin-top: 50px;}
        .drawer{width:100%;}
        .accordion-item{margin-bottom: 5px}
        .accordion-item-active .accordion-header{background:#a3875b;transition:.25s; -webkit-border-radius: 3px;  -moz-border-radius: 3px;  border-radius: 3px;}
        .accordion-item-active .accordion-header-icon{color:#FFF;}
        .accordion-item-active .accordion-header h1{color:#FFF; font-size:12px;}
        .accordion-header{background:#f2f2f2;cursor:pointer;min-height:50px;line-height:50px;transition:.25s;}
        .accordion-header h1{float:left; letter-spacing: 0.15em; padding-left:25px; font-size:12px;line-height:50px;font-weight: normal;margin:0;color:#191919;}
        .accordion-content{display:none;padding:12px;}
        .accordion-content p{margin:0;margin-bottom:3px;}
        .accordion-header-icon{float:right;color:#898989;font-size:12px;line-height:50px;vertical-align:middle; margin-right: 25px;}
        .accordion-header-icon.accordion-header-icon-active{color:#fff;}

        .minimal-item-style .product_meta, .product_meta span {
            color:#191919;
        }
        .minimal-item-style .product_meta span span,.product_meta a {
            color:#898989!important;;
        }
        
        /* Fashion Grid Style */
        /* ================== */
        .products .fashion-item {
            box-sizing:border-box;
            text-align:left;
        }
        .products .fashion-item .woocommerce-loop-product__title {
            font-size:16px;
            color:#1f1f20;
            text-transform:uppercase;
            line-height:16px;
            margin:35px 0 15px 0;
        }
        .products .fashion-item a, .products .fashion-item .woocommerce-loop-product__title {
            color:inherit;
             transition:all 300ms ease-in-out;
        }
        .products .fashion-item a:hover, .products .fashion-item .woocommerce-loop-product__title:hover {
            opacity:0.6!important;
            transition:all 300ms ease-in-out;
        }
        .products .fashion-item .price {
            text-align:left;
        }
        .products .fashion-item .price .amount {
            font-weight:400;
            font-size:16px;
            color:#6e6e6e;
            letter-spacing:0.25em;
        }
        .products .fashion-item span.onsale {
            font-weight:400;
        }
        .woocommerce .fashion-item-style .related > h2,
         .woocommerce .fashion-item-style .up-sells > h2{
            text-align:left;
            text-transform:uppercase;
            margin-bottom:30px;
            font-weight:400;
            color:#1f1f20;
            font-size:20px;
            line-height:20px;
            margin-bottom:70px;
            margin-top:50px;
            display: flex;
            align-items: center;
        }
        .woocommerce .fashion-item-style .related > h2::after,
         .woocommerce .fashion-item-style .up-sells > h2::after{
            content: '';
            height: 1px;
            display: block;
            border-bottom: 1px solid #efebe9;
            flex-grow: 1;
            margin-left: 45px;
          }
          .woocommerce .fashion-item-style .related .grid-item,
           .woocommerce .fashion-item-style .up-sells .grid-item {
            margin-bottom:10px;
          }
          .woocommerce .fashion-item-style h2 {
            font-weight:400;
          }
          .woocommerce .fashion-item-style div.product .product_title {
            font-size:16px;
            color:#1f1f20;
            font-weight:400;
            text-transform:uppercase;
             margin-bottom:35px;
        }
         .woocommerce .fashion-item-style div.product .price {
            margin-bottom:35px;
         }
        .woocommerce .fashion-item-style div.product .price .amount {
            font-weight:400;
            font-size:16px;
            color:#6e6e6e;
            letter-spacing:0.25em;
        }
        .woocommerce .fashion-item-style div.product .price del .amount {
            font-size:12px;
        }
        .fashion-item-style .ale_single_product_page .product_meta {
            font-size:14px; 
            text-transform:uppercase;
            font-family:'Old Standard TT';
            line-height:32px;
        }
        .fashion-item-style .ale_single_product_page .product_meta .sku, .fashion-item-style .ale_single_product_page .product_meta a {
            text-transform:none;
            font-style:italic;
            font-family:'PT Sans';
            color:#6e6e6e;
        }
        .fashion-item-style .ale_single_product_page .product_meta a:hover {
            opacity:0.7;
        }
        .fashion-item-style .woocommerce-product-details__short-description p {
            margin-bottom:50px;
        }
         .woocommerce .fashion-item-style .quantity .qty,
         .fashion-item-style .quantity .qty,
          #add_payment_method .fashion-item-style table.cart td.actions .coupon .input-text, 
          .woocommerce-cart.fashion-item-style table.cart td.actions .coupon .input-text, 
          .woocommerce-checkout.fashion-item-style table.cart td.actions .coupon .input-text {
            border-bottom-width:1px;
            font-size:16px;
             font-family:'Old Standard TT';
             padding:12px 0 12px 12px;
         }
        .woocommerce .fashion-item-style #respond input#submit, 
        .woocommerce .fashion-item-style a.button, 
        .woocommerce .fashion-item-style button.button, 
        .woocommerce .fashion-item-style input.button,
         .fashion-item-style #respond input#submit, 
        .fashion-item-style a.button, 
        .fashion-item-style button.button, 
        .fashion-item-style input.button{
            border:0;
            background:#efebe9;
            min-height: 46px;
            font-weight:400;
            font-size:12px;
            text-transform:uppercase;
            color:#1f1f20;
            letter-spacing:0.1em;
           font-family:'Old Standard TT';
               padding: 1em 1.6em;
        }
        .fashion-item-style a.button {
            padding-top:0!important;
            padding-bottom:0!important;
            line-height:46px;
            background:#efebe9!important;
        }
        .fashion-item-style a.button:hover {
            background-color:#1f1f20!important;
            color:#efebe9!important;
        }
         .fashion-item-style .woocommerce table.shop_table td {
            padding:12px;
        }
        .fashion-item-style .coupon .input-text {
            width:140px!important;
        }
        .woocommerce div.product div.images .flex-control-thumbs {
            margin-top:10px;
        }
        .woocommerce div.product div.images .flex-control-thumbs li {
            width:calc(25% - 7.5px);
            margin-right:10px;
            margin-bottom:10px;
        }
        .woocommerce div.product div.images .flex-control-thumbs li:nth-child(4n+4) {
            margin-right:0;
        }
        
        .fashion-item-style .accordion-item-active .accordion-header {
            background:#efebe9;
            border-radius:0;
            color:#1f1f23;
            font-size:12px;
            text-transform:uppercase;
            
        }
        .fashion-item-style .accordion-header-icon {
            display:none;
        }
        .fashion-item-style .accordion-header {
            min-height:40px;
            line-height:40px;
            background:#efebe9;
            text-align:center;
        }
        .fashion-item-style .accordion-header h1 {
            line-height:40px;
            color:#1f1f23;
            font-size:12px;
            text-transform:uppercase;
            text-align:center;
            padding:0;
            float:none;
        }
        
        .fashion-item-style .accordion-content {
            text-align:center;
            padding-top:40px;
            padding-bottom:30px;
        }
        .fashion-item-style .accordion-content p {
            font-size:13px;
            line-height:22px;
            margin-bottom:20px;
        }
        .up-sells {
            margin-bottom:50px; 
        }
        ";

        echo "</style>";
    }

    add_action( 'wp_head', 'ale_custom_woo_styles' );

    //Remove breadcrumb
//    add_filter( 'woocommerce_get_breadcrumb', '__return_false' );

    add_action( 'init', 'ale_remove_wc_breadcrumbs' );
    function ale_remove_wc_breadcrumbs() {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }

    //Load Custom Select JS and CSS
    function ale_woo_enqueue_styles() {
        if ( is_woocommerce() ) {
            wp_register_style( 'select2',
                ALETHEME_THEME_URL . '/css/libs/select2.min.css',
                array(),
                ALETHEME_THEME_VERSION,
                'all' );
            wp_enqueue_style( 'select2' );

            wp_register_script( 'select2',
                ALETHEME_THEME_URL . '/js/libs/select2.min.js',
                array( 'jquery' ),
                ALETHEME_THEME_VERSION,
                true );
            wp_enqueue_script( 'select2' );

            wp_register_script( 'ale-woocommerce',
                ALETHEME_THEME_URL . '/js/woocommerce.min.js',
                array( 'jquery' ),
                ALETHEME_THEME_VERSION,
                true );
            wp_enqueue_script( 'ale-woocommerce' );
        }
    }

    add_action( 'wp_enqueue_scripts', 'ale_woo_enqueue_styles' );



    //Products per page based on theme options
    if(ale_get_option('products_per_page')){
        add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.esc_attr(ale_get_option('products_per_page')).';' ), 20 );
    }


    //Single Product Slider for Woocommerce
    add_action( 'after_setup_theme', 'ale_woocommerse_plugin_setup' );

    function ale_woocommerse_plugin_setup() {
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }





}