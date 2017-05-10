<!-- Exercice 2 : On part en voyage -->
<?php

    // function conversionMoney($money, $format){

    //     if($format == 'FR'){
    //         $resultat = $format * 0.919920;
    //         return $resultat;// strtotie retourne la date donnée en timesstamp. strftime retourne le timestamp formanté selon le format indiqué avec des %
    //     }
    //     elseif($format == 'US'){

    //         $resultat = $format * 1.085965;
    //         return $resultat;
    //     }
    //     else{
    //         return 'je ne connais pas le format de cette date';            
    //     }
    
    // }
    



            $message = '';

			function conversionMoney($money, $format){
				$taux = array(1.085965, 0.919920);

				if($format == 'FR'){
					$formatMoney = $taux[0]; // 1.08
				}
				else{
					$formatMoney = $taux[1]; // 0.91		
				}

			    $conversionMoney = $money * $formatMoney;

				return "$conversionMoney.";		
				}
    echo conversionMoney(3, 'US').'<br>';
    echo conversionMoney(1, 'FR');
?>