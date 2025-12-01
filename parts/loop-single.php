<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope
  itemtype="http://schema.org/BlogPosting">
  <?php 
	
	$projectStatus = get_the_terms( $post->ID, 'project-status' );
		if ( ! empty( $projectStatus ) && ! is_wp_error( $projectStatus ) ) {
			$terms = wp_list_pluck( $projectStatus, 'name' );
		}
	?>
  <header class="article-header ">

    <h1 class="entry-title single-title light" itemprop="headline"><?php the_title(); ?></h1>
    <label class="byline">

      <?php
			if(is_singular('publications')) {
				echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );
			} elseif (is_singular('post')) {?>
      <?php echo the_time('F j, Y') . '.';?>
      <?php
					echo 'Posted in '. get_the_category_list(', ');
				?>

      <?php } elseif (is_singular('engagement')) {
				
				if(function_exists('get_field')):
  
					$meetingDate = get_field('meeting_date');
					$meetingLocation = get_field('meeting_location');
		
					if($meetingDate) {
						echo 'Meeting held on ' . $meetingDate;
					}
					
					if($meetingLocation) {
						echo ' at ' . $meetingLocation;
					}
				
				endif;
			
			} elseif (is_singular('news_events')) {
				echo the_time('F j, Y') . '.';
			}

			?>
      <?php get_template_part( 'parts/content', 'share' ); ?></label>
  </header> <!-- end article header -->

  <div class="entry-content" itemprop="articleBody">

    <?php 
			if(!empty($terms) && in_array("Archived", $terms)):?>
    <p class="archived-project">This project has now finished</p>
    <?php endif;?>

    <?php if(is_singular('projects')) {
			
			the_post_thumbnail('large', ['class' => 'responsive-img']);
			
			if(function_exists('get_field')):
  
				$projectLogo = get_field('project_logo');
				if ( $projectLogo ) : ?>
    <img class="aligncenter featured-img" src="<?php echo $projectLogo['sizes']['large']; ?>"
      alt="<?php echo $projectLogo['alt']; ?>" />
    <?php endif;
				
			endif;
			
		}

			the_content();
			
			if(function_exists('get_field')):
  
				$import_upm = get_field('forthcoming_meetings_page', 'options'); // get the forthcoming meetings page id

				if($import_upm == get_the_id()) { // check to see if current page id matches $import_upm

					get_template_part( 'parts/content', 'forthcoming-meetings' ); // if above condition is true, get partial to import forthcoming meetings content json
				}
				
			endif;?>

    <?php
		
		if(function_exists('get_field')):
  
			$video = get_field('meeting_video');
			$video2 = get_field('video');
			
			if($video){
				echo '<div class="video-container">' . $video . '</div>';
			}
			
			if ($video2) {
				echo '<div class="video-container">' . $video2 . '</div>';
			}
			
		endif; ?>

    <?php
		
		if(function_exists('get_field')):
  
			$images = get_field('meeting_photos');

			if( $images ): ?>

    <div class="divider"></div>
    <div class="row">
      <h2 class="h5 center light">Meeting photos</h2>

      <?php foreach( $images as $image ): ?>
      <div class="col s6 m4 l4">

        <img data-caption="<?php echo $image['caption']; ?>" src="<?php echo $image['sizes']['large']; ?>"
          alt="<?php echo $image['alt']; ?>" />

      </div>
      <?php endforeach; ?>

    </div>

    <?php endif;
				
			endif;?>

    <?php
		
		if(function_exists('get_field')):
  
		if( have_rows('project_links') ):?>

    <div id="project_links" class="row grid grid-auto-fit-md gap-6">
      <h2 class="center col-span-full light">For more information about this project</h2>
      <?php while ( have_rows('project_links') ) : the_row();
					$link_text = get_sub_field('link_text');
					$link_url = get_sub_field('link_url');
					?>

      <a class="white-text w-full oxford-blue text-hover p-6 flex items-center justify-center"
        href="<?php echo $link_url; ?>">
        <!-- <div class="card-content center"></div> -->
        <h3 class="card-title"><?php echo $link_text;?></h3>

      </a>

      <?php
				endwhile;?>
    </div>
    <?php else :
						// no rows found
		endif;
		endif; ?>

    <?php get_template_part( 'parts/content', 'contact' );?>
    <?php
// check if the repeater field has rows of data

if(function_exists('get_field')):
  
  if( have_rows('logos_funder') ):
		$count = get_post_meta(get_the_ID(), 'logos_funder', true);
		$col_count = 12 / $count;
		echo '<div class="row center">';
		while ( have_rows('logos_funder') ) : the_row();
		$img = get_sub_field('logo_img_funder');
		$logo_name = get_sub_field('logo_name_funder');
		$logo_link = get_sub_field('logo_link_funder');
		echo '<div class="col s' . $col_count . '"><a href="' . $logo_link . '" target="_blank"><img class="responsive-img" src="' . $img . '" alt="' . $logo_name . ' logo"></a></div>';
		endwhile;
		echo '</div>';
	else :
			// no rows found
	endif;
	
endif;?>

  </div> <!-- end article section -->

  <footer class="article-footer">
    <p class="tags"><?php // the_category(); ?></p>
  </footer>
  <!-- end article footer -->

  <?php //comments_template(); ?>

</article> <!-- end article -->