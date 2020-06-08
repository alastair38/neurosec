<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col s12'); ?>>
	<article class="card">
		<div class="card-content">
			<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
					echo '<span class="badge new"></span>';
					}
			?>
			<h2 class="card-title"><?php the_title(); ?></h2>


				<p class="authors light"><?php echo the_time('F j, Y') . '.';?>
				<?php

					echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );

				?>
				<?php
				$authors = get_field('neurosec_members');

				if($authors) {
					$i = 0;
					echo '<p class="light">Authors: ';
					foreach ($authors as $author) {
						$i++;
						if($i !== count($authors)) {
							echo '<a href="' . esc_url(get_author_posts_url($author['ID'])) . '">' . $author['display_name'] . '</a>, ';
						} else {
							echo '<a href="' . esc_url(get_author_posts_url($author['ID'])) . '">' . $author['display_name'] . '</a>';
						}

						//print_r($author);
					}
					echo '</p>';
				}

				 ?>
			</p>
			<div class="pub-content">
				<?php the_content();?>
			</div>


			<a href="<?php the_field('publication_link');?>" class="btn oxford-blue tooltipped" data-position="top" data-delay="50" data-tooltip="This link takes you to an external website">View Details </a>

			</div>

	</article>

	<?php //get_template_part( 'parts/content', 'share' ); ?>

</div>
