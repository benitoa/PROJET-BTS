<?php
include 'fonction.php';
$fichier = NULL;
if ($_FILES ['photo'] ['name'] != NULL) {
	$dossier = 'upload/';
	$fichier = basename ( $_FILES ['photo'] ['name'] );
	$taille_maxi = 100000;
	$taille = filesize ( $_FILES ['photo'] ['tmp_name'] );
	$extensions = array (
			'.png',
			'.gif',
			'.jpg',
			'.jpeg' 
	);
	$extension = strrchr ( $_FILES ['photo'] ['name'], '.' );
	// Début des vérifications de sécurité...
	if (! in_array ( $extension, $extensions )) // Si l'extension n'est pas dans le tableau
{
		$erreur = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
	}
	if ($taille > $taille_maxi) {
		$erreur = '/!\ Le fichier image est trop gros...';
	}
	if (! isset ( $erreur )) // S'il n'y a pas d'erreur, on upload
{
		move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $fichier );
	} else {
		echo $erreur;
		$fichier = NULL;
	}
}
$id=0;
$id=QR_code($id);
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
include "phpqrcode/qrlib.php";
// QRcode::png("Mon QR Code");
QRcode::png ( "{$id}", "{$_POST['nomE']}{$_POST['prenomE']}.png", "L", 4, 4 );
require ('fpdf/fpdf.php');

$pdf = new FPDF ();
$pdf->AddPage ();
// RECTO
$pdf->SetFont ( 'Arial', 'B', 12 );
$pdf->Text ( 28, 45, "VILLE DE" );
$pdf->Text ( 25, 50, "VILLEPINTE" );
$pdf->Image ( "villepinte.jpg", 60, 42, - 210 );

if ($fichier == NULL) {
	$pdf->Rect ( 75, 61, 20, 20, 'D' ); // cadre photo
	$pdf->Text ( 45, 11, $erreur );
} else {
	$pdf->Image ( 'upload/' . $fichier, 78, 61, - 190 );
} // photo

$pdf->SetFont ( 'Arial', 'B', 9 );
$pdf->Text ( 25, 55, 'Carte de ramassage scolaire ' . $_POST ['ramassage'] );
$pdf->Text ( 35, 60, 'Annee scolaire ' . $_POST ['annee'] );

$pdf->SetFont ( 'Arial', '', 8 );
$pdf->Text ( 21, 67, 'Arret : ' . $_POST ['arret'] );
$pdf->Text ( 21, 72, 'Nom : ' . $_POST ['nomE'] );
$pdf->Text ( 21, 77, 'Prenom : ' . $_POST ['prenomE'] );

if ($_POST ['Matin'] == "matin") {
	$pdf->Image ( "cocher.png", 21, 81.5, - 116 );
} else {
	$pdf->Rect ( 21, 82, 2, 2, 'D' );
}
$pdf->Text ( 26, 84, 'Matin' );
if ($_POST ['Midi'] == "midi") {
	$pdf->Image ( "cocher.png", 41, 81.5, - 116 );
} else {
	$pdf->Rect ( 41, 82, 2, 2, 'D' );
}
$pdf->Text ( 46, 84, 'Midi' );
if ($_POST ['Soir'] == "soir") {
	$pdf->Image ( "cocher.png", 61, 81.5, - 116 );
} else {
	$pdf->Rect ( 61, 82, 2, 2, 'D' );
}
$pdf->Text ( 66, 84, 'Soir' );

if ($_POST ['Mercredi'] == "mercredimidi") {
	$pdf->Image ( "cocher.png", 41, 86.5, - 116 );
} else {
	$pdf->Rect ( 41, 87, 2, 2, 'D' );
}
$pdf->Text ( 46, 89, 'Mercredi Midi' );

$pdf->SetFont ( 'Arial', '', 6 );
$pdf->Rect ( 18, 40, 82, 52, 'D' ); // contour carte
                              
// VERSO
$pdf->SetFont ( 'Arial', 'BIU', 12 );
$pdf->Text ( 112, 47, "RAMASSAGE SCOLAIRE" );
$pdf->Text ( 117, 52, $_POST ['ramassage'] );

$pdf->SetFont ( 'Arial', '', 9 );
$pdf->Text ( 103, 65, 'Ecole : ' . $_POST ['ecole'] );
$pdf->Text ( 103, 74, 'Niveau classe : ' . $_POST ['niveau'] );

if ($_POST ['Seul'] == "1") {
	$pdf->Image ( "cocher.png", 107, 81.5, - 116 );
} else {
	$pdf->Rect ( 107, 82, 2, 2, 'D' );
}
$pdf->Text ( 112, 84, 'Enfant rentre seul (elementaire)' );

$pdf->Image ( "{$_POST['nomE']}{$_POST['prenomE']}.png", 157, 60, - 170 ); // positionnement QR code
$pdf->Rect ( 100, 40, 82, 52, 'D' );

$pdf->SetFont ( 'Arial', '', 6 );
$pdf->Text ( 103, 90, 'Direction Enfance-Education - Tel 01 41 52 53 32' );

$pdf->Output ( "F","ramastop/carte/"."{$_POST['nomE']}{$_POST['prenomE']}.pdf" );

header ( 'Location:'  ."ramastop/carte/". "{$_POST['nomE']}{$_POST['prenomE']}.pdf" );
?>
