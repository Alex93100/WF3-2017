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
		
		<div class="modal fade" id="myModal" role="dialog"> 
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					  <h4 class="modal-title">Le produit a bien été ajouté au panier </h4>
					</div>
					
					<div class="modal-body">
						<p><a href="panier.php">Voir le panier</a></p>
						<p><a href="boutique.php">Continuer ses achats</a></p>
					</div>
					
				</div>	
			</div>
	   </div>
		
		
		
		
		

		<div class="row">
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><?=  $produits['titre']  ?></h1>
				</div>
			 </div>
	
	
			<div class="col-md-8">
				<img class="img-responsive" src="photo/<?=  $produits['photo']  ?>" alt="">
			 </div>
	
			<div class="col-md-4">
				<h3>Description</h3>
				<p><?=  $produits['description']  ?></p>
				
				<h3>Détails</h3>
				<ul>
					<li>Catégorie : <?=  $produits['categorie']  ?></li>
					<li>Couleur : <?=  $produits['couleur']  ?></li>
					<li>Taille : <?=  $produits['taille']  ?></li>
				</ul>
				
				<p class="lead">Prix : <?=  $produits['prix']  ?> €</p>
				
			</div>
			

			<div class="col-md-4">
				<?php if ($produits['stock'] > 0) : ?>

					<form method="post" action="panier.php">
						<input type="hidden" name="id_produit" value="<?=  $produits['id_produit']  ?>">
						
						<select name="quantite" id="quantite" class="form-group-sm form-control-static">
							<?php for ($i = 1; $i <= $produits['stock'] && $i <= 5; $i++) :?>
								<option><?= $i ?></option>
							<?php endfor; ?>
						</select>
					
						<input type="submit" name="ajout_panier" value="ajouter au panier" class="btn" style="margin-left:10px">
					
					</form>
				<?php  else : ?>
					<p>Rupture de stock</p>
				<?php endif; ?>
			

				<br><p><a href="boutique.php?categorie=<?=  $produits['categorie']  ?>">Retour vers votre sélection</a></p>
			
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Suggestions de produits</h3>
			</div>
			
			<?php foreach($suggestions as $suggestion) : ?>
			<div class="col-sm-3">
				<a href=""><img src="photo/<?=  $suggestion['photo']  ?>" style="width:100%"></a>
				<h4><?=  $suggestion['titre']  ?></h4>
			</div>
			<?php endforeach; ?>
			
		</div>

		<script>
			$(document).ready(function(){
				// affiche la fenêtre modale :
				$("#myModal").modal("show");
			});
		</script>
		
		
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








