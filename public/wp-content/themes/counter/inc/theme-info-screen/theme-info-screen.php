<?php
/**
 * Counter Theme Info Screen.
 *
 * @package Counter
 */

/**
 * Creates Theme info screen.
 */
class TP_Theme_Info_Screen {

	/**
	 * Current theme object.
	 *
	 * @var object
	 */
	private $theme;

	/**
	 * Current theme URL.
	 *
	 * @var string
	 */
	private $theme_url;

	/**
	 * Current theme Author URL
	 *
	 * @var string
	 */
	private $theme_author_url;

	/**
	 * Class Constructor.
	 */
	public function __construct() {

		$this->theme = wp_get_theme();
		$this->theme_url = $this->theme->get( 'ThemeURI' );
		$this->theme_author_url = $this->theme->get( 'AuthorURI' );

		// Register Menu Item.
		add_action( 'admin_menu', array( $this, 'tp_theme_info_screen_register_menu' ) );

		// Add partials.
		add_action( 'tp_theme_info_screen', array( $this, 'tp_theme_info_screen_intro' ), 10 );
		add_action( 'tp_theme_info_screen', array( $this, 'tp_theme_info_screen_content' ), 70 );
		add_action( 'tp_theme_info_screen_sidebar', array( $this, 'tp_theme_info_screen_sidebar_docs' ), 110 );
	}

	/**
	 * Creates the dashboard page.
	 */
	public function tp_theme_info_screen_register_menu() {
		add_theme_page( 'Getting Started', 'Getting Started', 'read', 'counter-getting-started', array( $this, 'tp_theme_info_screen_page' ) );
	}

	/**
	 * Theme Info Screen Page.
	 */
	public function tp_theme_info_screen_page() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );

		echo '<div class="wrap tp-theme-info">';

			do_action( 'tp_theme_info_screen' );

			echo '<div class="tp-theme-info-sidebar">';

				do_action( 'tp_theme_info_screen_sidebar' );

			echo '</div>';

		echo '</div>';

	}

	/**
	 * Welcome screen intro.
	 */
	public function tp_theme_info_screen_intro() {
		require_once( get_template_directory() . '/inc/theme-info-screen/partials/intro.php' );
	}

	/**
	 * Content.
	 */
	public function tp_theme_info_screen_content() {
		require_once( get_template_directory() . '/inc/theme-info-screen/partials/content.php' );
	}

	/**
	 * Sidebar Docs.
	 */
	public function tp_theme_info_screen_sidebar_docs() {
		require_once( get_template_directory() . '/inc/theme-info-screen/partials/widget-docs.php' );
	}
}

$GLOBALS['TP_Theme_Info_Screen'] = new TP_Theme_Info_Screen();
