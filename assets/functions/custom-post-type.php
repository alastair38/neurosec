<?php
/* custom post-type for storing reported publications

*/


function neurosec_project() {
  // creating (registering) the custom type
  register_post_type( 'projects', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('Projects', 'neurosectheme'), /* This is the Title of the Group */
      'singular_name' => __('Project', 'neurosectheme'), /* This is the individual type */
      'all_items' => __('All Projects', 'neurosectheme'), /* the all items menu item */
      'add_new' => __('Add New Project', 'neurosectheme'), /* The add new menu item */
      'add_new_item' => __('Add New Project', 'neurosectheme'), /* Add New Display Title */
      'edit' => __( 'Edit', 'neurosectheme' ), /* Edit Dialog */
      'edit_item' => __('Edit Project', 'neurosectheme'), /* Edit Display Title */
      'new_item' => __('New Project', 'neurosectheme'), /* New Display Title */
      'view_item' => __('View Project', 'neurosectheme'), /* View Display Title */
      'search_items' => __('Search Projects', 'neurosectheme'), /* Search Custom Type Title */
      'not_found' =>  __('Nothing found in the Database.', 'neurosectheme'), /* This displays if there are no entries yet */
      'not_found_in_trash' => __('Nothing found in Trash', 'neurosectheme'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'Neurosec Projects', 'neurosectheme' ), /* Custom Type Description */

      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
      'menu_icon' => 'dashicons-welcome-widgets-menus', /* the icon for the custom post type menu */
      'rewrite'	=> array( 'slug' => 'projects', 'with_front' => false ), /* you can specify its url slug */
      'has_archive' => true, /* you can rename the slug here */
      'capability_type' => 'page',
      'hierarchical' => true,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'page-attributes')
    ) /* end of options */
  ); /* end of register post type */

}

add_action( 'init', 'neurosec_project');

function neurosec_publications() {
	// creating (registering) the custom type
	register_post_type( 'publications', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Publications', 'neurosectheme'), /* This is the Title of the Group */
			'singular_name' => __('Publication', 'neurosectheme'), /* This is the individual type */
			'all_items' => __('All Publications', 'neurosectheme'), /* the all items menu item */
			'add_new' => __('Add New Publication', 'neurosectheme'), /* The add new menu item */
			'add_new_item' => __('Add New Publication', 'neurosectheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'neurosectheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Publication', 'neurosectheme'), /* Edit Display Title */
			'new_item' => __('New Publication', 'neurosectheme'), /* New Display Title */
			'view_item' => __('View Publication', 'neurosectheme'), /* View Display Title */
			'search_items' => __('Search Publications', 'neurosectheme'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'neurosectheme'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'neurosectheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Neurosec Publications', 'neurosectheme' ), /* Custom Type Description */

			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-media-document', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'publications', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor')
	 	) /* end of options */
	); /* end of register post type */

}
	// adding the function to the Wordpress init
	add_action( 'init', 'neurosec_publications');

	// now let's add custom tags (these act like categories)
    register_taxonomy( 'publication_type',
    	array('publications'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,    /* if this is false, it acts like tags */
    		'labels' => array(
    			'name' => __( 'Publication Types', 'neurosectheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Publication Type', 'neurosectheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Publication Types', 'neurosectheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Publication Types', 'neurosectheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Publication Type', 'neurosectheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Publication Type:', 'neurosectheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Publication Type', 'neurosectheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Publication Type', 'neurosectheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Publication Type', 'neurosectheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Publication Type Name', 'neurosectheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    );

    function neurosec_events() {
    	// creating (registering) the custom type
    	register_post_type( 'events', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    	 	// let's now add all the options for this post type
    		array('labels' => array(
    			'name' => __('Engagement Events', 'neurosectheme'), /* This is the Title of the Group */
    			'singular_name' => __('Event', 'neurosectheme'), /* This is the individual type */
    			'all_items' => __('All Events', 'neurosectheme'), /* the all items menu item */
    			'add_new' => __('Add New Event', 'neurosectheme'), /* The add new menu item */
    			'add_new_item' => __('Add New Event', 'neurosectheme'), /* Add New Display Title */
    			'edit' => __( 'Edit', 'neurosectheme' ), /* Edit Dialog */
    			'edit_item' => __('Edit Event', 'neurosectheme'), /* Edit Display Title */
    			'new_item' => __('New Event', 'neurosectheme'), /* New Display Title */
    			'view_item' => __('View Event', 'neurosectheme'), /* View Display Title */
    			'search_items' => __('Search Events', 'neurosectheme'), /* Search Custom Type Title */
    			'not_found' =>  __('Nothing found in the Database.', 'neurosectheme'), /* This displays if there are no entries yet */
    			'not_found_in_trash' => __('Nothing found in Trash', 'neurosectheme'), /* This displays if there is nothing in the trash */
    			'parent_item_colon' => ''
    			), /* end of arrays */
    			'description' => __( 'Neurosec Events', 'neurosectheme' ), /* Custom Type Description */

    			'public' => true,
    			'publicly_queryable' => true,
    			'exclude_from_search' => false,
    			'show_ui' => true,
    			'query_var' => true,
    			'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
    			'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu */
    			'rewrite'	=> array( 'slug' => 'engagement/events', 'with_front' => false ), /* you can specify its url slug */
    			'has_archive' => true, /* you can rename the slug here */
    			'capability_type' => 'post',
    			'hierarchical' => false,
    			/* the next one is important, it tells what's enabled in the post editor */
    			'supports' => array( 'title', 'editor')
    	 	) /* end of options */
    	); /* end of register post type */

    }

    add_action( 'init', 'neurosec_events');




    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */


?>
