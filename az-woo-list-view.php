<?php
/**
 * az-woo-list-view
 *
 * Plugin Name:       az-woo-list-view
 * Plugin URI:        https://github.com/igorartzona/
 * Description:       Табличное отображение списка товаров
 * Version:           0.4.3
 * Author:            jvj
 * Author URI:        https://github.com/igorartzona
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:        az-woo-list-view
 * Domain Path:       /languages
 * WC tested up to: 4.9.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* notice, если не установлен woocommerce */
add_action('admin_notices', function() {

    if ( !class_exists('WooCommerce') ) {
    ?>

        <div id="message" class="is-dismissible notice notice-warning">
            <p>
                <?php _e('Плагин <a href="https://wordpress.org/plugins/woocommerce/" target=_blank >WooCommerce</a> не активен. Без него плагин <b>az-woo-list-view</b> бесполезен.'); ?>
            </p>
        </div>

    <?php
    }

});





/* подключение файлов*/
define( 'AWLV_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AWLV_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once ( AWLV_PLUGIN_PATH . 'awlv-template-functions.php');
require_once ( AWLV_PLUGIN_PATH . 'awlv-hooks.php');

add_action( 'wp_enqueue_scripts', 'awlv_register_style' );
function awlv_register_style(){

    if ( is_product_category() || is_shop() || is_product() ){
        wp_register_style( 'awlv', plugins_url( 'az-woo-list-view/css/awlv.css' ) );
        wp_enqueue_style( 'awlv' );
    }

}

