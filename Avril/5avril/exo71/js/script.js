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
            evt.preventDefault();

            console.log('Submit du formulaire');
        });
    };
}); // Fin du chargmeent du DOM