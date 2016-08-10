<?
/**
 * 
 *Template Name: Delacruz homepage
 *
 * 
 */
 
 get_header(); ?>
 
 	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<div class="skills">
			
			<h1> I AM A..</h1>
			  <ul class="skillset">
				<li class="option"> <a href="http://localhost/wordpress/category/writing/">
				  <img src="http://localhost/wordpress/wp-content/uploads/2016/08/Writer-e1470625579331.png" />
				  <h2>Writer</h2>
				  <p>Chocolate cake powder chocolate cake pudding chupa chups cotton candy. 
					Wafer bear claw oat cake carrot cake jelly beans toffee. Carrot 
					cake tiramisu biscuit liquorice gummies cheesecake jelly-o.</p>
				</li> </a>
				
				<li class="option"><a href="http://localhost/wordpress/category/design/">
				  <img src="http://localhost/wordpress/wp-content/uploads/2016/08/designer-e1470625606736.png" />
				  <h2>Graphic Designer</h2>
				  <p>Chocolate cake powder chocolate cake pudding chupa chups cotton candy. 
					Wafer bear claw oat cake carrot cake jelly beans toffee. Carrot 
					cake tiramisu biscuit liquorice gummies cheesecake jelly-o.</p>
				</li></a>
				
				<li class="option"><a href="http://localhost/wordpress/category/media/">
				  <img src="http://localhost/wordpress/wp-content/uploads/2016/08/creator-e1470625648918.png" />
				  <h2>Content Creator</h2>
				  <p>Chocolate cake powder chocolate cake pudding chupa chups cotton candy. 
					Wafer bear claw oat cake carrot cake jelly beans toffee. Carrot 
					cake tiramisu biscuit liquorice gummies cheesecake jelly-o.</p>
				</li></a>
			  </ul>
			</div>	
			
			
			
	<!---reference from https://woocommerce.com/flexslider/ and https://return-true.com/installing-woothemes-flexslider-into-your-wordpress-theme/ -->		
				<div class="flex-container">
				<h1> FEATURED WORK </h1>
				  <div class="flexslider">
					<ul class="slides">
					<?php
					$flex = new WP_Query(array('category_name' => 'slider', 'posts_per_page' => 5));
					if($flex->have_posts()) :
						while($flex->have_posts()) : $flex->the_post();
					?>
					  
					  <li> <a href="<?php get_post_permalink();?>"><?php the_post_thumbnail();?></a>
						<p class="flex-caption"><?php the_content(); ?></p>
					  </li>

					  
					<?php
						endwhile;
					endif;
					?>
					</ul>
				  </div>
				</div>

	

  </div>
</div>
</div>