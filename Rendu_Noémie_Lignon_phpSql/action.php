<?php

require_once 'config.php';

try {

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        if(isset($_POST['message']) && !empty($_POST['message'])) {
            $message = $_POST['message'];
            $utilisateursId = null;

            if(isset($_POST['user']) && !empty($_POST['user'])) {
                $utilisateurs = $_POST['user'];

                $request = $database->prepare(
                    'SELECT id FROM utilisateurs WHERE pseudo = :pseudo'
                );
                $request->execute([
                    'pseudo' => $utilisateurs
                ]);
                $utilisateursId = $request->fetchColumn();


            }


            if ($utilisateursId) {
                $request = $database->prepare(
                    'INSERT INTO tweets (message, author_id) VALUES (:message, :author_id)'
                );
                $request->execute([
                    'message' => $message,
                    'author_id' => $utilisateursId
                ]);
                header('Location: index.php?user=' . $utilisateurs);
            } else {
                $request = $database->prepare(
                    'INSERT INTO tweets (message) VALUES (:message)'
                );
                $request->execute([
                    'message' => $message
                ]);
                header('Location: index.php?tweet=');
            }
            

        }else {
           die("Error");
        } 
    }
     



    exit();



} catch (PDOExeption $e) {
die($e->getMessage());
}

