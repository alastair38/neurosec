<?php

get_header(); ?>

<main class="container">

	<div class="row">

		<div class="col s12 l8" role="main">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' );

					$sibling_args = array(
						'sort_order' => 'asc',
						'sort_column' => 'post_title',
						'hierarchical' => 1,
						'exclude' => $post->ID,
						'include' => '',
						'meta_key' => '',
						'meta_value' => '',
						'authors' => '',
						'child_of' => $post->post_parent,
						'parent' => $post->post_parent,
						'exclude_tree' => '',
						'number' => '',
						'offset' => 0,
						'post_type' => 'projects',
						'post_status' => 'publish'
					);
					$siblings = get_pages($sibling_args);

				$children_args = array(
					'sort_order' => 'asc',
					'sort_column' => 'post_title',
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
					'post_type' => 'projects',
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
		<aside id="sidebar1" class="col white s12 l4 valign" role="complementary">
		<div class="col center card s12 z-depth-0"><h5 class="light">Project Links</h5>
			<?php if($post->post_parent){?>
	<div class="chip white"><a class="" href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo ' ' . get_the_title($post->post_parent); ?></a></div>
	<?php }?>

<?php
		if ($siblings) {
		foreach ($siblings as $sibling) {
		 echo '<div class="chip white"><a href="' . $sibling->guid . '">' . $sibling->post_title . '</a></div>';
		}
	}
?>

</div>
</aside>

	<?php endwhile; ?>

	<?php endif; ?>

</div> <!-- end row -->
</main> <!-- end main -->

<?php get_footer(); ?>
