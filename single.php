<?php

get_header(); ?>

<div class="container">

	<div class="row valign-wrapper">

		<div class="col s10 offset-s1" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>


		</div>


		<?php //get_sidebar(); ?>

	<?php endwhile; ?>

	<?php endif; ?>

</div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer(); ?>
