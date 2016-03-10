<?php
/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/27/16
 * Time: 1:38 PM
 */
function jongin_stories()
{
    $page_url = get_permalink( get_the_ID() );

    // retrieve url vars
    global $wp_query;
    $vars = $wp_query->query_vars;

    wp_enqueue_style( 'jongin_stories' );

    if( !empty( $vars['jongin_story_id'] ) )
    {
        $template = locate_template( 'jongin-story-single' );
        if( !$template )
            $template = __DIR__ . '/../templates/story_single.php';
    }
    else
    {
        $template = locate_template( 'jongin-stories' );
        if( !$template )
            $template = __DIR__ . '/../templates/stories.php';
    }

    wp_enqueue_script( 'jongin' );
    include $template;
}
add_shortcode( 'jongin_stories', 'jongin_stories' );
add_action( 'wp_enqueue_scripts', function() {
    wp_register_style( 'jongin_stories', plugins_url( 'css/stories.css', __FILE__ ) );
});