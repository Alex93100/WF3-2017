<?php
require_once('inc/init.inc.php')

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div id=conteneur>
            <h2 id="moi">Bonjour <?php echo $_SESSION['pseudo'];?></h2>
            <div id="message_tchat"></div>
            <div id="liste_membre_connecte"></div>
            <div class="clear"></div>
            <div id="smiley">
                <img src="smil/smiley1.gif" alt=":)">
            </div>
            <!-- FORMULAIRE -->
            <div id="formulaire_tchat">
                <form id="form">
                    <textarea name="message" id="message" maxlength="300" rows="5"></textarea><br>
                    <input type="submit" name="envoi" value="envoi" class="submit">
                </form>
            </div>
            <div id="postMessage"></div>
        </div>
    </body>
</html>