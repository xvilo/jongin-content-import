<?php
/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/27/16
 * Time: 1:38 PM
 */
function jongin_blog()
{
    $page_url = get_permalink( get_the_ID() );

    // retrieve url vars
    global $wp_query;
    $vars = $wp_query->query_vars;

    wp_enqueue_style( 'jongin_blog' );

    if( !empty( $vars['jongin_blog_id'] ) )
    {
        $template = locate_template( 'jongin-blog-single' );
        if( !$template )
            $template = __DIR__ . '/../templates/blog_single.php';
    }
    else
    {
        $template = locate_template( 'jongin-blogs' );
        if( !$template )
            $template = __DIR__ . '/../templates/blogs.php';
    }

    wp_enqueue_script( 'jongin' );
    include $template;
}
add_shortcode( 'jongin_blog', 'jongin_blog' );
add_action( 'wp_enqueue_scripts', function() {
    wp_register_style( 'jongin_blog', plugins_url( 'css/blog.css', __FILE__ ) );
});