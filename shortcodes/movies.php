<?php
/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/28/16
 * Time: 9:15 AM
 */
function jongin_movies()
{
    $page_url = get_permalink( get_the_ID() );

    // retrieve url vars
    global $wp_query;
    $vars = $wp_query->query_vars;

    wp_enqueue_style( 'jongin_movies' );

    // retrieve content from cache
    $cachefile = __DIR__ . '/../cache/movies.json';
    $jongInData = array();
    if( !file_exists( $cachefile ) || filemtime( $cachefile ) < strtotime( "24 hours ago" ) )
    {
        $jsonContent = JongInContent::retrieve( 'movies' );
        $jongInData = json_decode( $jsonContent, true );
        foreach( $jongInData as &$movie )
        {
            if( $movie['MovieType'] == "tub" )
                $movie['embed'] = "<iframe width='560' height='315' src='https://www.youtube.com/embed/{$movie['Code']}' frameborder='0' allowfullscreen></iframe>";
            elseif( $movie['MovieType'] == "vim" )
                $movie['embed'] = "<iframe src='http://player.vimeo.com/video/{$movie['Code']}?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff' width='360' height='360' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";
            else
                $movie['embed'] = "";
        }
        file_put_contents( $cachefile, json_encode( $jongInData ) );
    }
    else
        $jongInData = json_decode( file_get_contents( $cachefile ), true );

    // alleen de laatste 25 filmpjes
    $jongInData = array_slice( $jongInData, 0, 25 );

    if( !empty( $vars['jongin_movie_id'] ) )
    {
        $template = locate_template( 'jongin-movie-single' );
        if( !$template )
            $template = __DIR__ . '/../templates/movie_single.php';
    }
    else
    {
        $template = locate_template( 'jongin-movies' );
        if( !$template )
            $template = __DIR__ . '/../templates/movies.php';
    }

    wp_enqueue_script( 'jongin' );
    include $template;
}
add_shortcode( 'jongin_movies', 'jongin_movies' );
add_action( 'wp_enqueue_scripts', function() {
    wp_register_style( 'jongin_movies', plugins_url( 'css/movies.css', __FILE__ ) );
});