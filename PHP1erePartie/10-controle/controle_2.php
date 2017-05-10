<!-- Exercice 2 : On part en voyage -->
<?php
    $message = '';

    function conversionMoney($money, $format){
        $taux = array(1.085965, 0.919920);

        if($format == 'FR'){
            $formatMoney = $taux[0]; // 1.08
        $conversionMoney = $money * $formatMoney;
            
        return "$conversionMoney $.";		
            
        }
        else{
            $formatMoney = $taux[1]; // 0.91
        $conversionMoney = $money * $formatMoney;
            
        return "$conversionMoney €.";		
                    
        }

    }
    echo conversionMoney(3, 'US').'<br>';
    echo conversionMoney(2, 'FR');
?>