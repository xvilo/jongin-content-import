<div data-api-url="hoofdonderwerpen" class="jonginforum">
<script id="handlebars-forums-content" type="text/x-handlebars">
        {{#each .}}
        <div class="panel panel-default">
            <div class="panel-heading hoofdonderwerp"> {{Titel}}</div>

            <ul class="list-group">
            {{#each SubOnderwerpen}}
                <li class="list-group-item">
                    <a href="<?php echo $page_url; ?>{{Id}}" >
                        <img class="forum-icon" alt="Bezig met laden" src="{{ThumbUrl}}" />
                        {{Titel}}
                        <span><i class="fa fa-chevron-right"></i></span>
                    </a>
                </li>
            {{/each}}
          </ul>
        </div>
        {{/each}}
</script>
</div>
<div id="forums-content"></div>
<script type="text/javascript">
    jQuery(function() {
        retrieveJongInContent( 'hoofdonderwerpen', '#handlebars-forums-content', '#forums-content' );
    });
</script>