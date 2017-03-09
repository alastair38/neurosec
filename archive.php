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
					} else {
						echo '<h1 class="page-title center">' . $title . '</h1>';
					}?>

				</header>

		    <div class="col s12">

					<div class="col s12">
						<a class="chip" href="#filter">Filter Publications<i class="filter material-icons">filter_list</i></a>
					</div>

			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'publications' );

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
