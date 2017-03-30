// Capter l'événement ready pour y ajouter une fonction de callback (attendre le changement de DOM)

$(document).ready(function() {


    // Capter l'événement focus sur le textarea
    $('textarea').focus(function(){
        console.log('Minimum 10 caractères');

    });

    // Capter l'événement blur sur le textarea
    $('textarea').blur(function(){
        console.log("L'utilistauer est sorti du focus");

    });

    // capter l'événement scroll sur le header
    $('header').scroll(function(){
        console.log('Scroll');
    });

    // Capter l'événement hover sur le main
    $('main').hover(function(){

        console.log('l\'utilisateur est au dessus')
    });

    // capter l'évènement click sur la balise a
    $('a').click(function(evt){
        
        // Empécher le comportement naturel de la balise a
        evt.preventDefault();

        console.log('Click sur la balise a')

    });

    // Capter la soumission de l'utilisateur
    $('form').submit(function(evt){
        // bloquer le comportement naturel du formulaire
        evt.preventDefault();
        
        console.log('Vérifier les inputs/textarea avant de les envoyer au fichier de traitement PHP')

    });

}); // Fin de la fonction d'attente de chargement du DOM