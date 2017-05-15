/*

    Programme pour saluer un utilisateur et afficher son année de naissance
        - Demander le prénom et le nom de l'utilisateur
        - Saluer en disant : Bonjour prénom nom
        - Demander l'âgee de l'utilisateur
        - Afficher l'année de naissance
        
*/ 
    
// - Demander le prénom et le nom de l'utilisateur
var firstName = prompt('Quel est ton prénom ?');
var lastName = prompt('Quel est ton nom ?');

// - Saluer en disant : Bonjour prénom nom
console.log('Bonjour ' + firstName + ' ' + lastName);

// - Demander l'âgee de l'utilisateur
var age = prompt('Quel est ton age ?');
console.log(age);

// Transformer une variable de type STRING en type NUMBER
var ageNumber = parseInt(age);
console.log(ageNumber);

// - Afficher l'année de naissance
var currentYear = 2017;
console.log('ton année de naissance est ' + (currentYear - ageNumber));