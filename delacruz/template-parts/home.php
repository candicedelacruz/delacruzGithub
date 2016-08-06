<?php
/**
 * Template Name: Lab two - Custom Loop
 *
 * 
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	<div class="entry-content">
	
	<?php
		$args = array('cat' => 30, 'showposts' => 3, 'order' => 'ASC');
		$the_query = new WP_Query( $args );
	?>
	<?php 
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . '<a href="'.get_permalink().'">'. get_the_title() .'</a>' .'</li>';
	}
	echo '</ul>';
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}
		?>

	</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php echo do_shortcode('[thelink title="clicky" link="http://google.com"]');