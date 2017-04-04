// Demande du DOM
$(document).ready(function(){
    
    // Fonction fadeOut()
    $('section').eq(0).children('button').click(function(){

        $('section').eq(0).children('article').fadeOut(500);

    });

    // Fonction fadeIn()
    $('section').eq(1).children('button').click(function(){

        $('section').eq(1).children('article').fadeIn(500);

    });

    // Fonction fadeToggle()
    $('section').eq(2).children('button').click(function(){

        $('section').eq(2).children('article').fadeToggle();

    });

    // Fonction slideUp()
    $('section').eq(3).children('button').click(function(){

        $('section').eq(3).children('article').slideUp(1000);

    });

    // Fonction slideDown()
    $('section').eq(4).children('button').click(function(){

        $('section').eq(4).children('article').slideDown(1000);

    });

    // Fonction slideToggle()
    $('section').eq(5).children('button').click(function(){

        $('section').eq(5).children('article').slideToggle(1000);

    });

}); // Fin de la demande du chargement du DOM