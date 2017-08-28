<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
$author = get_queried_object();
$author_id = $author->ID;
$user_image = get_field('user_image', 'user_' . $author_id  . '');
$work_projects = get_field('your_projects', 'user_' . $author_id  . '');
$work_title = get_field('work_title', 'user_' . $author_id  . '');
$work_phone = get_field('work_phone', 'user_' . $author_id  . '');
$user_email = get_the_author_meta( 'email', $author_id );
?>

<main class="container">

		<div class="row" role="main">

					<header class="col s12 center">
						<h1 class="page-title light"><?php echo get_the_author_meta( 'display_name', $author_id );?> </h1>



					<?php
						if ($user_image) {
							echo '<div class="col s12"><img class="responsive-img circle col s2 offset-s5" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /></div>';
						}
						if ($work_title){
							echo '<div class="col s12">' . $work_title . '</div>';
						}
						echo '<div class="col s12"><a href="mailto:' . $user_email . '" target="_blank">' . $user_email . '</a></div>';
						if ($work_phone){
							echo '<div class="col s12">' . $work_phone . '</div>';
						}?>
						</header>
					<?php
						echo '<hr /><div class="col s12">' . get_the_author_meta( 'description', $author_id ) . '</div>';
					?>

					<h2 id="author-content" class="col s12 light center">Contributions</h2>

			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'author' );

					endwhile;

					joints_page_navi();

					else :

					get_the_author();

					get_template_part( 'parts/content', 'missing-author' );

					endif;

					?>



			<?php //get_sidebar('archives'); ?>

		</div> <!-- end #main -->

</main> <!-- end main -->

<?php get_footer(); ?>
