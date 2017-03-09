<?php
$title = single_cat_title("", false);
?>
<aside id="sidebar1" class="col s12 l3 valign" role="complementary">

	<div class="row search-related card">
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

//here we get the children of the current project. This will allow individual content pieces for each project, if required
$id = get_the_ID();
$args = array(
'orderby'          => 'post_date',
'order'            => 'DESC',
'post_type'        => 'projects',
'post_parent'      => $id,
'post_status'      => 'publish',
'suppress_filters' => true
);

$children = get_posts( $args );

if (!$children) {
	the_post_thumbnail('large', array('class' => 'responsive-img'));
} else {
echo '<h3 class="search-title grey darken-3 white-text center">Latest from YPAG</h3>
			<ul class="col s12">';
foreach ($children as $child) {
$trimmed = wp_trim_words( $child->post_content, $num_words = 10, $more = null );
 echo '<li class="cardcontent">
 <a href="' . $child->guid . '">' . $child->post_title . '</a></li>';
}
} echo '</ul>';

?>
<?php

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
	echo '<div class="col s12"><h5 class="light center">Project Members</h5>';
	foreach ( $blogusers as $user ) {

	echo '<div class="chip block white"><img class="" src="' . get_field('user_image', 'user_' . $user->ID . '') . '" /><a href="' . get_author_posts_url($user->ID, $user->user_nicename) . '">' . $user->display_name . '</a></div>' ;
	}
	echo '</div>';
}
}?>

</div>

	</div>

</aside>
