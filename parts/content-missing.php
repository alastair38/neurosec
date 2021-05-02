<div id="post-not-found" class="hentry">


	<?php if ( is_search() ) : ?>

		<header class="article-header">
			<h1><?php _e("Sorry, No Results.", "jointswp");?></h1>
		</header>

		<div class="entry-content">
			<p><?php _e("Try your search again.", "jointswp");?></p>
		</div>


	<?php else: ?>

		<div class="entry-content center">
			<p><?php _e("No content published in this section. Please check back shortly.", "jointswp");?></p>
		</div>



	<?php endif; ?>

</div>
