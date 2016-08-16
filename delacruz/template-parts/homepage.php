<?php
/**
 * 
 *Template Name: Delacruz homepage
 *
 *@package Delacruz
 */
 
 get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="skills">
			
			<h1> 			
				<?php
						$options = get_option( 'dlcz_options_settings' );
						echo $options['dlcz_radio_field']; 
				?>
			</h1>
			  <ul class="skillset">
				<li class="option"> <a href="http://localhost/wordpress/category/writing/">
				  <img src="http://localhost/wordpress/wp-content/uploads/2016/08/Writer-e1470625579331.png" />
				  <h2>
					<?php
							$options = get_option( 'dlcz_options_settings' );
							echo $options['dlcz_title_one'];
					?>
				  </h2>
				  </a>
				  
					<p>
						<?php 
							//display description about skill one
							$options = get_option( 'dlcz_options_settings' );
							echo $options['dlcz_skill_one'];
						?>
					</p>
				</li> 
				
				<li class="option"><a href="http://localhost/wordpress/category/design/">
				  <img src="http://localhost/wordpress/wp-content/uploads/2016/08/designer-e1470625606736.png" />
				  <h2>
					<?php
							$options = get_option( 'dlcz_options_settings' );
							echo $options['dlcz_title_two'];
					?>
				  </h2>
				  </a>
				  
					<p>
						<?php 
							//display description about skill two
							$options = get_option( 'dlcz_options_settings' );
							echo $options['dlcz_skill_two'];
						?>
					</p>
				</li>
				
				<li class="option"><a href="http://localhost/wordpress/category/media/">
				  <img src="http://localhost/wordpress/wp-content/uploads/2016/08/creator-e1470625648918.png" />
				  <h2>
					<?php
							$options = get_option( 'dlcz_options_settings' );
							echo $options['dlcz_title_three'];
					?>
				  </h2>
				  </a>
					<p>
						<?php 
							//display description about skill three
							$options = get_option( 'dlcz_options_settings' );
							echo $options['dlcz_skill_three'];
						?>
					</p>
				</li>
			  </ul>
			</div>	
			
				<!---reference from https://woocommerce.com/flexslider/ and https://return-true.com/installing-woothemes-flexslider-into-your-wordpress-theme/ -->		
				<div class="flex-container">
				<h1> FEATURED WORK </h1>
				  <div class="flexslider">
					<ul class="slides">
					<?php
					$flex = new WP_Query(array('category_name' => 'slider', 'posts_per_page' => 6));
					if($flex->have_posts()) :
						while($flex->have_posts()) : $flex->the_post();
					?>
					  
					  <li> <div class="slide"><?php the_post_thumbnail();?></div><a href="<?php get_post_permalink();?>"></a>
						<p class="flex-caption"><?php the_content(); ?></p>
					  </li>

					  
					<?php
						endwhile;
					endif;
					?>
					</ul>
				  </div>
				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();