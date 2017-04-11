// Demande du chargement du DOM
$(document).ready(function(){

    // Supprimer les class error
    $('input, select, textarea').focus(function(){
        $(this).removeClass('error')
    });

    // Capter le click sur le submit
    $('select').submit(function(evt){
        evt.preventDefault();

        // Modifier l'image
            if($(this).val()=='chat'){
                $('img').attr('src', 'img/chat0.jpg');
            }
            else if($(this).val() =='chat1'){
                $('img').attr('src', 'img/chat1.jpg');

            }
            else if($(this).val() =='chat2'){
                $('img').attr('src', 'img/chat2.jpg');

            }
            else if($(this).val() =='chat3'){
                $('img').attr('src', 'img/chat3.jpg');

            }
            else{
                $('img').attr('src', 'img/chat4.jpg');

            };

    });

    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();

        // Définir les variable globales
        var userSubject = $('select');
        var userMessage = $('textarea');
        var formScore = 0;

        // Vérifier que l'utilisateur a bien saisi un sujet
        if(userSubject.val() == 'chat0'){

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
        if(formScore == 2){
            console.log('Formulaire Validé')

            // Envoi des données dans le fichier de traitement PHP
            // PHP répond true => continuer le traitement du formualire

            //  => Afficher les données du formulaire dans une modal
            // $('div b').text(userSubject.val());
            // $('div p:last').text(userMessage.val());
            
            // Vider les champs du formulaire
            $('form')[0].reset('');
        };
    });

}); // Fin du chargement du DOM