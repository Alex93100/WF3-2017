// Demander è l'utilisateur de choisir une couleur entre rouge vert et bleu
function chooseAColor(){
    var userChoice = prompt('Choisir une couleur entre rouge, bleu ou vert');

    // Si userChoice est égale à 'rouge'

    if(userChoice == 'rouge'){
        console.log('Rouge ce dit Red en anglais');
    }

    else if(userChoice == 'bleu'){
        console.log('Bleu ce dit blue en anglais');
    }

    else if(userChoice == 'vert'){
        console.log('Vert ce dit green en anglais');
    }

    else{
        console.log('This is not a colors');
        chooseAColor()
    };
// end

}

chooseAColor()