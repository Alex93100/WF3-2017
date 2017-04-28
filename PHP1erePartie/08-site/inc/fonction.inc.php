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
        
        function executeRequete($req, $param = array()){ // $param est un array vide par défaut: il est donc optionnel

            // htmlspecialchars :
            if (!empty($param)){
                // Si on a bien reçu un array, on le traite :
                foreach($param as $indice => $valeur){
                    $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // transofrme en entiées HTML chaque caractères spéciaux, dont les quotes
                }
            }

            //  La requête préparée :
            global $pdo; // $pdo est déclarée dans l'espace global (fichier init.inc.php). Il faut donc faire global $pdo pour l'utiliser dans l'espace local de cette fonction
            $r = $pdo->prepare($req);
            $succes = $r->execute($param); // On exécute la requête en lui passant l'array $param qui permet d'associer chaque marqueur à sa valeur

            // Traitement erreur SQL éventuelle :
            if(!$succes){ // Si $succes vaut false, il y a une erreur sur la requête
                die('Erreur sur la requête SQL : ' . $r->errorInfo()[2]); // die arrête le script et affiche un message.
                // Ici on affiche le message d'erreur SQL donné par errorInfo(). Cette méthode retourne un array, dans lequel le msg se situe à l'indice[2]
            }
            return $r; // retourne un objet PDOStatement qui contient le résultat de la requête
            
        }