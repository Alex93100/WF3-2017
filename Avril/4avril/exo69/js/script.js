// Demande du chargement du DOM
$(document).ready(function(){

    /*
        Home Page 
    */ 

        // Burger menu
        $('.homePage h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();
            
            // Appliquer la fonction slideToggle sur la nav
            $('.homePage nav').slideToggle();
        });

        // Burger Menu: navigation
        $('.homePage nav a').click(function(evt){
            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();
            
            var linkToOpen = $(this).attr('href');
            

            // Fermer le burger menu
            $('.homePage nav').slideUp(function(){

                // Changer de page
                window.location = linkToOpen;
            });
        });

/************************************************************************************/
    /*
        About Page
    */ 

        // capter le click sur le burger menu
        $('.aboutPage h1+a').click(function(evt){
            
            // bloquer le comportement naturel de A
            evt.preventDefault();
            
            // Sélectionner la nav pour y Appliquer une fonction animate
            $('.aboutPage nav').animate({
                left: '0'
            });
        });

        // Burger Menu: navigation
        $('.aboutPage nav a').click(function(evt){
            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();
            
            var linkToOpen = $(this).attr('href');
            

            // Fermer le burger menu
            $('.aboutPage nav').animate({
                left: '-100%'
            }, function(){
                 // Changer de page
                window.location = linkToOpen;
            })
        });

}); // Fin du chargement d DOM