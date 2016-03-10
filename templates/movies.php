<div id="movies">
    <?php foreach( $jongInData as $movie ): ?>
        <div id="movie-item">
            <h1><?php echo $movie['Title']; ?></h1>
            <?php echo $movie['embed']; ?>
            <p><?php echo $movie['Summary']; ?></p>
        </div>
    <?php endforeach; ?>
</div>