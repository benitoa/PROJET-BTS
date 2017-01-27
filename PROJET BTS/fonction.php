<?php
function connaitreArret($nb) {
	switch ($nb) // on indique sur quelle variable on travaille
{
		case 'Rue Bachaga Boualam' : // dans le cas où $note vaut 0
			return $arret = 1;
			break;
		
		case 'Rue Henri Barbusse' : // dans le cas où $note vaut 5
			return $arret = 2;
			break;
		
		case 'Avenue de la Croix de l\'Aumône' : // dans le cas où $note vaut 7
			return $arret = 3;
			break;
		
		case 'Rue Léon Jouhaux / Route de Sevran' : // etc. etc.
			return $arret = 4;
			break;
		
		case 'Avenue de Villeneuve / Paul Bert' :
			return $arret = 5;
			break;
		
		case 'Avenue Vert Galant/Avenue des fougères' :
			return $arret = 6;
			break;
	}
}
function nomArret($nb) {
	switch ($nb) // on indique sur quelle variable on travaille
	{
		case 1  : // dans le cas où $note vaut 0
			return $arret = 'Rue Bachaga Boualam';
			break;

		case 2 : // dans le cas où $note vaut 5
			return $arret = 'Rue Henri Barbusse';
			break;

		case 3 : // dans le cas où $note vaut 7
			return $arret = 'Avenue de la Croix de l\'Aumône';
			break;

		case 4 : // etc. etc.
			return $arret = 'Rue Léon Jouhaux / Route de Sevran';
			break;

		case 5:
			return $arret ='Avenue de Villeneuve / Paul Bert' ;
			break;

		case 6:
			return $arret = 'Avenue Vert Galant/Avenue des fougères' ;
			break;
	}
}
function connaitreTour($numero) {
	switch ($numero) // on indique sur quelle variable on travaille
{
		case 120 : // dans le cas où $note vaut 0
			return $nomTour = "Tour 1 Langevin";
			break;
		
		case 300 : // dans le cas où $note vaut 5
			return $nomTour = "Tour 2 Langevin";
			break;
		
		case 123 : // dans le cas où $note vaut 7
			return $nomTour = "Tour 1 SOIR Langevin";
			break;
		
		case 400 : // etc. etc.
			return $nomTour = "Tour 1 (CAR 1) Vert Galant";
			break;
		
		case 560 :
			return $nomTour = "Tour 1 (CAR 2) Vert Galant";
			break;
		
		case 450 :
			return $nomTour = "Tour 1 (CAR 1) SOIR Vert Galant";
			break;
		
		case 600 :
			return $nomTour = "Tour 1 (CAR 2) SOIR Vert Galant";
			break;
	}
}
function ajouterEleve($nom, $prenom, $niveau, $ecole, $qr, $arret,$seul,$nomR,$nomR2,$numero,$numero2,$lien,$lien2) {
	include 'connect.php';
	
	// on ajoute les information dans la bdd pour creer l'eleve
	$req = $connect->prepare ( 'INSERT INTO eleves (nom,prenom,niveau_scolaire,ecole,QR_code,arret_idarret,rentre_seul,responsable_legal,lien_parente,numero_tel_rl,responsable_legal2,lien_parente2,numero_tel_rl2) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)' );
	$req->execute ( array (
			mb_strtolower ( $nom ),
			mb_strtolower ( $prenom ),
			mb_strtolower ( $niveau ),
			mb_strtolower ( $ecole ),
			mb_strtolower ( $qr ),
			$arret = connaitreArret ( $_POST ['arret'] ),
			$seul,
			mb_strtolower ($nomR),	
			mb_strtolower ($lien),  
			$numero,
			mb_strtolower ($nomR2),
			mb_strtolower ($lien2),
			$numero2
		
			
	) );
}
function connaitreMois($numero) {
	switch ($numero) // on indique sur quelle variable on travaille
{
		case 1 : // dans le cas où $note vaut 0
			return $mois = "Janvier";
			break;
		
		case 2 : // dans le cas où $note vaut 5
			return $mois = "Fevrier";
			break;
		
		case 3 : // dans le cas où $note vaut 7
			return $mois = "Mars";
			break;
		
		case 4 : // etc. etc.
			return $mois = "Avril";
			break;
		
		case 5 :
			return $mois = "Mai";
			break;
		
		case 6 :
			return $mois = "Juin";
			break;
		
		case 9 :
			return $mois = "Septembre";
			break;
		case 10 :
			return $mois = "Octobre";
			break;
		case 11 :
			return $mois = "Novembre";
			break;
		case 12 :
			return $mois = "Decembre";
			break;
	}
}
function QR_code($i){
$i = 0;
include 'connect.php';
do {
	$reponse = $connect->query ( 'SELECT * FROM eleves where QR_code=' . $i . ';' );
	
	// On affiche chaque entr�e une � une
	$row = $reponse->rowCount ();
	if($row==1){
	$i ++;}
} while ( $row !== 0 );

return $i;
}
function ajouterResponsable($nom, $prenom, $telephone,$lien,$qr) {
	include 'connect.php';

	// on ajoute les information dans la bdd pour creer l'eleve
	$req = $connect->prepare ( 'INSERT INTO responsable_legal (nom,prenom,numero,lien,QR_code) VALUES(?,?,?,?,?)' );
	$req->execute ( array (
			mb_strtolower ( $nom ),
			mb_strtolower ( $prenom ),
			mb_strtolower ( $telephone ),
			mb_strtolower ( $lien ),
			$qr,

	) );
}
function statistique($mois, $tata, $toto, $titi,$p,$j) {
	include 'connect.php';
	$reponse = $connect->prepare ( '
			SELECT count(*)
			FROM presence
			INNER JOIN eleves
			ON presence.QR_code = eleves.QR_code
			WHERE (eleves.arret_idarret = :a OR eleves.arret_idarret = :b OR eleves.arret_idarret = :c)
			AND MONTH(ramastop.presence.date) = :m  AND DAY(ramastop.presence.date) =:j AND HOUR(ramastop.presence.date) < :i' );
	
	$reponse->execute ( array (
			'm' => $mois,
			'a' => $tata,
			'b' => $toto,
			'c' => $titi,
			'i'=>$p,
			'j'=>$j
			
	) );
	
	while ( $donnees = $reponse->fetch () ) {
		$nb = $donnees ['count(*)'];
	}
	$reponse->closeCursor ();
	return $nb;
}
function statistiqueSoir($mois, $tata, $toto, $titi,$p,$j) {
	include 'connect.php';
	$reponse = $connect->prepare ( '
			SELECT count(*)
			FROM presence
			INNER JOIN eleves
			ON presence.QR_code = eleves.QR_code
			WHERE (eleves.arret_idarret = :a OR eleves.arret_idarret = :b OR eleves.arret_idarret = :c)
			AND MONTH(ramastop.presence.date) = :m  AND DAY(ramastop.presence.date) =:j AND HOUR(ramastop.presence.date) > :i' );

	$reponse->execute ( array (
			'm' => $mois,
			'a' => $tata,
			'b' => $toto,
			'c' => $titi,
			'i'=>$p,
			'j'=>$j
				
	) );

	while ( $donnees = $reponse->fetch () ) {
		$nb = $donnees ['count(*)'];
	}
	$reponse->closeCursor ();
	return $nb;
}
?>