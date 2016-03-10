<script id="handlebars-blog" type="text/x-handlebars">
    <h1>{{Title}}</h1>
    <img src="{{BlogImage}}">
    {{{Body}}}
</script>
<div id="blog"></div>
<script type="text/javascript">
    jQuery(function() {
        retrieveJongInContent( 'blogs/<?php echo $vars['jongin_blog_id']; ?>', '#handlebars-blog', '#blog' );
    });
</script>