<h1>Page détail des articles</h1>

<?php
// **************************************
// La superglobale $_GET
// **************************************
    // $_GET représente l'URL : il s'agit d'une superglobale, et comme toutes les superglobales, d'un ARRAY.
    // Superglobale signifie qu'il est disponible dans tous les contextes du script, y compris dans els fonctions : il n'est pas nécessaire de faire global $_GET.

    // Les informations transitent dans l'url de la maniere suivante :
    // page.php?indice1=valeur1&indice2=valeur2 (sans espace)
    // Chaque indice de cet URL correspondent à un indice de l'array $_GET, et chaque valeur aux valeur correspondantes au indices.

    print_r($_GET);

    echo '<br>';
    echo 'Article : ' . $_GET['article'] . '<br>';
    echo 'Couleur : ' . $_GET['couleur'] . '<br>';
    echo 'Prix : ' . $_GET['prix'] . '<br>';
?>