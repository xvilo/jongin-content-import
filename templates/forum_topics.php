<style type="text/css">

</style>
<a href="<?php echo "$page_url"; ?>"><i class="fa fa-chevron-left"></i> Forums</a><br /><br />
<script id="handlebars-forum-title" type="text/x-handlebars">
    <h1 class="forumTitle" data-id="{{Id}}">{{Titel}}</h1>
</script>
<script id="handlebars-forum-contents" type="text/x-handlebars">
    <ul class="list-group">
    {{#each .}}
        <li class="list-group-item">
            <span>{{AantalReacties}} <i class="fa fa-comments-o fa-fw"></i></span>
            {{#if IsNew}}<span class="nieuw">nieuw</span>{{/if}}
            {{#if IsClosed}}<span class="gesloten"><i class="fa fa-lock"></i></span>{{/if}}
            {{#if IsHot}}<span class="hot">H<i class="fa fa-fire"></i>T</span>{{/if}}
            <a href="<?php echo $current_url; ?>{{ForumErvaring.Id}}">{{ForumErvaring.Titel}}</a>
        </li>
    {{/each}}
    </ul>
</script>


<div id="forum-title"></div>
<div id="forum-contents"></div>
<div id="forum-reply">
    <form id="berichtformulier" class="api-post" data-api-url="Ervaringen" data-api-onsuccess="AfterForm();" onsubmit="return false;" role="form">
        <input name="subonderwerpid" value="" type="hidden" id="subonderwerpid">
        <div class="form-group">
            <label for="geslacht" class="control-label input-group">Ik ben een</label>

            <div class="form-group jongenmeisje floating" data-toggle="buttons">
                <label class="btn btn-primary jongen  ">
                    <input name="geslacht" value="j" type="radio">jongen
                </label>
                <label class="btn btn-primary meisje  ">
                    <input name="geslacht" value="m" type="radio">meisje
                </label>
            </div>
            <div class="form-group floating Leeftijd">
                <input class="form-control minimize" placeholder="Leeftijd" min="0" max="99" name="leeftijd" id="leeftijd" type="number">
            </div>
        </div>

        <div class="form-group">
            <input class="form-control" placeholder="Titel van je post" name="Titel">
        </div>

        <div class="form-group">
            <textarea class="form-control maximize" rows="3" placeholder="Jouw verhaal of jouw vraag" name="Body" id="Body"></textarea>
        </div>
        <div class="form-group">
            <p class="help-block">
                Wil je bericht krijgen als anderen reageren op deze post? Vul dan je mailadres in. (niet zichtbaar voor anderen)
            </p>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input class="form-control" placeholder="Vul je emailadres in" name="Useremail" id="emailadres" type="email">
            </div>
        </div>

        <div class="opvoedenin" data-api-url="configuratie" data-api-oncomplete="toggle();">
            <script class="handlebars" type="text/x-handlebars">
                <div class="form-group">
                    <div class="checkbox">
                        <label for="SendToHelpCheckBox">
                            <input name="SendToHelpCheckBox" id="SendToHelpCheckBox" value="false" type="checkbox">

                            Stuur mijn ervaring ook naar een hulpverlener.
                        </label>
                    </div>
                </div>

                <div class="form-group" id="antwoord_email_wrapper" style="display:none;">
                    <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="email" class="form-control" placeholder="Vul je antwoord emailadres voor de hulpverlener in" name="SendToHelpEmail" id="SendToHelpEmail" value="">
                    </div>
                </div>
            </script>

        </div>
        <button type="button" id="submit" class="btn btn-primary">Verstuur→</button>
    </form>
</div>
<script type="text/javascript">
    jQuery(function() {
        var ervaringenUrl = 'ervaringen/subonderwerpen/<?php echo $vars['jongin_forum_id']; ?>';
        var forumUrl = 'hoofdonderwerpen/subonderwerpen/<?php echo $vars['jongin_forum_id']; ?>';
        retrieveJongInContent( forumUrl, '#handlebars-forum-title', '#forum-title' );
        retrieveJongInContent( ervaringenUrl, '#handlebars-forum-contents', '#forum-contents' );

        jQuery(document).on("handlebars-updated", function( event, response ) {
            if( response.sourceUrl == forumUrl )
                jQuery("#subonderwerpid").val( response.data.Id );
        });

        jQuery("#submit").click(function() {
            var form = jQuery("#berichtformulier").serialize();
            jQuery.post( "https://api.opvoedenin.nl/api/ervaringen", form).done(function(data) {
                jQuery("#forum-reply").html("<p>Je bericht is verstuurd!</p>");
            });
        });
    });
</script>