<?php
// Theme support options

require_once(get_template_directory().'/assets/functions/theme-support.php');

// Customizer options
require_once(get_template_directory().'/assets/functions/customizer.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');
require_once(get_template_directory().'/assets/functions/menu-walkers.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Setup initial pages and assign to main menu
// require_once(get_template_directory().'/assets/functions/setup-pages.php');


// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php');

// Customize the WordPress admin
require_once(get_template_directory().'/assets/functions/admin.php');




function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA');
}

add_action('acf/init', 'my_acf_init');

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'Neurosec Settings',
    'menu_title' => 'Neurosec Settings',
    'menu_slug'  => 'neurosec-settings',
    'capability' => 'edit_posts',
    'redirect'   => false
  ));
}

//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');


// deleted author_base rewrite - kept for temporary reference

// function wpa_82004(){
//     global $wp_rewrite;
//     $wp_rewrite->author_base = 'team-member'; // or whatever
// }
// add_action('init','wpa_82004');


// updating projects archive to hide child projects

add_action( 'pre_get_posts','hide_children' );

function hide_children( $query )
{
    //remove_action( 'pre_get_posts', current_filter() );

    if ( is_admin() or ! $query->is_main_query() )
        return;

    if ( ! $query->is_post_type_archive( 'projects' ) )
        return;
    
    $tax_query = array([
        'taxonomy' => 'project-status',
        'field' => 'slug',
        'terms' => [ 'archived' ],
        'operator' => 'NOT IN',
    ]);
    
    //  remove all content with 'project-status' taxonomy of 'archived'

    $query->set( 'tax_query', $tax_query );

    // only top level posts
    $query->set( 'post_parent', 0 );
}

// updating projects archive to orderby title

add_action( 'pre_get_posts', 'my_change_sort_order');
    function my_change_sort_order($query){
        if(is_post_type_archive('projects')):

           //Set the order ASC or DESC
           $query->set( 'order', 'ASC' );
           //Set the orderby
           $query->set( 'orderby', 'title' );
        endif;
    };

    if(function_exists('get_field')):
  
    $enable_import = get_field('enable_import', 'options');

    if ($enable_import) {
        require_once(get_template_directory().'/assets/functions/trigger-update.php');
    }

    endif;