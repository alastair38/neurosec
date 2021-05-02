<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">

		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<label class="byline">

		<?php get_template_part( 'parts/content', 'share' ); ?></label>
    </header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">
		<?php
		the_content();


		?>
		<?php get_template_part( 'parts/content', 'contact' );?>
	</div> <!-- end article section -->

	<footer class="article-footer">
		<p class="tags"><?php // the_category(); ?></p>	</footer>
	<!-- end article footer -->




	<?php //comments_template(); ?>

</article> <!-- end article -->
