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
        Modal Page Portfolio
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
        Modal Page Code
    */ 
        // Créer une fonction pour ouvrir la modal
        function openModal2(){

            // Ouvrir la modal au click sur les boutons
            $('button').click(function(){

                // Afficher le titre du projet
                var modalTitle = $(this).prev().text();
                $('#modal2 span').text(modalTitle);

                // Afficher l'image du projet
                var modalImage = $(this).parent().prev().attr('src');
                $('#modal2 img').attr('src', modalImage).attr('alt', modalTitle);

                $('#modal2').fadeIn();    
            });

            // Fermer la modal au click sur .fa-times
            $('.fa-times').click(function(){
                $('#modal2').fadeOut();
            });
        };

    /*
        Formulaire Page Contacts
    */ 
        // Créer une fonction pour la gestion du formulaire
        function contactForm(){
            
            // Capter le focus sur les inputs et le textarea
            $('input:not([type="submit"]), textarea').focus(function(){

                // Sélectioner la balise précédente pour y ajouter la class openedLabel
                $(this).prev().addClass('openedLabel hideError');

            });

            // Capter le blur sur les input et le textarea
            $('input,textarea').blur(function(){

                // Vérifier s'il n'y à pas de caractère dans le input
                if($(this).val().length == 0){

                    // Sélectioner la balise précédente pour supprimer la class openedLabel
                    $(this).prev().removeClass();
                };
            });

            // Supprimer le message d'erreur du select
            $('select').focus(function(){

                $(this).prev().removeClass();

            });

            // Fermer la modal
            $('.fa-times').click(function(){
                $('#modal').fadeOut();
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
                var formScore = 0;

                // Vérifier que userName à au min 2 caractères
                if(userName.val().length < 6){
                    // Afficher un msg d'erreur
                    $('[for="userName"] b').text('Minimum 6 caractères');

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

                // Validation final du formulaire
                if(formScore == 4){

                    console.log('Le formulaire est validé')

                    // Envoi des données dans le fichier de traitement PHP
                    // Php répond true => continuer le traitement du formulaire

                        // Ajouter la valeur de userName dans la balise h2 span de la modal
                        $('#modal span').text(userName.val());

                        // Afficher la modal
                        $('#modal').fadeIn();

                        // Vider les champs du formulaire
                        $('form')[0].reset();
                        
                        // Supprimer les msg d'erreur
                        $('form b').text('');

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
            
            var viewToLoad = $(this).attr('href');
            if(window.innerWidth <= 750){
                
                // Fermer le burger menu
                $('nav').slideUp(function(){

                    // Charger la bonne vue puis afficher le main (callBack)
                    $('main').load('views/'+ viewToLoad, function(){

                        $('main').fadeIn(function(){
                            
                            // Vérifier si l'utilisateur veux voir la page about.html
                            if(viewToLoad == 'about.html'){
                                
                                // Appler la fonction mySkills
                                mySkills(0, '80%');
                                mySkills(1, '70%');
                                mySkills(2, '70%');
                                mySkills(3, '70%');
                                mySkills(4, '30%');
                                mySkills(5, '30%');
                                mySkills(6, '50%');
                                mySkills(7, '30%');
                                mySkills(8, '30%');
                                mySkills(9, '30%');
                            };

                            // Vérifier si l'utilisateur est sur la page portfolio.html
                            if(viewToLoad == 'portfolio.html'){

                                // Appeler la fonction pour ouvrir la modal
                                openModal();
                            };

                            // Vérifier si l'utilisateur est sur la page code.html
                            if(viewToLoad == 'code.html'){

                                // Appeler la fonction pour ouvrir la modal
                                openModal2();
                            };

                            if(viewToLoad == 'contacts.html'){
                                // Appeler la fonction pour la gestion du formulaire
                                contactForm();
                            };
                        });
                    });
                });
            }
            else {
                $('main').fadeOut(function(){
                    // Charger la bonne vue puis afficher le main (callBack)
                    $('main').load('views/'+ viewToLoad, function(){

                        $('main').fadeIn(function(){
                            
                            // Vérifier si l'utilisateur veux voir la page about.html
                            if(viewToLoad == 'about.html'){
                                
                                // Appler la fonction mySkills
                                mySkills(0, '80%');
                                mySkills(1, '70%');
                                mySkills(2, '70%');
                                mySkills(3, '70%');
                                mySkills(4, '30%');
                                mySkills(5, '30%');
                                mySkills(6, '50%');
                                mySkills(7, '30%');
                                mySkills(8, '30%');
                                mySkills(9, '30%');
                            };

                            // Vérifier si l'utilisateur est sur la page portfolio.html
                            if(viewToLoad == 'portfolio.html'){

                                // Appeler la fonction pour ouvrir la modal
                                openModal();
                            };

                            // Vérifier si l'utilisateur est sur la page code.html
                            if(viewToLoad == 'code.html'){

                                // Appeler la fonction pour ouvrir la modal
                                openModal2();
                            };

                            if(viewToLoad == 'contacts.html'){
                                // Appeler la fonction pour la gestion du formulaire
                                contactForm();
                            };                          
                        });
                    });
                });
            };
        });

}); // Fin du chargement d DOM