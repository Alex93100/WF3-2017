// Attendre le chargement du DOM
$(document).ready(function(){

    //Vérifier le genre de l'avatar 
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');
        var avatarGender;

    //  => avatarWoman capter le click
        avatarWoman.click(function(){

        // Modifier la vaker de avatarGender            
        avatarGender = avatarWoman.val();

        // Désactiver avatarMan
            avatarMan.prop('checked', false);
            
        // Vider le msg d'erreur
            $('.labelGender b').text('');             

        });

    //  => avatarMan capter le click
        avatarMan.click(function(){

            // Modifier la vaker de avatarGender
                avatarGender = avatarMan.val();

            // Désactiver avatarWoman
                avatarWoman.prop('checked', false);

            // Vider le msg d'erreur
                $('.labelGender b').text(''); 
        });

    // Supprimer les messages d'erreur
        $('input, select').focus(function(){
            // Sélectionner la balise précédent le input
            $(this).prev().children('b').text('');
        });

    
    // Capter la soumission du formulaire
        $('form').submit(function(evt){
        
            // Bloquer le comportement par defaut du formulaire
                evt.preventDefault();

            // Définir une variable pour la validation final du formulaire
            var formScore = 0;
            
            //  Récupérer la valeur de #avatarName
                var avatarName = $('#avatarName').val();
                var avatarAge = $('#avatarAge').val();
                var avatarStyleTop = $('#avatarStyleTop').val();
                var avatarStyleBottom = $('#avatarStyleBottom').val();

            // Vérifier les champs du formulaire

                //  => avatarMan min 5 cara

                    if ( avatarName.length < 5){
                        // Ajouter un msg d'erreyr dans le label du dessus
                        $('[for="avatarName"] b').text('Min 5 caractères');

                    }
                    else{
                        // Incrémenter la variable formScore
                        formScore++;
                    };

                //  => avatarAge entre 1 et 100

                    if (avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0){
                        // Ajouter un msg d'erreyr dans le label du dessus
                        $('[for="avatarAge"] b').text('Entre 1 et 100 ans');
                    }
                    else{
                        // Incrémenter la variable formScore
                        formScore++;
                    };

                //  => avatarStyleTop obligatoire
                
                    if( avatarStyleTop == 'null'){
                        // Ajouter un msg d'erreyr dans le label du dessus
                        $('[for="avatarStyleTop"] b').text('Choix Obligatoire');
                    }
                    else{
                        // Incrémenter la variable formScore
                        formScore++;
                    };

                //  => avatarStyleBottom obligatoire

                    if( avatarStyleBottom == 'null'){
                        $('[for="avatarStyleBottom"] b').text('Choix Obligatoire');

                    }
                    else{
                        // Incrémenter la variable formScore
                        formScore++;
                    };
                    

                // => avatarGender vérifier la valeur
                    if(avatarGender == undefined){
                        $('.labelGender b').text('Choix Obligatoire');
                    }
                    else{
                        // Incrémenter la variable formScore
                        formScore++;
                    };

                // Vérifier la valeur de la variable formScore
                    if(formScore == 5){
                        console.log('le formulaire est validé !');

                        // => envoyer les données du formulaire et attende la réponse du server en Ajax
                        // => Le serveur répond true

                        // Vider les champs du formulaire
                        $('form')[0].reset();

                    };
        });

}); // Fin de l'attente du chargement du DOM