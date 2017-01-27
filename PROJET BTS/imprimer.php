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
						<ul id="menu">
							<li><a href="mensuel.php">Mensuel</a></li>
							<li><a href="individuel.php">Individuel</a></li>
							<li><a href="bus.php">Bus</a></li>
						</ul></li>
					<li><a style="color: #FA9F01;" href="imprimer.php">Imprimer</a></li>
					<li><a href="tablette.php">Mise à jour</a></li>

				</ul>
			</nav>
		</header>
		<section id="liste">
		<?php
		$nb_fichier = 0;
		echo '<ul>';
		if ($dossier = opendir ( 'ramastop/carte/' )) 

		{
			while ( false !== ($fichier = readdir ( $dossier )) ) 

			{
				if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != '.php') 

				{
					$nb_fichier ++; // On incrémente le compteur de 1
					
					echo '<li><a href="./ramastop/carte/' . $fichier . '">' . $fichier . '</a></li>';
				} // On ferme le if (qui permet de ne pas afficher index.php, etc.)
			} // On termine la boucle
			echo '</ul><br />';
			
			echo 'Il y a <strong>' . $nb_fichier . '</strong> fichier(s) dans le dossier';
			
			closedir ( $dossier );
		} 

		else
			
			echo 'Le dossier n\' a pas pu être ouvert';
		?>

		</section>

		<footer> </footer>
	</div>

</body>
</html>