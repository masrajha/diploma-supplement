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
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'list-js', 'https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js', array(), null, true );
    wp_enqueue_script( 'ds-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array('jquery', 'list-js'), null, true );
}
add_action( 'wp_enqueue_scripts', 'ds_enqueue_scripts' );

// Fungsi untuk menampilkan konten dengan shortcode
function ds_diploma_supplement_shortcode() {
    include_once plugin_dir_path( __FILE__ ) . 'includes/diploma-supplement-template.php';
    return listDocSupplement();
}
add_shortcode( 'diploma_supplement', 'ds_diploma_supplement_shortcode' );
