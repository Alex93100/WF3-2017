// Demande du chargement du DOM
$(document).ready(function(){

    // Fermer la modal
    $('.fa-times').click(function(){
        $('div').fadeOut();
    });

    // Supprimer les class error
    $('input, select, textarea').focus(function(){
        $(this).removeClass('error')
    });

    

    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();

        // Définir les variable globales
        var userName = $('[placeholder="Your name*"]');
        var userEmail = $('[placeholder="Your email*"]');
        var userSubject = $('select');
        var userMessage = $('textarea');
        var formScore = 0;

        // Vérifier que l'utilisateur a bien saisi son nom
        if(userName.val().length == 0){

            // Ajouter la class error sur l'input
            userName.addClass('error');
        }
        else{
            formScore++
        };

        // Vérifier que l'utilisateur a bien saisi son Email
        if(userEmail.val().length < 4){

            // Ajouter la class error sur l'input
            userEmail.addClass('error');
            
        }
        else{
            formScore++
        };

        // Vérifier que l'utilisateur a bien saisi un sujet
        if(userSubject.val() == 'null'){

            // Ajouter la class error sur l'input
            userSubject.addClass('error');
            
        }
        else{
            formScore++
        };

        // Vérifier que l'utilisateur a bien saisi un msg avec au min 10 caracteres
        if(userMessage.val() < 10){

            // Ajouter la class error sur l'input
            userMessage.addClass('error');
        }
        else{
            formScore++
        };

        // Validation final du formulaire
        if(formScore == 4){
            console.log('Formulaire Validé')

            // Envoi des données dans le fichier de traitement PHP
            // PHP répond true => continuer le traitement du formualire

            //  => Afficher les données du formulaire dans une modal
            $('div span').text(userName.val());
            $('div b').text(userSubject.val());
            $('div p:last').text(userMessage.val());

            // Afficher la modal
            $('div').fadeIn();
            
            // Vider les champs du formulaire
            $('form')[0].reset('');
        };
    });

}); // Fin du chargement du DOM