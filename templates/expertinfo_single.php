<?php
/** @var $menu string */
/** @var $expertInfo ExpertInfo */
?>
<div id="jongin-menu" class="single">
<button onclick="goBack()" class="btn">< Ga Terug</button>
<?php echo $menu; ?>
</div>
<div>
    <h1><?php echo $expertInfo->getTitle(); ?></h1>
    <img src="<?php echo $expertInfo->getImage(); ?>"/>
    <?php echo $expertInfo->getBody(); ?>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>