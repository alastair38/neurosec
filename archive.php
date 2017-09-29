<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
$title = single_cat_title("", false);
?>

<main>

		<div class="row" role="main">
			<div class="col s12">

				<header>
					<?php if(is_author()) {
						echo '<h1 class="page-title center">' . get_the_author() . '</h1>';
					} elseif(is_category()) {
						echo '<h1 class="page-title center">' . $title . '</h1>';
					} else {
						echo '<h1 class="page-title center">';
						post_type_archive_title();
						echo '</h1>';
					}?>


				</header>

		    <div class="col s12">


			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'archive' );

					endwhile;

					joints_page_navi();

					else :

					get_template_part( 'parts/content', 'missing' );

					endif;

					?>

				</div>



		</div> <!-- end #main -->
	</div>
</main> <!-- end main -->
	<?php get_template_part( 'parts/loop', 'filter' ); ?>
<?php get_footer(); ?>
