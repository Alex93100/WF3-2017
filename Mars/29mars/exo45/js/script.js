/*
    Créer une fonction qui permet à l'utilistauer de choisir une couleur
*/

var userChoice = '';
console.log(userChoice);

function chooseAColor(){
    // demander a l'utilisateur de choisir une couleur
    var userPrompt = prompt('Choisir une couleur entre rouge, bleu ou vert');

    // Assigner la valeur de userPrompt à userChoice
    userChoice = userPrompt;

    console.log(userChoice);

    // Appeler la fonction de traduction
    translateColor(userChoice);
};

// Créer une fonction pour traduire les couleurs
function translateColor(paramColor){

    // Utilisation du switch 
    switch(paramColor){
        
        // 1er cas : paramColor est égale à 'rouge'
        case 'rouge': console.log('Rouge = Red'); break;
        
        // 2eme cas : paramColor est égale à 'bleu'
        case 'rouge': console.log('Bleu = Blue'); break;
        
        // 3eme cas : paramColor est égale à 'vert'
        case 'rouge': console.log('Vert = Green'); break;

        // Pour tous les autres cas : default est OBLIGATOIRE
        default:console.log('this is not a color');break;
    }
};
chooseAColor();