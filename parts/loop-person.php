<?php 

if(function_exists('get_field')):
  
  $user_image = get_the_post_thumbnail($post->post_id, array( 150, 150), array( 'class' => 'responsive-img circle' ) );
  $work_projects = get_field('person_projects');
  $work_title = get_field('work_title');
  $work_phone = get_field('work_phone');
  $work_email = get_field('work_email');
  $work_profile_link = get_field('work_profile_link');
  //$user_email = get_the_author_meta( 'email');
  //$user_site = get_the_author_meta( 'user_url', $author_id );
  $begood_project = get_field('begood_subproject');
  $aewg_position = get_field('aewg_position');
  $biog = get_field('work_biog');
  $publications = get_field('person_publications');
    
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> itemscope itemtype="http://schema.org/Person">

  <header class="article-header center p-4">

    <h1 class="entry-title light single-title " itemprop="headline"><?php the_title(); ?></h1>

  </header> <!-- end article header -->

  <div class="entry-content" itemprop="articleBody">

    <div class="profile-details max-w-prose mx-auto center p-4">

      <?php
			if ($user_image) {
				echo $user_image;
			}
			if ($work_title){
				echo '<p><strong>Position: </strong>' . $work_title . '</p>';
			}
			if ($work_profile_link){
				echo '<p><a class="flex w-fit mx-auto items-center gap-2" href="' . $work_profile_link . '" target="_blank"><strong>University of Oxford Profile</strong> <i class="material-icons text-lg">open_in_new</i></a></p>';
			}
      if($work_email) {
        echo '<p><strong>Email: </strong><a href="mailto:' . $work_email . '" target="_blank">' . $work_email . '</a></p>';
      }
			
			if ($work_phone){
				echo '<p><strong>Phone: </strong>' . $work_phone . '</p>';
			} if( $work_projects): ?>
      <div><strong>Project(s): </strong>
        <?php foreach( $work_projects as $post): // variable must be called $post (IMPORTANT) ?>
        <a class="mx-1" href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></a>
        <?php

				$new_arr[] = '<a href="' . get_permalink($post->ID) .'">' . $post->post_title . '</a>';
				endforeach;?>

      </div>


      <?php endif; ?>

    </div>

    <div class="main-content border border-b border-t border-light py-4">
      <?php the_content(); ?>
    </div>

  </div> <!-- end article section -->

  <?php if(!empty($publications)):?>
  <aside class="py-4">

    <h2 class="col s12 light center col-span-full">Outputs</h2>
    <ul class="collection">

      <?php foreach($publications as $post):
        
        $publication_link = get_field('publication_link');
        
        ?>

      <li class="collection-item flex items-center avatar">
        <i class="material-icons circle pink darken-2" aria-hidden="true">bookmark_border</i>
        <h3 class="title m-0">
          <?php if('publication_link'):?>

          <a class="flex items-center gap-2" href="<?php echo $publication_link;?>" target="_blank">
            <?php echo get_the_title( $post->ID ); ?>
            <i class="material-icons text-lg">
              open_in_new
            </i>
          </a>

          <?php else:?>
          <a href="<?php echo get_permalink( $post->ID ); ?>">
            <?php echo get_the_title( $post->ID ); ?>
          </a>
          <?php endif;?>
        </h3>
      </li>

      <?php endforeach;?>
  </aside>

  <?php endif;?>


</article> <!-- end article -->

<?php endif;?>