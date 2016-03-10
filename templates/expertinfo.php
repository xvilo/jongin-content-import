<?php
/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/28/16
 * Time: 10:15 AM
 */
?>
<script id="handlebars-expertinfo" type="text/x-handlebars">
    <ul>
    {{#each . }}
        <li><a href="<?php echo $page_url; ?>{{Id}}">{{Title}}</a></li>
    {{/each}}
    </ul>
</script>
<div id="jongin-menu">
    <?php echo $menu; ?>
</div>
<div id="expertinfo">
    <ul>
        <?php foreach( $rootObjects as $category ): ?>
            <li>
                <div>
                    <a href="<?php echo "$page_url{$category->getId()}"; ?>"><img src="<?php echo $category->getImage(); ?>" /></a>
                    <h3><?php echo $category->getTitle(); ?></h3>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>