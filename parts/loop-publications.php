<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col s6'); ?>>
	<article class="card">
		<div class="card-content">
			<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
					echo '<span class="badge new"></span>';
					}
			?>
			<h2 class="card-title"><?php the_title(); ?></h2>


				<label class="authors">Written by <?php the_author_posts_link(); ?>	on <?php echo the_time('F j, Y') . '.';?>
				<?php

					echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );

				?>
				<?php

				 ?>
			</label>

			
			<a href="<?php the_permalink();?>" class="btn grey darken-3" data-position="top" data-delay="50" data-tooltip="This link takes you to an external website">View publication </a>

			</div>

	</article>

	<?php //get_template_part( 'parts/content', 'share' ); ?>

</div>
