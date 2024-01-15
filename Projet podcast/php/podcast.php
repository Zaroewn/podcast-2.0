<?php
require('fonctions.php');

$pdo = getPDO('mysql:host=localhost;dbname=projet', 'root', '');

$podcastSelection = getPodcastWithCategory();

$commentaires = getComments($pdo, $_GET['id']);

if(empty($podcastSelection)) {

    http_response_code(404);
    header('HTTP/1.0 404 Not Found');
    readfile('../html/404.html');
    exit();

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../pictures/startup.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Open+Sans&family=Pacifico&family=Permanent+Marker&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/podcast.css">
    <title>Choix des podcasts</title>
</head>

<body>
    <div class="grid-container">
        <div class="item1"></div>

        <div class="item2">

            <h1>SpaceCasts</h1>

            <?php

                echo "<div class=\"div\">",
                        "<p>" .$podcastSelection['nom']. "</p>",
                        "<span>" .$podcastSelection['created_at']. "</span>",
                        "<h2>" .$podcastSelection['titre']. "</h2>",
                        "<audio src=\"$podcastSelection[fichier_audio]\" controls></audio>",
                        "<p>" .$podcastSelection['corps']. "</p>",
                    "</div>"; 

                echo '<br><br>';
            ?>
            

            <?php if(! empty($commentaires)) : ?>

                <div class="div">

                    <h3>Commentaires</h3>
                    <br>

                    <?php foreach($commentaires as $commentaire) : ?>
                            <div class="div">
                                <p><?=$commentaire['nom']?></p>
                                <p><?=$commentaire['corps']?></p>
                            </div>
                            <br>
                    <?php endforeach ?>
                    
                </div>

            <?php endif ?>

        </div>

        <div class="item3"></div>
    </div>

    <div class="bg"></div>

</body>

</html>