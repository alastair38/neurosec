<?php
/*
Template Name: Main Projects
Template Post Type: projects
*/

get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col s12 l8">
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' );

		?>

		</div>


		<?php get_sidebar(); ?>

	<?php endwhile; ?>

	<?php endif; ?>

</div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer(); ?>
