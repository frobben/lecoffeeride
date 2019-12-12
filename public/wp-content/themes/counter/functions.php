<?php
/**
 * Counter functions and definitions
 *
 * @package Counter
 */

/**
 * The current version of the theme.
 */
define( 'COUNTER_VERSION', '1.3.0' );

//remove_filter( 'the_content', 'wpautop' );

/**
 * Sets the content width in pixels.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function counter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'counter_content_width', 936 );
}
add_action( 'after_setup_theme', 'counter_content_width', 0 );

/**
 * Load theme updater functions.
 */
function counter_theme_updater() {
	require( get_template_directory() . '/inc/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'counter_theme_updater' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function counter_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'counter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for theme logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 648,
		'height'      => 324,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => true,
	) );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );


	// Add necessary image sizes.
	add_image_size( 'counter-thumbnail', 612, 0, false );
	add_image_size( 'counter-thumbnail-2x', 1224, 0, false );

	add_image_size( 'counter-thumbnail-full', 936, 0, false );
	add_image_size( 'counter-thumbnail-full-2x', 1872, 0, false );

	add_image_size( 'counter-panel', 1440, 0, false );
	add_image_size( 'counter-panel-2x', 2880, 0, false );
	add_image_size( 'counter-panel-half', 720, 0, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary', 'counter' ),
	) );

	// Switch default core markup to output valid HTML5 for listed components.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add Content Options feature.
	add_theme_support( 'jetpack-content-options', array(
	'blog-display' => 'content',
		'post-details' => array(
			'stylesheet' => 'counter-style',
			'date' => '.posted-on',
			'categories' => '.cat-links',
			'tags' => '.tags-links',
			'author' => '.byline',
		),
		'featured-images' => array(
			'archive' => true,
			'archive-default' => false,
			'post' => true,
			'post-default' => true,
			'page' => true,
			'page-default' => false,
		),
	) );

	// Add support for Jetpack responsive videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// This theme styles the visual editor to resemble theme styles.
	add_editor_style( array( 'assets/css/editor-style.css' ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		// Add pages.
		'posts' => array(
			'about',
			'blog',
			'contact',
			'hero' => array(
				'post_type' => 'page',
				'post_title' => esc_html_x( 'Coffee &amp; Pastry', 'Theme starter content', 'counter' ),
				'post_content' => join( '', array(
					'<p>' . esc_html_x( 'Come in and get a taste of our great coffee with pastries, baked daily with locally milled organic flours', 'Theme starter content', 'counter' ) . '</p>',
					'<p><a href="#" class="btn btn-default">' . esc_html_x( 'View the Menu', 'Theme starter content', 'counter' ) . '</a></p>',
				) ),
			),
			'menu' => array(
				'post_type' => 'page',
				'post_title' => esc_html_x( 'Menu', 'Theme starter content', 'counter' ),
				'post_content' => join( '', array(
					'<h5>' . esc_html_x( 'Americano 2.5', 'Theme starter content', 'counter' ) . '</h5><p>' . esc_html_x( 'Prepared by brewing espresso with added hot water. The strength varies with the number of shots of espresso and the amount of water.', 'Theme starter content', 'counter' ) . '</p>',
					'<h5>' . esc_html_x( 'Espresso 2.5', 'Theme starter content', 'counter' ) . '</h5><p>' . esc_html_x( 'Generally thicker than coffee brewed by other methods. Has a higher concentration of suspended and dissolved solids.', 'Theme starter content', 'counter' ) . '</p>',
					'<h5>' . esc_html_x( 'Cappucino 3.5', 'Theme starter content', 'counter' ) . '</h5><p>' . esc_html_x( 'Composed of espresso and hot milk, with the surface topped with foamed milk. Cream may be used instead of milk and is often topped with cinnamon.', 'Theme starter content', 'counter' ) . '</p>',
					'<h5>' . esc_html_x( 'Latte 4', 'Theme starter content', 'counter' ) . '</h5><p>' . esc_html_x( 'Made with espresso and steamed milk. The term as used in English is a shortened form of the Italian caff&egrave; latte, which means milk coffee.', 'Theme starter content', 'counter' ) . '</p>',
					'<p><a href="#">' . esc_html_x( 'View the full menu &rarr;', 'Theme starter content', 'counter' ) . '</a></p>',
				) ),
			),
			'coffee' => array(
				'post_type' => 'page',
				'post_title' => esc_html_x( 'Finest Coffee', 'Theme starter content', 'counter' ),
				'post_content' => join( '', array(
					'<p>' . esc_html_x( 'It\'s our pleasure to find beautiful coffees, hand-roast them in our vintage steel roaster, and offer them to you.', 'Theme starter content', 'counter' ) . '</p>',
					'<p><a href="#">' . esc_html_x( 'Learn more &rarr;', 'Theme starter content', 'counter' ) . '</a></p>',
				) ),
				'thumbnail' => '{{image-coffee}}',
			),
			'pastry' => array(
				'post_type' => 'page',
				'post_title' => esc_html_x( 'Delicious Pastries', 'Theme starter content', 'counter' ),
				'post_content' => join( '', array(
					'<p>' . esc_html_x( 'Our pastries are baked daily with locally milled organic flours. Muffins, cakes, and tarts vary with the seasons.', 'Theme starter content', 'counter' ) . '</p>',
					'<p><a href="#">' . esc_html_x( 'Learn more &rarr;', 'Theme starter content', 'counter' ) . '</a></p>',
				) ),
				'thumbnail' => '{{image-pastry}}',
			),
			'visit-us' => array(
				'post_type' => 'page',
				'post_title' => esc_html_x( 'Come Visit Us!', 'Theme starter content', 'counter' ),
				'post_content' => join( '', array(
					'<p>' . esc_html_x( 'Stop by our coffee shop, we\'ll be glad to see you from 7am to 7pm on weekdays and from 8am to 6pm on weekends.', 'Theme starter content', 'counter' ) . '</p>',
					'<p><a href="#" class="btn btn-default">' . esc_html_x( 'View on the map', 'Theme starter content', 'counter' ) . '</a></p>',
				) ),
			),
		),

		// Add attachments.
		'attachments' => array(
			'image-coffee-pastry' => array(
				'post_title' => esc_html_x( 'Coffee &amp; Pastry', 'Theme starter content', 'counter' ),
				'file' => 'assets/img/coffee-pastry.jpg',
			),
			'image-coffee' => array(
				'post_title' => esc_html_x( 'Coffee', 'Theme starter content', 'counter' ),
				'file' => 'assets/img/coffee.jpg',
			),
			'image-pastry' => array(
				'post_title' => esc_html_x( 'Pastry', 'Theme starter content', 'counter' ),
				'file' => 'assets/img/pastry.jpg',
			),
			'image-visit-us' => array(
				'post_title' => esc_html_x( 'Visit Us', 'Theme starter content', 'counter' ),
				'file' => 'assets/img/visit-us.jpg',
			),
		),

		// Add widgets.
		'widgets' => array(
			'sidebar-1' => array(
				'text_about',
				'cafe' => array(
					'text',
					array(
						'title' => esc_html_x( 'Cafe', 'Theme starter content', 'counter' ),
						'text' => '<p>' . esc_html_x( '123 Main Street', 'Theme starter content', 'counter' ) . '<br />' . esc_html_x( 'New York, NY 10001', 'Theme starter content', 'counter' ) . '</p>',
					),
				),
				'roastery' => array(
					'text',
					array(
						'title' => esc_html_x( 'Roastery', 'Theme starter content', 'counter' ),
						'text' => '<p>' . esc_html_x( '321 Second Street', 'Theme starter content', 'counter' ) . '<br />' . esc_html_x( 'Brooklyn, NY 11230', 'Theme starter content', 'counter' ) . '</p>',
					),
				),
			),
			'sidebar-2' => array(
				'cafe' => array(
					'text',
					array(
						'title' => esc_html_x( 'Cafe', 'Theme starter content', 'counter' ),
						'text' => '<p>' . esc_html_x( '123 Main Street', 'Theme starter content', 'counter' ) . '<br />' . esc_html_x( 'New York, NY 10001', 'Theme starter content', 'counter' ) . '</p>',
					),
				),
			),
			'sidebar-3' => array(
				'roastery' => array(
					'text',
					array(
						'title' => esc_html_x( 'Roastery', 'Theme starter content', 'counter' ),
						'text' => '<p>' . esc_html_x( '321 Second Street', 'Theme starter content', 'counter' ) . '<br />' . esc_html_x( 'Brooklyn, NY 11230', 'Theme starter content', 'counter' ) . '</p>',
					),
				),
			),
			'sidebar-4' => array(
				'hours' => array(
					'text',
					array(
						'title' => esc_html_x( 'Hours', 'Theme starter content', 'counter' ),
						'text' => '<p>' . esc_html_x( 'Mon&ndash;Fri: 7am&ndash;7pm', 'Theme starter content', 'counter' ) . '<br />' . esc_html_x( 'Sat&ndash;Sun: 8am&ndash;6pm', 'Theme starter content', 'counter' ) . '</p>',
					),
				),
			),
			'sidebar-5' => array(
				'contact' => array(
					'text',
					array(
						'title' => esc_html_x( 'Contact', 'Theme starter content', 'counter' ),
						'text' => '<p>' . esc_html_x( 'info@example.com', 'Theme starter content', 'counter' ) . '<br />' . esc_html_x( '(212) 123-4567', 'Theme starter content', 'counter' ) . '</p>',
					),
				),
			),
		),

		// Set the options.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{hero}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the theme mods.
		'theme_mods' => array(
			// Panlel 0.
			'panel_class_0' => 'tall dark align-center no-border',
			'panel_bg_image_0' => '{{image-coffee-pastry}}',
			'panel_bg_repeat_0' => 'no-repeat',
			'panel_bg_position_0' => 'center center',
			'panel_bg_attachment_0' => 'scroll',
			'panel_bg_attachment_0' => 'scroll',
			'panel_bg_size_type_0' => 'cover',

			// Panel 1.
			'panel_content_1' => '{{menu}}',
			'panel_class_1' => 'align-center no-border',

			// Panel 2.
			'panel_content_2' => '{{coffee}}',
			'panel_class_2' => 'split-left dark align-center no-border',

			// Panel 3.
			'panel_content_3' => '{{pastry}}',
			'panel_class_3' => 'split-right align-center no-border',

			// Panel 4.
			'panel_content_4' => '{{visit-us}}',
			'panel_class_4' => 'tall dark align-center',
			'panel_bg_image_4' => '{{image-visit-us}}',
			'panel_bg_repeat_4' => 'no-repeat',
			'panel_bg_position_4' => 'center center',
			'panel_bg_attachment_4' => 'scroll',
			'panel_bg_attachment_4' => 'scroll',
			'panel_bg_size_type_4' => 'cover',
		),

		// Set up menus.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'primary' => array(
				'name' => __( 'Primary', 'counter' ),
				'items' => array(
					'link_home',
					'page_menu' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{menu}}',
					),
					'page_blog',
					'page_about',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters the array of starter content.
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'counter_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}

add_action( 'after_setup_theme', 'counter_setup' );

/**
 * Register widget area.
 */
function counter_widgets_init() {
	// Sidebar.
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'counter' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears on posts and pages', 'counter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	// Footer widgets.
	for ( $i = 2; $i <= 5; $i++ ) :

	register_sidebar( array(
		'name'          => __( 'Footer', 'counter' ) . ' ' . ( $i - 1 ),
		'id'            => 'sidebar-' . $i,
		'description'   => __( 'Appears in the footer.', 'counter' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	endfor;
}
add_action( 'widgets_init', 'counter_widgets_init' );

/**
 * Register Google fonts for Counter.
 *
 * @return string Google fonts URL for the theme.
 */
function counter_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/**
	 * Translators: If there are characters in your languagethat are not
	 * supported by Lato, translate this to 'off'.
	 * Do not translate into your own language.
	 */
	if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'counter' ) ) {
		$fonts[] = 'Open Sans:400,400i,700,700i';
	}

	if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'counter' ) ) {
		$fonts[] = 'Lato:400,700,400italic,700italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return apply_filters( 'counter_fonts_url', $fonts_url );
}

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function counter_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'counter_javascript_detection', 0 );

/**
 * Enqueues front-end scripts and styles.
 */
function counter_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style(
		'counter-fonts',
		counter_fonts_url()
	);

	wp_enqueue_style(
		'counter-font-awesome',
		get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.css'
	);

	wp_enqueue_style(
		'counter-style',
		get_stylesheet_uri()
	);

	wp_style_add_data( 'counter-style', 'rtl', 'replace' );

	wp_enqueue_script(
		'jquery-scrollto',
		get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ),
		array( 'jquery' ),
		'2.1.2',
		true
	);

	wp_enqueue_script(
		'counter-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array( 'jquery' ),
		COUNTER_VERSION,
		true
	);

	wp_enqueue_script(
		'counter-skip-link-focus-fix',
		get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js',
		array(),
		COUNTER_VERSION,
		true
	);

	wp_enqueue_script(
		'counter-custom',
		get_template_directory_uri() . '/assets/js/custom.js',
		array( 'jquery' , 'translate-js', 'traduction', 'jquery-cookie'),
		COUNTER_VERSION,
		true
	);

		wp_enqueue_script(
		'traduction',
		get_template_directory_uri() . '/lang/traduction.js',
		array( 'jquery' ),
		COUNTER_VERSION,
		true
	);

	wp_enqueue_script(
		'translate-js',
		get_template_directory_uri() . '/assets/js/jquery.translate.js',
		array( 'jquery' , 'traduction'),
		COUNTER_VERSION,
		true
	);
	
	wp_enqueue_script(
		'jquery-cookie',
		get_template_directory_uri() . '/assets/js/jquery.cookie.js',
		array( 'jquery' ),
		COUNTER_VERSION,
		true
	);

	wp_localize_script( 'counter-navigation', 'counterScreenReaderText', array(
		'menu' => esc_html__( 'Menu', 'counter' ),
		'close' => esc_html__( 'Close', 'counter' ),
		'expand' => '<span class="screen-reader-text">' . esc_html__( 'Expand child menu', 'counter' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . esc_html__( 'Collapse child menu', 'counter' ) . '</span>',
	) );

	wp_localize_script( 'counter-custom', 'booker_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Deregister styles for Jetpack's Infinite Scroll.
	if ( wp_style_is( 'the-neverending-homepage', 'registered' ) ) {
		wp_deregister_style( 'the-neverending-homepage' );
	}

	// Deregister styles for Contact Form 7.
	if ( wp_style_is( 'contact-form-7', 'registered' ) ) {
		wp_deregister_style( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'counter_scripts' );

/**
 * Adds admin scripts and styles.
 */
function counter_admin_scripts() {
	wp_enqueue_style(
		'counter-admin',
		get_template_directory_uri() . '/assets/css/project-admin.css',
		COUNTER_VERSION
	);

	wp_enqueue_script(
		'counter-admin',
		get_template_directory_uri() . '/assets/js/project-admin.js',
		COUNTER_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'counter_admin_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function counter_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'counter_front_page_template' );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Customizer-specific functions.
require get_template_directory() . '/inc/customizer-sanitization.php';
require get_template_directory() . '/inc/customizer-custom-css.php';
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';



add_action( 'wp_ajax_nopriv_booker', 'booker' );
add_action('wp_ajax_booker', 'booker');

function booker(){

	if($_POST['type'] == "bike"){
		$title = "Nouvelle reservation de velo de ".$_POST['name'];
	
		$txt = "Une nouvelle reservation de velo est arrivée : <br>"
			. "Nom : ".$_POST['name'] ."<br>"
			. "Début : ".$_POST['start-date'] ."<br>"
			. "Fin : ".$_POST['end-date'] ."<br>"
			. "Heure : ".$_POST['end-date'] ."<br>"
			. "Nombre de personnes : ".$_POST['adults'] ."<br>"
			. "Type de vélo : ".$_POST['type_bike'] ."<br>"
			. "Modèle : ".$_POST['model'] ."<br>"
			. "Téléphone : ".$_POST['phone']. "<br>"
			. "E-mail : ".$_POST['email']. "<br>"
			. "Adresse : ".$_POST['address']. "<br>"
			. "Remarque : ".$_POST['remark']. "<br>";

	}else if($_POST['type'] == "outdoor"){
		$title = "Nouvelle reservation d'activité de ".$_POST['name'];
	
		$txt = "Une nouvelle reservation est arrivée : <br>"
			. "Nom : ".$_POST['name'] ."<br>"
			. "Début : ".$_POST['start-date'] ."<br>"
			. "Fin : ".$_POST['end-date'] ."<br>"
			. "Nombre de personnes : ".$_POST['adults'] ."<br>"
			. "Type d'activité : ".$_POST['outdoor'] ."<br>"
			. "Téléphone : ".$_POST['phone']. "<br>"
			. "E-mail : ".$_POST['email']. "<br>"
			. "Remarque : ".$_POST['remark']. "<br>";
	}else if ($_POST['type'] == "custom"){
        $title = "Nouvelle demande custom de ".$_POST['name'];
        $txt = "Une nouvelle demande custom est arrivée : <br>"
            . "Nom : ".$_POST['name'] ."<br>"
            . "Nom de la team : ".$_POST['team-name'] ."<br>"
            . "City : ".$_POST['city'] ."<br>"
            . "Country : ".$_POST['country'] ."<br>"
            . "Nombre de rider : ".$_POST['quantity'] ."<br>"
            . "Téléphone : ".$_POST['phone']. "<br>"
            . "E-mail : ".$_POST['email']. "<br>"
            . "Discipline : ".$_POST['discipline']. "<br>";



    }else{
		$title = "Nouvelle reservation de chambre de ".$_POST['name'];

        $accomodation_type = "";

        if($_POST['accomodation_type'] == "room"){
            $accomodation_type = "Room + breakfast";
        }else if ($_POST['accomodation_type'] == "fridayDinner"){
            $accomodation_type = "Room + Breakfast + Friday Night Pasta Diner";
        }else if ($_POST['accomodation_type'] == "SaturdayDinner"){
            $accomodation_type = "Room + Breakfast + Saturday Night BBQ diner";
        }else if ($_POST['accomodation_type'] == "FridayAndSaturday"){
            $accomodation_type = "Room + Breakfast + Fridays Night Pasta + Saturday Night BBQ";
        }
	
		$txt = "Une nouvelle reservation est arrivée : <br>"
			. "Nom : ".$_POST['name'] ."<br>"
			. "Début : ".$_POST['start-date'] ."<br>"
			. "Fin : ".$_POST['end-date'] ."<br>"
			. "Nombre de personnes : ".$_POST['adults'] ."<br>"
			. "Type de reservation : ".$accomodation_type."<br>"
			. "Téléphone : ".$_POST['phone']. "<br>"
			. "E-mail : ".$_POST['email']. "<br>"
			. "Remarque : ".$_POST['remark']. "<br>";
	}


    if ($_POST['type'] != "custom"){
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

        // Additional headers
        $headers[] = 'From: Reservation <postmaster@lecoffeeride.com>';
    }else{

        $attachments = array();

        if ( ! function_exists( 'wp_handle_upload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }

        $eps = $_FILES['eps'];

        $upload_overrides = array( 'test_form' => false );

        $moveeps = wp_handle_upload( $eps, $upload_overrides );

        if ( $moveeps && ! isset( $moveeps['error'] ) ) {

            array_push($attachments, $moveeps['file']);
        } else {
            /**
             * Error generated by _wp_handle_upload()
             * @see _wp_handle_upload() in wp-admin/includes/file.php
             */
            $txt.= "/nErreur : Fichier EPS perdu";
        }

        $example = $_FILES['example'];

        $upload_overrides = array( 'test_form' => false );

        $moveexample = wp_handle_upload( $example, $upload_overrides );

        if ( $moveexample && ! isset( $moveexample['error'] ) ) {
            array_push($attachments, $moveexample['file']);
        } else {
            /**
             * Error generated by _wp_handle_upload()
             * @see _wp_handle_upload() in wp-admin/includes/file.php
             */
            $txt.= "/nErreur : Fichier d'example perdu";
        }

    }

	if ($_POST['type'] == "outdoor") {
		return mail('f.robben@mailoo.org', $title, $txt, implode("\r\n", $headers));
	}else if($_POST['type'] == "custom"){
        $headers = ['From: Reservation <postmaster@lecoffeeride.cc>'];
	    if (wp_mail('rachel@lecoffeeride.cc', $title, $txt, $headers, $attachments )){
	        return 'OK';
        }else{
	        return 'fail';
        }
    }else{
		return mail('rachel@lecoffeeride.cc', $title, $txt, implode("\r\n", $headers));
	}

	


	exit;
}

function get_child_pages_by_parent_id($pageId,$limit = -1)
{
    // needed to use $post
    global $post;
    // used to store the result
    $pages = array();

    // What to select
    $args = array(
        'post_type' => 'page',
        'post_parent' => $pageId,
        'posts_per_page' => $limit
    );
    $the_query = new WP_Query( $args );

    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $pages[] = $post;
    }
    wp_reset_postdata();
    return $pages;
}

// Theme Info Screen.
if ( is_admin() ) {
	require get_template_directory() . '/inc/theme-info-screen/theme-info-screen.php';
}

function customtheme_add_woocommerce_support()
{
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );

// add product category name to post class
function category_id_class( $classes ) {
    global $post;
    $product_cats = get_the_terms( $post->ID, 'product_cat' );
    if( $product_cats ) foreach ( $product_cats as $category ) {
        $classes[] = $category->slug;
    }
    return $classes;
}
add_filter( 'post_class', 'category_id_class' );

//function my_text_strings( $translated_text, $text, $domain ) {
//    switch ( strtolower( $translated_text ) ) {
//        case 'view cart' :
//            $translated_text = __( "<i class='material-icons'>shopping_cart</i>", 'woocommerce' );
//            break;
//    }
//    return $translated_text;
//}
//add_filter( 'gettext', 'my_text_strings', 20, 3 );

//if ( ! function_exists( 'woocommerce_widget_shopping_cart_button_view_cart' ) ) {
//
//    /**
//     * Output the view cart button.
//     */
//    function woocommerce_widget_shopping_cart_button_view_cart() {
//        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward"><i class=\'material-icons\'>shopping_cart</i></a>';
//    }
//}
//
//if ( ! function_exists( 'woocommerce_widget_shopping_cart_proceed_to_checkout' ) ) {
//
//    /**
//     * Output the proceed to checkout button.
//     */
//    function woocommerce_widget_shopping_cart_proceed_to_checkout() {
//        echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout wc-forward">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
//    }
//}

remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

function my_woocommerce_widget_shopping_cart_button_view_cart() {
    echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-default">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
}
function my_woocommerce_widget_shopping_cart_proceed_to_checkout() {
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn btn-default">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
}
add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_button_view_cart', 10 );
add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );


add_filter( 'wc_add_to_cart_message_html', 'custom_add_to_cart_message' );
function custom_add_to_cart_message( ) {

    global $woocommerce;

    $cartPage = esc_url( wc_get_page_permalink( 'cart' ) );
    $shopPage = esc_url( wc_get_page_permalink( 'shop' ) );

    $message    = sprintf('%s <div class="msg-btn"><a href="%s" class="btn btn-default wc-forwards">%s</a><a href="%s" class="btn btn-default wc-forwards">%s</a></div>',  __('Product successfully added to your cart.', 'woocommerce')  , $cartPage,__('Go to Cart', 'woocommerce'), $shopPage, __('Continue Shopping', 'woocommerce'));

    return $message;

}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );



function enable_comments_custom_post_type() {
    add_post_type_support( 'rides', 'comments' );
}
add_action( 'init', 'enable_comments_custom_post_type', 11 );

// Disable Comments URL field
function jlwp_disable_comment_url($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','jlwp_disable_comment_url');

add_filter( 'woocommerce_billing_fields', 'ts_require_wc_phone_field');
function ts_require_wc_phone_field( $fields ) {
    $fields['billing_phone']['required'] = true;
    return $fields;
}