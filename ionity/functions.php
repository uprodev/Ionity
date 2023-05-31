<?php

require 'vendor/autoload.php';
include 'inc/woo.php';

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );
add_action('after_setup_theme', 'theme_register_nav_menu');


function add_styles() {

  if(is_page_template('templates/template-noir.php') || is_product() || is_checkout()){
      wp_enqueue_style('styles-noir', get_template_directory_uri().'/assets/css/styles-noir.css');
      wp_enqueue_style('jquery-autocomplete',  'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/dark-hive/jquery-ui.min.css');



  }else{
      wp_enqueue_style('styles', get_template_directory_uri().'/assets/css/styles.css');
  }
  wp_enqueue_style( 'theme', get_stylesheet_uri() );

}

function add_scripts() {
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
	wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'headroomjs', get_template_directory_uri() . '/assets/js/headroom.js', array('jquery'), false, true);
	wp_enqueue_script( 'lazyloadjs', get_template_directory_uri() . '/assets/js/lazyload.js', array('jquery'), false, true);
    wp_enqueue_script( 'gsapjs', get_template_directory_uri() . '/assets/js/gsap.js', array('jquery'), false, true);
    wp_enqueue_script( 'ScrollTriggerjs', get_template_directory_uri() . '/assets/js/ScrollTrigger.js', array('jquery'), false, true);

	if(is_page_template('templates/template-noir.php') || is_product() || is_checkout()){
        wp_enqueue_script( 'jstylingjs', get_template_directory_uri() . '/assets/js/jquery.jstyling.js', array('jquery'), false, true);
        wp_enqueue_script( 'main-noir', get_template_directory_uri() . '/assets/js/main-noir.js', array('jquery'), false, true);

        wp_enqueue_script('jqueryvalidation',  'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js', array(), false, 1);

        if ($my_current_lang !== 'en')
            wp_enqueue_script('jqueryvalidation_ru',  'https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_uk.js', array(), false, 1);

        wp_enqueue_script('jquery.auto-complete',  'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js', array(), false, 1);

        wp_enqueue_script( 'script-noir', get_template_directory_uri() . '/assets/js/script-noir.js', array('jquery'), false, true);




    }else{
        wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true);
    }

    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), false, true);
    wp_enqueue_script( 'map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=geometry,places&key=AIzaSyDAmok443Z50tXkURhacfdYI0tg8nYQ4FM', array(), false, true);


	 wp_localize_script('script', 'globals',
	 	array(
	 		'url' => admin_url('admin-ajax.php'),
	 		'template' => get_template_directory_uri()
	 	)
	 );


}

function theme_register_nav_menu(){
	register_nav_menus( array(
        'left-menu' => 'Left Menu',
        'right-menu'  => 'Right Menu',
        'footer-menu'  => 'Footer Menu',
       )
    );
	add_theme_support( 'post-thumbnails');
    add_theme_support( 'woocommerce');
}



if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

	acf_add_options_sub_page('Theme Settings');
}


function my_acf_init() {
	acf_update_setting('google_api_key', get_field('google_map_api_key', 'options'));
}

add_action('acf/init', 'my_acf_init');

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){

    return '<nav class="%1$s" role="navigation">%3$s</nav>';

}

add_action( 'wp_ajax_loadmore', 'loadmore' );
add_action( 'wp_ajax_nopriv_loadmore', 'loadmore' );

function loadmore() {

    $wp_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 11,
        'paged' => $_GET['page']+1,
    ]);

    while($wp_query->have_posts()): $wp_query->the_post();?>
        <div class="col-md-6 col-lg-4">
            <?php get_template_part('parts/blog-item');?>
        </div>

    <?php endwhile;

    die;

}

