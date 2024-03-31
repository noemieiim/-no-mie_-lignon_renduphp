<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mini Twitter</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Explorer</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Profil</a></li>
            </ul>
        </nav>
        <section class="feed">
            <?php if(!empty($user)): ?>
                <h3>Je suis <?= $user ?></h3>
            <?php endif; ?>
            <form id="tweetForm" action="action.php" method="POST">
                <?php if(!empty($user)): ?>
                    <input type="hidden" name="user" value="<?= $user ?>">
                <?php endif; ?>
                <textarea placeholder="Quoi de neuf ?" name="message"></textarea>
                <button type="submit">Tweeter</button>
            </form>
            <ul>
                <div class="tweets"> 
                    <?php foreach($tweets as $tweet): ?>
                        <div class="tweet">
                            <h1><?= $tweet['pseudo'] ?></h1>
                            <p><?= $tweet['message'] ?></p>
                            
                            <form class="delete-form" method="POST" action="delete.php">
                                <!-- Champ caché pour contenir l'identifiant du tweet à supprimer -->
                                <input type="hidden" name="tweet_id" value="<?= $tweet['id'] ?>">
                                <!-- Bouton de suppression -->
                                <button type="submit">Supprimer</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </ul>
        </section>
    </div>
</body>
</html>
