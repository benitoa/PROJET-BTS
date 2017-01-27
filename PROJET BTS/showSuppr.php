<?php
session_start ();
include 'connect.php';
if (isset ( $_POST ['lien'] ) && ! empty ( $_POST ['lien'] )) {
	
	$lien = mysql_real_escape_string ( htmlentities ( $_POST ['lien'] ) );
	
	$lien = explode ( " ", $lien );
	// echo $lien [0]; // nom
	// echo $lien [1]; // prenom
	
	$result = $connect->query ( "SELECT * FROM eleves WHERE nom='$lien[0]'&&prenom='$lien[1]'" );
	
	while ( $row = $result->fetch () ) {
		echo "<li><a href=''>" . $row ['nom'] . " " . $row ['QR_code'] . "</a></li>";
		// on selectionner tous les information de l'eleve a l ideleves correspondant
		$reponse = $connect->prepare ( 'SELECT * FROM eleves WHERE QR_code=?' );
		$reponse->execute ( array (
				$row ['QR_code'] 
		) );
		
		while ( $donnees = $reponse->fetch () ) {
			?>
<!--Formulaire avec les champs pr�remplis-->
<form action="supprimer_post.php" method="post" id="modif_article">
	<p>
		<!-- on affiche les information pour ensuite confirmer la suppression -->
					<?php echo 'Nom: '.$donnees['nom'];?><br />
					<?php echo 'Prenom: '.$donnees['prenom'];?><br /> 
					<?php echo 'Ecole: '.$donnees['ecole'];?><br />
					<?php echo 'Niveau scolaire: '.$donnees['niveau_scolaire'];?><br />
					<input type="hidden" name="qr_code" value="<?php echo $donnees['QR_code'];?>" />
					<br /> <input type="submit" name="valider" value="Supprimer" />
	</p>

</form>
<?php
		}
		$reponse->closeCursor ();
	}
}

?>