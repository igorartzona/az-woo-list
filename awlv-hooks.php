<?php

if (!defined('ABSPATH'))  exit;

/* Кастомизация списка вариаций в single product */
add_action('woocommerce_before_single_product',function(){

    //отображение артикула вариации вместо названия родителя
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
    add_action( 'woocommerce_shop_loop_item_title', 'az_awlv_woocommerce_template_loop_product_title', 10 );

    //добавляем атрибуты в списке вариаций
    add_action('woocommerce_shop_loop_item_title', 'az_awlv_show_variation_attributes', 15 );

    /* убираем заголовок секции Таблица артикулов*/
    add_filter('az_variation_list_heading', '__return_false');

});