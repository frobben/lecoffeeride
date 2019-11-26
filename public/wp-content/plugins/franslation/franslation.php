<?php

/**
 * Plugin Name: Franslation
 * Description: 
 * Plugin URI:  
 * Version:     2018.08.15
 * Author:      Francois Robben
 * Author URI:  
 * Licence:     MIT
 * License URI: http://opensource.org/licenses/MIT
 */

/**
* call our code on admin pages only, not on front end requests or during
 * AJAX calls.
 * Always wait for the last possible hook to start your code.
 */
add_action( 'admin_menu', array ( 'Franslate', 'admin_menu' ) );

add_action('admin_post_nopriv_franslate_form', 'franslatesubmit');
add_action('admin_post_franslate_form', 'franslatesubmit');

function franslatesubmit(){

	$trad = $_POST;

	$cpt = $trad['counter'];

	$json = '{';

	for ($i=1; $i <= $cpt ; $i++) { 

		$json.= addTerm($trad['key-'.$i]);
		$json.= ':{"en":';
		$json.= addTerm($trad['en-'.$i]);
		$json.= ',"fr":';
		$json.= addTerm($trad['fr-'.$i]);
		$json.= ',"nl":';
		$json.= addTerm($trad['nl-'.$i]);
		$json.= '}';

		if($i < $cpt){
			$json .=',';
		}

	}

	$json .= '}';

	$file =  get_template_directory() . "/lang/traduction.json";

	file_put_contents($file, $json);

	header('Location: '. admin_url('admin.php?page=franslator&msg=success'));



}

function checkChar($string){
	return addslashes($string);
}

function addTerm($t){

	$t = str_replace("'", "&#39;", $t);
	$t = str_replace('"', "&quot;", $t);

	$t = nl2br($t);

	return json_encode($t);
}


/**
 * Register three admin pages and add a stylesheet and a javascript to two of
 * them only.
 *
 *
 */
class Franslate
{

	/**
	 * Register the pages and the style and script loader callbacks.
	 *
	 * @wp-hook admin_menu
	 * @return  void
	 */
	public static function admin_menu()
	{
		// $main is now a slug named "toplevel_page_t5-demo"
		// built with get_plugin_page_hookname( $menu_slug, '' )
		$main = add_menu_page(
			'Translate',                         // page title
			'Translate',                         // menu title
			// Change the capability to make the pages visible for other users.
			// See http://codex.wordpress.org/Roles_and_Capabilities
			'manage_options',                  // capability
			'franslator',                         // menu slug
			array ( __CLASS__, 'render_main' ) // callback function
		);

		// $sub is now a slug named "t5-demo_page_t5-demo-sub"
		// built with get_plugin_page_hookname( $menu_slug, $parent_slug)
		// $sub = add_submenu_page(
		// 	'Manage',                         // parent slug
		// 	'T5 Demo Sub',                     // page title
		// 	'T5 Demo Sub',                     // menu title
		// 	'manage_options',                  // capability
		// 	't5-demo-sub',                     // menu slug
		// 	array ( __CLASS__, 'render_page' ) // callback function, same as above
		// );

		/* See http://wordpress.stackexchange.com/a/49994/73 for the difference
		 * to "'admin_enqueue_scripts', $hook_suffix"
		 */
		foreach ( array ( $main ) as $slug )
		{
			// make sure the style callback is used on our page only
			add_action(
				"admin_print_styles-$slug",
				array ( __CLASS__, 'enqueue_style' )
			);
			// make sure the script callback is used on our page only
			add_action(
				"admin_print_scripts-$slug",
				array ( __CLASS__, 'enqueue_script' )
			);
		}

		// $text is now a slug named "t5-demo_page_t5-text-included"
		// built with get_plugin_page_hookname( $menu_slug, $parent_slug)
		// $text = add_submenu_page(
		// 	't5-demo',                         // parent slug
		// 	'Text Included',                     // page title
		// 	'Text Included',                     // menu title
		// 	'manage_options',                  // capability
		// 	't5-text-included',                     // menu slug
		// 	array ( __CLASS__, 'render_text_included' ) // callback function, same as above
		// );
	}



	/**
	 * Print included HTML file.
	 *
	 * @wp-hook t5-demo_page_t5-text-included
	 * @return  void
	 */
	public static function render_main()
	{

		$file =  get_template_directory() . "/lang/traduction.json";

		$json = json_decode(file_get_contents($file), TRUE);

		echo json_last_error();

		$file = plugin_dir_path( __FILE__ ) . "franslation-main.php";

		if ( file_exists( $file ) )
			require $file;

	}

	/**
	 * Load stylesheet on our admin page only.
	 *
	 * @return void
	 */
	public static function enqueue_style()
	{
		wp_register_style(
			'franslation_css',
			plugins_url( 'franslation.css', __FILE__ )
		);
		wp_enqueue_style( 'franslation' );
	}

	/**
	 * Load JavaScript on our admin page only.
	 *
	 * @return void
	 */
	public static function enqueue_script()
	{
		wp_register_script(
			'franslation_js',
			plugins_url( 'franslation.js', __FILE__ ),
			array(),
			FALSE,
			TRUE
		);
		wp_enqueue_script( 'franslation_js' );
	}


}