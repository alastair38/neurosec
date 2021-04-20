<?php
/*
Template Name: Home
*/

get_header(); ?>

	<div>
			<div class="row">
				<?php

							get_template_part( 'parts/loop', 'slider' );
							?>
			</div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="row center">

					<h1 id="home-header" class="no-padding"><?php the_title();?></h1>
					<a href="#more"><i class="material-icons">keyboard_arrow_down</i></a>
				</div>


				<?php

							get_template_part( 'parts/loop', 'page-home' );

					endwhile; endif;
				?>

			 <!-- end main -->



	</div> <!-- end div-->




<?php get_footer(); ?>
