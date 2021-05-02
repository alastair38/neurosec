<?php
function begood_trigger() {

$json_url = get_field('wp_api_endpoint', 'options');
$post_status = get_field('post_status', 'options');
$parent_post = get_field('parent_post', 'options');


$json = file_get_contents($json_url);

$items = json_decode($json);

//$id = $items->parent; //

foreach ($items as $item) {
      $acf = $item->acf;
      $title = $item->title;
      $content = $item->content;
			$location = $acf->meeting_location;


  for ($i = 0, $l = count($title); $i < $l; $i++ ) {
    if($acf->meeting_date){
// wrap in an if($acf->meeting_date) {} conditional to filter resources that are not meetings if we don't use WP Rest filter plugin
    if( null == get_page_by_title( $title->rendered, OBJECT, 'engagement' ) ) {



    $post_id = wp_insert_post( array(
  'post_title'	=> $title->rendered,
  'post_type'		=> 'engagement', // this will be set to projects on the Neurosec site
  'post_status'	=> $post_status, // might want to set this initially to draft
  'post_parent' => $parent_post, // this will be the id of previous meetings project on Neurosec
  'post_content' => $content->rendered
)
);

// this assigns meeting_photos to the $images array, then loops through them and uploads them to the previous created $post_id

$images = $acf->meeting_photos;
if ($images) {
for ($i = 0, $l = count($images); $i < $l; $i++ ){
  media_sideload_image($images[$i]->url, $post_id, 'Images for ' . $title->rendered . 'src');
}

$imgs = get_attached_media( 'image', $post_id );
$images = array();
foreach($imgs as $img) {
$images[] = $img->ID;
}
}

$field_key = "field_5909d514d866a";
update_field( $field_key, $images, $post_id );

// this updates the meeting_location and meeting_date custom fields. As the meeting_video is save as an oembed iframe the corresponding custom field on the Neurosec site can be a textarea into which the iframe code is saved. At the moment we're saving it to the post_content

// $acf->meeting_video will update a corresponding textarea field on Neurosec

$field_key = "field_5909d1c6cf0ab";
$value = $acf->meeting_location;
update_field( $field_key, $value, $post_id );

$field_key = "field_5909d1afcf0aa";
$value = $acf->meeting_date;
update_field( $field_key, $value, $post_id );

} else {
  $post_id = -2;
}
}

  }
}
}

// hook into the post_status_transitions action to run the fetch and import of the Begood json feed. This action should be run whenever Zapier creates a draft engagement (which is does when a new page is added on BeGOOD)
add_action('draft_engagement', 'begood_trigger', 10, 1);



//this code gets json file from remote url - in this case it is a single resource post type object
//after decoding, we loop through the acf - details_of_meetings nested array and output each field as required
//this will replicate what is on the forthcoming meetings page of the begood site
//NOTE: this may need to be served from https to overcome security issues.

//$json = file_get_contents('http://www.memoryfriendy.dev/wp-json/wp/v2/resources/834');

//$items = json_decode($json);
//$id = $items->parent; //

// foreach ($items as $item) {
//
// 		 $item = $item->details_of_meetings;
//
// 		 if($item){
// 		 for ($i = 0, $l = count($item); $i < $l; $i++ ) {
//             echo '<div class="resources-links"><h3>' . $item[$i]->upcoming_meeting_title . '</h3>
// 						<i class="fa fa-calendar"></i> ' . $item[$i]->upcoming_meeting_date . ' at ' . $item[$i]->upcoming_meeting_address . '
// 						<p>' . $item[$i]->upcoming_meeting_description . '<img src="' . $item[$i]->upcoming_meeting_image .  '"></p>
// 						<p>Contact for more information</p>';
//
//
//             echo '</div>';
//
// 						//NOTE: within this loop it should also be possible to add these to acf repeater fields at the receiving end
// 						//NOTE: we would have to call delete_field('details_of_meetings' $post_id) prior to the loop
// 						// $row = array(
// 						// 	'upcoming_meeting_title'	=> $item[$i]->upcoming_meeting_title,
// 						// 	'upcoming_meeting_date'	=> $item[$i]->upcoming_meeting_date,
// 						// 	'upcoming_meeting_image'	=> $item[$i]->upcoming_meeting_image,
// 						// 	'upcoming_meeting_address' => $item[$i]->upcoming_meeting_address,
// 						// 	'upcoming_meeting_description' => $item[$i]->upcoming_meeting_description,
// 						// 	'upcoming_meeting_contact' => $item[$i]->upcoming_meeting_contact,
// 						// );
// 						//
// 						// add_row('details_of_meetings', $row, $post_id);
//         }
// 			} else {
//
// 			}
//  		}
?>
