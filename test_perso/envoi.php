 <?php
 
 //-------------------- TRAITEMENT ---------------------- 

        require_once('views/contacts.html');

        //Traitement du POST :

            if(!empty($_POST)){ // si le formulaire est posté

                // validation du formulaire :
                    if(strlen($_POST['nom']) < 4 || strlen($_POST['nom']) > 40){
                        $contenu .= '<div>Le nom doit contenir au moins 4 caractères</div>';
                    }

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                        $contenu .= '<div>L\'email est invalide</div>';                        
                    }
                    // filter_var() permet de valider des format de chaines de caractères pour vérifier qu'il s'agit ici d'email (on pourrait valider une URL par exemple).

                    if(strlen($_POST['sujet']) < 6 || strlen($_POST['sujet']) > 40){
                        $contenu .= '<div>La sujet ne doit pas être vide</div>';
                    }

                    if(strlen($_POST['message']) < 5 || strlen($_POST['message']) > 255){
                        $contenu .= '<div>Le message doit contenir au moins 5 caractères</div>';
                    }


                    // // Si aucune erreur sur le formuaire, on vérifie l'unicité du pseudo avant inscription en BDD :
                    // if(empty($contenu)){ // Si $contenu est vide,c'est qu'il n'y a pas d'erreur
                    //     else{
                    //         // Si le pseudo est unique, on peut faire l'inscription en BDD:

                    //         $contenu .= '<div class="bg-danger">Vous avez bien été inscrit.<a href="connexion.php">Cliquez ici pour vous connecter</a></div>';
                    //         $inscription = true; //Pour ne plus afficher le formulaire d'inscription
                    //     } // fin du else de if($membre->rowCount() > 0)

                    // }// fin du if(empty($contenu))

            }