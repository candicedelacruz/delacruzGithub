<?php
/**
 * 
 *Template Name: Projects Page
 *
 *@package Delacruz
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
 
			<?php
				 //just before calling your code add this and customize it as you like
				 function hwl_home_pagesize( $query ) {
				if ( is_admin() || ! $query->is_main_query() )
					return;

				if ( is_home() ) {
					// Display only 1 post for the original blog archive
					$query->set( 'posts_per_page', 1 );
					return;
				}

				if ( is_post_type_archive( 'movie' ) ) {
					// Display 50 posts for a custom post type called 'movie'
					$query->set( 'posts_per_page', 5 );
					return;
				  }
				}
				add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );
				
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();