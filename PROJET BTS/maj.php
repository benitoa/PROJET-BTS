<?php
include 'connect.php';
session_start ();

$monfichier = "ramastop/carte/liste_date.json";

// on verifie si le fichier existe
if (file_exists ( $monfichier )) {

	// gestion du fichier json
	
	// on decode le fichier pour pouvoir le lire en php
	$json = file_get_contents ( $monfichier );
	$json = json_decode ( $json );
	// on lis le variable $json comme un tableau
	
	$result = count ( $json );
	for($i = 1; $i < $result; $i ++) {
		$date = $json [$i]->{"date"};
		$QR_code = $json [$i]->{"qr_code"};
		
		$req = $connect->prepare ( 'INSERT INTO presence(date,QR_code) VALUES( ?,?)' );
		$req->execute ( array (
				mb_strtolower ( $date ),
				mb_strtolower ( $QR_code ) 
		) );
	}
	?>
<script>alert("<?php echo 'Mise a jour de la bdd reussie'?>")</script>
<?php
	 //header ( 'Location: page1.php' );
	// exit ();
} else {
	?>
<script>alert("<?php echo 'Le fichier liste_date.json n\'existe pas '?>")</script>
<?php
}
?>