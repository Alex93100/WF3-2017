<?php


/*
    1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
        Cette fonction prend 2 paramètres : une date(valide) et le format de converion US ou FR

    2- Vous validez que le paramètre de format est bien US ou FR. La fonction retourne un message si ce n'est pas le cas.

*/

function conversionDate($date, $format){
    // Version avec objet date:
    // $objetDate = new DateTime($date);

    //     if($format == 'FR'){
    //         return $objetDate->format('d-m-Y') . '<br>';
    //     }
    //     elseif($format == 'US'){
    //         return $objetDate->format('Y-m-d') . '<br>';            
    //     }
    //     else{
    //         return 'je ne connais pas le format de cette date';            
    //     }
    
    // -------------------------
        // Autre version :
        if($format == 'FR'){
            return strftime('%d-%m-%Y', strtotime($date)). '<br>';// strtotie retourne la date donnée en timesstamp. strftime retourne le timestamp formanté selon le format indiqué avec des %
        }
        elseif($format == 'US'){
            return strftime('%Y-%m-%d', strtotime($date)). '<br>';
        }
        else{
            return 'je ne connais pas le format de cette date';            
        }
    
    }
    echo conversionDate('05-05-2017', 'US');
    echo conversionDate('2017-05-05', 'FR');
?>