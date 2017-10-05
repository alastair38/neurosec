

<?php if(is_front_page()){?>
	<div  id="twitter_feed" class="col s12 white">
		<div class="container">
		<?php
		$twitter_handle = get_theme_mod('tcx_twitter_handle');
		echo do_shortcode( '[rotatingtweets screen_name="' . $twitter_handle . '" official_format="1" rotation_type="scrollVert" links_in_new_window="1" timeout="6000"]' );?>
		</div>
<?php }?>


</div>
		</main> <!-- end .wrapper -->

		<footer id="contact" class="page-footer center">
			<?php
			// check if the repeater field has rows of data
			if( have_rows('logos_footer', 'option') ):
				echo '<div class="row">';
			  while ( have_rows('logos_footer', 'option') ) : the_row();
				$url = get_sub_field('logo_img');
				$logo_name = get_sub_field('logo_name');
				echo '<div class="col s6 m3"><img class="responsive-img" src="' . $url . '" alt="' . $logo_name . ' logo"></div>';
				endwhile;
				echo '</div>';
				else :
				    // no rows found
				endif;
			?>

			<div id="inner-footer" class="container" role="navigation">

			<?php //joints_footer_links(); ?>

				<div class="col s12">
					<p class="source-org copyright">
						<?php bloginfo('name');?> &copy; <?php echo date("Y");?>
					</p>
				</div>

			</div> <!-- end #inner-footer -->
		</footer> <!-- end .footer -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
