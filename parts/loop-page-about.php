<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h2 class="page-title center"><?php the_title(); ?></h2>
	</header> <!-- end article header -->


  <div class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	    <?php wp_link_pages(); ?>
	</div> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->

</article> <!-- end article -->

<aside id="child_pages" class="row">
	<?php
	  $children = get_pages('parent=' . $posts[0]->ID . '&child_of=' . $posts[0]->ID);
	  if ($children) {
		foreach ($children as $child) {
		$trimmed = wp_trim_words( $child->post_content, $num_words = 20, $more = null );
	   echo '<section class="col s12 l4"><div class="black-text card large"><h4 class="center"><a href="' . $child->guid . '">' . $child->post_title . '</a></h4>' . $trimmed . '</div></section>';
		}
	} ?>
</aside>
