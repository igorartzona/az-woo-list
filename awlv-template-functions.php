<?php

if (!defined('ABSPATH'))  exit;

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

                ?>

                <div class="adaptive-wrap">

                <?php

                if ( strpos( $key, $attr_prefix ) === 0 ) {

                    // Получаем имя глобального атрибута

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

                    // Получаем имя локального атрибута

                    ?>

                    <div class="adaptive-col-1" >

                        <?php

                        /*Получаем массив атрибутов родительского товара*/

                        $parent_id = $product->get_parent_id();

                        $parent_attributes = get_post_meta( $parent_id,'_product_attributes' );

                        //print_r ( $parent_attributes );

                        // Проверяем вхождение локального атрибута в массив атрибутов родительского товара и вытаскиваем его имя

                        if ( array_key_exists($key,$parent_attributes[0]) ) {

                            echo $parent_attributes[0][$key]['name'];

                        }

                        ?>

                    </div>

                    <div class="adaptive-col-2" >
                        <?php echo $attr_slug;  ?>
                    </div>

                    <?php

                }

                ?>

                </div> <!-- adaptive-wrap -->

                <?php

            }

            echo '</div>';

        }else {
            /* здесь можно вывести в строку дополнительную инфу для обычных товаров */
        }

    }

}