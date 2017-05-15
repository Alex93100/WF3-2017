// Sélectionner la balise dans laquelle ajouter une autre balise
var myMain = document.querySelector('ul');

// Créer un tableau contenant 4 titres
var myArray = ['Accueil', 'About', 'Portfolio', 'Contacts']

// Faire une boucle sur le tableau
for(var i=0; i<myArray.length; i++){
    
    //  Créer une variable pour générer une balise HTML
    var myNewTag = document.createElement('li');

    // Ajouter du contenu dans la balise générée
    myNewTag.innerHTML = '<a href="#">' + myArray[i] + '</a>';

    // Ajouter un enfant dans myMain
    myMain.appendChild(myNewTag);
};