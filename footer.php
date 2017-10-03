

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

			<div id="inner-footer" class="container" role="navigation">

			<?php joints_footer_links(); ?>

				<div class="col s12">
					<p class="source-org copyright">
						&copy; <?php echo date("Y");?>
					</p>
				</div>

			</div> <!-- end #inner-footer -->
		</footer> <!-- end .footer -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
