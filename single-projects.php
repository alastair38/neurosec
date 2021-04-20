<?php

get_header(); ?>

<div class="container">

	<div class="row">

		<div class="col s12 l8">

		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' );
if ( $post->post_parent == $post->ID ) {
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
}
		?>

		</div>

		<div id="sidebar1" class="col white s12 l4 valign">
		<?php
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
		if ($children || $siblings || $post->post_parent) {
			echo '<div class="col center card s12 z-depth-0"><h2 class="center h5 light">Links</h2>';
		}
		if ($children) {
			echo '<ul>';
		foreach ($children as $child) {
		$trimmed = wp_trim_words( $child->post_content, $num_words = 20, $more = null );
		 echo '<li><a href="' . $child->guid . '">' . $child->post_title . '</a></li>';
	 } echo '</ul>';
	}
?>
			<?php if($post->post_parent){?>
	<ul><li><a class="" href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo ' ' . get_the_title($post->post_parent); ?></a></li></ul>
	<?php }?>

<?php
		if ($siblings) {
			echo "<ul>";
		foreach ($siblings as $sibling) {
		 echo '<li><a href="' . $sibling->guid . '">' . $sibling->post_title . '</a></li>';
		}
		echo "</ul>";
	}
?>


<?php $members = get_field("team_member");
if($members){
	echo '<div class="col card s12 z-depth-0"><h2 class="h5 light center">Project Members</h2>';
	foreach ( $members as $user ) {
	$user_image = get_field('user_image', 'user_' . $user['ID'] . '');
	$work_title = get_field('work_title', 'user_' . $user['ID'] . '');
	$begood_project = get_field('begood_subproject', 'user_' . $user['ID'] . '');
	$aewg_position = get_field('aewg_position', 'user_' . $user['ID'] . '');

	echo '<div class="col s12 m6 l12"><div class="card z-depth-1 white"><div class="card-image"><img class="" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /></div><div class="card-content"><a href="' . get_author_posts_url($user['ID'], $user['user_nicename']) . '">' . $user['display_name'] . '</a><label class="block">' . $work_title . '</label>';
	if ($begood_project) {
		echo '<label class="block">BeGOOD: ' . implode(', ', $begood_project) . '</label>';
	}
	if ($aewg_position) {
		echo '<label class="block"><strong>' . $aewg_position . '</strong></label>';
	}
	echo '</div></div></div>' ;
	}
	echo '</div>';
}
?>
</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer(); ?>
