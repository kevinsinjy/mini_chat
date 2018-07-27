<?php

// Connexion à la base de données

try{
   $bdd = new PDO('mysql:host=localhost;dbname=tp_chat;charset=utf8','root','');
}

catch(Exception $e){
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO tp_chat .mini_chat (pseudo, message, date) VALUES(?, ?, NOW())');

$req->execute(array($_POST['pseudo'], $_POST['message'], $_POST['date']));


// Redirection du visiteur vers la page du minichat

header('Location: index.php');

?>