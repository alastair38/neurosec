<?php

/*
Template Name: Team Page
*/

get_header();

$pi = get_field('pi');
$pi_description = get_field('pi_description');
$pi_title = get_field('pi_title');
$hide_projects = get_field('hide_projects');
?>

	<div class="container">
			<div class="row">
				<header class="article-header col s12">


					<h2 class="page-title center"><?php the_title(); ?></h2>


				</header> <!-- end article header -->
				<div id="team-layout" class="col s12">

					<?php

// check if the repeater field has rows of data
					if( have_rows('members_layout') ):

					 	// loop through the rows of data
					    while ( have_rows('members_layout') ) : the_row();?>
								<?php $members = get_sub_field('section_members');
								$pi_text = get_sub_field('section_text');
								$row = get_row_index();
								?>

								<?php if(count($members) === 1 && $row === 1) {?>
									<div class="col s12">
									<h2 class="light center"><?php the_sub_field('section_title');?></h2>
								<?php	foreach($members as $member) {
										$user_image = get_field('user_image', 'user_' . $member['ID'] . '');
										$work_title = get_field('work_title', 'user_' . $member['ID'] . '');
										$work_biog = get_field('work_biog', 'user_' . $member['ID'] . '');

										?>
										<div class="col s12">
										<div class="card horizontal">

										<div class="card-image"><img src="<?php echo $user_image['url'];?>" alt="<?php _e( 'Photograph of ', 'neurosec' ); ?><?php echo $member['display_name'];?>" /></div>
										<div class="card-stacked">
										<div class="card-content">

											<h3 class="card-title"><a href="<?php echo get_author_posts_url($member['ID'], $member['user_nicename']);?>"><?php echo $member['display_name'];?></a></h3>
											<span class="work-title block"><?php echo $work_title;?></span>
											<?php echo $pi_text;?>
										</div>

											</div>
										</div>
									</div>
									<?php }
								} else {?>
									<div class="col s12">
									<h2 class="light center"><?php the_sub_field('section_title');?></h2>
									<div class="flex-center">
									<?php foreach($members as $member) {
										$user_image = get_field('user_image', 'user_' . $member['ID'] . '');
										$work_title = get_field('work_title', 'user_' . $member['ID'] . '');
										?>
										<div class="col s6 m4 l3">
										<div class="card large">

										<div class="card-image"><img src="<?php echo $user_image['url'];?>" alt="<?php _e( 'Photograph of ', 'neurosec' ); ?><?php echo $member['display_name'];?>" /></div>
										<div class="card-stacked">
										<div class="card-content">

											<h3 class="card-title"><a href="<?php echo get_author_posts_url($member['ID'], $member['user_nicename']);?>"><?php echo $member['display_name'];?></a></h3>
											<span class="work-title block"><?php echo $work_title;?></span>

										</div>

											</div>
										</div>
									</div>

									<?php }
									echo '</div>';
								}
								echo '</div>';
					    endwhile;

					else :

					    // no rows found

					endif;

?>




		</div>


		</div> <!-- end #row -->


	</div> <!-- end container -->


<?php get_footer(); ?>
