<?php

// 04-constante-static-self
    // -> Maison.class.php

class Maison{

    public $couleur = 'blanc';
    public static $espaceTerrain ='500m2';







}

// ------------------
echo 'Terrain : '. Maison::$espaceTerrain.'<br>'; // OK Je fais appel à un élément appartenant à la classe depuis la classe.
$maison = new Maison;

echo 'Couleur : ' . $maison->couleur . '<br>'; // OK! Je fais appel à un élément de l'objet par l'objet.
// echo 'Terrain : ' . $maison->espaceterrain . '<br>'; //Erreur ! Je tente d'appeler un élément appartenant à la classe par l'objet.