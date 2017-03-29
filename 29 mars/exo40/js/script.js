/*
    Créer un tableau contenant 4 index
    - 1 string
    - 1 number
    - 2 booleans différents
*/ 

var myArray=['text', 10, false, true];
console.log(myArray);

/*
    Ajouter un string dans le tableau.
    Afficher le tableau dans la console.
*/ 

myArray.push('Texte');
console.log(myArray);

/*
    Afficher dans la console la taille du tableau.
    Afficher chacun des index du tableau dans la console.
*/ 

console.log(myArray.length, myArray[0], myArray[4]);


/*
    Créer un objet contenant 3 propriétés
    - le tableau
    - 1 prénom
    - 1 age
    Afficher l'objet dans la console
*/ 

var myObject = {
  array: myArray,  
  firstName: 'Alexandre',
  Age: 20
};
console.log(myObject);

/*
    Afficher toute les propriétés de l'objet dans la console une par une
*/ 

console.log( myObject.array, myObject.firstName, myObject.Age);

/*
    Modifier la propriété age de l'objet
    Afficher l'objet dans la console
*/

myObject.Age = 30;
console.log(myObject);