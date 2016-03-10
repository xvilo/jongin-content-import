<?php
/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/28/16
 * Time: 10:12 AM
 */
require_once( 'expertinfo/ExpertInfo.php' );
require_once( 'expertinfo/ExpertInfoHelper.php' );
function jongin_expertinfo()
{
    $page_url = get_permalink( get_the_ID() );

    // retrieve url vars
    global $wp_query;
    $vars = $wp_query->query_vars;

    // retrieve content from cache
    $cachefile = __DIR__ . '/../cache/expertinfo_categories.json';
    $jongInData = array();
    if( !file_exists( $cachefile ) || filemtime( $cachefile ) < strtotime( "24 hours ago" ) )
    {
        $jongInData = json_decode( JongInContent::retrieve( 'infojongeren' ), true );
        file_put_contents( $cachefile, json_encode( $jongInData ) );
    }
    else
        $jongInData = json_decode( file_get_contents( $cachefile ), true );

    $objects = ExpertInfoHelper::getInstance()->buildFromArray( $jongInData );
    $rootObjects = ExpertInfoHelper::getInstance()->getRootItems();

    if( !empty( $vars['jongin_expertinfo_id'] ) )
    {
        $expertInfo = ExpertInfoHelper::getInstance()->find( $vars['jongin_expertinfo_id'] );

        $menu = ExpertInfoHelper::getInstance()->buildHTML( $expertInfo );

        $template = locate_template( 'jongin-expertinfo-single' );
        if( !$template )
            $template = __DIR__ . '/../templates/expertinfo_single.php';
    }
    else
    {
        $menu = ExpertInfoHelper::getInstance()->buildHTML();

        $template = locate_template( 'jongin-expertinfo' );
        if( !$template )
            $template = __DIR__ . '/../templates/expertinfo.php';
    }
    wp_enqueue_script( 'jongin' );
    include $template;

}
add_shortcode( 'jongin_expertinfo', 'jongin_expertinfo' );