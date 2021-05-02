

<?php if(is_front_page()){?>
	<div  id="twitter_feed" class="col s12 white">
		<div class="container">
		<?php
		$twitter_handle = get_theme_mod('tcx_twitter_handle');
		echo do_shortcode( '[rotatingtweets screen_name="' . $twitter_handle . '" official_format="1" rotation_type="scrollVert" links_in_new_window="1" timeout="6000"]' );?>
		</div>
		</div>
<?php }?>



		</main> <!-- end .wrapper -->

		<footer id="contact" class="page-footer center">


			<?php
			// check if the repeater field has rows of data
			if( have_rows('logos_footer', 'option') ):
				$count = count(get_field('logos_footer', 'option')); // count number of rows in the repeater field
				$col_count = 12 / $count; // divide no of rows by 12 to get number of columns
				echo '<div class="row center">';
				while ( have_rows('logos_footer', 'option') ) : the_row();
				$url = get_sub_field('logo_img');
				$logo_name = get_sub_field('logo_name');
				$logo_link = get_sub_field('logo_link');
				echo '<div class="col s' . $col_count . '"><a href="' . $logo_link . '" target="_blank"><img class="responsive-img" src="' . $url . '" alt="' . $logo_name . ' logo"></a></div>';
				endwhile;
				echo '</div>';
				else :
						// no rows found
				endif;
			?>


			<div id="inner-footer" class="container" aria-label="Contact links" role="navigation">

			<?php //joints_footer_links(); ?>

				<div class="col s12">
					<p class="source-org copyright">
						<?php bloginfo('name');?> &copy; <?php echo date("Y");?>
						<?php
						$twitter = get_theme_mod( 'tcx_twitter_handle' );
						$email = get_theme_mod( 'tcx_email_contact' );

						if($email) {
							echo '<span class="social-media"><a href="mailto:' . $email . '" target="_blank"><svg style="width:16px;height:16px" viewBox="0 0 24 24">
					        <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
					    </svg>Email </a></span>';
						}


						if($twitter) {
							echo '<span class="social-media"><a href="https://twitter.com/' . $twitter . '" target="_blank">  <svg style="width:16px;height:16px" viewBox="0 0 24 24">
						        <path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
						    </svg>Twitter </a></span>';
						}
						?>
					</p>
				</div>

			</div> <!-- end #inner-footer -->
		</footer> <!-- end .footer -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
