// Créer une var de type objet
var user = {
    firstName: 'Alexandre',
    lastName:'Rodrigues',

    // Ajouter une fonction pour afficher le nom complet
    fullName: function(){
       return (this.firstName + ' ' + this.lastName);

    }
};

// Afficher l'objet
console.log(user);

//  Afficher une propriété de l'objet
console.log(user.firstName);

// Modifier la valeur d'une propriété de l'objet
user.lastName = 'Marjolaine';
console.log(user);

// Appeler la fonction de l'objet
console.log(user.fullName());