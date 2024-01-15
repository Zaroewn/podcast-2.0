<?php 

function getPDO($dsn, $nomUtilisateur, $mdp) {

    $pdo = new PDO($dsn, $nomUtilisateur, $mdp);
    return $pdo;

}


function getPodcastsWithCategory($pdo) {
 
    $query = $pdo -> query('SELECT podcasts.id, podcasts.created_at, podcasts.titre, podcasts.extrait, podcasts.fichier_audio, categories.nom AS nom
        FROM podcasts
        LEFT JOIN categories
        ON podcasts.id_categorie = categories.id'
        , PDO::FETCH_ASSOC);

    $posts = $query -> fetchAll();

    return $posts;

}


function getPodcastWithCategory() {

    $pdo = getPDO('mysql:host=localhost;dbname=projet', 'root', '');
    
    // $query = $pdo -> prepare('SELECT id, titre, corps, fichier_audio, created_at FROM podcasts WHERE id=:id');
    $query = $pdo -> prepare('SELECT podcasts.id, podcasts.created_at, podcasts.titre, podcasts.corps, podcasts.fichier_audio, categories.nom AS nom
    FROM podcasts
    LEFT JOIN categories
    ON podcasts.id_categorie = categories.id 
    WHERE podcasts.id=:id');

    $query -> execute([
        'id' => $_GET['id'],
    ]);
    
    $post = $query -> fetch(PDO::FETCH_ASSOC);

    return $post;

}


function getComments($pdo,$podcast_id) {
    $query = $pdo -> prepare('SELECT commentaires.corps, utilisateurs.nom AS nom 
    FROM commentaires 
    LEFT JOIN utilisateurs
    ON commentaires.util_id = utilisateurs.id
    WHERE podcast_id=:id');

    $query -> execute([
        'id' => $podcast_id,
    ]);

    $commentaires = $query -> fetchAll(PDO::FETCH_ASSOC);

    return $commentaires;
}

?>