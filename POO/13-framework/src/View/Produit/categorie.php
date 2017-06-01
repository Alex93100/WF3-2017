<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ma Boutique</title>
	<!-- les liens Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/shop-homepage.css" rel="stylesheet">
	<link href="css/portfolio-item.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
				
				<a class="navbar-brand" href="">Ma Boutique</a>
				
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="">Inscription</a></li>
					<li><a href="">Boutique</a></li>
					<li><a href="">Connexion</a></li>
					<li><a href="">Panier</a></li>
				</ul>
			</div>
		</div><!-- .container -->
	</nav>
	<!-- Container général DEBUT -->
	<div class="container" style="min-height: 80vh;">
		
		

		<div class="row">
			<div class="col-md-3">
				<p class="lead">Vêtements</p>
				<div class="list-group">
					<a href="?categorie=all" class="list-group-item" >Toutes les catégories</a>

					<?php foreach($categories as $categorie) : ?>

						<a href="?categorie=<?= $categorie['categorie'] ?>" class="list-group-item"><?= $categorie['categorie'] ?></a>
						
						
					<?php endforeach;  ?>
				</div>
			</div>
			
			<div class="col-md-9">
				<div class="row">
					<?php foreach ($produits AS $produit) : ?>
					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<a href=""><img src="photo/<?= $produit['photo'] ?>" width="130" height="100" ></a>
							
							<div class="caption">
								<h4 class="pull-right"><?= $produit['prix'] ?>€</h4>
								<h4><?=  $produit['titre'] ?></h4>
								<p><?=  $produit['description'] ?></p>
							</div>
				
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		
		
	</div>
	<!-- Container général FIN -->
	
	
	<div class="container">
		<hr>
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>copyright &copy; Ma Boutique - 2017</p>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>








