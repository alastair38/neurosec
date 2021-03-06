<?php get_header(); ?>

	<div class="container">

		<div id="inner-content" class="row">

			<main id="main" class="col s12 m8" role="main">

				<article id="content-not-found">

					<header class="article-header">
						<h1><?php _e("Epic 404 - Article Not Found", "jointswp"); ?></h1>
					</header> <!-- end article header -->

					<div class="entry-content">
						<p><?php _e("The article you were looking for was not found, but maybe try looking again!", "jointswp"); ?></p>
					</div> <!-- end article div -->

					<div class="search">
					    <p><?php get_search_form(); ?></p>
					</div> <!-- end search div -->

				</article> <!-- end article -->

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
