<?php
/*
Template Name: Symplectic 1
*/

get_header();

?>

	<div class="container">
			<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
				$service_url = 'https://oxris-qa.bsp.ox.ac.uk:8091/elements-api/v4.9';
			$curl = curl_init($service_url);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_USERPWD, "symplecticPSYCHIATRY:brightbluestage"); //Your credentials goes here
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

			$curl_response = curl_exec($curl);
			$response = json_decode($curl_response);
			curl_close($curl);

			var_dump($response);
				?>

			</div> <!-- end #main -->



	</div> <!-- end container -->




<?php get_footer(); ?>
