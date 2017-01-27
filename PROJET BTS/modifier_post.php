<?php
include 'connect.php';
session_start ();
/* Si le champ nom est rempli */
if (isset ( $_POST ['nom'] ) !== "") {
	
	/* Ensuite si le champ prenom est rempli */
	
	if (isset ( $_POST ['prenom'] ) !== "") 

	{ // conexion bdd
		
		// modifie les info dans la bdd avec une requete preparer
		$req = $connect->prepare ( 'UPDATE eleves SET nom =:nom, prenom=:prenom WHERE QR_code =:id ' );
		
		$req->execute ( array (
				'nom' => $_POST ['nom'],
				'prenom' => $_POST ['prenom'],
				'id' => $_SESSION['qr'] 
		) );
		
		$req->closeCursor ();
	}
	// redirection quand la modification on �t� r�aliser
	header ( 'Location: modifier.php' );
	exit ();
} else {
	echo '<p>Vous n\'avez pas remplis touts les champs demand�s</p>';
}
?>
