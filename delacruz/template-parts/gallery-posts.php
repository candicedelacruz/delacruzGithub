<?php
/**
 * 
 *Template Name: gallery-posts
 *
 *@package Delacruz
 */
 
 get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	<!---Specified posts depending on category. Reference used from https://codex.wordpress.org/Class_Reference/WP_Query -->
		<?php
			$paged = ( get_query_var( 'paged') ) ? get_query_var( 'paged' ) : 1;
			$args = array(
					'cat' => 225, 
					'showposts' => 6, 
					'order' => 'ASC',
					'paged' => $paged
			);
			query_posts($args);
			$customquery = new WP_Query( $args );
		?>
		<?php
			if ($customquery->have_posts()) : 
			while ($customquery->have_posts()) : 
			$customquery->the_post(); 
			
			
		?>

		<div class="column">
	
	<article id="post-<?php the_ID(); ?>"
		<?php post_class(); ?>>
		

	
	<!---Show featured images from posts. Reference from https://codex.wordpress.org/Post_Thumbnails --->
		
		<?php if (has_post_thumbnail())
		?>	
			
		<span class="hover">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a><span id="texth"><?php the_title(); ?></span>
		</span>
		
	
	</article>
	
		</div><!-- .column -->
	
<?php endwhile; endif; ?>

		<div id="querynavigation">
		<div class="nav-previous"><?php next_posts_link( 'Prev', $customquery->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Next' , $customquery->max_num_pages ); ?></div></div>	
		</div>
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();