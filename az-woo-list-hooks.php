<?php

if (!defined('ABSPATH'))  exit;

//add_action('woocommerce_before_shop_loop_item', 'az_awlv_image' , 5 );
//add_action('woocommerce_before_shop_loop_item_title', 'az_awlv_end_div', 15 );

//добавляем атрибуты в списке вариаций
add_action('woocommerce_shop_loop_item_title', 'az_awlv_show_variation_attributes', 15 );

//отображение артикула вариации вместо названия родителя
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'az_awlv_woocommerce_template_loop_product_title', 10 );