/*
    - Créer un tableau contenant 4 prénoms dont votre prénom
    - faire une boucle sur le tableau pour saluer dans la console chacun des prénoms

    - Afficher un msg spécial pour votre prénom
*/ 
var myArray = ['Kevin', 'Marine', 'Alexandre', 'Marjolaine'];
for(i = 0; i<myArray.length; i++){
    // console.log('Salut ' + myArray[i]);

    if(myArray[i] == 'Alexandre'){
        console.log('Oo Bonjour Alexandre');
        // Modifer une balise HTML
        document.querySelector('p').textContent="Oo Bonjour Alexandre";
    }
    else{
        console.log('Salut ' + myArray[i])
    };
};