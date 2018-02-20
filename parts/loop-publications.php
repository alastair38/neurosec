<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col s12'); ?>>
	<article class="card">
		<div class="card-content">
			<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
					echo '<span class="badge new"></span>';
					}
			?>
			<h2 class="card-title"><?php the_title(); ?></h2>


				<label class="authors"><?php echo the_time('F j, Y') . '.';?>
				<?php

					echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );

				?>
				<?php

				 ?>
			</label>
			<div class="pub-content">
				<?php the_content();?>
			</div>


			<a href="<?php the_field('publication_link');?>" class="btn oxford-blue tooltipped" data-position="top" data-delay="50" data-tooltip="This link takes you to an external website">View Details </a>

			</div>

	</article>

	<?php //get_template_part( 'parts/content', 'share' ); ?>

</div>
