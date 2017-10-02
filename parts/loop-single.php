<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
	<!-- <?php if (is_singular('projects')) {?>
		<link href="http://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">(function () {
					 if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
					 if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
							 var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
							 s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
							 s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
							 var h = d[g]('body')[0];h.appendChild(s); }})();
	 </script>
 <?php } ?> -->
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<label class="byline">
			<?php
			if(is_singular('publications')) {
				echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );
			} elseif (is_singular('post')) {?>
				Written by <?php the_author_posts_link(); ?>	on <?php echo the_time('F j, Y') . '.';?>
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
			}

			?>
		<?php get_template_part( 'parts/content', 'share' ); ?></label>
	</header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">


			<div class="center project_logo">
				<?php
				the_post_thumbnail('full');?>
			</div>
			<?php

			the_content();

			$import_upm = get_field('forthcoming_meetings_page', 'options'); // get the forthcoming meetings page id

			if($import_upm == get_the_id()) { // check to see if current page id matches $import_upm

				get_template_part( 'parts/content', 'forthcoming-meetings' ); // if above condition is true, get partial to import forthcoming meetings content json
			}

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
 	<?php get_template_part( 'parts/content', 'contact' );?>



	</section> <!-- end article section -->


		<?php
		if( have_rows('project_links') ):
			echo '<aside id="project_links" class="row"><h2 class="center light">For more information about specific projects</h2>';
		  while ( have_rows('project_links') ) : the_row();
			$link_text = get_sub_field('link_text');
			$link_url = get_sub_field('link_url');
		?>
		<div class="col s12 m6">
			<div class="s12 card large z-depth-0 teal">
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


	<footer class="article-footer">
		<p class="tags"><?php // the_category(); ?></p>	</footer>
	<!-- end article footer -->




	<?php //comments_template(); ?>

</article> <!-- end article -->
