// Demande du chargement du DOM
$(document).ready(function(){

    // Créer une fonction pour l'animation des compétences
    function mySkills(paramEq, paramWidth){

        // Animation des balise p des skils
        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });
        
    };

    /*
        Modal
    */ 
        // Créer une fonction pour ouvrir la modal
        function openModal(){

            // Ouvrir la modal au click sur les boutons
            $('button').click(function(){

                // Afficher le titre du projet
                var modalTitle = $(this).prev().text();
                $('#modal span').text(modalTitle);

                // Afficher l'image du projet
                var modalImage = $(this).parent().prev().attr('src');
                $('#modal img').attr('src', modalImage).attr('alt', modalTitle);

                $('#modal').fadeIn();    
            });

            // Fermer la modal au click sur .fa-times
            $('.fa-times').click(function(){
                $('#modal').fadeOut();
            });
        };

    /*
        Formulaire
    */ 
        // Créer une fonction pour la gestion du formulaire
        function contactForm(){
            
            // Capter le focus sur les inputs et le textarea
            $('input, textarea').focus(function(){

                // Sélectioner la balise précédente pour y ajouter la class openedLabel
                $(this).prev().addClass('openedLabel');

            });

            // Capter le blur sur les input et le textarea
            $('input,textarea').blur(function(){

                // Vérifier s'il n'y à pas de caractère dans le input
                if($(this).val().length == 0){

                    // Sélectioner la balise précédente pour supprimer la class openedLabel
                    $(this).prev().removeClass();
                };
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
            
            // Créer une variable pour récupéré la valeur de l'attribut href
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

                        // Vérifier si l'utilisateur est sur la page contacts.html
                        if (viewToLoad == 'contacts.html') {
                            
                            //Déclancher la fonction de gestion du formulaire
                            contactForm(); 
                        };
                    });
                });
            });
        });

}); // Fin du chargement d DOM