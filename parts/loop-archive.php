<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>


<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 col w-full s12 '); ?>>
  <article class="card w-full h-full mb-0">
    <div class="card-image">
      <?php
		 ?>
      <img class="responsive-img oxford-blue" src="<?php the_post_thumbnail_url('custom-size');?>" alt="" />

    </div>

    <div class="card-content">
      <?php 
			if(is_post_type_archive('post') ):
			
			if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
					echo '<span class="badge new"></span>';
					}
					
			endif;
			?>

      <a href="<?php the_permalink();?>">
        <h2 class="card-title"><?php the_title(); ?></h2>
      </a>

      <?php if(is_post_type_archive(['news_events', 'post'])):?>

      <label class="authors">

        <?php echo the_time('F j, Y') . '.';?>
        <?php
				if(is_post_type_archive('news_events')) {
					echo 'Posted in '. get_the_term_list( '', 'news_type', '', ', ', '' );
				}?>
      </label>

      <?php endif;?>

    </div>

  </article>

  <?php //get_template_part( 'parts/content', 'share' ); ?>

</div>