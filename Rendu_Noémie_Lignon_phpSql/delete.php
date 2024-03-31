<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez si l'identifiant du tweet 
    if(isset($_POST['tweet_id']) && !empty($_POST['tweet_id'])) {
        $tweet_id = $_POST['tweet_id'];
        
        // supprimer le tweet avec l'identifiant spécifié
        $request = $database->prepare('DELETE FROM tweets WHERE tweets.tweet_id = :tweet_id');
        $request->execute(['tweet_id' => $tweet_id]);
        
        // Redirigez l'utilisateur vers la page d'accueil ou toute autre page appropriée
        header('Location: index.php?tweet=');
        exit();
    } else {
        // Si l'identifiant du tweet à supprimer n'est pas spécifié, affichez un message d'erreur ou redirigez l'utilisateur
        header('Location: index.php?tweet=');
        exit();
    }
}
?>