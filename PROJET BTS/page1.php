<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />
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
					<li><a href="supprimer.php">Supprimer</a></li>
					<li><a href="liste.php">Liste d'&eacute;l&egrave;ve</a></li>
					<li><a href="modifier.php">Modifier</a></li>
					<li><a href="">Statistique</a>
						<ul>
							<li><a href="mensuel.php">Mensuel</a></li>
							<li><a href="individuel.php">Individuel</a></li>
							<li><a href="bus.php">Bus</a></li>
						</ul></li>
					<li><a href="imprimer.php">Imprimer</a></li>
					<li><a href="tablette.php">Mise à jour</a></li>

				</ul>

			</nav>
		</header>

		<section></section>

		<footer> </footer>
	</div>

</body>
</html>