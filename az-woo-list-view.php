<?php
/**
 * az-woo-list-view
 *
 * Plugin Name:       az-woo-list-view
 * Plugin URI:        https://github.com/igorartzona/
 * Description:       Табличное отображение списка товаров
 * Version:           0.1.6
 * Author:            jvj
 * Author URI:        https://github.com/igorartzona
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:        az-woo-list-view
 * Domain Path:       /languages
 * WC tested up to: 3.8.0
 */

global $product;

/* подключение файлов*/
define( 'AWLV_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AWLV_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action( 'wp_enqueue_scripts', 'awlv_register_style' );

function awlv_register_style(){

    require_once ( AWLV_PLUGIN_PATH . 'az-woo-list-template-functions.php');
    require_once ( AWLV_PLUGIN_PATH . 'az-woo-list-hooks.php');

    if ( is_product_category() || is_shop() || is_product()  ){
        //wp_register_style( 'awlv', plugins_url( 'az-woo-list-view/css/az-woo-list-view.css' ) );
        //wp_enqueue_style( 'awlv' );

        wp_register_style( 'awlv-2', plugins_url( 'az-woo-list-view/css/az-table-view.css' ) );
        wp_enqueue_style( 'awlv-2' );

    }




}

