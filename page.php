<?php
get_header();

?>

	<div class="container">
			<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
			if( is_page('about-neurosec') && !$post->post_parent > 0 ) {
							get_template_part( 'parts/loop', 'page-about' );
					} else {
						get_template_part( 'parts/loop', 'page-team' );
					}
					endwhile; endif;
				?>

			</div> <!-- end #main -->



	</div> <!-- end container -->




<?php get_footer(); ?>
