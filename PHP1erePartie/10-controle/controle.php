<!-- Exercice 1 : On se présente ! -->

<?php

$presentation = array('alexandre'=>'prenom', 'rodrigues'=>'nom', 'adresse blabla'=>'adresse', '75000'=>'code postal', 'ville'=>'ville', 'blablabla@blabla.com'=>'email', '0600000000'=>'telephone', '1990/06/19'=>'date de naissance');


    foreach($presentation as $key => $value){
        if($key == '1990/06/19'){
           $key = new DateTime('1990/06/19');
            echo '<li> date de naissance : '.$key->format('d-m-Y').'</li>';
        }
        else{
            echo'<li>'. $value .' : '. $key .'</li>';
        }
    }

    // $dateFormat = strftime('%d-%m-%Y', $dateJour);
    // echo $dateFormat . '<br>'; 
?>





