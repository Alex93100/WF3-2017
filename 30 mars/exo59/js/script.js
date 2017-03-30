// Attendre le chargement du DOM

$(document).ready(function(){
    // Manipuler le contenue texte du footer
    console.log( $('footer').text() );
    // $('footer').text('Sous la licence MIT');

    // Manipuler le contenue HTML du footer
    console.log( $('footer').html() );
    $('footer').html('Sous la licence <b>MIT</b>');

    // Créer des objets pour le contenue des pages

    var content = {
        homeContent: {
            title:'Bienvenue sur mon site',
            content: 'Je suis le texte de la page Accueil',
        },

        portfolioContent: {
            title:'Bienvenue sur mon Portfolio',
            content: 'Je suis le texte de la page Portfolio',
        },
        contactContent: {
            title:'Bienvenue sur la page Contact',
            content: 'Je suis le texte de la page Contact',
        }
    }

    // Créer une fonction pour gérer le menu
    function showMyContent(){

        // Capter le click sur la première li
        $('li').click(function(){

            // Récupérer la valeur de l'attribut data
            var dataValue = $(this).attr('data');

            


            // Modifier le contenue de la balise h2
            $('h2').text(content.dataValue.title);

            // Modifier le contenue de la balise p
            $('p').html(content.dataValue.content);

        });
    };

    showMyContent()
    

}); // Fin de la fonction de chargement du DOM