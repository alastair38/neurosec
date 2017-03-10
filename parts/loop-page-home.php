<section id="more" class="row">
<?php
// check if the repeater field has rows of data
if( have_rows('key_pages') ):
  while ( have_rows('key_pages') ) : the_row();
	$page_ID = get_sub_field('page_name');
?>
<div class="entry-content col s12 m4 l4">
	<article class="s12 card">
		<div class="card-content">
			<h3 class="card-title"><a href="<?php the_permalink($page_ID) ?>"><?php echo get_the_title($page_ID);?></a></h3>
				<p>
					<?php the_sub_field('page_byline');?>
				</p>
			<img src="<?php the_sub_field('page_image');?>"/>

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
			<span class="card-title"><?php echo get_the_title($page_ID);?></span>
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
