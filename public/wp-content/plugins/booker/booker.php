<?php
/**
 * Plugin Name: Booker
 * Plugin URI: 
 * Description: This plugin allow you to bookrooms using ajax
 * Version: 1.0.0
 * Author: François Robben
 * Author URI: 
 * License: 
 */

/**
* 
*/
class booker
{
	
	/*
	 * Action hooks
	 */
	public function run() {     
	    // Enqueue plugin styles and scripts
	    add_action( 'plugins_loaded', array( $this, 'enqueue_rml_scripts' ) );  
	    // Setup Ajax action hook
		add_action( 'wp_ajax_booker', array( $this, 'booker' ) );  
	}   
	/**
	 * Register plugin styles and scripts
	 */
	public function register_rml_scripts() {
	    wp_register_script( 'rml-script', plugins_url( 'js/booker.js', __FILE__ ), array('jquery'), null, true );
	}   
	/**
	 * Enqueues plugin-specific scripts.
	 */
	public function enqueue_rml_scripts() {        
	    wp_enqueue_script( 'rml-script' );
	    wp_localize_script( 'rml-script', 'booker_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
	}   

}