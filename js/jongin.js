function retrieveJongInContent( sourceUrl, tplSelector, contentSelector )
{
    var source = jQuery(tplSelector).html();
    var template = Handlebars.compile(source);
    jQuery.getJSON( "https://api.opvoedenin.nl/api/" + sourceUrl, function( data ) {
        var html = template(data);
        jQuery(contentSelector).html(html);
        jQuery(document).trigger("handlebars-updated", { sourceUrl: sourceUrl, data: data } ) ;
    });
}