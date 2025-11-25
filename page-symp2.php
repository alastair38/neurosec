<?php
/*

*/

get_header();

?>

<div class="container">
  <div class="row">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <script>
    var auth = btoa('symplecticPSYCHIATRY:brightbluestage');
    $.ajax({
      type: 'GET',
      url: 'https://oxris-qa.bsp.ox.ac.uk:8091/elements-api/v4.9',
      headers: {
        "Authorization": "Basic " + auth
      },
      dataType: "xml",
      success: function(data) {
        /* handle data here */
        console.log(data);
      },
      error: function(xhr, status) {
        /* handle error here */
        console.log(status);
      }
    });
    </script>
    <?php 	endwhile; endif;?>
  </div> <!-- end #main -->



</div> <!-- end container -->




<?php get_footer(); ?>