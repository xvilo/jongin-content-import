<script id="handlebars-blogs" type="text/x-handlebars">
    {{#each .}}
        <div id="blog-item">
            <h1>{{Title}}</h1>
            <a href="<?php echo $page_url; ?>{{Id}}" ><img src="{{BlogImage}}" /></a>
        </div>
    {{/each}}
</script>
<div id="blogs"></div>
<script type="text/javascript">
    jQuery(function() {
        retrieveJongInContent( 'blogs/top/10', '#handlebars-blogs', '#blogs' );
    });
</script>