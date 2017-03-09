<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
$author = get_queried_object();
$author_id = $author->ID;
?>

<main class="container">

		<div class="row" role="main">

		    <div class="col s12">

					<header>
						<h1 class="page-title light center"><?php echo get_the_author_meta( 'display_name', $author_id );?> </h1>

					</header>

					<?php
						echo '<div ><img class="responsive-img col s4 offset-s4" src="' . get_field('user_image', 'user_' . $author_id  . '') . '" /><p class="col s12">' . get_the_author_meta( 'description', $author_id ) . '</p></div>';
					?>

					<h2 id="author-content" class="col s12 light center">Contributions</h2>

			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'author' );

					endwhile;

					joints_page_navi();

					else :

					get_the_author();

					get_template_part( 'parts/content', 'missing-author' );

					endif;

					?>

				</div>

			<?php //get_sidebar('archives'); ?>

		</div> <!-- end #main -->

</main> <!-- end main -->

<?php get_footer(); ?>
