<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".



*/
		// Session
        session_start();

        $pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        $contenu ='';
			$envoi = $pdo->query("SELECT nom, prenom, telephone FROM contact");
                while( $detail = $envoi->fetch(PDO::FETCH_ASSOC)){
						$contenu .= '<table>';
							$contenu .= '<tr>';       
                                $contenu .= '<td>'. $detail['nom'] .'</td>';
                                $contenu .= '<td>'. $detail['prenom'] .'</td>';
                                $contenu .= '<td>'. $detail['telephone'] .'</td>';
                                $contenu .= '<td><a href="">autres infos</a>''</td>';
							$contenu .= '</tr>';
                        $contenu .= '</table>';
				}
echo $contenu;

?>


