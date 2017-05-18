<?php
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $liste_prenom = $pdo->query("SELECT prenom, id_employes FROM employes");
    $liste = "";
    while($personne = $liste_prenom->fetch(PDO::FETCH_ASSOC)){
        $liste .= '<option value="'.$personne['id_employes'].'">' . $personne['prenom'].'</option>';
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <style>
            *{ font-family: sans-serif; text-align: center;}
            form, #resultat{ width: 50%; margin:0 auto;}
            select,input{ padding:5px; width:100%; border-radius:3px; border:1px solid;  }
            input{ cursor:pointer; }
            table{border-collapse: collapse; width:80%; margin:0 auto;}
            td,th{ padding: 10px; }

            
        </style>
    </head>

    <body>
        <form id="mon_form">
            <label>Prénom</label>
            <select name="choix" id="choix">
                <?php
                    echo $liste;
                ?>
            </select>
            <br>
            <input type="submit" id="valider" value="Valider">
        </form>
        <hr>
        <div id="resultat"></div>

        <script>
            var formulaire = document.getElementById("mon_form").addEventListener("submit", ajax);

            function ajax(event){
                event.preventDefault();
                var champSelect = document.getElementById("choix");
                var valeur = champSelect.value;
                console.log(valeur);


                var file = "ajax.php"; // notre page cible
                var parametres = "personne="+valeur;

                var xhttp = new XMLHttpRequest();

                xhttp.open("POST", file, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // la methode setRequestHeader() définit la valeur d'un header http
                // vous devez appelez cette methode entre la methode open() et send()

                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        console.log(xhttp.responseText);
                        var reponse = JSON.parse(xhttp.responseText);
                        document.getElementById("resultat").innerHTML = reponse.resultat;
                    }
                }
                xhttp.send(parametres); // envoi
            }
            // Mettre en place un événement sur la validation du formulaire (submit)
            // bloquer le rechargement de page consecutif à la validadtion du formulaire
            // et déclencher une requete ajax qui envoie sur ajax.php
            // sur ajax.php récupérer les informations de l'employes correspondant à l'id récupéré
            // et envoyer une réponse sous forme de tableau html.Le tableau doit avoir deux ligne, une avec le noms des colonnes et l'autre avec les valeurs

        </script>
    </body>
</html>