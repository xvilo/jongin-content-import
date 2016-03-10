<?php
/*
Plugin Name: JongIn
Plugin URI: http://comsi.nl/
Description: Biedt de mogelijkheid JongIn elementen op de website weer te geven
Author: Henk te Sligte (ComSi)
Version: 1.0
Author URI: http://comsi.nl/
*/
require_once( 'JongInContent.php' );
require_once( 'rewriterules.php' );
require_once( 'shortcodes/forum.php' );
require_once( 'shortcodes/blog.php' );
require_once( 'shortcodes/stories.php' );
require_once( 'shortcodes/movies.php' );
require_once( 'shortcodes/expertinfo.php' );

add_action( 'wp_enqueue_scripts', function() {
    wp_register_script( "handlebars", "https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.js" );
    wp_register_script('jongin', plugins_url('js/jongin.js', __FILE__ ), array( 'handlebars', 'jquery' ), '1.0', true );
    wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'fontawesome' );
});