<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col s4'); ?>>
	<article class="card center">
		<div class="card-image">
			<img src="<?php the_post_thumbnail_url('custom-size');?>">
		</div>
		<div class="card-content">

			<h2 class="card-title"><?php the_title(); ?></h2>






			<a href="<?php the_permalink();?>" class="btn grey darken-3">View Details</a>

			</div>

	</article>

	<?php //get_template_part( 'parts/content', 'share' ); ?>

</div>
