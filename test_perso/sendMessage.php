 <?php
 
 //-------------------- TRAITEMENT ---------------------- 

        //Traitement du POST :

            if(!empty($_POST)){ // si le formulaire est posté

                // validation du formulaire :
                    if(strlen($_POST['userName']) < 4 || strlen($_POST['userName']) > 40){
                        $contenu .= '<div>Le nom doit contenir au moins 4 caractères</div>';
                    }

                    if (!filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)){
                        $contenu .= '<div>L\'email est invalide</div>';                        
                    }
                    // filter_var() permet de valider des format de chaines de caractères pour vérifier qu'il s'agit ici d'email (on pourrait valider une URL par exemple).

                    if ($_POST['userSubject'] != 'contacts' && $_POST['userSubject'] != 'rdv' && $_POST['userSubject'] != 'devis'){
                        $contenu .= '<div class="bg-danger">Le sujet est incorrecte</div>';
                    }

                    if(strlen($_POST['userMessage']) < 10 || strlen($_POST['userMessage']) > 255){
                        $contenu .= '<div>Le message doit contenir au moins 10 caractères</div>';
                    }


                    // // Si aucune erreur sur le formuaire avant envoi sur l'adresse email
                    // if(empty($contenu)){ // Si $contenu est vide,c'est qu'il n'y a pas d'erreur
                    //     else{
                    //         $contenu .= '<div class="bg-danger">Votre message a bien été envoyez.</div>';
                    //     } // fin du else de if($membre->rowCount() > 0)

                    // }// fin du if(empty($contenu))

            }