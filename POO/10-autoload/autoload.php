<?php

// 10-autoload
    // -> autoload.php

    function inclusion_automatique($nom_de_la_classe){
        require($nom_de_la_classe. '.class.php');

        // ------------

        echo 'On passe dans l\'autoload<br>';
        echo 'On fait un require('. $nom_de_la_classe .'.class.php)<br>';
    }

// ----------------------------------

spl_autoload_register('inclusion_automatique');

// ----------------------------------

/*
Commentaires :

    spl_autoload_register :
        -C'est une fonction super pratique ! Elle va s'éxécuter à chaque fois que l'interprêteur voit le mot "new".

        - Elle va exécuter une fonction, dont on lui fournit le nom en argument
*/ 