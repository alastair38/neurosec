<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
$title = single_cat_title("", false);
?>

<main class="container">

		<div class="row" role="main">

		    <div class="col s12 l9">

					<header>
						<h1 class="page-title center"><?php get_the_author()?> </h1>

					</header>

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

			<?php get_sidebar('archives'); ?>

		</div> <!-- end #main -->

</main> <!-- end main -->

<?php get_footer(); ?>
