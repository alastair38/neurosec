<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<?php $hide_title = get_field('hide_title');
	if($hide_title) {
		$hide_title = "screen-reader-text";
	} else {
		$hide_title = null;
	}?>
	<header class="article-header <?php echo $hide_title;?>">

		<h1 class="entry-title single-title " itemprop="headline"><?php the_title(); ?></h1>
		<label class="byline">
			<?php
			if(is_singular('publications')) {
				echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );
			} elseif (is_singular('post')) {?>
				<?php echo the_time('F j, Y') . '.';?>
				<?php

					echo 'Posted in '. get_the_category_list(', ');

				?>
				<?php

				 ?>

			<?php } elseif (is_singular('engagement')) {

				$meetingDate = get_field('meeting_date');
				if($meetingDate) {
					echo 'Meeting held on ' . $meetingDate;
				}
				$meetingLocation = get_field('meeting_location');
				if($meetingLocation) {
					echo ' at ' . $meetingLocation;
				}
			} elseif (is_singular('news_events')) {
				echo the_time('F j, Y') . '.';
			}

			?>
		<?php get_template_part( 'parts/content', 'share' ); ?></label>
	</header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">

		<?php if(is_singular('projects')) {
			$projectLogo = get_field('project_logo');
			 if ( $projectLogo ) : ?>
	<img class="aligncenter featured-img" src="<?php echo $projectLogo['sizes']['large']; ?>" alt="<?php echo $projectLogo['alt']; ?>"/>
<?php endif;
		}

			the_content();

			$import_upm = get_field('forthcoming_meetings_page', 'options'); // get the forthcoming meetings page id

			if($import_upm == get_the_id()) { // check to see if current page id matches $import_upm

				get_template_part( 'parts/content', 'forthcoming-meetings' ); // if above condition is true, get partial to import forthcoming meetings content json
			}

			?>

		<?php

			$video = get_field('meeting_video');
			$video2 = get_field('video');
			if($video){
				echo '<div class="video-container">' . $video . '</div>';
			}
			if ($video2) {
				echo '<div class="video-container">' . $video2 . '</div>';
			}

  ?>



		<?php

$images = get_field('meeting_photos');

if( $images ): ?>
 <div class="divider"></div>
    <div class="row">
			<h5 class="center light">Meeting photos</h5>
        <?php foreach( $images as $image ): ?>
            <div class="col s6 m4 l4">

                     <img data-caption="<?php echo $image['caption']; ?>" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />


            </div>
        <?php endforeach; ?>
    </div>


<?php endif; ?>
<?php
if( have_rows('project_links') ):
	echo '<aside id="project_links" class="row"><h2 class="center light">For more information about specific projects</h2>';
	while ( have_rows('project_links') ) : the_row();
	$link_text = get_sub_field('link_text');
	$link_url = get_sub_field('link_url');
?>
<div class="col s12 m6">
	<div class="s12 card large z-depth-0 oxford-blue">
		<div class="card-content center">
			<h3 class="card-title"><a class="white-text" href="<?php echo $link_url; ?>"><?php echo $link_text;?></a></h3>

		</div>

	</div>
</div>

<?php
	endwhile;
	echo '</aside>';
	else :
			// no rows found
	endif;
?>
<?php get_template_part( 'parts/content', 'contact' );?>
<?php
// check if the repeater field has rows of data
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
?>




	</section> <!-- end article section -->





	<footer class="article-footer">
		<p class="tags"><?php // the_category(); ?></p>	</footer>
	<!-- end article footer -->




	<?php //comments_template(); ?>

</article> <!-- end article -->
