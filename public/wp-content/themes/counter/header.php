<?php
/**
 * The template for displaying the header
 *
 * @package Counter
 */

$file =  get_template_directory() . "/lang/traduction.json";

$json = file_get_contents($file);

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<script type="text/javascript">
	var dict2 = <? echo $json ?>;
</script>

<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<!--<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/bebasneueregular" type="text/css"/>-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#ffffff"
    },
    "button": {
      "background": "transparent",
      "border": "#000000",
      "text": "#000000"
    }
  },
  "position": "bottom-left"
})});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link btn btn-default screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'counter' ); ?>
	</a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-wrap">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
				<?php // counter_site_title_tagline(); ?>
			</div><!-- .site-branding -->
		</div><!-- .site-header-wrap -->

		<?php if ( has_nav_menu( 'primary' ) ) : ?>

			<button id="site-navigation-toggle" class="menu-toggle" >
				<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'counter' ); ?></span>
			</button><!-- #site-navigation-toggle -->

			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'menu_class' => 'nav-menu',
					'container' => 'nav',
					'container_id' => 'site-navigation',
					'container_class' => 'main-navigation',
					'item_spacing' => 'discard',
				) );
			?>

		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="main" class="site-main" role="main">
		<div id="content" class="site-content wrap">
