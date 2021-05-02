<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> role="article">
	<div class="card-content">
		<h1><a href="<?php echo $post->guid; ?>" class="h2 center" rel="bookmark" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a></h1>

			<?php get_template_part( 'parts/content', 'byline' ); ?>

	</div>


</article>
<?php //}?>
