// Demande du chargement du DOM
$(document).ready(function(){

    // Fermer la modal
    $('.fa-times').click(function(){
        $('#modal').fadeOut();
    });

    // Définir une variable
    var boxChecked;
    var formScore = 0;
    
    // UI checkbox
    $('[type="checkbox"]').click(function(){

        // Définir la valeur de checkbox
        boxcheked = $(this).val();

        // Décocher les checkbox
            var checkboxArray = $('[type="checkbox"]').not($(this));

            for(var i = 0; i < checkboxArray.length; i++){
            checkboxArray[i].checked = false;
            };

        // Modifier l'image
            if($(this).val()=='first'){
                $('img').attr('src', 'img/profil.jpg');
            }
            else if($(this).val() =='second'){
                $('img').attr('src', 'img/2.jpg');

            }
            else if($(this).val() =='third'){
                $('img').attr('src', 'img/3.jpg');

            }
            else{
                $('img').attr('src', 'img/4.jpg');

            };
    });


    // Capter la soumission du formulaire
    $('form').submit(function(evt){
        // Bloquer le comportement naturel du formulaire
        evt.preventDefault();

            if(boxcheked == undefined){
                console.log('Vous devez choisir une image');
            }
            else{
                // Afficher la modal
                $('#modal').fadeIn();
            }

            // Vider les champs du formulaire
            $('form')[0].reset('');


    });

}); // fin de la demande du chargement