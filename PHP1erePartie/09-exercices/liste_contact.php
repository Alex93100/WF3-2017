<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".



*/
		// Session
        session_start();

        $pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        $contenu ='';
			$envoi = $pdo->query("SELECT DISTINCT id_contact, nom, prenom, telephone FROM contact");
						$contenu .= '<table>';
			
                while( $detail = $envoi->fetch(PDO::FETCH_ASSOC)){
							$contenu .= '<tr>';       
                                $contenu .= '<td>'. $detail['nom'] .'</td>';
                                $contenu .= '<td>'. $detail['prenom'] .'</td>';
                                $contenu .= '<td>'. $detail['telephone'] .'</td>';
                                $contenu .= '<td><a href="?id_contact='. $detail['id_contact'] .'">autres infos</a></td>';
							$contenu .= '</tr>';
				}
                        $contenu .= '</table>';
			
			function executeRequete($envoi, $param = array()){ 

            if (!empty($param)){
                foreach($param as $indice => $valeur){
                    $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // transofrme en entiées HTML chaque caractères spéciaux, dont les quotes
                }
            }
            //  La requête préparée :
            global $pdo;
            $r = $pdo->prepare($envoi);
            $succes = $r->execute($param);

            // Traitement erreur SQL éventuelle :
            if(!$succes){ 
                die('Erreur sur la requête SQL : ' . $r->errorInfo()[2]);
            }
            return $r;
        }		

	if(isset($_GET['id_contact'])){
			$envois = executeRequete("SELECT * FROM contact WHERE id_contact = :id_contact", array(':id_contact'=>$_GET['id_contact']));
			
                while( $detail = $envoi->fetch(PDO::FETCH_ASSOC)){
					$contenu .= ''. $detail['nom'] .'';
					$contenu .= ''. $detail['prenom'] .'';
					// $contenu .= '';
					// $contenu .= '';
					// $contenu .= '';
echo $contenu;
					
				}

echo $contenu;

	}

?>


