<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
$author = get_queried_object();
$author_id = $author->ID;
$user_image = get_field('user_image', 'user_' . $author_id  . '');
$work_projects = get_field('your_projects', 'user_' . $author_id  . '');
$work_title = get_field('work_title', 'user_' . $author_id  . '');
$work_phone = get_field('work_phone', 'user_' . $author_id  . '');
$user_email = get_the_author_meta( 'email', $author_id );
$begood_project = get_field('begood_subproject', 'user_' . $author_id  . '');
?>

<main class="container">

		<div class="row" role="main">

					<header class="col s12 center">
						<h1 class="page-title light"><?php echo get_the_author_meta( 'display_name', $author_id );?> </h1>


							<div class="profile-details">

								<?php
									if ($user_image) {
										echo '<div class="col s12"><img class="responsive-img circle col s4 offset-s4" src="' . $user_image['url'] . '" alt="' . $user_image['alt'] . '" /></div>';
									}
									if ($work_title){
										echo '<p><strong>Position: </strong>' . $work_title . '</p>';
									}
									echo '<p><strong>Email: </strong><a href="mailto:' . $user_email . '" target="_blank">' . $user_email . '</a></p>';
									if ($work_phone){
										echo '<p><strong>Phone: </strong>' . $work_phone . '</p>';
									} if( $work_projects): ?>

									<?php foreach( $work_projects as $post): // variable must be called $post (IMPORTANT) ?>
											<?php

											$new_arr[] = '<a href="' . $post->guid .'">' . $post->post_title . '</a>';
											endforeach;
											echo '<p><strong>Project(s): </strong>' . implode(', ', $new_arr) . '</p>';
									?>

					<?php wp_reset_postdata();

					// IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>



							</div>

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
