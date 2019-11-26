<?php
/**
 * The template for displaying the footer
 *
 * @package Counter
 */
?>
		</div><!-- #content -->
	</div><!-- #main -->

<?php 
if(trim(wp_title("", false)) == "LE CAFE" || trim(wp_title("", false)) == "THE CAFE" || trim(wp_title("", false) == "FRONT-PAGE" )){
	require get_template_directory() . '/template-parts/social.php';
} 
?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="lang">
			<ul>
				<li><img class="lang_flag" langue="fr" src="<? echo get_template_directory_uri() .'/lang/fr.svg' ?>" alt="FR"></li>
				<li><img class="lang_flag" langue="en" src="<? echo get_template_directory_uri() .'/lang/gb.svg' ?>" alt="EN"></li>
				<li><img class="lang_flag" langue="nl" src="<? echo get_template_directory_uri() .'/lang/nl.svg' ?>" alt="NL"></li>
			</ul>
		</div>

		<?php get_template_part( 'template-parts/widgets-footer' ); ?>

		<div class="site-info">

			<?php counter_footer_text(); ?>

		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
