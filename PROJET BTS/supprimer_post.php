<?php
session_start ();
include 'connect.php';

// on supprime tout concernant l'eleve a ideleves correspondant
$req = $connect->prepare ( 'DELETE FROM `eleves` WHERE QR_code =:id ' );

$req->execute ( array (
		'id' => $_POST ['qr_code'] 
) );

$req->closeCursor ();

header ( 'Location: supprimer.php' );
exit ();

?>
