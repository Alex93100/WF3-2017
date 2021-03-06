// Demande du chargement du DOM
$(document).ready(function(){

    // Créer une fonction pour l'animation des compétences
    function mySkills(paramEq, paramWidth){

        // Animation des balise p des skils
        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });
        
    };

    // Créer une fonction pour ouvrir la modal
    function openModal(){

        // Ouvrir la modal au click sur les boutons
        $('button').click(function(){
            $('#modal').fadeIn();    
        });

        // Fermer la modal au click sur .fa-times
        $('.fa-times').click(function(){
            $('#modal').fadeOut();
        });
    };

    // Charger le contenu de home.html dans le main
    $('main').load('views/home.html');
    
    
    
/************************************************************************************/
    
    /*
        Burger menu
    */ 

        // Ouverture BurgerMenu
        $('h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();
            
            // Appliquer la fonction slideToggle sur la nav
            $('nav').slideToggle();
        });

        // Burger Menu: navigation
        $('nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();

            // Masquer le main
            $('main').fadeOut();
            
            var viewToLoad = $(this).attr('href');
            
            // Fermer le burger menu
            $('nav').slideUp(function(){

                // Charger la bonne vue puis afficher le main (callBack)
                $('main').load('views/'+ viewToLoad, function(){

                    $('main').fadeIn(function(){
                        
                        // Vérifier si l'utilisateur veux voir la page about.html
                        if(viewToLoad == 'about.html'){
                            
                            // Appler la fonction mySkills
                            mySkills(0, '85%');
                            mySkills(1, '70%');
                            mySkills(2, '50%');
                        };

                        // Vérifier si l'utilisateur est sur la page portfolio.html
                        if(viewToLoad == 'portfolio.html'){

                            // Appeler la fonction pour ouvrir la modal
                            openModal();
                        };
                    });
                });
            });
        });

}); // Fin du chargement d DOM