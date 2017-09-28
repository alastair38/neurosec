<div class="contact-details light">
	<?php
	$contactName = get_field('project_contact');
	$contactEmail = get_field('project_email');
	$contactPhone = get_field('project_phone');
	$contactAddress = get_field('project_address');

	if($contactEmail) {
		echo '<strong>Contact: </strong>  <a class="tooltipped" data-position="right" data-delay="50" data-tooltip="Click to contact by email" href="mailto:' . $contactEmail . '" target="_blank">' . $contactName . '</a><br />';
	} if($contactPhone) {
		echo '<strong>Phone: </strong>' . $contactPhone . '<br />';
	} if($contactAddress) {
		echo '<strong>Address: </strong>' . $contactAddress . '<br />';
	}?>
</div>
