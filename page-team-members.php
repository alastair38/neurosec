<?php

/*
Template Name: Team Page
*/

get_header();

if(function_exists('get_field')):
	$pi = get_field('pi');
	$pi_description = get_field('pi_description');
	$pi_title = get_field('pi_title');
	$hide_projects = get_field('hide_projects');
endif;

?>

<div class="container">
  <div class="row">
    <header class="article-header col s12">

      <h1 class="h2 page-title center"><?php the_title(); ?></h1>

    </header> <!-- end article header -->
    <div id="team-layout" class="col s12">

      <!-- if have rows -->
      <?php 
			 
			if(function_exists('get_field')):

      if( have_rows('members_layout') ):?>

      <!-- while have rows -->
      <div class="grid grid-cols-1 md-grid-cols-3 gap-6">

        <?php while ( have_rows('members_layout') ) : the_row();
			
				$members = get_sub_field('team_members');
				$pi_text = get_sub_field('section_text');
				$row = get_row_index();?>

        <h2 class="col-span-full light center"><?php echo get_sub_field('section_title') ;?></h2>
        <?php	foreach($members as $member):
					
					$user_image = get_the_post_thumbnail($member->ID, 'medium', array( 'class' => 'object-cover' ) );
					$work_title = get_field('work_title', $member->ID);
					$work_biog = get_field('work_biog', $member->ID);

				?>

        <div class="card vertical">
          <div class="card-image">
            <?php echo $user_image;?>
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <h3 class="card-title">
                <a href="<?php echo get_the_permalink($member->ID);?>"> <?php echo $member->post_title;?>
                </a>
              </h3>
              <?php echo $work_title;?>
            </div>
          </div>
        </div>

        <?php endforeach;?>

        <?php endwhile;?>
      </div>
      <?php endif;
		
			endif;?>


      <!-- while have rows -->




    </div>


  </div> <!-- end #row -->


</div> <!-- end container -->


<?php get_footer(); ?>