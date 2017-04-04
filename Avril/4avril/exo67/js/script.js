// Demande du DOM
$(document).ready(function(){
    
    // Ouvrir la modal
    $('button').click(function(){

        $('section').fadeIn(300);
    });

    // Fermer la modal
    $('.fa').click(function(){
        
        $('section').fadeOut();
        
        
    });

    // Capter les touches du clavier
    $(document).keyup(function(evt){

        if(evt.keyCode == 27){
            $('section').fadeOut();
        };

    });

}); // Fin de la demande du chargement du DOM