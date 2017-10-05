<div class="container">

<section id="more" class="row">
<?php
// check if the repeater field has rows of data
if( have_rows('key_pages') ):
  while ( have_rows('key_pages') ) : the_row();
	$image = get_sub_field('page_image');
  $link_text = get_sub_field('page_byline');
?>
<div class="col s12 m6 l4">
     <div class="card small teal">
       <div class="card-image">
         <?php echo wp_get_attachment_image( $image, "custom-size", "", array( "class" => "responsive-img", "alt" => "Photograph for the Neurosec " . $link_text . " page"  ) );  ?>


       </div>
       <div class="center">
          <h3 class="card-title"><a class="white-text" href="<?php the_sub_field('page_name'); ?>"><?php echo $link_text ;?></a></h3>
       </div>
     </div>
   </div>



<?php
	endwhile;
	else :
	    // no rows found
	endif;
?>
</section>
</div>
<section id="starting" class="row">
<?php
// check if the repeater field has rows of data
if( have_rows('secondary_pages') ):
  while ( have_rows('secondary_pages') ) : the_row();
	$page_ID = get_sub_field('secondary_page_name');
?>
<div class="entry-content col s12 m6 l6">
	<article class="s12 card">
		<div class="card-content">
			<h3 class="card-title"><a href="<?php the_permalink($page_ID) ?>"><?php echo get_the_title($page_ID);?></a></h3>
				<p>
					<?php the_sub_field('secondary_page_byline');?>
				</p>
			<img src="<?php the_sub_field('secondary_page_image');?>"/>

		</div>
		<div class="card-action blue-grey darken-1">

		</div>
	</article>
</div>

<?php
	endwhile;
	else :
	    // no rows found
	endif;
?>
</section>
