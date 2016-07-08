<?php




if( !function_exists( 'mytheme_setup' )) : 

function mytheme_setup() {
    add_theme_support( 'custom-logo', array(
        'height'      => 151,
        'width'       => 212,
        'flex-height' => true,
    ));
}


endif;

add_action( 'after_setup_theme', 'mytheme_setup' );


function load_scripts(){
	wp_enqueue_style('remodal.css', get_stylesheet_directory_uri() . '/remodal.css');
    wp_enqueue_style('remodal-default-theme.css', get_stylesheet_directory_uri() . '/remodal-default-theme.css');
    wp_enqueue_script('remodal.min.js', get_template_directory_uri() . '/remodal.min.js');
    wp_enqueue_script('flexibility.js', get_template_directory_uri() . '/flexibility.js');
    wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'load_scripts');

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

function custom_excerpt_length($length){
	return 27;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function excerpt_ending($readMoreSymbol){
	return '...';
}

add_filter('excerpt_more', 'excerpt_ending');

function tutsplus_widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Social Media Area', 'tutsplus' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Form', 'tutsplus' ),
        'id' => 'form',
        'description' => __( 'The second footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Image', 'tutsplus' ),
        'id' => 'footerimage',
        'description' => __( 'The third footer widget area', 'tutsplus' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
}
add_action( 'widgets_init', 'tutsplus_widgets_init' );
add_filter( 'jetpack_development_mode', '__return_true' );

add_theme_support( 'jetpack-social-menu' );

add_filter('widget_text', 'do_shortcode');

add_filter( 'the_content', 'incrementparagraphs');

function incrementparagraphs($content) 
{
     return preg_replace_callback(
         '|<p>|',
         function ( $matches )
         {
             static $i = 0;
             return sprintf( '<p data-section-id="%d">', $i++ );
         },
         $content
     );
}