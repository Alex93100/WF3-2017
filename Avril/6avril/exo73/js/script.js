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

            //Capter la soumission de mon formulaire
            $('form').submit(function(evt){

                // Bloquer le comportement naturel du formulaire
                evt.preventDefault();

                // Définir les variables globales du formulaire
                var userName = $('#userName');
                var userEmail = $('#userEmail');
                var userSubject = $('#userSubject');
                var userMessage = $('#userMessage');
                var checkbox = $('[type="checkbox"]');
                var formScore = 0;

                // Vérifier que userName à au min 2 caractères
                if(userName.val().length < 2){
                    // Afficher un msg d'erreur
                    $('[for="userName"] b').text('Minimum 2 caractères');

                    // version 2 : userName.prev().children('b').text('Minimum 2 caractères')
                }
                else{
                    // Incrémenter la valeur de formScore
                    formScore++;
                };


                // Vérifier que userEmail à au moin 5 caractères
                if(userEmail.val().length < 5){
                    // Afficher un msg d'erreur
                    $('[for="userEmail"] b').text('Minimum 5 caractères');
                }
                else{
                    // Incrémenter la valeur de formScore
                    formScore++;  
                };

                
                // Vérifier que l'utilisateurà bien sélectionné un sujet
                if(userSubject.val() == 'null' ){
                    // Afficher un msg d'erreur
                    $('[for="userSubject"] b').text('select obligatoire');
                }
                else{
                    // Incrémenter la valeur de formScore
                    formScore++;     
                };


                // Vérifier que userMessage à au moin 10 caractères
                if(userMessage.val().length < 10){
                    // Afficher un msg d'erreur
                    $('[for="userMessage"] b').text('Minimum 10 caractères');
                }
                else{
                    // Incrémenter la valeur de formScore
                    formScore++;  
                };

                // Vérifier que le CG est accepter
                if(checkbox[0].checked == false){
                    // Afficher un msg d'erreur
                    $('form p b').text('Vous devez accepter la CG');
                }
                else{
                    // Incrémenter la valeur de formScore
                    formScore++;      
                };

                // Validation final du formulaire
                if(formScore == 5){

                    console.log('Le formulaire est validé')

                    // Envoi des données dans le fichier de traitement PHP
                    // Php répond true => continuer le traitement du formulaire

                        // Vider les champs du formulaire
                        $('form')[0].reset();

                        // Replacer les label
                        $('label').removeClass();
                        
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