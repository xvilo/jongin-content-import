<script id="handlebars-stories" type="text/x-handlebars">
    {{#each .}}
        <div id="story-item">
            <h1>{{Title}}</h1>
            <a href="<?php echo $page_url; ?>{{Id}}" ><img src="{{StoryImage}}" /></a>
        </div>
    {{/each}}
</script>
<div id="stories"></div>
<script type="text/javascript">
    jQuery(function() {
        retrieveJongInContent( 'story/top/10', '#handlebars-stories', '#stories' );
    });
</script>