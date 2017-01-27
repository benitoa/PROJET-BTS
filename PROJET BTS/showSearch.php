<?php
session_start();
include 'connect.php';
if(isset($_POST['lien'])&&!empty($_POST['lien'])){

	$lien=mysql_real_escape_string(htmlentities($_POST['lien']));

	$lien = explode ( " ", $lien );
	//echo $lien [0]; // nom
	//echo $lien [1]; // prenom

	
	$result = $connect->query ( "SELECT * FROM eleves WHERE nom='$lien[0]'&&prenom='$lien[1]'" );
	
	while( $row = $result->fetch () ) {
		echo"<li><a href=''>".$row['nom']." ".$row['QR_code']."</a></li>";
		// on selectionner tous les information de l'eleve a l ideleves correspondant
		$reponse = $connect->prepare ( 'SELECT * FROM eleves WHERE QR_code=?' );
		$reponse->execute ( array (
				$_SESSION['qr']=$row['QR_code']
		) );
		// echo "bonjour";
		while ( $donnees = $reponse->fetch () ) {
		
			?>
			<!--Formulaire avec les champs pr�remplis-->
					<form action="modifier_post.php" method="post" id="modif_article">
						<p>
							<!-- on affiche les information pour modifier -->
		
							<!--  <label for="ID">ID</label><br /> <input type="text" name="ID"
								value="<?php// echo $donnees['ID'];?>" tabindex="20" /><br />-->
		
							<label for="nom">Nom</label><br /> <input type="text" name="nom"
								value="<?php echo $donnees['nom'];?>" /><br /> <label for="prenom">Prenom</label><br />
							<input type="text" name="prenom"
								value="<?php echo $donnees['prenom'];?>" /><br /> <label
								for="arret">Arret</label><br /> <input type="text" name="arret"
								value="<?php echo $donnees['prenom'];?>" /><br /> <label
								for="ecole">Ecole</label><br /> <input type="text" name="ecole"
								value="<?php echo $donnees['ecole'];?>" /><br /> <label
								for="niveau_scolaire">Niveau Scolaire</label><br /> <input type="text" name="niveau_scolaire"
								value="<?php echo $donnees['niveau_scolaire'];?>" /><br /> <input
								type="submit" name="valider" value="Modifier" />
						</p>
					</form>
		<?php
		}
		// Fin de la boucle pour l'affichage des donn�e dans la base de donn�e
		$reponse->closeCursor ();
		
	}
}

?>