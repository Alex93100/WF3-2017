<?php

    // *************************
    // Cas pratique : un espace de commentaires
    // *************************


    /*
        Objectif : nous allons créer un espace de commentaires type avis ou livre d'or.

        Modélisation de la BDD "dialogue" :
            Table : commentaire
            Chmamps: id_commentaire         INT(3) PK AI
                    pseudo                  VARCHAR(20)
                    message                 TEXT
                    date_enregistrement     DATETIME
    */ 

    // II. Connexion à la BDD et traitement du post : 
    $pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    if(!empty($_POST)){

        // 3- Traitement contre les failles XSS (injection JS) ou les injections CSS : on parle d'échappement des données reçus :
        // Pour l'exemple, on va injecter dans le champ message, le code suivant : <style>body{display:none}</style>

        // Et pour autre exemple, on va injecter le code JS suivant : 
        // <script>while(true){alert('Vous êtes bloqué...');}</script>

        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
        $_POST['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES); 
        // htmlspecialchars convertit les caractères spéciaux (<, >, ', ", &) en entités HTML (par exemple < devient &lt;), ce qui permet de rendre inoffensives les balises HTML.
        // ENT_QUOTES permet d'ajouter les quotes à la liste des caractères convertis.

        // En complément :
        $_POST['message'] = strip_tags($_POST['message']);// permet de supprimer toutes les balises HTML contenu
        
        // htmlentities() permet lui aussi de convertir les balises HTML en entités HTML+*-


        // 1- Nous allons faire une première requête qui n'est pas protégée contre les injections et qui n'accepte pas les apostrophes :
            // $r = $pdo->query("INSERT INTO Commentaire (pseudo, date_enregistrement, message)VALUES('$_POST[pseudo]', NOW(),'$_POST[message]')");
        
        // 2- Nous allons faire une injection SQL : dans le champ message, saisir ok'); DELETE FROM Commentaire; (
            //Pour se prémunir des injecgtions SQL et pouvoir mettre des apostrophes, nous devons faire une requête préparée :
            $stmt = $pdo->prepare("INSERT INTO commentaire (pseudo, date_enregistrement, message)VALUES(:pseudo, NOW(), :message)");

            $stmt->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $stmt->bindParam(':message', $_POST['message'], PDO::PARAM_STR);

            $stmt->execute();


    } //fin du if(!empty($_POST))


?>

<!-- I. Formulaire de saisie du message -->
    <form method="post" action"">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" value=""><br><br>

        <label for="message">Message</label>
        <textarea name="message" id="message"></textarea><br><br>

        <input type="submit" name="envoi" value="envoi">
    </form>

<?php

    // III. Affichage des messages contenus en BDD :
    $resultat = $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d-%m-%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM Commentaire ORDER BY date_enregistrement DESC");

    echo '<h2>' . $resultat->rowCount() . ' commentaire(s)</h2>';

    while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<article>';
            echo'<p>Par '. $commentaire['pseudo'] . ' le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</p>';
            echo '<p>' . $commentaire['message'] . '</p>';
        echo '</article><hr>';

    }

?>