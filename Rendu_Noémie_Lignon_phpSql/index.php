<?php

try{
    $database = new PDO('mysql:host=localhost;dbname=twitter','root','');

    $user = isset($_GET['user']) ? $_GET['user'] : 'Utilisateur inconnu';
    $nombreTweets = isset($_GET['tweets']) ? (int)$_GET['tweets'] : 1;
    
    $request = $database->prepare(
        'SELECT tweets.message,utilisateurs.pseudo FROM tweets
        LEFT JOIN utilisateurs ON utilisateurs.
        id = tweets.author_id
        ORDER BY tweets.tweet_id DESC'
    ); 
    $request->execute();
    $tweets = $request->fetchALL(
        PDO::FETCH_ASSOC
    );
    require_once 'index.html.php';
}catch(PDOException $e) {
    die('Erreur: '. $e->getMessage());

}


?>



