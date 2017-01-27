<?php
session_start ();
include 'connect.php';
// connaitre le nombre total eleve dans la bdd
$i=0;
$reponse = $connect->query ( 'SELECT ideleves FROM eleves' );
// On affiche chaque entr�e une � une
while ( $donnees = $reponse->fetch () ) {
	$id[$i]=$donnees['ideleves'];
	$i++;
}
$result = count ( $id );
//une boucle for pour selectionner le nom et prenom de l'eleve par rapport l'id
for($i = 0; $i<$result; $i ++) {
	//on incremente de +1 le id 
	//requete sql pour selectionner le nom et prenom dans la base de donner eleves
	$reponse = $connect->query ( 'SELECT * FROM eleves WHERE ideleves=' . $id[$i] . ';' );
	// On affiche chaque entr�e une � une
	while ( $donnes = $reponse->fetch () ) {
		
		//en entre les information selectionner dans un tableau et ce tableau sera stocker dans le tableau eleve
		$eleve [] = array (
				"nom" => $donnes ['nom'],
				"prenom" => $donnes ['prenom'],
				"qr_code" => $donnes ['QR_code'],
				"arret"=>$donnes['arret_idarret'],
				"responsable_legal"=>$donnes['responsable_legal'],
				"numero_tel_rl"=>$donnes['numero_tel_rl'],
				"lien_parente"=>$donnes['lien_parente'],
				"responsable_legal2"=>$donnes['responsable_legal2'],
				"lien_parente2"=>$donnes['lien_parente2'],
				"numero_tel_rl2"=>$donnes['numero_tel_rl2']
				
		);
	
	}
}
$reponse->closeCursor (); // Termine le traitement de la requ�te
//on reprensente le tableau $eleve en syntaxe json 
$json = json_encode ( $eleve );
//on ouvre le fichier tablette.json.Grace � a+ si le fichier n'existe pas il sera cr�e
$monfichier = fopen ( 'ramastop/mise_a_jour/liste_enfant.json', 'a+' );
//on supprime le contenue du fichier si il exister
ftruncate($monfichier,0); // �crase le contenu du fichier
//on ajoute le tableau eleve en json dans le fichier
fputs ( $monfichier, $json );
//on ferme le fichier json
fclose ( $monfichier );
?>
<script>alert("<?php echo 'Creation du fichier json reussi'?>")</script>
<?php

$reponse->closeCursor (); // Termine le traitement de la requ�te
?>

