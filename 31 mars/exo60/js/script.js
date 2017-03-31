// Attendre le chargement du DOM
$(document).ready(function(){
    
    // Créer une variable pour le titre principal du site
    var siteTitle = 'Alexandre Rodrigues <span>Etudiant WebForce3</span>'

    // Créer un tableau pour la nav
    var myNav = ['Accueil', 'Portfolio', 'Contacts'];

    // Créer un objet pour les titre des pages
    var myTitlesPage = {
        Accueil: 'Bienvenue sur la page d\'accueil',
        Portfolio: 'Découvrez mes travaux',
        Contacts: 'Contactez-moi pour plus d\'informations'
    };

    // Créer un objet pour le contenu de la page
    var myContent = {
        Accueil: '<h3>Contenue de la page Accueil</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam sequi explicabo soluta vero voluptatibus id repellendus commodi, error tempora aliquam, esse assumenda eveniet. A tempora id consectetur dolorem deserunt aut.</p>',

        Portfolio:'<h3>Contenue de la page Portfolio</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam sequi explicabo soluta vero voluptatibus id repellendus commodi, error tempora aliquam, esse assumenda eveniet. A tempora id consectetur dolorem deserunt aut.</p>',

        Contacts:'<h3>Contenue de la page Contacts</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam sequi explicabo soluta vero voluptatibus id repellendus commodi, error tempora aliquam, esse assumenda eveniet. A tempora id consectetur dolorem deserunt aut.</p>'
    }

    // Sélectionner le header et le mettre dans une variable
    var myHeader = $('header');

    //  Générer une balise h1 dans le header avec le contenue de la variable siteTitle
    myHeader.append('<h1>' + siteTitle + '</h1>');

    // Générer une balise nav + ul dans le header
    myHeader.append('<nav><ul></ul></nav>');

    // Faire une boucle for(){...} sur myNav pour générer les liens de la nav
    for(var i=0; i<myNav.length; i++){

        // Générer les balises html
        $('ul').append('<li><a href="' + myNav[i] + '">' + myNav[i] + '</a></i>');
    };

    // Afficher dans le main le titre issu de l'objet myTitles
    var myMain = $('main');
    myMain.append('<h2>' + myTitlesPage.Accueil + '</h2>');
    myMain.append('<section>' + myContent.Accueil + '</section>')

    //  Capter l'événement click sur la balise a en bloquant le comportemennt naturel des balise a
    $('a').click(function(evt){
        // Bloquer le comportement naturel de al balise
        evt.preventDefault();

        // Connaitre l'occurence de la balise a sur laquelle l'utilisateur à cliqué
        console.log($(this));

        // Récupérer la valeur de l'attribut href
        console.log($(this).attr('href'));

        // Vérifier la valeur de l'attribut href pour afficjer le bon titre
        if($(this).attr('href') == 'Accueil'){

            // Sélectionner la balise h2 pour changer son contenu texte
            $('h2').text(myTitlesPage.Accueil);

            // Sélectionner la balise section pour changer son contenu html
            $('section').html(myContent.Accueil);
        }

        else if($(this).attr('href') == 'Portfolio'){
            // Sélectionner la balise h2 pour changer son contenu texte
            $('h2').text(myTitlesPage.Portfolio);

            // Sélectionner la balise section pour changer son contenu html
            $('section').html(myContent.Portfolio);
        }

        else{
            // Sélectionner la balise h2 pour changer son contenu texte
            $('h2').text(myTitlesPage.Contacts);
            
            // Sélectionner la balise section pour changer son contenu html
            $('section').html(myContent.Contacts);
        }

    });


}); // Fin de la fonction de Chargement du DOM