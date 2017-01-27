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
					<li><a style="color: #FA9F01;" href="statistique.php">Statistique</a></li>
					<li><a href="imprimer.php">Imprimer</a></li>
					<li><a href="tablette.php">Mise à jour</a></li>
				</ul>
			</nav>
		</header>
		<section>
		<?php
		/*
		 * //fonction pour connaitre le jour par rapport a une date
		 * function getJours($datedeb,$datefin){
		 * $nb_jours=0;
		 * $dated=explode('-',$datedeb);
		 * $datef=explode('-',$datefin);
		 * $timestampcurr=mktime(0,0,0,$dated[1],$dated[2],$dated[0]);
		 * $timestampf=mktime(0,0,0,$datef[1],$datef[2],$datef[0]);
		 * while($timestampcurr<$timestampf){
		 *
		 * if((date('w',$timestampcurr)!=0)&&(date('w',$timestampcurr)!=6)){
		 * $nb_jours++;
		 * }
		 * $timestampcurr=mktime(0,0,0,date('m',$timestampcurr),(date('d',$timestampcurr)+1) ,date('Y',$timestampcurr));
		 *
		 * }
		 * return $nb_jours;
		 * }
		 * echo getJours('2016-01-04','2016-01-15');
		 */
		
		try {
				//$bdd = new PDO('mysql:host=192.168.0.109;dbname=ramastop;port=3306','remote_user','toto',
	$bdd = new PDO('mysql:host=localhost;dbname=ramastop','root','', array (
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
			) );
		} catch ( Exception $e ) {
			die ( 'Erreur de connexion : ' . $e->getMessage () );
		}
		
		// On r�cup�re tout le contenu de la table
		// connaitre le nombre total eleve dans ls bdd
		$reponse = $bdd->query ( 'SELECT * FROM eleves;' );
		// On affiche chaque entr�e une � une
		while ( $donnes = $reponse->fetch () ) {
			?>
				<br /><?php echo $donnes['nom']; ?><br /> <a
				href="stats.php?QR_code=<?php echo $donnes['QR_code']; ?>">Voire les statistique</a><br />
				<!-- on fait passer l'id de l'eleve selectionner par metode get dans la page suppr.php -->
			<?php
		}
		$reponse->closeCursor (); // Termine le traitement de la requ�te
		
		?>
		</section>
		<footer> </footer>
	</div>
</body>
</html>