<?php
/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/27/16
 * Time: 1:37 PM
 */
function jongin_forum()
{
    add_filter( 'query_vars', function( $query ) {
        $query[] = 'jongin_forum_id';
        return $query;
    });

    // retrieve url vars
    global $wp_query;
    $vars = $wp_query->query_vars;

    // get current url
    $current_url = home_url( add_query_arg( NULL, NULL ) );

    // get page url
    $page_url = get_permalink( get_the_ID() );

    wp_enqueue_style( 'jongin_forum' );

    if( !empty( $vars['jongin_topic_id'] ) )
    {
        $template = locate_template( 'jongin-topic' );
        if( !$template )
            $template = __DIR__ . '/../templates/forum_topic.php';
    }
    elseif( !empty( $vars['jongin_forum_id'] ) )
    {
        $template = locate_template( 'jongin-forum-topics' );
        if( !$template )
            $template = __DIR__ . '/../templates/forum_topics.php';
    }
    else
    {
        $template = locate_template('jongin-forums-index');
        if( !$template )
            $template = __DIR__ . '/../templates/forums_index.php';
    }

    wp_enqueue_script( 'jongin' );
    include( $template );
}

add_shortcode( 'jongin_forum', 'jongin_forum' );
add_action('wp_enqueue_scripts', function() {
    wp_register_style( 'jongin_forum', plugins_url( 'css/forum.css', __DIR__ . '/../jongin.php' ) );
});