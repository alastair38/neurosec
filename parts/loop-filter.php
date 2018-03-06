<?php
$title = single_cat_title("", false);
?>
<aside role="complementary">

<?php
if (  is_home() || is_category() || is_post_type_archive('publications') || is_tax('publication_type') ) {?>

	<div id="filter" class="modal bottom-sheet">
	    <div class="modal-content col s4">

				<?php //	$my_search->the_form();
						// echo do_shortcode( '[searchandfilter taxonomies="resource-category,category" show_count="1,1" types="checkbox,checkbox" headings="Categories,Types" hide_empty="0,0"]' );
						if (  is_home() || is_category()){
							echo '<h6>Filter Articles by Category</h6>';
							$cats = get_terms( 'category', array(
									'hide_empty' => 0
							) );


									foreach ( $cats as $cat ) {
											echo '<a href="' . esc_url( get_term_link( $cat ) ) . '">' . $cat->name . '</a><span class="round-badge">' . $cat->count . '</span>';
									}

						} else {
							echo '<h6>Filter Publications by Type</h6>';
							$terms = get_terms( 'publication_type', array(
							    'hide_empty' => 0
							) );


							    foreach ( $terms as $term ) {
							        echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a><span class=" round-badge">' . $term->count . '</span>';
							    }

						}


			 ?>
	    </div>
	    <div class="modal-footer">
	      <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
	    </div>
	  </div>
	<?php
 }?>

 <!-- <?php
 if ( is_post_type_archive('news_events') || is_tax('news_type') ) {?> -->

 	<div id="filter" class="modal bottom-sheet">
 	    <div class="modal-content col s4">

 				<?php //	$my_search->the_form();
 						// echo do_shortcode( '[searchandfilter taxonomies="resource-category,category" show_count="1,1" types="checkbox,checkbox" headings="Categories,Types" hide_empty="0,0"]' );

 							echo '<h6>Filter News and Events by Type</h6>';
 							$terms = get_terms( 'news_type', array(
 							    'hide_empty' => 0
 							) );


 							    foreach ( $terms as $term ) {
 							        echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a><span class=" round-badge">' . $term->count . '</span>';
 							    }




 			 ?>
 	    </div>
 	    <div class="modal-footer">
 	      <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
 	    </div>
 	  </div>
 	<!-- <?php
  }?> -->

</aside>
