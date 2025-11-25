<?php
$title = single_cat_title("", false);
?>
<div>

  <?php
if (  is_home() || is_category() || is_post_type_archive('publications') || is_tax('publication_type') ) {?>

  <div id="filter" class="modal bottom-sheet">
    <div class="modal-content col s4">

      <?php //	$my_search->the_form();
						// echo do_shortcode( '[searchandfilter taxonomies="resource-category,category" show_count="1,1" types="checkbox,checkbox" headings="Categories,Types" hide_empty="0,0"]' );
						if (  is_home() || is_category()){
							echo '<p>Filter Articles by Category</p>';
							$cats = get_terms( 'category', array(
									'hide_empty' => 0
							) );


									foreach ( $cats as $cat ) {
											echo '<a href="' . esc_url( get_term_link( $cat ) ) . '">' . $cat->name . '</a><span class="round-badge">' . $cat->count . '</span>';
									}

						} else {
							echo '<p>Filter Outputs by Type</p>';
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
      <button class=" modal-action modal-close waves-effect btn-flat">Close</button>
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

 							echo '<p>Filter News and Events by Type</p>';
 							$terms = get_terms( 'news_type', array(
 							    'hide_empty' => 0
 							) );


 							    foreach ( $terms as $term ) {
 							        echo '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a><span class=" round-badge">' . $term->count . '</span>';
 							    }




 			 ?>
    </div>
    <div class="modal-footer">
      <button class="modal-action modal-close waves-effect grey darken-4 white-text btn-flat">Close</button>
    </div>
  </div>
  <!-- <?php
  }?> -->

</div>