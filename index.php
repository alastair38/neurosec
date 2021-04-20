<?php get_header();?>

<div>

		<div class="row">
			<div class="col s12">

				<header>
					<h1 class="page-title center"><?php single_post_title();?></h1>
				</header>

		    <div class="col s12">
					<div class="col s12">
						<a class="chip" href="#filter">Filter Articles<i class="filter material-icons">filter_list</i></a>
					</div>


			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'blog' );

					?>

					<?php endwhile; ?>

					<?php joints_page_navi(); ?>

					<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

					<?php endif; ?>

			</div> <!-- end .col s9 -->


		</div> <!-- end .col s12 -->
	</div> <!-- end .row -->

</div> <!-- end div-->

	<?php get_template_part( 'parts/loop', 'filter' ); ?>

<?php get_footer(); ?>
