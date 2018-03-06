<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col s12 m6 l4'); ?>>
	<article class="card">
		<div class="card-image">
			<?php
			$tile = get_field('image_tile');
			 if ( $tile ) : ?>
	<img class="responsive-img" src="<?php echo $tile['sizes']['large']; ?>" alt="<?php echo $tile['alt']; ?>"/>
			<?php endif;?>
		</div>

		<div class="card-content">
			<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
					echo '<span class="badge new"></span>';
					}
			?>

				<a href="<?php the_permalink();?>"><h2 class="cardtitle"><?php the_title(); ?></h2></a>

				<label class="authors"><?php echo the_time('F j, Y') . '.';?>
				<?php

					echo 'Posted in '. get_the_category_list(', ');

				?>
				<?php

				 ?>
			</label>




			</div>

	</article>

	<?php //get_template_part( 'parts/content', 'share' ); ?>

</div>
