<?php
$title = single_cat_title("", false);
?>
<aside id="sidebar1" class="white col s12 l3 valign" role="complementary">

	<div class="row search-related">
<div role="search">
<?php
if (  is_home() || is_category() || is_singular('post') ) {?>

	<h3 class="search-title grey darken-3 white-text center">Filter Articles</h3>
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
echo '<h3 class="search-title grey darken-3 white-text  center">Filter Publications</h3>';
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

	$id = get_the_id();
	$args = array(
		'blog_id'      => $GLOBALS['blog_id'],
		'role'         => '',
		'role__in'     => array(),
		'role__not_in' => array(),
		'meta_key'     => 'your_projects',
		'meta_value'   => $id,
		'meta_compare' => 'LIKE',
		'meta_query'   => array(),
		'date_query'   => array(),
		'include'      => array(),
		'exclude'      => array(),
		'orderby'      => 'login',
		'order'        => 'ASC',
		'offset'       => '',
		'search'       => '',
		'number'       => '',
		'count_total'  => false,
		'fields'       => 'all',
		'who'          => ''
	 );
	$blogusers = get_users( $args );
	if($blogusers){
		echo '<div class="col card s12 z-depth-0"><h5 class="light center">Project Members</h5>';
		foreach ( $blogusers as $user ) {

		echo '<div class="chip block white"><img class="" src="' . get_field('user_image', 'user_' . $user->ID . '') . '" /><a href="' . get_author_posts_url($user->ID, $user->user_nicename) . '">' . $user->display_name . '</a></div>' ;
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
if (is_page_template( 'ypag-template.php' )) {
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
	echo '<div class="col card s12 z-depth-0"><h5 class="light center">Project Links</h5>';
	foreach ($children as $child) {
	$trimmed = wp_trim_words( $child->post_content, $num_words = 20, $more = null );
	 echo '<div class="chip center block white"><a href="' . $child->guid . '">' . $child->post_title . '</a></div>';
 } echo '</div>';
}
};

?>

</div>

	</div>

</aside>
