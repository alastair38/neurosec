<?php $author = get_queried_object();
$author_id = $author->ID;?>

<div id="" class="hentry">

		<section class="entry-content">
			<p class="col s12"><?php echo get_the_author_meta( 'display_name', $author_id );?><?php _e(" has not published any content yet.", "jointswp");?></p>
		</section>

</div>
