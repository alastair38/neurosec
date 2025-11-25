<?php

get_header(); ?>

<div class="container">

  <div class="row">

    <div class="col s12 l8 grid">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php get_template_part( 'parts/loop', 'single' );

		?>

    </div>

    <?php
		
		// get any sibling or child pages to display
		$siblings = [];
		
		if ( $post->post_parent !== 0 && ($post->post_parent !== $post->ID) ) {
					$sibling_args = array(
						'sort_order' => 'asc',
						'sort_column' => 'post_title',
						'hierarchical' => 1,
						'exclude' => $post->ID,
						'child_of' => $post->post_parent,
						'parent' => $post->post_parent,
						'offset' => 0,
						'post_type' => 'projects',
						'post_status' => 'publish'
					);
					$siblings = get_pages($sibling_args);
					
					
		}
		
		$children_args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'child_of' => $post->ID,
			'parent' => -1,
			'offset' => 0,
			'post_type' => 'projects',
			'post_status' => 'publish'
		);
		
		$children = get_pages($children_args);
		?>

    <div id="sidebar1" class="col white s12 l4 valign">
      <div class="p-4">

        <?php
				
				if(function_exists('get_field')):
  
					$website = get_field('project_website');
					
					if($website):?>

        <div class="py-4 center text-base">

          <h2 class="center text-lg">Project Website</h2>

          <a href="<?php echo $website; ?>" target="_blank">
            <?php the_title();?>
          </a>

        </div>

        <?php endif; 
				
				endif;

		
		if ($children || $siblings || $post->post_parent):?>
        <div class="py-4 text-base center">
          <h2 class="center text-lg">Links</h2>
          <ul>

            <?php if($post->post_parent):?>

            <li>
              <a href="<?php echo get_the_permalink($post->post_parent); ?>">
                <?php echo get_the_title($post->post_parent); ?>
              </a>
            </li>

            <?php endif;?>

            <?php if ($children):?>

            <?php foreach ($children as $child):?>
            <!-- $trimmed = wp_trim_words( $child->post_content, $num_words = 20, $more = null ); -->
            <li><a href="<?php echo get_the_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
            <?php endforeach;?>

            <?php endif;?>

            <?php if (!empty($siblings)):?>


            <?php foreach ($siblings as $sibling) {?>
            <li>
              <a href="<?php echo get_the_permalink($sibling->ID); ?>">
                <?php echo $sibling->post_title; ?>
              </a>
            </li>
            <?php }?>


            <?php endif;?>
          </ul>
        </div>

        <?php endif;?>

        <?php 
				
				if(function_exists('get_field')):
  
					$team_members = get_field('project_team_members');
					
				endif;

				if($team_members):?>
        <div class="py-4 text-base center">
          <h2 class="text-lg center">Project Members</h2>
          <ul>

            <?php foreach($team_members as $team_member):?>

            <li class="card">
              <a class="flex items-center p-4 gap-2" href="<?php echo get_the_permalink($team_member->ID);?>">
                <?php echo get_the_post_thumbnail( $team_member->ID, array( 40, 40), array( 'class' => 'responsive-img circle' ) );?>
                <?php echo get_the_title( $team_member->ID );?>
              </a>
            </li>

            <?php endforeach;?>

          </ul>
        </div>

        <?php endif;?>

      </div>

    </div>

    <?php endwhile; ?>

    <?php endif; ?>

  </div> <!-- end row -->
</div> <!-- end container -->

<?php get_footer(); ?>