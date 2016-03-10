<script id="handlebars-back" type="text/x-handlebars">
    <a href="<?php echo "$page_url{$vars['jongin_forum_id']}"; ?>"><i class="fa fa-chevron-left"></i> {{Titel}}</a>
</script>
<script id="handlebars-topic-contents" type="text/x-handlebars">
  <div class="topic-container">
    <h4 data-id="{{Id}}">{{Titel}}</h4>
    <div>{{{Body}}}</div>
  </div>
  <p class='topic-meta'><img class="geslacht" src="http://www.jongin.nl/upload/fos_image/fosicon1403.gif" data-geslacht="{{Geslacht}}" width="48"><span>een maand geleden</span><br>{{Leeftijd}} jaar</p>
</script>
<script id="handlebars-topic-comments" type="text/x-handlebars">
  <div class="comments-container">
    <h3>Reacties</h3>
      <ul>
        {{#each .}}
          <li>
            <div class="comment-body">{{{Body}}}</div>
            <p class='topic-meta'><img class="geslacht" src="http://www.jongin.nl/upload/fos_image/fosicon1403.gif" data-geslacht="{{Geslacht}}" width="48"><span>een maand geleden</span><br>{{Leeftijd}} jaar</p>
          </li>
        {{/each}}
      </ul>
  </div>
</script>
<div id="back"></div>
<div id="form-notify">
    <form onsubmit="return false;" id="formabonneer">
        <input type="hidden" name="ErvaringId" value="<?php echo $vars['jongin_topic_id']; ?>">
        <input type="hidden" name="Onderwerp" value="<?php echo $vars['jongin_forum_id']; ?>">
        <div class="form-group">
            <p class="help-block"><strong>Abonneer:</strong><br> stuur mij een mail bij nieuwe reacties.</p>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="email" id="emailadres" name="useremail" placeholder="Vul je emailadres in" class="form-control">
            </div>
        </div>
        <button type="button" id="submitAbonneer" class="btn btn-primary">Verstuur&rarr;</button>
    </form>
</div>
<div id="topic-contents"></div>
<div id="topic-comments"></div>
<div id="topic-reply">
    <form class="api-post" id="berichtformulier" onsubmit="return false;" role="form">
        <input name="ErvaringID" value="<?php echo $vars['jongin_topic_id']; ?>" type="hidden" class="ErvaringID">
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
            <textarea class="form-control" rows="3" placeholder="Jouw reactie" name="body"></textarea>
        </div>

        <div class="form-group">
            <p class="help-block">
                Wil je bericht krijgen als anderen reageren op deze post? Vul dan je mailadres in. (niet zichtbaar voor anderen)
            </p>
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input style="background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=';); background-repeat: no-repeat; background-attachment: scroll; background-position: right center; cursor: auto;" class="form-control" placeholder="Vul je abonnement emailadres in" name="useremail" id="emailadres" type="email">
            </div>
        </div>

        <div class="opvoedenin" data-api-url="configuratie" data-api-oncomplete="toggle();">
            <div class="form-group">
                <div class="checkbox">
                    <label for="SendToHelpCheckBox">
                        <input name="SendToHelpCheckBox" id="" value="false" type="hidden">
                        <input name="SendToHelpCheckBox" id="SendToHelpCheckBox" value="true" type="checkbox">

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
        </div>
        <button type="button" id="submit" class="btn btn-primary">Verstuur→</button>

    </form>
</div>
<script type="text/javascript">
    var ervaringUrl = '';
    jQuery(function() {
        ervaringUrl = 'ervaringen/<?php echo $vars['jongin_topic_id']; ?>';
        retrieveJongInContent( ervaringUrl, '#handlebars-topic-contents', '#topic-contents' );
        retrieveJongInContent( 'hoofdonderwerpen/subonderwerpen/<?php echo $vars['jongin_forum_id']; ?>', '#handlebars-back', '#back' );
        retrieveJongInContent( 'ervaringen/<?php echo $vars['jongin_topic_id']; ?>/reacties', '#handlebars-topic-comments', '#topic-comments' );

        jQuery("#submit").click(function() {
            var form = jQuery("#berichtformulier").serialize();
            jQuery.post( "https://api.opvoedenin.nl/api/ervaringen/<?php echo $vars['jongin_topic_id']; ?>/reacties/post", form).done(function(data) {
                jQuery("#topic-reply").html("<p>Je bericht is verstuurd!</p>");
            });
        });

        jQuery("#submitAbonneer").click(function() {
            var form = jQuery("#formabonneer").serialize();
            jQuery.post("https://api.opvoedenin.nl/api/abonnement", form).done(function(data) {
                jQuery("#form-notify").html("Je bent aangemeld op deze ervaring!");
            });
        })
    });

    jQuery(document).on("handlebars-updated", function( event, response ) {
        setGeslacht();
    });

    function setGeslacht()
    {
      jQuery(".geslacht").each(function() {
        if( jQuery(this).data("geslacht") == "m" )
          jQuery(this).attr('src', "http://www.jongin.nl/upload/fos_image/fosicon1402.gif")
      });
    }
</script>