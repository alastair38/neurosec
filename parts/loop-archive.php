<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col s4'); ?>>
	<article class="card projects-cards">
		<div class="card-image">
			<img src="<?php the_post_thumbnail_url('custom-size');?>">
		</div>
		<div class="card-content">








			<a href="<?php the_permalink();?>"><h2 class="cardtitle"><?php the_title(); ?></h2></a>

			</div>

	</article>

	<?php //get_template_part( 'parts/content', 'share' ); ?>

</div>
