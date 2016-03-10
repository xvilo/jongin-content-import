<?php
/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/27/16
 * Time: 1:36 PM
 */
add_action( 'init', function() {
    // FORUM TOPICS
    add_rewrite_rule( 'forum/([0-9]+)/?$', 'index.php?pagename=forum&jongin_forum_id=$matches[1]', 'top' );
    add_rewrite_tag('%jongin_forum_id%', '([^&]+)');

    // TOPIC
    add_rewrite_rule( 'forum/([0-9]+)/([0-9]+)/?$', 'index.php?pagename=forum&jongin_forum_id=$matches[1]&jongin_topic_id=$matches[2]', 'top' );
    add_rewrite_tag('%jongin_topic_id%', '([^&]+)');
    add_rewrite_tag('%jongin_forum_id%', '([^&]+)');

    // BLOGS
    add_rewrite_rule( 'blogs/([0-9]+)/?$', 'index.php?pagename=blogs&jongin_blog_id=$matches[1]', 'top' );
    add_rewrite_tag( '%jongin_blog_id%', '([^&]+)' );

    // stories
    add_rewrite_rule( 'stories/([0-9]+)/?$', 'index.php?pagename=stories&jongin_story_id=$matches[1]', 'top' );
    add_rewrite_tag( '%jongin_story_id%', '([^&]+)' );

    // expertinfo
    add_rewrite_rule( 'hulp-info/([0-9]+)/?$', 'index.php?pagename=hulp-info&jongin_expertinfo_id=$matches[1]', 'top' );
    add_rewrite_tag( '%jongin_expertinfo_id%', '([^&]+)' );
});

