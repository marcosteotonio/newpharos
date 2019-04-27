<?php
/**
 * Elvinaa Plus: Dynamic CSS Stylesheet
 * 
 */

function elvinaa_plus_dynamic_css_stylesheet() {    
 
    //parent theme elements
    $link_color= esc_attr(get_theme_mod( 'el_link_color','#444444' ));
    $link_hover_color= esc_attr(get_theme_mod( 'el_link_hover_color','#000000' ));
    $button_color= esc_attr(get_theme_mod( 'el_button_color','#444444' ));
    $button_hover_color= esc_attr(get_theme_mod( 'el_button_hover_color','#444444' ));
    $top_menu_color= esc_attr(get_theme_mod( 'el_top_menu_color','#ffffff' ));      

    $css = '

    button,
    input[type=submit],
    .woocommerce ul.products li.product .button,
    .woocommerce div.product form.cart .button{
        background: ' . $button_color . ';
    }

    .woocommerce #respond input#submit.alt, 
    .woocommerce a.button.alt, 
    .woocommerce button.button.alt, 
    .woocommerce input.button.alt,
    .woocommerce .widget_shopping_cart .buttons a, 
    .woocommerce.widget_shopping_cart .buttons a,
    .woocommerce .return-to-shop a.button{
        background: ' . $button_color . ' !important;
    }

    button:hover,
    input[type=submit]:hover,
    .woocommerce ul.products li.product .button:hover,
    .woocommerce div.product form.cart .button:hover{
        background: ' . $button_hover_color . ';
    }

    .woocommerce #respond input#submit.alt:hover, 
    .woocommerce a.button.alt:hover, 
    .woocommerce button.button.alt:hover, 
    .woocommerce input.button.alt:hover,
    .woocommerce .widget_shopping_cart .buttons a:hover, 
    .woocommerce.widget_shopping_cart .buttons a:hover,
    .woocommerce .return-to-shop a.button:hover{
        background: ' . $button_hover_color . ' !important;
    }

    .woocommerce div.product .woocommerce-tabs ul.tabs li.active { 
        border-bottom: 3px solid ' . $button_color . ';
    }

    .woocommerce span.onsale{
        background:' . $button_color . ';
    }

    .woocommerce .cart .button, 
    .woocommerce .cart input.button,
    .woocommerce button.button{
        background:' . $button_color . ';   
    }

    .woocommerce .cart .button:hover, 
    .woocommerce .cart input.button:hover,
    .woocommerce button.button:hover{
        background:' . $button_hover_color . ';   
    }

    .woocommerce .return-to-shop a.button:hover{
        background: ' . $button_hover_color . ';
        color: #fff;   
    }

    .woocommerce-MyAccount-navigation ul li a:hover{
        color: ' . $link_hover_color . '; 
    }

    .woocommerce .widget_price_filter .price_slider_amount .button:hover{
        background: ' . $button_hover_color . ';
        border: 1px solid ' . $button_hover_color . ';
    }

    .woocommerce nav.woocommerce-pagination ul li a:focus, 
    .woocommerce nav.woocommerce-pagination ul li a:hover, 
    .woocommerce nav.woocommerce-pagination ul li span.current{
        background: ' . $button_color . ';
    }

';

return apply_filters( 'elvinaa_plus_dynamic_css_stylesheet', $css);

}

?>


