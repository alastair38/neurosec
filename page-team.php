<?php

/*
Template Name: Users
*/

get_header();

if(function_exists('get_field')):
  
  // check if ACF is activated to before grabbing field values
  $pi = get_field('pi');
	$pi_description = get_field('pi_description');
	$pi_title = get_field('pi_title');

?>

<div class="container">
  <div class="row">
    <header class="article-header col s12">

      <h1 class="h2 page-title center"><?php the_title(); ?></h1>

    </header> <!-- end article header -->
    <div id="pi" class="col s12">
      <h2 class="h5 light center"><?php echo $pi_title;?></h2>
      <div class="col s12">
        <div class="card horizontal">
          <?php $pi_image = get_field('user_image', 'user_' . $pi['ID'] . '');
				echo '<div class="card-image"><img src="' . $pi_image['url'] . '" alt="' . $pi_image['alt'] . '" /></div>';
				?>
          <div class="card-stacked">
            <div class="card-content">

              <p><a
                  href="<?php echo get_author_posts_url($pi['ID'], $pi['user_nicename']);?>"><?php echo $pi['display_name'];?></a>
                <?php echo $pi_description;?>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>

    <?php

$admins = get_field('admins');

if($admins){
	echo "<div id='admins' class='col s12'><h2 class='h5 light center'>Admins</h2>";
	foreach ( $admins as $admin ) {
	$user_image = get_field('user_image', 'user_' . $admin['ID'] . '');
	$work_title = get_field('work_title', 'user_' . $admin['ID'] . '');
	echo '<div class="col s6 m4 l3"><article class="card large"><div class="card-image"><img class="" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /></div><div class="card-content">
		<h3 class="h6"><a href="' . get_author_posts_url($admin['ID'], $admin['user_nicename']) . '">' . $admin['display_name'] . '</a></h3><label class="block">' . $work_title . '</label></div></article></div>' ;

	}
	echo '</div>';
}
?>

    <?php $args = array(
	'posts_per_page'   => 10,
	'offset'           => 0,
	'category'         => '',
	'category_name'    => '',
	'orderby'          => 'title',
	'order'            => 'ASC',
	'include'          => '',
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
  
	$members = get_field("team_member", $posts->ID);
	if($members){

		echo "<div class='col s12 projects'>
		<h2 class='h5 light center'><a class='white-text' href='" . $link . "'>" . $title . "</a></h2>";
		foreach ( $members as $user ) {
		if ($user['ID'] != $pi['ID']) {
		$user_image = get_field('user_image', 'user_' . $user['ID'] . '');
		$work_title = get_field('work_title', 'user_' . $user['ID'] . '');
		$begood_project = get_field('begood_subproject', 'user_' . $user['ID'] . '');
		echo '<div class="col s6 m4 l3"><article class="card large"><div class="card-image waves-effect waves-block waves-light"><img class="" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /></div><div class="card-content">
			<h3 class="h6"><a href="' . get_author_posts_url($user['ID'], $user['user_nicename']) . '">' . $user['display_name'] . '</a></h3><label class="block">' . $work_title . '</label>';
			if ($begood_project) {
				echo '<label class="block">' . implode(', ', $begood_project) . '</label>';
			}

			echo '</div></article></div>' ;
			}
		}
		echo '</div>';
	}

}
 ?>

  </div> <!-- end #row -->


</div> <!-- end container -->


<?php endif;

get_footer(); ?>