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
						$contenu .= '<table border=".1">';
						$contenu .= '<tr>
										<th>Nom</th>
										<th>Prénom</th>
										<th>Téléphone</th>
										<th>Autres infos</th>
									</tr>';
			
                while( $detail = $envoi->fetch(PDO::FETCH_ASSOC)){
							$contenu .= '<tr>';       
                                $contenu .= '<td>'. $detail['nom'] .'</td>';
                                $contenu .= '<td>'. $detail['prenom'] .'</td>';
                                $contenu .= '<td>'. $detail['telephone'] .'</td>';
                                $contenu .= '<td><a href="?id_contact='. $detail['id_contact'] .'">autres infos</a></td>';
							$contenu .= '</tr>';
				}
                        $contenu .= '</table>';
						
		// ------------------------------------------------------------

		if(isset($_GET['id_contact'])){
		
			$query = $pdo->prepare('SELECT * FROM contact WHERE id_contact = :id_contact');
			$query->bindParam(':id_contact', $_GET['id_contact'], PDO::PARAM_INT);
			$query->execute();
			$contact = $query->fetch(PDO::FETCH_ASSOC);

			$contenu .= '<h1>Détail d\'un contact</h1>';
			if (!empty($contact)) {
				$contenu .= '<p>Nom : '. $contact['nom'] .'</p>';
				$contenu .= '<p>Prénom : '. $contact['prenom'] .'</p>';
				$contenu .= '<p>Téléphone : '. $contact['telephone'] .'</p>';
				$contenu .= '<p>Email : '. $contact['email'] .'</p>';
				$contenu .= '<p>Année de rencontre : '. $contact['annee_rencontre'] .'</p>';
				$contenu .= '<p>Type de contact : '. $contact['type_contact'] .'</p>';
			}
			else {
				$contenu .= '<div>Ce contact n\'existe pas</div>';
			}
		}
echo $contenu;
	

?>


