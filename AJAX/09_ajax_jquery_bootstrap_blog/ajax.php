<?php
require_once('inc/init.inc.php');

$tab = array();
$tab['resultat'] = "";

$mode = isset($_POST['mode']) ? $_POST['mode'] : "";

if($mode == 'enregistrer'){
    if(!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])){
        $resultat = $pdo->prepare("INSERT INTO article (titre, auteur, contenu, date)VALUES(:titre, :auteur, :contenu, NOW())");
        $resultat->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $resultat->bindParam(':auteur', $_POST['auteur'], PDO::PARAM_STR);
        $resultat->bindParam(':contenu', $_POST['contenu'], PDO::PARAM_STR);
        $resultat->execute();
        $tab['resultat'] .= '<div class ="alert alert-success" role="alert">Article enregistré</div>';
    }
}
elseif($mode == 'liste'){
    // récupérer tous les article et les placer dans $tab['resultat']
    // mettre en place une fonction ajax qui envoi l'argument mode=liste et qui affiche tous les article dans l'élément avec l'id liste
    //  => setInterval

    $liste_article = $pdo->query("SELECT id_article, titre, auteur, contenu, date_format(date,'%d-%m-%Y à %H:%i:%s') as date_fr FROM article ORDER BY date DESC");

    while($article = $liste_article->fetch(PDO::FETCH_ASSOC)){
        $tab['resultat'] .= "<div class='col-sm-4'>";
        $tab['resultat'] .= "<div class='panel panel-default'>";
        $tab['resultat'] .= "<div class='panel-heading'><h2>".$article['titre'].'</h2></div>';
        $tab['resultat'] .= '<div class="panel-body">';
        $tab['resultat'] .= '<span class="small">Par: '. $article['auteur']. ' le '.$article['date_fr'].'</span>';

        $contenu = substr($article['contenu'],0,105). ' ... <a href="#url/fiche_article.php?id_article='. $article['id_article'] .'">Lire la suite</a>';
        $tab['resultat'] .= '<p>'. $contenu .'</p>';
        $tab['resultat'] .= "</div></div></div>";
    }
}

echo json_encode($tab);