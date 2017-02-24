<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<label class="byline">Written by <?php the_author_posts_link(); ?>	on <?php echo the_time('F j, Y') . '. ';?>
			<?php
			if(is_singular('publications')) {
				echo 'Posted in '. get_the_term_list( '', 'publication_type', '', ', ', '' );
			} elseif (is_singular('post')) {
				echo 'Posted in '. get_the_category_list(', ');
			} else {
				
			}

			?>
		<?php get_template_part( 'parts/content', 'share' ); ?></label>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
		<?php
		the_post_thumbnail('large', array('class' => 'responsive-img'));
		$video = get_field('video');
		if($video){
			echo '<div class="video-container">' . $video . '</div>';
		}
		the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<p class="tags"><?php // the_category(); ?></p>	</footer>
	<!-- end article footer -->




	<?php //comments_template(); ?>

</article> <!-- end article -->
