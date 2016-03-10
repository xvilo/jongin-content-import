<script id="handlebars-story" type="text/x-handlebars">
    <h1>{{Title}}</h1>
    <img src="{{StoryImage}}">
    {{{Body}}}
</script>
<div id="story"></div>
<script type="text/javascript">
    jQuery(function() {
        retrieveJongInContent( 'story/<?php echo $vars['jongin_story_id']; ?>', '#handlebars-story', '#story' );
    });
</script>