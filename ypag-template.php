<?php

/*
Template Name: YPAG Main
Template Post Type: engagement
*/

get_header(); ?>

<div class="container">

	<div class="row">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="col s12 l8" role="main">
		    	<?php get_template_part( 'parts/loop', 'ypag' );?>
		</div>

		<?php
		$related = get_field('related_content');

		$featured_posts = $related['related_pages'];
		if( $featured_posts ): ?>
		<aside id="sidebar1" class="col white s12 l4" role="complementary">
			<h2 class="light center h5"><?php echo $related['sidebar_heading'];?> </h2>
			<ul class="card z-depth-0 center">

			<?php foreach( $featured_posts as $post ):
					// Setup this post for WP functions (variable must be named $post).
				setup_postdata($post); ?>

				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>

			<?php endforeach; ?>

			</ul>
		</aside>
		<?php
		// Reset the global post object so that the rest of the page works correctly.
		wp_reset_postdata(); ?>

	<?php endif; ?>


	<?php endwhile; ?>

	<?php endif; ?>

	</div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer(); ?>
