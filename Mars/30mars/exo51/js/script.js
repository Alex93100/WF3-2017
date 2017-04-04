/*
    Ajouter une balise HTML dans le DOM
    - Sélectionner le document
    - Appliquer la fonction write
    - Ajouter le contenu
*/ 

document.write('<p>Je suis généré en JS</p>');
var names = ['Marine', 'Alexandre', 'Marjolaine'];

for( var i = 0; i<names.length; i++){
    document.write('<p>Salut ' + names[i] + '</p>');
};