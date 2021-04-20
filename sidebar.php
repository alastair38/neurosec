<?php
$title = single_cat_title("", false);
?>
<div id="sidebar1" class="col s12 l4 valign">

	<div class="row search-related">
<div role="search">
<?php
if (  is_home() || is_category() || is_singular('post') ) {?>

	<h2 class="search-title h3 grey darken-3 white-text center">Filter Articles</h2>
	<?php //	$my_search->the_form();
			// echo do_shortcode( '[searchandfilter taxonomies="resource-category,category" show_count="1,1" types="checkbox,checkbox" headings="Categories,Types" hide_empty="0,0"]' );
			$cats = get_terms( 'category', array(
			    'hide_empty' => 0
			) );

			    echo '<ul class="col s12">';
			    foreach ( $cats as $cat ) {
			        echo '<li><a href="' . esc_url( get_term_link( $cat ) ) . '">' . $cat->name . '</a><span class=" round-badge">' . $cat->count . '</span></li>';
			    }
			    echo '</ul>';

 }?>
<?php
if ( is_post_type_archive('publications') || is_tax('publication_type') || is_singular('publications') ) {
echo '<h2 class="search-title h3 grey darken-3 white-text  center">Filter Publications</h2>';
$terms = get_terms( 'publication_type', array(
    'hide_empty' => 0
) );

    echo '<ul class="col s12">';
    foreach ( $terms as $term ) {
        echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a><span class=" round-badge">' . $term->count . '</span></li>';
    }
    echo '</ul>';
}

?>

<?php if(is_singular('projects')) {
	// $members = get_field("team_member");
	//
	// foreach ($members as $member) {
	//
	//  $user_image = get_field('user_image', 'user_' . $member['ID'] . '');
	//  echo '<div class="chip block white"><img class="" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /><a href="' . get_author_posts_url($member['ID'], $member['user_nicename']) . '">' . $member['display_name'] . '</a></div>' ;
	//
	// }

	// $id = get_the_id();
	// $args = array(
	// 	'blog_id'      => $GLOBALS['blog_id'],
	// 	'role'         => '',
	// 	'role__in'     => array(),
	// 	'role__not_in' => array(),
	// 	'meta_key'     => 'your_projects',
	// 	'meta_value'   => $id,
	// 	'meta_compare' => 'LIKE',
	// 	'meta_query'   => array(),
	// 	'date_query'   => array(),
	// 	'include'      => array(9,7,31),
	// 	'exclude'      => array(),
	// 	'orderby'      => 'include',
	// 	'order'        => 'ASC',
	// 	'offset'       => '',
	// 	'search'       => '',
	// 	'number'       => '',
	// 	'count_total'  => false,
	// 	'fields'       => 'all',
	// 	'who'          => ''
	//  );
	// $blogusers = get_users( $args );
	$members = get_field("team_member");
	if($members){
		echo '<div class="col card s12 z-depth-0"><h2 class="light h5 center">Project Members</h2>';
		foreach ( $members as $user ) {
		$user_image = get_field('user_image', 'user_' . $user['ID'] . '');
		$work_title = get_field('work_title', 'user_' . $user['ID'] . '');
	  $begood_project = get_field('begood_subproject', 'user_' . $user['ID'] . '');
		echo '<div class="col s12 m6 l12"><div class="card z-depth-1 white"><div class="card-image"><img class="" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /></div><div class="card-content"><a href="' . get_author_posts_url($user['ID'], $user['user_nicename']) . '">' . $user['display_name'] . '</a><label class="block">' . $work_title . '</label>';
		if ($begood_project) {
			echo '<label class="block">' . $begood_project . '</label>';
		}
		echo '</div></div></div>' ;
		}
		echo '</div>';
	}



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
			//GET CHILD PAGES IF THERE ARE ANY

			//GET PARENT PAGE IF THERE IS ONE
			$parent = $post->post_parent;

			//DO WE HAVE SIBLINGS?
			$sibling_args = array(
				'sort_order' => 'asc',
				'sort_column' => 'post_title',
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'meta_key' => '',
				'meta_value' => '',
				'authors' => '',
				'child_of' => $parent,
				'parent' => -1,
				'exclude_tree' => '',
				'number' => '',
				'offset' => 0,
				'post_type' => 'projects',
				'post_status' => 'publish'
			);
			$siblings = get_pages($sibling_args);


			if( $parent != 0) {
					$args = array(
							 'depth' => 1,
							 'title_li' => '',
							 'exclude' => $post->ID,
							 'child_of' => $parent,
								'post_type' => 'projects'
						 );
				} else {

			}
			//Show pages if this page has more than one sibling
			// and if it has children
			if($parent == 0 && !is_null($args))
			{?>
		 <?php
					 wp_list_pages($args);  ?>
			<?php }

}
// if (is_page_template( 'ypag-template.php' )) {
// 	$children_args = array(
// 		'sort_order' => 'asc',
// 		'sort_column' => 'post_title',
// 		'hierarchical' => 1,
// 		'exclude' => '',
// 		'include' => '',
// 		'meta_key' => '',
// 		'meta_value' => '',
// 		'authors' => '',
// 		'child_of' => $post->ID,
// 		'parent' => $post->ID,
// 		'exclude_tree' => '',
// 		'number' => '',
// 		'offset' => 0,
// 		'post_type' => 'engagement',
// 		'post_status' => 'publish'
// 	);
// 	$children = get_pages($children_args);
// 	print_r($children);
// 	if ($children) {
// 	echo '<ul class="col card s12 z-depth-0 center"><h5 class="light">Links</h5>';
// 	foreach ($children as $child) {
// 	$trimmed = wp_trim_words( $child->post_content, $num_words = 20, $more = null );
// 	 echo '<li class=""><a href="' . $child->guid . '">' . $child->post_title . '</a></li>';
//  } echo '</ul>';
// }
// };

if (is_singular( 'projects' )) {
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
		'parent' => $post->ID,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'projects',
		'post_status' => 'publish'
	);
	$children = get_pages($children_args);
	if ($children) {
	echo '<ul class="col card s12 z-depth-0 center"><h2 class="light h5">Links</h2>';
	foreach ($children as $child) {
	$trimmed = wp_trim_words( $child->post_content, $num_words = 20, $more = null );
	 echo '<li class=""><a href="' . $child->guid . '">' . $child->post_title . '</a></li>';
 } echo '</ul>';
}
};

?>

</div>

	</div>

</div>
