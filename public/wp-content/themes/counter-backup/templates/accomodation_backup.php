<?php
/**
 * The template for displaying full width pages
 *
 * Template Name: AccomodationBackup
 *
 * @package Counter
 */

get_header(); 

global $post;
$args = array( 'category' => 26 );

$myposts = get_posts( $args );

?>

	<div id="primary" class="content-area">

		<?php 
		$i=1; 
		foreach ( $myposts as $post ) : setup_postdata( $post ); 

		if($i%2 == 0){
			$class = "split-right";
		}else{
			$class = "split-left";
		}
		?>


		<article id="panel-1" class="panel <? echo $class; ?> align-center no-border  post-285 page type-page status-publish has-post-thumbnail hentry" style="padding:0;">
	
	
			<div class="panel-thumbnail"><?php the_post_thumbnail(); ?></div>
			<div class="wrap">

				<div class="panel-data">

					<h2 class="panel-title trn"><?php the_title();?></h2>
					<div class="panel-content">
						<?php the_content(); ?>		
					</div>
				</div>
			</div>
			<div class="panel-background" ></div>
					
		</article><!-- #post-## -->

			

		<?php $i++; endforeach; 
		wp_reset_postdata();?>

<?php get_footer();
