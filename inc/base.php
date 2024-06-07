<?php

add_post_type_support('page' , 'excerpt');
add_post_type_support('services' , 'excerpt');
add_post_type_support('blogs' , 'excerpt');

function all_css_js(){
	
	// loading css
	wp_enqueue_style('fontawesome' , 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' );
	wp_enqueue_style('bootstrap.min.css' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
    wp_enqueue_style('sm-swiper-css' , 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css' );
    wp_enqueue_style('desktop-css', get_stylesheet_directory_uri().'/css/style.css' , [] ,'all' );
	wp_enqueue_style('responsive-css', get_stylesheet_directory_uri().'/css/responsive.css' , [] , 'all' );
    
	// loading js
	wp_enqueue_script('bootstrap.min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' , ['jquery-core'] , false, true);
	wp_enqueue_script('swiper.min', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js' , ['jquery-core'] , false, true);
    wp_enqueue_script('custom-swiper', get_stylesheet_directory_uri().'/js/custom-swiper.js' , ['jquery-core'] , false, true);
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/js/script.js' , ['jquery-core'] , false, true);
	
	
}

add_action('wp_enqueue_scripts' , 'all_css_js');