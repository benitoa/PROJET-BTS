<?php
session_start ();
include 'fonction.php';
// echo $_SESSION['valeur'];
// header('Location:formtab.php');
// if ($_SESSION['valeur']>3){
// $_SESSION['valeur']=0;
// }
// $i=0;

switch ($_SESSION ['valeur']) {
	
	case 0 :
		$_SESSION ['montableau'] [0] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [0] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [0] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [0] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [0] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [0] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [0] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [0] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [0] [8] = NULL;
		$_SESSION ['montableau'] [0] [9] = $_POST ['nom'];
		$_SESSION ['montableau'] [0] [10] = $_POST ['Matin'];
		$_SESSION ['montableau'] [0] [11] = $_POST ['Midi'];
		$_SESSION ['montableau'] [0] [12] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [0] [13] = $_POST ['Soir'];
		$_SESSION ['montableau'] [0] [14] = $_POST ['Seul'];
		
		
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [0] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi = 100000;
			$taille = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
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
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [0] [8] );
			} else {
				$_SESSION ['erreur'] [0] = $erreur;
				$_SESSION ['montableau'] [0] [8] = NULL;
			}
		}
		
		header ( 'Location:formtab.php' );
		// for ($i=0;$i<8;$i++)
		// {
		// echo $_SESSION['montableau'][0][$i].'</br>';
		// }
		
		$_SESSION ['valeur'] ++;
		break;
	
	case 1 :
		$_SESSION ['montableau'] [1] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [1] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [1] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [1] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [1] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [1] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [1] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [1] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [1] [9] = $_POST ['Matin'];
		$_SESSION ['montableau'] [1] [10] = $_POST ['Midi'];
		$_SESSION ['montableau'] [1] [11] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [1] [12] = $_POST ['Soir'];
		$_SESSION ['montableau'] [1] [13] = $_POST ['Seul'];
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		$_SESSION ['montableau'] [1] [8] = NULL;
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [1] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi1 = 100000;
			$taille1 = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions1 = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
					'.jpeg' 
			);
			$extension1 = strrchr ( $_FILES ['photo'] ['name'], '.' );
			// Début des vérifications de sécurité...
			if (! in_array ( $extension1, $extensions1 )) // Si l'extension n'est pas dans le tableau
{
				$erreur1 = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
			}
			if ($taille1 > $taille_maxi1) {
				$erreur1 = '/!\ Le fichier image est trop gros...';
			}
			if (! isset ( $erreur1 )) // S'il n'y a pas d'erreur, on upload
{
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [1] [8] );
			} else {
				$_SESSION ['erreur'] [1] = $erreur1;
				$_SESSION ['montableau'] [1] [8] = NULL;
			}
		}
		
		$_SESSION ['valeur'] ++;
		break;
}

if ($_SESSION ['valeur'] > 1) {
	$_SESSION ['valeur'] = 0;
	
	include "phpqrcode/qrlib.php";
	
	// QR CODE CARTE 1
	QRcode::png ( "{$_SESSION['montableau'][0][6]}", "{$_SESSION['montableau'][0][6]}.png", "L", 4, 4 );
	require ('fpdf/fpdf.php');
	
	$pdf = new FPDF ();
	$pdf->AddPage ();
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 45, "VILLE DE" );
	$pdf->Text ( 25, 50, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 42, - 210 );
	
	if ($_SESSION ['montableau'] [0] [8] == NULL) {
		$pdf->Rect ( 75, 61, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 5, $_SESSION ['erreur'] [0] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [0] [8], 78, 61, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 55, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [0] [7] );
	$pdf->Text ( 35, 60, 'Annee scolaire ' . $_SESSION ['montableau'] [0] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 67, 'Arret : ' . $_SESSION ['montableau'] [0] [2] );
	$pdf->Text ( 21, 72, 'Nom : ' . $_SESSION ['montableau'] [0] [0] );
	$pdf->Text ( 21, 77, 'Prenom : ' . $_SESSION ['montableau'] [0] [1] );
	
	if ($_SESSION ['montableau'] [0] [10] == "matin") {
		$pdf->Image ( "cocher.png", 21, 81.5, - 116 );
	} else {
		$pdf->Rect ( 21, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 84, 'Matin' );
	if ($_SESSION ['montableau'] [0] [11] == "midi") {
		$pdf->Image ( "cocher.png", 41, 81.5, - 116 );
	} else {
		$pdf->Rect ( 41, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 84, 'Midi' );
	
	if ($_SESSION ['montableau'] [0] [12] == "mercredimidi") {
		$pdf->Image ( "cocher.png", 41, 86.5, - 116 );
	} else {
		$pdf->Rect ( 41, 87, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 89, 'Mercredi midi' );
	
	if ($_SESSION ['montableau'] [0] [13] == "soir") {
		$pdf->Image ( "cocher.png", 61, 81.5, - 116 );
	} else {
		$pdf->Rect ( 61, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 84, 'Soir' );
	
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Rect ( 18, 40, 82, 52, 'D' ); // contour carte
	                                    
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 47, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 52, $_SESSION ['montableau'] [0] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 65, 'Ecole : ' . $_SESSION ['montableau'] [0] [3] );
	$pdf->Text ( 103, 74, 'Niveau classe : ' . $_SESSION ['montableau'] [0] [4] );
	
	if ($_SESSION ['montableau'] [0] [14] == "1") {
		$pdf->Image ( "cocher.png", 107, 81.5, - 116 );
	} else {
		$pdf->Rect ( 107, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 84, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][0][6]}.png", 157, 60, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 40, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 90, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	// QR CODE CARTE 2
	QRcode::png ( "{$_SESSION['montableau'][1][6]}", "{$_SESSION['montableau'][1][6]}.png", "L", 4, 4 );
	
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 105, "VILLE DE" );
	$pdf->Text ( 25, 110, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 102, - 210 );
	
	if ($_SESSION ['montableau'] [1] [8] == NULL) {
		$pdf->Rect ( 75, 121, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 10, $_SESSION ['erreur'] [1] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [1] [8], 78, 121, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 115, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [1] [7] );
	$pdf->Text ( 35, 120, 'Annee scolaire ' . $_SESSION ['montableau'] [1] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 127, 'Arret : ' . $_SESSION ['montableau'] [1] [2] );
	$pdf->Text ( 21, 132, 'Nom : ' . $_SESSION ['montableau'] [1] [0] );
	$pdf->Text ( 21, 137, 'Prenom : ' . $_SESSION ['montableau'] [1] [1] );
	
	if ($_SESSION ['montableau'] [1] [9] == "matin") {
		$pdf->Image ( "cocher.png", 21, 141.5, - 116 );
	} else {
		$pdf->Rect ( 21, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 144, 'Matin' );
	if ($_SESSION ['montableau'] [1] [10] == "midi") {
		$pdf->Image ( "cocher.png", 41, 141.5, - 116 );
	} else {
		$pdf->Rect ( 41, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 144, 'Midi' );
	if ($_SESSION ['montableau'] [1] [11] == "mercredimidimidi") {
		$pdf->Image ( "cocher.png", 41, 146.5, - 116 );
	} else {
		$pdf->Rect ( 41, 147, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 149, 'Mercredi midi' );
	
	if ($_SESSION ['montableau'] [1] [12] == "soir") {
		$pdf->Image ( "cocher.png", 61, 141.5, - 116 );
	} else {
		$pdf->Rect ( 61, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 144, 'Soir' );
	
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Rect ( 18, 100, 82, 52, 'D' ); // contour carte
	                                     
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 107, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 112, $_SESSION ['montableau'] [1] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 125, 'Ecole : ' . $_SESSION ['montableau'] [1] [3] );
	$pdf->Text ( 103, 134, 'Niveau classe : ' . $_SESSION ['montableau'] [1] [4] );
	
	if ($_SESSION ['montableau'] [1] [13] == "1") {
		$pdf->Image ( "cocher.png", 107, 141.5, - 116 );
	} else {
		$pdf->Rect ( 107, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 144, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][1][6]}.png", 157, 120, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 100, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 150, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	$pdf->Output ( "F", "ramastop/carte/". "{$_SESSION['montableau'][0][9]}.pdf" );
	header ( 'Location:' ."ramastop/carte/". "{$_SESSION['montableau'][0][9]}.pdf" );
	
	session_destroy ();
}
?>
