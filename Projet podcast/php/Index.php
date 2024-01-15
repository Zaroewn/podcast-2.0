<?php

    require('fonctions.php');

    $pdo = getPDO('mysql:host=localhost;dbname=projet', 'root', '');

    $posts = getPodcastsWithCategory($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../pictures/startup.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Open+Sans&family=Pacifico&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/index.css">
    <title>SpaceCast</title>
</head>
<body>

    <div class="grid-container">
        <div class="item1"></div>

        <div class="item2">
            
            <h1>SpaceCasts</h1>

           <?php
            foreach ($posts as $podcast) {
                echo "<div class=\"div\">",
                        "<p>" .$podcast['nom']. "</p>",
                        "<span>" .$podcast['created_at']. "</span>",
                        "<h2>" .$podcast['titre']. "</h2>",
                        "<p>" .$podcast['extrait']. "</p>",
                        "<button class=\"glow-on-hover\" onclick=\"location.href='podcast.php?id=$podcast[id]'\">&#9655;Écouter</button>",
                    "</div>";
                echo "<br><br><br><br><br><br>";
            }
           ?>
        </div>

        <div class="item3"></div> 
        
    </div>
    
    <div class="bg"></div>

    <div class="star-field">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
    </div>

</body>
</html>