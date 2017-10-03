<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col s12 m6 l6'); ?>>
	<article class="card medium">
		<div class="card-image">
				<?php the_post_thumbnail('custom-size', array('class' => '')); ?>
				<h2 class="card-title"><?php the_title(); ?></h2>
		</div>

		<div class="card-content">
			<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
					echo '<span class="badge new"></span>';
					}
			?>



				<label class="authors">Written by <?php the_author_posts_link(); ?>	on <?php echo the_time('F j, Y') . '.';?>
				<?php

					echo 'Posted in '. get_the_category_list(', ');

				?>
				<?php

				 ?>
			</label>


			<a href="<?php the_permalink();?>" class="btn grey darken-3">View this article </a>

			</div>

	</article>

	<?php //get_template_part( 'parts/content', 'share' ); ?>

</div>
