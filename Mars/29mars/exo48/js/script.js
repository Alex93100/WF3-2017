// Créer un tableau contenant 3 prénom
var users = [ 'Kevin', 'Marjolaine', 'Alexandre', 'Marine'];
console.log(users);

// Faire une boucle while sur le tableau pour saluer chacun des prénoms
var i = 0;

// Limiter la boucle à la taille du tableau
while(i < users.length){
    console.log('Salut ' + users[i]);
    
    // Incrémenter la variable i
    i++;
}