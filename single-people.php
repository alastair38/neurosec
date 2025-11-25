<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
?>

<div class="container author">

  <div class="row">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'parts/loop', 'person' ); ?>

    <?php //get_sidebar(); ?>

    <?php endwhile; ?>

    <?php endif; ?>

  </div> <!-- end main -->

</div> <!-- end container-->

<?php get_footer(); ?>