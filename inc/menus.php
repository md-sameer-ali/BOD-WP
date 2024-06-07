<?php

function register_my_menus() {
    register_nav_menus(
      array(
        'header_menu' => 'Header Menu',
        'footer_menu' => 'Footer Main Manu',
        'community_menu' => 'Footer Community Menu',
        'free_resource_menu' => 'Footer Free Resources Menu',
        'connect_menu' => 'Footer Connect Menu',
        'footer_about_menu' => 'Footer About Menu'
      )
    );
  }

add_action( 'init', 'register_my_menus' );

function header_nav() {
    wp_nav_menu(array(
        'theme_location' => 'header_menu',
        'container' => 'ul',
        'menu_class' => 'nav-ul',
    ));
}

function footer_main_nav(){
    wp_nav_menu(array(
        'theme_location' => 'footer_menu',
        'container' => 'ul',
        'menu_class' => 'footer-nav-ul',
    ));
}
function community_nav(){
    wp_nav_menu(array(
        'theme_location' => 'community_menu',
        'container' => 'ul',
        'menu_class' => 'footer-nav-ul',
    ));
}
function free_resource_nav(){
    wp_nav_menu(array(
        'theme_location' => 'free_resource_menu',
        'container' => 'ul',
        'menu_class' => 'footer-nav-ul',
    ));
}
function connect_nav(){
    wp_nav_menu(array(
        'theme_location' => 'connect_menu',
        'container' => 'ul',
        'menu_class' => 'footer-nav-ul',
    ));
}
function footer_about_nav(){
    wp_nav_menu(array(
        'theme_location' => 'footer_about_menu',
        'container' => 'ul',
        'menu_class' => 'footer-nav-ul',
    ));
}

