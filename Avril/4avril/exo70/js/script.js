$(document).ready(function(){
    // capter le click surle premier bouton
    $('button:first').click(function(){
        
        // charger le fichier Home.html dans le main
        $('main').load(':3000/views/home.html')

    });
}); // fin du chargement du DOM