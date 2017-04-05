// Demande de chargement DOM
$(document).ready(function(){
    
    // Capter le click sur le premier bouton
    $('button').eq(0).click(function(){

        // Charger le contenu de views/about.html dans la premier section du main
        $('section').eq(0).load('views/about.html', function(){

            // Fonction de callBack de la fonction load()
            console.log('Le fichier about.html est chargé');

            // Animer la permière section
            $('section').eq(0).fadeIn();
        });
    });


    // Capter le click sur le deuxième bouton
    $('button').eq(1).click(function(){

        $('section').eq(1).load('views/content.html #portfolio');
    });
    
    // Capter le click sur le troisème bouton
    $('button').eq(2).click(function(){
        
        //Charger dans la 3eme section de contenue de l'id contacts de views/content.html 
        $('section').eq(2).load('views/content.html #contacts', function(){

            // Appler la fonction submitForm
            submitForm();
        });
    });

    // Créer une fonction pour capter la soumission du formulaire
    function submitForm(){
        // Capter la soumission du Foormulaire
        $('form').submit(function(evt){
            
            // Créer une variable pour la validation du formulaire
            var formScore = 0;
            
            // Bloquer le comportement naturel du formulaire
            evt.preventDefault();
            console.log('Submit du formulaire');

            // Min 4 caractere pour l'email et Min 5 caractere pour le msg
            if($('[type="email"]').val().length<4){
                console.log('Email manquant');
            }
            else{
                console.log('Email OK');
                // Incrémenter formScore
                formScore++;
            };

            if($('textarea').val().length<5){
                console.log('Message Error');
            }
            else{
                console.log('Message OK');
                formScore++;    
            };

            // Vérifier la valeur de formScore
            if(formScore ==2 ){
                console.log('Le formulaire est validé !');

                // Envoi des données vers le fichier de traitement PHP
                    //  => le fichier PHP répond true : je peux continuer mon code

                    // Ajouter le msg dans la balise aside
                    $('aside').append('<h3>' + $('textarea').val() + '</h3><p>' + $('[type="email"]').val() + '</p>');
                    
                    // Reset du formulaire
                    $('form')[0].reset();
            };
        });
    };


}); // Fin du chargmeent du DOM