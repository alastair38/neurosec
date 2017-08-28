<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<link href="http://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">(function () {
					 if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
					 if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
							 var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
							 s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
							 s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
							 var h = d[g]('body')[0];h.appendChild(s); }})();
	 </script>

		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<label class="byline">
			<?php
			if(is_singular('publications')) {
				echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );
			} elseif (is_singular('post')) {
				echo 'Written by' . the_author_posts_link() .	' on ' . the_time('F j, Y') . '. Posted in '. get_the_category_list(', ');
			} elseif (is_singular('projects')) {
				$contactName = get_field('project_contact');
				$contactEmail = get_field('project_email');
				if($contactEmail) {
					echo 'Project Contact: <a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Contact the project by email" href="mailto:' . $contactEmail . '" target="_blank">' . $contactName . '</a>';
				}
				$meetingDate = get_field('meeting_date');
				if($meetingDate) {
					echo $meetingDate;
				}
				$meetingLocation = get_field('meeting_location');
				if($meetingLocation) {
					echo ' at ' . $meetingLocation;
				}
			}

			?>
		<?php get_template_part( 'parts/content', 'share' ); ?></label>
	</headif er> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">



			<?php
			the_content();
			// check if the repeater field has rows of data
			if( have_rows('details_of_meetings') ):
				echo '<ul class="collection">';
			  while ( have_rows('details_of_meetings') ) : the_row();

			?>
			<li class="collection-item avatar">
<i class="material-icons circle green">event</i>
<label class="secondarycontent"><?php the_sub_field('upcoming_meeting_date');?> at <?php the_sub_field('upcoming_meeting_address');?> </label>
<span aria-hidden="true" class="secondary-content addtocalendar atc-style-blue">
<var class="atc_event">
<var class="atc_date_start"><?php the_sub_field('upcoming_meeting_date');?></var>
<var class="atc_date_end"><?php the_sub_field('upcoming_meeting_date');?></var>
<var class="atc_timezone">Europe/London</var>
<var class="atc_title"><?php the_sub_field('upcoming_meeting_title');?></var>
<var class="atc_description"><?php the_sub_field('upcoming_meeting_description');?></var>
<var class="atc_location"><?php the_sub_field('upcoming_meeting_address');?></var>
<var class="atc_organizer_email"><?php the_sub_field('upcoming_meeting_contact');?></var>
</var>
</span>
						<h3 class="title"><?php the_sub_field('upcoming_meeting_title');?></h3>

							<p class="light">
								<?php the_sub_field('upcoming_meeting_description');?>
								<img src="<?php the_sub_field('upcoming_meeting_image');?>">
<br />
							</p>
							<label>
								Contact <a href="mailto:<?php the_sub_field('upcoming_meeting_contact');?>"><?php the_sub_field('upcoming_meeting_contact');?></a> for more information
							</label>
			</li>

			<?php
				endwhile;
				echo '</ul>';
				else :
				    // no rows found
				endif;
			?>

		<?php

			$video = get_field('meeting_video');
			if($video){
				echo '<div class="video-container">' . $video . '</div>';
			} elseif (is_singular('post')) {
			the_post_thumbnail('large', array('class' => 'responsive-img'));
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
	</section> <!-- end article section -->

	<footer class="article-footer">
		<p class="tags"><?php // the_category(); ?></p>	</footer>
	<!-- end article footer -->




	<?php //comments_template(); ?>

</article> <!-- end article -->
