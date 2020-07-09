<?php

//file for the function of the theme

function automotiveBlogs_resources(){
    wp_enqueue_style('style', get_stylesheet_uri()); //include the style.css
   
}

add_action('wp_enqueue_scripts', 'automotiveBlogs_resources'); 

//theme support function
function learningWordPress_setup()
{
    //Navigation Menus
    register_nav_menus(array( 
        'primary' => __('Primary Menu'),
       
    ));
    /*add featured image support*/
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true); 
    add_image_size('banner-image', 920, 210, array('left', 'top'));
   

}

add_action('after_setup_theme', 'learningWordPress_setup');

//custom excerpt length function
function ld_custom_excerpt_length()
{
    return 15;
}
add_filter('excerpt_length', 'ld_custom_excerpt_length');

/*
//add widget suppport
function automotiveBlogs_widgets_init()
{
    
    register_sidebar(array(
        'name'          => 'sidebar',
        'id'            => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget'  => '</div>',
        'before_title' => '<h4 class="my-special-class">',
        'after_title' => '</h4>'

    ));

    
}
add_action('widgets_init', 'automotiveBlogs_widgets_init');
*/
