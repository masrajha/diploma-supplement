<?php
/**
 * Plugin Name: Diploma Supplement
 * Description: Menampilkan daftar nama dan link file diploma supplement di Google Drive.
 * Version: 1.0
 * Author: Didik Kurniawan
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Fungsi untuk enqueue skrip dan gaya
function ds_enqueue_scripts() {
    wp_enqueue_style( 'ds-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    wp_enqueue_script( 'ds-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array('jquery'), null, true );
    wp_enqueue_style( 'datatables-style', 'https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css' );
    wp_enqueue_script( 'datatables-script', 'https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'ds_enqueue_scripts' );

// Fungsi untuk menampilkan konten dengan shortcode
function ds_diploma_supplement_shortcode() {
    ob_start();
    include plugin_dir_path( __FILE__ ) . 'includes/diploma-supplement-template.php';
    return ob_get_clean();
}
add_shortcode( 'diploma_supplement', 'ds_diploma_supplement_shortcode' );