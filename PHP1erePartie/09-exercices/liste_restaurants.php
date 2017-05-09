<?php

/*
    1- Afficher dans une table HTML la liste des restaurants avec les champs nom et téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

    2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".


*/ 

        $pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

                $contenu ='';
			    $envoi = $pdo->query("SELECT id_restaurant, nom, telephone FROM restaurant");
                $contenu .= '<table border=".1">';
						$contenu .= '<tr>
										<th>Nom</th>
										<th>Téléphone</th>
										<th>Autres infos</th>
									</tr>';
			
                while( $detail = $envoi->fetch(PDO::FETCH_ASSOC)){
							$contenu .= '<tr>';       
                                $contenu .= '<td>'. $detail['nom'] .'</td>';
                                $contenu .= '<td>'. $detail['telephone'] .'</td>';
                                $contenu .= '<td><a href="?id_restaurant='. $detail['id_restaurant'] .'">autres infos</a></td>';
							$contenu .= '</tr>';
				}
                        $contenu .= '</table>';


                        // ------------------------------------------------------------

                        if(isset($_GET['id_restaurant'])){
                        
                            $query = $pdo->prepare('SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant');
                            $query->bindParam(':id_restaurant', $_GET['id_restaurant'], PDO::PARAM_INT);
                            $query->execute();
                            $contact = $query->fetch(PDO::FETCH_ASSOC);

                            $contenu .= '<h1>Détails</h1>';
                            if (!empty($contact)) {
                                $contenu .= '<p>Nom : '. $contact['nom'] .'</p>';
                                $contenu .= '<p>Adresse : '. $contact['adresse'] .'</p>';
                                $contenu .= '<p>Téléphone : '. $contact['telephone'] .'</p>';
                                $contenu .= '<p>Type de restaurant : '. $contact['type'] .'</p>';
                                $contenu .= '<p>Note : '. $contact['note'] .'</p>';
                                $contenu .= '<p>Avis : '. $contact['avis'] .'</p>';
                            }
                            else {
                                $contenu .= '<div>Ce restaurant n\'existe pas</div>';
                            }
                        }
                echo $contenu;
	
?>