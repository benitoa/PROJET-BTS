<?php
session_start ();
include 'fonction.php';
include 'connect.php';
?>
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
					<li><a style="color: #FA9F01;" href="ajouter.php">Ajouter</a></li>
					<li><a href="supprimer.php">Supprimer</a></li>
					<li><a href="liste.php">Liste d'élève</a></li>
					<li><a href="modifier.php">Modifier</a></li>
					<li><a  style="color: #FA9F01;"href="">Statistique</a>
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

		<section>

			<form method="post" action="" id="bus">

			<!-- Tableau obligatoire ! C'est lui qui contiendra le calendrier ! -->
			<table class="ds_box" cellpadding="0" cellspacing="0"
				id="ds_conclass" style="display: none;">
				<tr>
					<td id="ds_calclass"></td>
				</tr>
			</table>

			
				<!-- Les champs texte avec le code "onclick" d�clenchant le script -->
				La date<input type="text" name="date" onclick="ds_sh(this);" /> 
				
<p>
					<label for="periode">Matin ou Soir ?</label><br /> <select
						name="periode" id="periode">

						<option value="Matin">Matin</option>

						<option value="Soir">Soir</option>

					</select>


				</p>
				<!--  <p>

					<label for="circuit">Quel tour</label><br /> <select name="circuit"
						id="circuit">

						<option value="120">Tour 1 Langevin</option>
						<option value="300">Tour 2 Langevin</option>
						<option value="123">Tour 1 SOIR Langevin</option>

						<option value="400">Tour 1 (CAR 1) Vert Galant</option>
						<option value="560">Tour 1 (CAR 2) Vert Galant</option>

						<option value="450">Tour 1 (CAR 1) SOIR Vert Galant</option>
						<option value="600">Tour 1 (CAR 2) SOIR Vert Galant</option>


					</select>

				</p>-->
				<input type="submit" name="valider" value="Valider" /><br>
			</form>


<?php

if (isset ( $_POST ['valider'] )) {
	$d=$_POST['date'];
	$date = explode ( "/", $d );
	// echo $date [0]; // jour
	// echo $date [1]; // mois
	// echo $date [2]; // annee
	$j=$date [0];
	echo '	<table id="tableauBus"><th>Période</th><th>Circuit</th><th>Place utiliser</th>';

	$mois = connaitreMois ( $date [1] );
	$p = $_POST ['periode'];
	
	switch ($p) {
		case 'Matin' :
			$periode=10;
			
				$nb=statistique($date [1], $tata=1, $toto=2, $titi=0,$periode,$j);
				echo '	
						<tr><td>' . $p . " : " . $d . '</td><td> Tour 1 Langevin </td><td>' . $nb . '</td></tr>';
				
				$nb=statistique($date [1], $tata=3, $toto=0, $titi=0,$periode,$j);
				echo '
						<tr><td>' . $p . " : " . $d . '</td><td> Tour 2 Langevin </td><td>' . $nb . '</td></tr>';
				
				$nb=statistique($date [1], $tata=4, $toto=0, $titi=0,$periode,$j);
				echo '
						<tr><td>' . $p . " : " .$d . '</td><td> Tour 1 (CAR 1) Vert Galant </td><td>' . $nb . '</td></tr>';
				
					
				$nb=statistique($date [1], $tata=5, $toto=6, $titi=0,$periode,$j);
				echo '
						<tr><td>' . $p . " : " . $d . '</td><td> Tour 1 (CAR 2) Vert Galant </td><td>' . $nb . '</td></tr>';
				
				break;
		case 'Soir' :
			
$periode=15;
			
				$nb=statistiqueSoir($date [1], $tata=1, $toto=2, $titi=3,$periode,$j);
				echo '	
						<tr><td>' . $p . " : " . $d . '</td><td> Tour 1 SOIR Langevin </td><td>' . $nb . '</td></tr>';
				
				$nb=statistiqueSoir($date [1], $tata=4, $toto=5, $titi=0,$periode,$j);
				echo '
						<tr><td>' . $p . " : " . $d . '</td><td> Tour 1 (CAR 1) SOIR Vert Galant</td><td>' . $nb . '</td></tr>';
				
				$nb=statistiqueSoir($date [1], $tata=4, $toto=0, $titi=0,$periode,$j);
				echo '
						<tr><td>' . $p . " : " . $d . '</td><td> Tour 1 (CAR 2) SOIR Vert Galant </td><td>' . $nb . '</td></tr>';
				
					
	
			break;
	}
} 
	
	?>
		</section>

	</div>

</body>
</html>