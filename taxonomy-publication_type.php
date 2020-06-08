<?php get_header();?>

<div class="container">

		<div class="row" role="main">
			<div class="col s12">

				<header>
					<h1 class="page-title center"><?php single_term_title('Publications : '); ?></h1>

				</header>

		    <div class="col s12">
					<div class="col s12 filter-controls">
						<a class="chip" href="#filter">Filter Publications<i class="filter material-icons">filter_list</i></a>
					</div>

			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'publications' );

					?>

					<?php endwhile; ?>

					<?php joints_page_navi(); ?>

					<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

					<?php endif; ?>

				</div> <!-- end .col s12 -->

		</div> <!-- end .col s12 -->
	</div> <!-- end main -->

</div> <!-- end .container -->

<?php get_template_part( 'parts/loop', 'filter' ); ?>

<?php get_footer(); ?>
