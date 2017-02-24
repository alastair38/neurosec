<?php
/*
Template Name: Home
*/

get_header(); ?>

	<main class="contaier">
			<div class="row">
				<?php

							get_template_part( 'parts/loop', 'slider' );
							?>
			</div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="row center">

					<h4 style="font-style:italic; letter-spacing: 2px;" aria-hidden="true" class="">Neuroscience, Ethics and Society</h4>
					<a href="#starting"><i class="material-icons">keyboard_arrow_down</i></a>
				</div>


				<?php

							get_template_part( 'parts/loop', 'page-home' );

					endwhile; endif;
				?>

			 <!-- end #main -->



	</main> <!-- end main -->




<?php get_footer(); ?>
