<?php
try {
		//$connect = new PDO('mysql:host=192.168.0.109;dbname=ramastop;port=3306','remote_user','toto',
		$connect = new PDO ( 'mysql:host=localhost;dbname=ramastop', 'root', '', 
		array (
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		) );
	} catch ( Exception $e ) {
		die ( 'Erreur de connexion : ' . $e->getMessage () );
	}
?>