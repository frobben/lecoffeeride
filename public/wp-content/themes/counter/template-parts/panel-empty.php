<?php
/**
 * The template used for displaying empty panels on the front page
 *
 * @package Counter
 */

?>

<article id="panel-<?php echo esc_attr( $counter_panel_num ); ?>" class="panel panel-empty">

	<div class="wrap">

		<div class="panel-data">

			<div class="panel-content">

				<p><?php esc_html_e( 'This panel is empty.', 'counter' ); ?></p>

			</div>

		</div>

	</div>

	<?php counter_panel_meta( $counter_panel_num ); ?>

</article><!-- #post-## -->
