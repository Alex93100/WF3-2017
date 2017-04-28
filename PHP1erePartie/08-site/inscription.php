<?php 
    //-------------------- TRAITEMENT ---------------------- 

        require_once('inc/init.inc.php');
        $inscription = false; // variable qui permet de savoir si le membre est inscrit, pour ne pas réafficher le formulaire d'inscription

        //Traitement du POST :

            if(!empty($_POST)){ // si le formulaire est posté

                // validation du formulaire :
                    if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20){
                        $contenu .= '<div class="bg-danger">Le pseudo doit contenir au moins 4 caractères</div>';
                    }

                    if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20){
                        $contenu .= '<div class="bg-danger">Le mot de passe doit contenir au moins 4 caractères</div>';
                    }

                    if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20){
                        $contenu .= '<div class="bg-danger">Le nom doit contenir au moins 2 caractères</div>';
                    }

                    if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20){
                        $contenu .= '<div class="bg-danger">Le prénom doit contenir au moins 2 caractères</div>';
                    }

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $contenu .= '<div class="bg-danger">L\'email est invalide</div>';                        
                    }
                    // filter_var() permet de valider des format de chaines de caractères pour vérifier qu'il s'agit ici d'email (on pourrait valider une URL par exemple).

                    if ($_POST['civilite'] != 'm' && $_POST['civilite'] != 'f'){
                        $contenu .= '<div class="bg-danger">La civilité est incorrecte</div>';
                    }

                    if(strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 20){
                        $contenu .= '<div class="bg-danger">La ville ne doit pas être vide</div>';
                    }

                    // Validation du Code postal avec une expression régulière :
                    if(!preg_match('#^[0-9]{5}$#',$_POST['code_postal']))

                    if(strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 50){
                        $contenu .= '<div class="bg-danger">L\'adresse doit contenir au moins 4 caractères</div>';
                    }

            }





    //-------------------- AFFICHAGE ---------------------- 

        require_once('inc/haut.inc.php');
        echo $contenu; // affiche le smessage du site

        if(!$inscription) : // si membre non inscrit ($inscription vaut false), on affiche le formulaire
?>
<h3>Veuillez renseigner le formulaire pour vous inscire</h3>
<form method="post" action="">
    <label for="pseudo">Pseudo :</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe :</label><br>
    <input type="password" id="mdp" name="mdp" value=""><br><br>

    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" value=""><br><br>

    <label for="prenom">Prénom :</label><br>
    <input type="text" id="prenom" name="prenom" value=""><br><br>

    <label for="email">Email :</label><br>
    <input type="text" id="email" name="email" value=""><br><br>

    <label>Civilité :</label><br>
    <input type="radio" id="homme" name="civilite" value="m" checked><label for="homme">Homme</label>
    <input type="radio" id="femme" name="civilite" value="f"><label for="femme">Femme</label><br><br>
    
    <label for="ville">Ville :</label><br>
    <input type="text" id="ville" name="ville" value=""><br><br>

    <label for="code_postal">Code postal :</label><br>
    <input type="text" id="code_postal" name="code_postal" value=""><br><br>

    <label for="adresse">Adresse :</label><br>
    <textarea id="adresse" name="adresse" value=""></textarea><br><br>

    <input type="submit" name="inscription" value="s'inscrire" class="btn"><br><br>
</form>

<?php 

        endif; // syntaxe du if avec ":" qui remplace la première accolade et "endif" qui remplace la seconde
        require_once('inc/bas.inc.php');
        

    
?>