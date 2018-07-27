<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <title>Mini-Chat</title>
  </head>
  <body>
  <div class="container">
    <div class="col-md-auto text-center">
        <div class="jumbotron bg-warning">
            <h1 class="display-4 text-white">Hello, <br> bienvenue dans ce mini-chat !</h1>
            <form action="post.php" method="post">
                <div class="form-group">
                    <label for="Pseudo">Pseudonyme</label>
                    <input type="text" class="form-control" name="pseudo" placeholder="Entre ton pseudo !">
                    <small class="form-text text-muted">Pseudo ridicule exigé</small>
                </div>
                <div class="form-group">
                    <label for="Message">Ton message</label>
                    <input type="text" class="form-control" name="message" placeholder="Écris ton message !!!">
                    <small class="form-text text-muted">255 caractères max ! Abuses pas !</small>
                </div>
            <button type="submit" class="btn btn-primary bg-danger">Post !</button>
        </form>
        </div>
    </div>
    <?php
// Connexion à la base de données
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=tp_chat;charset=utf8','root','');
            }

        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
                            }
        // Récupération des 10 derniers messages

        $reponse = $bdd->query('SELECT pseudo, message,date FROM "mini_chat" ORDER BY ID DESC LIMIT 0, 10');

        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

        while ($donnees = $reponse->fetch()){
            echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . 
            htmlspecialchars($donnees['message']) . 
            $donnees['date'] . '</p>';
        
        }
        $reponse->closeCursor();
    ?>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>