// Demande du chargement du DOM

$(document).ready(function(){
    /*
       /*
        Formulaire Page Contacts
    */ 
        // Créer une fonction pour la gestion du formulaire

            
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

            // Supprimer le msg d'erreur de la checkbox
            $('[type="checkbox"]').focus(function(){

                if($(this).checked == false){
                    $('form p').addClass('hideError');
                };
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




});   // Fin de la demande