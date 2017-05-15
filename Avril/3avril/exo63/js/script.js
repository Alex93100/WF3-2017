// Attendre le chargement du DOM
$(document).ready(function(){
    // Créer un tableau vide pour enregistrer les avatars
    var myTown = [];

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
        
        // Modifier l'attribut src de #avatarBody
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png');         
        });

    //  => avatarMan capter le click
        avatarMan.click(function(){

            // Modifier la vaker de avatarGender
                avatarGender = avatarMan.val();

            // Désactiver avatarWoman
                avatarWoman.prop('checked', false);

            // Vider le msg d'erreur
                $('.labelGender b').text('');

            // Modifier l'attribut src de #avatarBody
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png');         
        });

        // Supprimer les messages d'erreur
            $('input, select').focus(function(){
                // Sélectionner la balise précédent le input
                $(this).prev().children('b').text('');
            });

        // Capter l'événement change()sur les selects
        $('select').change(function(){
            // Condition if pour modifier 
            if($(this).attr('id') == 'avatarStyleTop'){

                // Modifier la valeur de l'attribut src de #avatarTop
                $('#avatarTop').attr('src', 'img/top/' + $(this).val() + '.png');
            }
            else{
                // Modifier la valeur de l'attribut src de #avatarStyleBottom
                $('#avatarBottom').attr('src', 'img/bottom/' + $(this).val()+ '.png');
            };
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

                        // Ajouter une ligne dans le tableau HTML
                        $('table').append('', 
                        '<tr>'+
                            '<td><b>'+ avatarName + '</b></td>'+
                            '<td>' + avatarAge + '</td>'+
                            '<td>' + avatarGender + '</td>'+
                            '<td>' + avatarStyleTop +', ' + avatarStyleBottom + '</td>'+
                        '</tr>'
                        );

                        // Ajouter l'avatar dans le tableau JS
                        myTown.push({
                            name: avatarMan,
                            gender: avatarGender,
                            age: parseInt(avatarAge),
                            top: avatarStyleTop,
                            bottom: avatarStyleBottom
                            
                        });

                        // Vider les champs du formulaire
                        $('form')[0].reset();

                        // Revenir aux valeur 'null' pour l'avatar
                        $('#avatarBody').attr('src', 'img/null.png');
                        $('#avatarTop').attr('src', 'img/top/null.png');
                        $('#avatarBottom').attr('src', 'img/bottom/null.png');
                        
                        // afficher les données du tableau JS dans la console
                        // console.log(myTown.length);

                        // Afficher la taille totale de la ville dans #totalSims
                        $('#totalSims').text(myTown.length);
                        $('#simsWoman b, #simsMan b').text('/' + myTown.length);

                        // Définir les variable globales pour les statistiques
                        var totalGirls = 0;
                        var totalBoys = 0;
                        var totalAge = 0;

                        // Faire une boucle for sur myTown pour connaitre les statistiques
                        for(var i = 0 ; i < myTown.length; i++){
                            // console.log(myTown[i].gender);
                        
                            // Condition pour le gender
                            if(myTown[i].gender == 'girl'){
                                totalGirls++;
                            }
                            else{
                                totalBoys++;
                            };

                            // Additioner les ages
                            totalAge += myTown[i].age;

                            // Afficher le tableau HTML le nombre de girls et le nombre de boys
                            $('#simsWoman').html(totalGirls + '<b>/' + myTown.length + '</b>');
                            $('#simsMan').html(totalBoys + '<b>/' + myTown.length + '</b>');

                            // Afficher l'age moyen dans le tableau HTML
                            var ageAmoutRounded = Math.round(totalAge / myTown.length);
                            $('#simsAgeAmount').html(ageAmoutRounded + '<b>/ans</b>');
                        };
                    };
        });

}); // Fin de l'attente du chargement du DOM