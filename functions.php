<?php

	/* === Template Function === */

	require_once('inc/base.php');
	require_once('inc/menus.php');


add_filter('wpcf7_autop_or_not', '__return_false');
// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
    remove_filter ('acf_the_content', 'wpautop');

}
    // SVG Permission
    function add_file_types_to_uploads($file_types){
        $new_filetypes = array();
        $new_filetypes['svg'] = 'image/svg';
        $file_types = array_merge($file_types, $new_filetypes );
        return $file_types; 
    } 
    add_action('upload_mimes', 'add_file_types_to_uploads');


    function custom_date_format($date) {
        $day = date('j', strtotime($date));
        $suffix = '';
        if ($day == '1' || $day == '21' || $day == '31') {
            $suffix = 'ST';
        } elseif ($day == '2' || $day == '22') {
            $suffix = 'ND';
        } elseif ($day == '3' || $day == '23') {
            $suffix = 'RD';
        } else {
            $suffix = 'TH';
        }
        return date('F jS, Y', strtotime($date));
    }

   
    
    