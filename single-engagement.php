<?php

get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col s12 l8" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' );

					// $sibling_args = array(
					// 	'sort_order' => 'asc',
					// 	'sort_column' => 'post_title',
					// 	'hierarchical' => 1,
					// 	'exclude' => $post->ID,
					// 	'include' => '',
					// 	'meta_key' => '',
					// 	'meta_value' => '',
					// 	'authors' => '',
					// 	'child_of' => $post->post_parent,
					// 	'parent' => $post->post_parent,
					// 	'exclude_tree' => '',
					// 	'number' => '',
					// 	'offset' => 0,
					// 	'post_type' => 'engagement',
					// 	'post_status' => 'publish'
					// );
					// $siblings = get_pages($sibling_args);

				$children_args = array(
					'sort_order' => 'DESC',
					'sort_column' => 'post_date',
					'hierarchical' => 1,
					'exclude' => '',
					'include' => '',
					'meta_key' => '',
					'meta_value' => '',
					'authors' => '',
					'child_of' => $post->ID,
					'parent' => -1,
					'exclude_tree' => '',
					'number' => '',
					'offset' => 0,
					'post_type' => 'engagement',
					'post_status' => 'publish'
				);
				$children = get_pages($children_args);
				if ($children) {
					echo '<ul class="collection">';
				foreach ($children as $child) {
				$date = get_field('meeting_date', $child->ID);
				$trimmed = wp_trim_words( $child->post_content, $num_words = 20, $more = null );
				 echo '<li class="collection-item avatar"><i class="material-icons circle green">event</i><h3 class="title"><a href="' . $child->guid . '">' . $child->post_title . '</a></h3><label class="secondary-content">' . $date . '</label><p class="light">' . $trimmed . '</p></li>';
			 } echo '</ul>';
			}
		?>

		</div>

		<?php
		$related = get_field('related_content');

		$featured_posts = $related['related_pages'];
		if( $featured_posts ): ?>
		<aside id="sidebar1" class="col white s12 l4" role="complementary">
			<h2 class="light center h5"><?php echo $related['sidebar_heading'];?> </h2>
			<ul class="card z-depth-0 center">

			<?php foreach( $featured_posts as $post ):
					// Setup this post for WP functions (variable must be named $post).
				setup_postdata($post); ?>

				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>

			<?php endforeach; ?>

			</ul>
		</aside>
		<?php
		// Reset the global post object so that the rest of the page works correctly.
		wp_reset_postdata(); ?>

	<?php endif; ?>

	<?php endwhile; ?>

	<?php endif; ?>

	</div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer(); ?>
