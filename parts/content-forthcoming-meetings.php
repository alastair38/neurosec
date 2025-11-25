<?php


if(function_exists('get_field')):
  
  // check if ACF is activated to before grabbing field values

$upm_url = get_field('import_meetings_url', 'options');
$json = file_get_contents($upm_url);

$items = json_decode($json);
$id = $items->parent; //
echo '<ul class="collection">';
foreach ($items as $item) {

		 $item = $item->details_of_meetings;

		 if($item){
		 for ($i = 0, $l = count($item); $i < $l; $i++ ) {
			 			$upm_description = $item[$i]->upcoming_meeting_description;
						$upm_image = $item[$i]->upcoming_meeting_image;
						$upm_title = $item[$i]->upcoming_meeting_title;
						$upm_date = $item[$i]->upcoming_meeting_date;
						$upm_address = $item[$i]->upcoming_meeting_address;
						$upm_contact = $item[$i]->upcoming_meeting_contact;

            echo '<li class="collection-item avatar"><i class="material-icons circle green">event</i>
						<label class="secondarycontent"> ' . $upm_date . ' at ' . $upm_address . '</label>
						<h2 class="h3 title">' . $upm_title . '</h2>';
						if($upm_description) {
							echo '<p>' . $upm_description . '<img src="' . $upm_image .  '" alt=""></p>';
						}
						if($upm_contact) {
							echo '<label>Contact <a href="mailto:' . $upm_contact . '" target="_blank">' . $upm_contact . '</a> for more information</label>';
						}




            echo '</li>';

						//NOTE: within this loop it should also be possible to add these to acf repeater fields at the receiving end
						//NOTE: we would have to call delete_field('details_of_meetings' $post_id) prior to the loop
						// $row = array(
						// 	'upcoming_meeting_title'	=> $item[$i]->upcoming_meeting_title,
						// 	'upcoming_meeting_date'	=> $item[$i]->upcoming_meeting_date,
						// 	'upcoming_meeting_image'	=> $item[$i]->upcoming_meeting_image,
						// 	'upcoming_meeting_address' => $item[$i]->upcoming_meeting_address,
						// 	'upcoming_meeting_description' => $item[$i]->upcoming_meeting_description,
						// 	'upcoming_meeting_contact' => $item[$i]->upcoming_meeting_contact,
						// );
						//
						// add_row('details_of_meetings', $row, $post_id);
        }
			} else {

			}
 		}
		echo '</ul>';
	
endif;
?>