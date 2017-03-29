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

    // Si paramColor est égale à 'rouge'
    if(paramColor == 'Rouge'){
        console.log('Ce dis red en anglais');
    }

    // Si paramColor est égale à 'bleu'
    else if(paramColor == 'Bleu'){
        console.log('Ce dis blue en anglais');
    }

    // Si paramColor est égale à 'vert'
    else if(paramColor == 'Vert'){
        console.log('Ce dis green en anglais');
    }

    // Sinon paramColor est égale à This is not a color
    else{
        console.log('This is not a color');
        chooseAColor()
    };
// end

};

chooseAColor();