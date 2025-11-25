<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('grey-text text-darken-4 w-full col s12 m6l4'); ?>>
  <article class="card w-full h-full">
    <div class="card-image">
      <?php
			
			$tile = get_the_post_thumbnail($post->post_id, 'large', array( 'class' => 'responsive-img' ) ); get_field('image_tile');
			 if ( $tile ) : ?>
      <?php echo $tile;?>
      <?php endif;?>
    </div>

    <div class="card-content">
      <?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
					echo '<span class="badge new"></span>';
					}
			?>

      <a href="<?php the_permalink();?>">
        <h2 class="card-title"><?php the_title(); ?></h2>
      </a>

      <label class="authors"><?php echo the_time('F j, Y') . '.';?>
        <?php

					echo 'Posted in '. get_the_category_list(', ');

				?>
        <?php

				 ?>
      </label>




    </div>

  </article>

  <?php //get_template_part( 'parts/content', 'share' ); ?>

</div>