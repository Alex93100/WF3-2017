// Demande du DOM
$(document).ready(function(){
    
    // Ouvrir le Burger menu classique
    $('.fa-bars').click(function(){

        $('nav ul').fadeIn(500);
    });

    // Fermer le Burger menu
    $('a').click(function(evt){

        // Bloquer la balise a 
        evt.preventDefault();
        
        $('nav ul').fadeOut(500);
    });

}); // Fin de la demande du chargement du DOM