<?php
get_header(); ?>

	<main class="container">
			<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
			if( is_page('About Neurosec') && !$post->post_parent > 0 ) {
							get_template_part( 'parts/loop', 'page-about' );
					} else {
						get_template_part( 'parts/loop', 'page-team' );
					}
					endwhile; endif;
				?>

			</div> <!-- end #main -->

		

	</main> <!-- end main -->




<?php get_footer(); ?>
