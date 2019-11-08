<?php

if (!defined('ABSPATH'))  exit;


if ( ! function_exists( 'az_awlv_image' ) ) {
    /* Функция отображения блока az-woo-image
    * @return void
    */
   function az_awlv_image(){
       echo '<div class="az-awlv-image">';
   }
}

if ( ! function_exists( 'az_awlv_desc' ) ) {
    /* Функция отображения блока az-woo-desc
    * @return void
    */
   function az_awlv_desc(){
       echo '<div class="az-awlv-desc">';
   }
}

if ( ! function_exists( 'az_awlv_add_to_cart' ) ) {
    /* Функция отображения блока az-woo-image
    * @return void
    */
   function az_awlv_add_to_cart(){
       echo '<div class="az-awlv-add-to-cart">';
   }
}


if ( ! function_exists( 'az_awlv_end_div' ) ) {
    /* Функция отображения завершения блока
    * @return void
    */
    function az_awlv_end_div() {
       echo '</div>';
    }
}
