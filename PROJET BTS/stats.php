<?php session_start(); 
include 'connect.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="calendrier.js"></script>
<link rel="stylesheet" media="screen" type="text/css" title="Design"
	href="design.css" />
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
		<section>
<?php
$qr=$_SESSION['id'];
$reponse = $connect->prepare ( 'SELECT * FROM eleves WHERE QR_code=?');
$reponse->execute ( array (
		$qr 
) );
// On affiche chaque entr�e une � une
while ( $donnees = $reponse->fetch () ) {
	?><h1 id="stat"><?php echo $donnees['nom'].' '.$donnees['prenom'];?> </h1><?php 
	
}?>
			<!-- Tableau obligatoire ! C'est lui qui contiendra le calendrier ! -->
			<table class="ds_box" cellpadding="0" cellspacing="0"
				id="ds_conclass" style="display: none;">
				<tr>
					<td id="ds_calclass"></td>
				</tr>
			</table>

			<form name="inscription" method="post">
				<!-- Les champs texte avec le code "onclick" d�clenchant le script -->
				<input type="text" name="date" onclick="ds_sh(this);" /> <input
					type="submit" name="ok" value="valider" />
			</form>
		
<?php


if(isset($_POST['ok']) ){
$d = $_POST ['date'];
$date = explode ( "/", $d );
// echo $date [0]; // jour
// echo $date [1]; // mois
// echo $date [2]; // annee

// On r�cup�re tout le contenu de la table

$reponse = $connect->prepare ( 'SELECT count(*) FROM ramastop.presence
							WHERE month(ramastop.presence.date)= ?
							 AND QR_code=?' );
$reponse->execute ( array (
		$date [1],
		$qr
) );
// On affiche chaque entr�e une � une
while ( $donnees = $reponse->fetch () ) {
	?>
	<table id="listeE">
				<tr>
					<th>Nombre de presence par mois</th>
					<th>Taux de presence mois (20 jours ouvrees)</th>
				</tr>
				<tr>
					<td><?php echo $donnees ['count(*)'];?></td>		
<?php
	$a = 20;
	$b = ($donnees ['count(*)'] / $a) * 100;
	?>
		<td><?php echo $b;?>%</td>
				</tr>
			</table>
			<br>
	<?php
}
$reponse = $connect->prepare ( 'SELECT count(*) FROM ramastop.presence
							WHERE month(ramastop.presence.date)= ?
							 AND QR_code=? AND day(ramastop.presence.date)=?' );
$reponse->execute ( array (
		$date [1],
		$qr ,
		$date [0] 
) );
// On affiche chaque entr�e une � une
while ( $donnees = $reponse->fetch () ) {
	?>
	<table id="listeE">
				<tr>
					<th>Presence le <?php echo $d?> </th>
					<th>Apres-midi</th>
					<th>Matin</th>
				</tr>
				<tr>
					<td><?php echo $donnees ['count(*)'];?></td>	
	<?php
	$reponse = $connect->prepare ( 'SELECT count(*) FROM ramastop.presence
							WHERE month(ramastop.presence.date)= ?
							 AND QR_code=? AND day(ramastop.presence.date)=?AND hour(ramastop.presence.date)>10 ' );
	$reponse->execute ( array (
			$date [1],
			$qr ,
			$date [0] 
	) );
	// On affiche chaque entr�e une � une
	while ( $donnees = $reponse->fetch () ) {
		?>
						<td><?php echo $donnees ['count(*)'];?></td>	
		<?php
	}
}
$reponse = $connect->prepare ( 'SELECT count(*) FROM ramastop.presence
							WHERE month(ramastop.presence.date)= ?
							 AND QR_code=? AND day(ramastop.presence.date)=?AND hour(ramastop.presence.date)<10 ' );
$reponse->execute ( array (
		$date [1],
		$qr ,
		$date [0] 
) );
// On affiche chaque entr�e une � une
while ( $donnees = $reponse->fetch () ) {
	?>
	
					<td><?php echo $donnees ['count(*)'];?></td>
				</tr>
			
	<?php
}
$reponse->closeCursor (); // Termine le traitement de la requ�te
}
?>
			</table>
		</section>
		<footer> </footer>
	</div>
</body>
</html>