<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>SalleA</title>

        <!-- Les liens Bootstrap -->
        <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/bootstrap.min.css'; ?>">

        <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/shop-homepage.css'; ?>">

        <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/portfolio-item.css'; ?>">
        
        <script src="<?php echo RACINE_SITE . 'inc/js/jquery.js'; ?>"></script>

        <script src="<?php echo RACINE_SITE . 'inc/js/bootstrap.min.js'; ?>"></script>
        
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
            
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>     
                    </button>
        

                    <a class="navbar-brand" href="<?php echo RACINE_SITE . 'accueil.php'; ?>">SalleA</a>

                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        echo '<li><a href="'. RACINE_SITE .'informations.php">Qui sommes-nous</a></li>';                        
                        echo '<li><a href="'. RACINE_SITE .'contact.php">Contact</a></li>';
                        
                        if(internauteEstConnecte()) {  // si membre est connecté
                            echo '<ul class="nav navbar-nav navbar-right">
        
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Espace membre <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Mon compte</a></li>
                                    <li><a href="#">Mes commandes</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="'. RACINE_SITE .'admin/connexion.php">Se déconnecter</a></li>
                                </ul>
                                </li>
                            </ul>';      
                            echo '<li><a href="'. RACINE_SITE .'profil.php">Profil</a></li>';
                        } elseif (internauteEstConnecteEtEstAdmin()) {    // Menu admin
                            echo '<ul class="nav navbar-nav navbar-right">
            
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Espace membre <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="'. RACINE_SITE .'admin/gestion_salles.php">Gestion des salles</a></li>
                                        <li><a href="'. RACINE_SITE .'admin/gestion_produits.php">Gestion des produits</a></li>
                                        <li><a href="'. RACINE_SITE .'admin/gestion_membres.php">Gestion des membres</a></li>
                                        <li><a href="'. RACINE_SITE .'admin/gestion_avis.php">Gestion des avis</a></li>
                                        <li><a href="'. RACINE_SITE .'admin/gestion_commandes.php">Gestion des commandes</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="'. RACINE_SITE .'admin/connexion.php">Se déconnecter</a></li>
                                    </ul>
                                    </li>
                                </ul>';             
  
                        } else {  // sinon s'il n'est pas connecté
                            echo '<li><a href="'. RACINE_SITE .'connexion.php">Connexion</a></li>';
                        }
                                   
                        ?>
                    </ul>
                </div>
            </div><!-- .container -->
        </nav>

        <div class="container" style="min-height: 80vh;">
            <!-- ici il y a le contenu spécifique de chaque page -->
      