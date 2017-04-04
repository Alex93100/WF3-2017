//  Sélecteur de balise HTML (tag)

var myParaTag = document.getElementsByTagName('p')
console.log(myParaTag);

// Sélecteur de class
var myClass = document.getElementsByClassName('myClass');
console.log(myClass);

// Sélecteur d'id
var myId = document.getElementById('myId');
console.log(myId);

// Sélecteur querySelector
console.log(document.querySelector('p'));

// Sélecteur querySelectorAll
console.log(document.querySelectorAll('.myClass'));