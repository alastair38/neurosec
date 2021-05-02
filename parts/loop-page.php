

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">


		<h1 class="page-title center"><?php the_title(); ?></h1>

		<? //var_dump($post);?>
	</header> <!-- end article header -->

    <div class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	    <?php wp_link_pages(); ?>
	</div> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->



</article> <!-- end article -->
