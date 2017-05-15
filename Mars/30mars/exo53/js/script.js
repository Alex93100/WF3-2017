// Sélectionner la balise h1

var myTitle = document.querySelector('h1');

// Afficher le contenue texte de la balise dans la console
console.log(myTitle.textContent);

// Modifier le contenue texte de la balise
myTitle.textContent = 'Le titre a changé';

//Sélectionner la balise #myId
var myId = document.querySelector('#myId');

// Afficher le contenue HTML dans la cnsole
console.log(myId.innerHTML);

// Modifier le contenue HTML de la balise
myId.innerHTML = 'Contactez <b>moi</b> les gars : <a href="mailto:blabla@blbal">Mail</a>';