<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
<?php $logo_image = get_theme_mod( 'tcx_logo_image' );
			$header_logo = get_field('header_logo', 'options');
?>
<div class="navbar-fixed">


	<div class="logo_wrapper" style="background: url(<?php echo $header_logo; ?>)
	no-repeat; background-size: 20%; background-position: 98% center;"><a id="logo_link" aria-label="Neurosec home page" href="<?php bloginfo('url'); ?>"><img id="logo" class="center"
		<?php
		$logo_image = get_theme_mod( 'tcx_logo_image' );
		if ($logo_image){?>
			src="<?php echo $logo_image;?>" alt=""
			<?php
			} else {?>
			src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt=""
			<?php }?>
				/></a>
			<button aria-label="Open mobile menu" data-activates="slide-out" class="button-collapse right hide-on-large-only btn-flat"><i class="material-icons">menu</i></button>
			</div>

	<div class="nav-wrapper">
<h1 class="screen-reader-text"><?php bloginfo('name'); ?></h1>


			<div class="hide-on-med-and-down">
				<?php joints_top_nav(); ?>

			</div>



		<!-- <div class="center teal white-text">
			<?php bloginfo('name'); ?>
      </div> -->
		<div id="slide-out" class="side-nav">
		<span class="block center"><?php bloginfo('name'); ?></span>
		<?php joints_off_canvas_nav(); ?>

	</div>


		</div>

</div>

		 <!-- Comment this line out if using a slide-out side nav menu on mobile. You will also need to uncomment the relevant <span> in nav-topbar.php to activate this.   -->
