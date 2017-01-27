<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="style2.css" />
<title>Ramassage Scolaire</title>
</head>
<body>
	<div id="rose">
		<!--ligne rose-->
	</div>
	<div id="bleu">
		<!--ligne rose-->
	</div>
	<div id="page">
		<header>
			<div id="image">
				<!--image de villepinte-->
				<img src="image/villepinte.png" width=230 height=120
					alt="Villepinte" />
				
			</div>
			<nav>
				<!--le menu-->
				<ul id="barre">
					<li><a href="ajouter.php">Ajouter</a></li>
					<li><a style="color: #FA9F01;" href="supprimer.php">Supprimer</a></li>
					<li><a href="liste.php">Liste d'&eacute;l&egrave;ve</a></li>
					<li><a href="modifier.php">Modifier</a></li>
					<li><a href="">Statistique</a>
						<ul id="menu">
							<li><a href="mensuel.php">Mensuel</a></li>
							<li><a href="individuel.php">Individuel</a></li>
							<li><a href="bus.php">Bus</a></li>
						</ul></li>
					<li><a href="imprimer.php">Imprimer</a></li>
					<li><a href="tablette.php">Mise à jour</a></li>
				</ul>
			</nav>
		</header>
		<section id="liste">

			<h1>Veuillez saisir le nom et prenom de l'élève</h1>
			<form method="POST" action="">
				<p>
					<input type="text" name="search" id="search" />
				<p>
			</form>
			<div id="resultat">
				<ul>
				</ul>
			</div>
			<div id="load">
				<img src="load2.GIF" alt="loader" />
			</div>

			<div id="feedback"></div>
			<script src="jQuery.js"></script>
			<script src="funcSuppr.js"></script>
		</section>
		
		<footer> </footer>
	</div>
</body>
</html>