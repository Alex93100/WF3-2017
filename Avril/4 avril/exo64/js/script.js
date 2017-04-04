// Demande du DOM
$(document).ready(function(){
    
    // Fonction animate()
    $('section:first button').click(function(){
        
        // Changer la couleur de fond et la largeur de l'article
        $('section:first article').animate({
            height: '40rem',
            width: '20rem'
            
        });
    });

            // Fonction animate() valeur dynamiques
        $('section:nth-child(2) button').click(function(){

            $('section:nth-child(2) article').animate({

                left: '+=1rem',
                top: '-=1rem'
            });
        });

        // Fonction animate(): toggle/show/hide
        $('section:nth-child(3) button').click(function(){

            $('section:nth-child(3) article').animate({
                width: 'toggle'
            });
        });


        // Fonction animate() avec durée et callBack
        $('section:last button').click(function(){

            $('section:last article').animate({
                width: '20rem',
                height: '20rem'

            }, 2000, function(){
                alert('Fin de l\'animation');
                
            });

        });


}); // Fin de la demande du chargement du DOM