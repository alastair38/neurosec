<!-- This adds some basic  functionality whereever the partial is included -->

	<div id="breadcrumbs" class="col s12 center" aria-hidden="true" role="navigation">
		<a class="" href="<?php echo get_option('home')?>"> Home</a>

		<?php if($post->post_parent){?>
		<a class="" href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo ' ' . get_the_title($post->post_parent); ?></a>
		<?php }?>
		<?php if(is_page('profile')){?>
		<a class="" href="<?php echo get_permalink( get_page_by_path( 'Network' ) ) ?>"><?php echo ' ' . get_the_title(get_page_by_path( 'Network' )); ?></a>
		<?php }?>
		<?php if(!is_tax() && !is_category() && !is_page('profile')){?>
		<span class=""> <?php echo 'You are viewing the following page: ' . get_the_title(); ?></span>
		<?php }?>
		<?php if(is_tax() && !is_category()){
		$title = single_cat_title("", false);
		?>
		<span class=""> <?php echo 'You are viewing the following resources: ' . $title; ?></span>
		<?php }?>
		<?php if(is_category() && !is_tax()){
		$title = single_cat_title("", false);
		?>
		<span class=""> <?php echo 'You are viewing the network ' . $title; ?></span>
		<?php }?>
		<?php if(is_category() && is_tax()){
		$title = single_cat_title("", false);
		?>
		<span class=""> <?php echo 'You are viewing the network ' . $title; ?></span>
		<?php }?>
	</div>
