<?php

/*
Template Name: Users
*/

get_header(); ?>

	<main class="container">
			<div class="row">
				<header class="article-header">


					<h2 class="page-title center"><?php the_title(); ?></h2>


				</header> <!-- end article header -->

	<?php $args = array(
	'posts_per_page'   => 10,
	'offset'           => 0,
	'category'         => '',
	'category_name'    => '',
	'orderby'          => 'title',
	'order'            => 'ASC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'projects',
	'post_mime_type'   => '',
	'post_parent'      => '0',
	'author'	   => '',
	'author_name'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true
);
$posts_array = get_posts( $args );

foreach ($posts_array as $posts) {
	$title = $posts->post_title;
	$link = $posts->guid;
	// $args = array(
	// 	'blog_id'      => $GLOBALS['blog_id'],
	// 	'role'         => '',
	// 	'role__in'     => array(),
	// 	'role__not_in' => array(),
	// 	'meta_key'     => 'your_projects',
	// 	'meta_value'   => $posts->ID,
	// 	'meta_compare' => 'LIKE',
	// 	'meta_query'   => array(),
	// 	'date_query'   => array(),
	// 	'include'      => $user_order,
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
	$members = get_field("team_member", $posts->ID);
	if($members){
		echo "<div class='row'><div class='col s12'><h5><a href='" . $link . "'>" . $title . "</a></h5></div>";
		foreach ( $members as $user ) {
		$user_image = get_field('user_image', 'user_' . $user['ID'] . '');

		echo '<div class="col s6 m4 l2"><article class="card large"><div class="card-image waves-effect waves-block waves-light"><img class="" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /></div><div class="card-content">
			<h6><a href="' . get_author_posts_url($user['ID'], $user['user_nicename']) . '">' . $user['display_name'] . '</a></h6></div></article></div>' ;
		}
		echo '</div>';
	}
	?>
			 <?php

}
 ?>

		</div> <!-- end #row -->


	</main> <!-- end main -->


<?php get_footer(); ?>
