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

if ( ! function_exists( 'az_awlv_woocommerce_template_loop_product_title' ) ) {
    /* Функция замены названия родителя на артикул в случае вариаций
    * @return void
    */
    function az_awlv_woocommerce_template_loop_product_title() {

        global  $product;

        echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">';

        if ( $product->get_type() == 'variation' ){

            echo $product->get_sku();

        } else echo get_the_title();

        echo '</h2>';

        //echo "<a target=_blank href='https://termoshkaf.com/?s=".$product->get_sku()."&post_type=product&type_aws=true'><img width='50px' src='https://termoshkaf.com/wp-content/uploads/2018/08/TT_logo75.png'></a>";

    }
}




if ( ! function_exists( 'az_awlv_show_variation_attributes' ) ) {
    /* Функция отображения атрибутов вариации
    * @return void
    */
    function az_awlv_show_variation_attributes() {

        global  $product;

        if ( $product->get_type() == 'variation' ){

            $attributes = $product->get_attributes();

            /* Отбираем только глобальные атрибуты */
            $attr_prefix = 'pa_';

            //var_dump($attributes);

            echo '<div class="variation-detail-wrap">';

            foreach ( $attributes as $key => $attr_slug ){

                //$key = str_replace( "attribute_", "",$key);

                ?>

                <div class="adaptive-wrap">

                <?php

                if ( strpos( $key, $attr_prefix ) === 0 ) {


                    $tax = get_term_by( 'slug', $attr_slug, $key);

                    $attr_slug =  wc_attribute_label( $key );

                    $attr_name = $tax->name;

                    ?>



                    <div class="adaptive-col-1" >
                        <?php echo $attr_slug; ?>
                    </div>

                    <div class="adaptive-col-2" >
                        <?php echo $attr_name;  ?>
                    </div>



                    <?php

                } else {

                    the_excerpt();

                }

                ?></div><?php

                ?>



                <?php

            }

            echo '</div>';

        }else {

        /* здесь можно вывести в строку дополнительную инфу для обычных товаров */
    }


    }
}
