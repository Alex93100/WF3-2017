var user = 'Alexandre Rodrigues';
// Créer une variable de type ARRAY (tableau)
var myArray =['texte', 20, true, user];

// Afficher le tableau dans la console
console.log(myArray);

// Afficher la taille du tablau (nombre d'index)
console.log('La taille du tableau est ' + myArray.length);

// Afficher un des index du tableau
console.log(myArray[0]);
console.log(myArray[2]);

// Ajouter un index dans le tableau
myArray.push('Une valeur en plus');
console.log(myArray);

// Supprimer et remplacer des index du tablau
myArray.splice(2, 1, false);
console.log(myArray);