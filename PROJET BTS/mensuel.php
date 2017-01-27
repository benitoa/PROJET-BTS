<?php
session_start ();
include 'fonction.php';
?>
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
					<li><a style="color: #FA9F01;" href="ajouter.php">Ajouter</a></li>
					<li><a href="supprimer.php">Supprimer</a></li>
					<li><a href="liste.php">Liste d'élève</a></li>
					<li><a href="modifier.php">Modifier</a></li>
					<li><a style="color: #FA9F01;" href="">Statistique</a>
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

		<section id="liste-enfant">
			<h1>Statistique des élèves par mois</h1>
<?php
?><form method="post">
<?php
// recuperation en variable du contenu de la liste

$choix = $_POST ['mois'];
?>

				<label>mois</label> <select name="mois">
					<option  value="1">janvier</option>
					<option <?php if($choix == '2') {echo " selected";} ?> value="2">fevrier</option>
					<option <?php if($choix == '3') {echo " selected";} ?> value="3">mars</option>
					<option <?php if($choix == '4') {echo " selected";} ?> value="4">avril</option>
					<option <?php if($choix == '5') {echo " selected";} ?> value="5">mai</option>
					<option <?php if($choix == '6') {echo " selected";} ?> value="6">juin</option>
					<option <?php if($choix == '9') {echo " selected";} ?> value="9">septembre</option>
					<option <?php if($choix == '10') {echo " selected";} ?> value="10">octobre</option>
					<option <?php if($choix == '11') {echo " selected";} ?> value="11">novembre</option>
					<option <?php if($choix == '12') {echo " selected";} ?> value="12">decembre</option>
				</select><input type="submit" name="valider" value="Ajouter" />
			</form>

<?php
include 'connect.php';
if (isset ( $_POST ['valider'] )) {
	$choix = $_POST ['mois'];
	$mois = connaitreMois ( $_POST ['mois'] );
	?>
	 <table id="listeE">
				<tr>
					<th>nom</th>
					<th>nombre de presence en <?php echo $mois;?> </th>
				</tr>
			</table>
		<?php
		$i=0;
$reponse = $connect->query ( 'SELECT ideleves FROM eleves ORDER BY nom DESC' );
// On affiche chaque entr�e une � une
while ( $donnees = $reponse->fetch () ) {
	$id[$i]=$donnees['ideleves'];
	$i++;
}
$result = count ( $id );
//une boucle for pour selectionner le nom et prenom de l'eleve par rapport l'id
for($i = 0; $i<$result; $i ++) {
		$reponse = $connect->query ( 'SELECT * FROM eleves WHERE ideleves=' . $id[$i] . '' );
		
		while ( $donnees = $reponse->fetch () ) {
			?>

<table id="listeE">
				<tr>
					<td><?php echo $donnees ['nom'];?></td>

			<?php
			
			$reponse = $connect->prepare ( 'SELECT count(*) FROM ramastop.presence
							WHERE month(ramastop.presence.date)=?
							 AND QR_code=?' );
			$reponse->execute ( array (
					$_POST ['mois'],
					$donnees ['QR_code'] 
			) );
			// On affiche chaque entr�e une � une
			while ( $row = $reponse->fetch () ) {
				?>
				    <td><?php echo $row ['count(*)']?></td>
				</tr>
			</table>
<?php
			}
		}
	}
}
?>
	
		</section>

	</div>

</body>
</html>