<?php


    //************************* Fonctions membres *************************


        function internauteEstConnecte(){
            // Cette fonction indique si l'internaute est connecté : si la session membre est definie, c'est que l'internaute est passé par la page de connexion avec le bon mdp.
            if(isset($_SESSION['membre'])){
                return true;
            }
            else{
                return false;
            }

            // On pourrait ecrire : 
            // return isset($_SESSION['membre']); car isset retourne deja true ou false
        }

        // -----------------------------------------------
        
        function internauteEstConnecteEtEstAdmin(){
            // Cette fonction indique si le membre connecté est admin
            if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
                return true;
            }
            else{
                return false;                
            }
        }

        // -----------------------------------------------
        