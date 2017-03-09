
<!-- <article id="post-<?php the_ID(); ?>" class="large-12 medium-7 columns" role="article" itemscope itemtype="http://schema.org/WebPage"> -->

<div class="slider">

	<?php
	$post_type = get_field('content_type'); // these custom fields control post_type and post_per_page
	$items = get_field('items_to_show'); // set the values in the edit screen for the home page
	$args = array(
		'posts_per_page' => $items,
		'post_type' => $post_type,
		// 'meta_key'=>'event_date',
		// 'orderby' => 'meta_value',
		'order' => DESC
	);

	$slider_posts = get_posts( $args );
	foreach ( $slider_posts as $post ) :
		setup_postdata( $post );
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
		$thumb_url = $thumb_url_array[0];
	// 	$eventDate = DateTime::createFromFormat('Ymd', get_field('event_date'));
	// 	$currentDate = new DateTime();
	// // this should only show an event if the event_date is either today or in the future
	// 	if ( $eventDate >= $currentDate ) : ?>
	<div style="background: url(<?php echo $thumb_url;?>) no-repeat center center; background-size: cover;">

		 <article class="col s12 l6 waves-effect">
			 <a href="<?php the_permalink() ?>">
			 <h3 class="light"><?php the_title(); ?></h3>
			 <label class="grey-text lighten-3">
				Published <?php echo the_time('F j, Y');?>
			</label><br / />
			<p class="white-text">
				<?php
				$content = get_the_content();
				echo wp_trim_words($content, 10);?>
			</p>

			 </a>
		 </article>
	</div>

	<?php

	endforeach;
	wp_reset_postdata(); ?>

</div>
