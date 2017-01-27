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
		
		header ( 'Location:formtab8.php' );
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
			$taille_maxi = 100000;
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
			if ($taille1 > $taille_maxi) {
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
		
		header ( 'Location:formtab8.php' );
		$_SESSION ['valeur'] ++;
		break;
	
	case 2 :
		$_SESSION ['montableau'] [2] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [2] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [2] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [2] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [2] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [2] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [2] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [2] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [2] [8] = NULL;
		$_SESSION ['montableau'] [2] [9] = $_POST ['Matin'];
		$_SESSION ['montableau'] [2] [10] = $_POST ['Midi'];
		$_SESSION ['montableau'] [2] [11] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [2] [12] = $_POST ['Soir'];
		$_SESSION ['montableau'] [2] [13] = $_POST ['Seul'];
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [2] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi = 100000;
			$taille2 = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions2 = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
					'.jpeg' 
			);
			$extension2 = strrchr ( $_FILES ['photo'] ['name'], '.' );
			// Début des vérifications de sécurité...
			if (! in_array ( $extension2, $extensions2 )) // Si l'extension n'est pas dans le tableau
{
				$erreur2 = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
			}
			if ($taille2 > $taille_maxi) {
				$erreur2 = '/!\ Le fichier image est trop gros...';
			}
			if (! isset ( $erreur2 )) // S'il n'y a pas d'erreur, on upload
{
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [2] [8] );
			} else {
				$_SESSION ['erreur'] [2] = $erreur2;
				$_SESSION ['montableau'] [2] [8] = NULL;
			}
		}
		header ( 'Location:formtab8.php' );
		$_SESSION ['valeur'] ++;
		break;
	
	case 3 :
		$_SESSION ['montableau'] [3] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [3] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [3] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [3] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [3] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [3] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [3] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [3] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [3] [8] = NULL;
		$_SESSION ['montableau'] [3] [9] = $_POST ['Matin'];
		$_SESSION ['montableau'] [3] [10] = $_POST ['Midi'];
		$_SESSION ['montableau'] [3] [11] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [3] [12] = $_POST ['Soir'];
		$_SESSION ['montableau'] [3] [13] = $_POST ['Seul'];
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [3] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi = 100000;
			$taille3 = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions3 = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
					'.jpeg' 
			);
			$extension3 = strrchr ( $_FILES ['photo'] ['name'], '.' );
			// Début des vérifications de sécurité...
			if (! in_array ( $extension3, $extensions3 )) // Si l'extension n'est pas dans le tableau
{
				$erreur3 = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
			}
			if ($taille3 > $taille_maxi) {
				$erreur3 = '/!\ Le fichier image est trop gros...';
			}
			if (! isset ( $erreur3 )) // S'il n'y a pas d'erreur, on upload
{
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [3] [8] );
			} else {
				$_SESSION ['erreur'] [3] = $erreur3;
				$_SESSION ['montableau'] [3] [8] = NULL;
			}
		}
		header ( 'Location:formtab8.php' );
		$_SESSION ['valeur'] ++;
		break;
		
			case 4 :
		$_SESSION ['montableau'] [4] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [4] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [4] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [4] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [4] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [4] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [4] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [4] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [4] [8] = NULL;
		$_SESSION ['montableau'] [4] [9] = $_POST ['Matin'];
		$_SESSION ['montableau'] [4] [10] = $_POST ['Midi'];
		$_SESSION ['montableau'] [4] [11] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [4] [12] = $_POST ['Soir'];
		$_SESSION ['montableau'] [4] [13] = $_POST ['Seul'];
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [4] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi = 100000;
			$taille4 = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions4 = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
					'.jpeg' 
			);
			$extension4 = strrchr ( $_FILES ['photo'] ['name'], '.' );
			// Début des vérifications de sécurité...
			if (! in_array ( $extension4, $extensions4 )) // Si l'extension n'est pas dans le tableau
{
				$erreur4 = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
			}
			if ($taille4 > $taille_maxi) {
				$erreur4 = '/!\ Le fichier image est trop gros...';
			}
			if (! isset ( $erreur4 )) // S'il n'y a pas d'erreur, on upload
{
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [4] [8] );
			} else {
				$_SESSION ['erreur'] [4] = $erreur4;
				$_SESSION ['montableau'] [4] [8] = NULL;
			}
		}
		
		header ( 'Location:formtab8.php' );
		// for ($i=0;$i<8;$i++)
		// {
		// echo $_SESSION['montableau'][0][$i].'</br>';
		// }
		
		$_SESSION ['valeur'] ++;
		break;
	
	case 5 :
		$_SESSION ['montableau'] [5] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [5] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [5] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [5] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [5] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [5] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [5] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [5] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [5] [9] = $_POST ['Matin'];
		$_SESSION ['montableau'] [5] [10] = $_POST ['Midi'];
		$_SESSION ['montableau'] [5] [11] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [5] [12] = $_POST ['Soir'];
		$_SESSION ['montableau'] [5] [13] = $_POST ['Seul'];
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		$_SESSION ['montableau'] [5] [8] = NULL;
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [5] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi = 100000;
			$taille5 = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions5 = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
					'.jpeg' 
			);
			$extension5 = strrchr ( $_FILES ['photo'] ['name'], '.' );
			// Début des vérifications de sécurité...
			if (! in_array ( $extension5, $extensions5 )) // Si l'extension n'est pas dans le tableau
{
				$erreur5 = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
			}
			if ($taille5 > $taille_maxi) {
				$erreur5 = '/!\ Le fichier image est trop gros...';
			}
			if (! isset ( $erreur5 )) // S'il n'y a pas d'erreur, on upload
{
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [5] [8] );
			} else {
				$_SESSION ['erreur'] [5] = $erreur5;
				$_SESSION ['montableau'] [5] [8] = NULL;
			}
		}
		
		header ( 'Location:formtab8.php' );
		$_SESSION ['valeur'] ++;
		break;
	
	case 6 :
		$_SESSION ['montableau'] [6] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [6] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [6] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [6] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [6] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [6] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [6] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [6] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [6] [8] = NULL;
		$_SESSION ['montableau'] [6] [9] = $_POST ['Matin'];
		$_SESSION ['montableau'] [6] [10] = $_POST ['Midi'];
		$_SESSION ['montableau'] [6] [11] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [6] [12] = $_POST ['Soir'];
		$_SESSION ['montableau'] [6] [13] = $_POST ['Seul'];
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [6] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi = 100000;
			$taille6 = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions6 = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
					'.jpeg' 
			);
			$extension6 = strrchr ( $_FILES ['photo'] ['name'], '.' );
			// Début des vérifications de sécurité...
			if (! in_array ( $extension6, $extensions6 )) // Si l'extension n'est pas dans le tableau
{
				$erreur6 = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
			}
			if ($taille6 > $taille_maxi) {
				$erreur6 = '/!\ Le fichier image est trop gros...';
			}
			if (! isset ( $erreur6 )) // S'il n'y a pas d'erreur, on upload
{
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [6] [8] );
			} else {
				$_SESSION ['erreur'] [6] = $erreur6;
				$_SESSION ['montableau'] [6] [8] = NULL;
			}
		}
		header ( 'Location:formtab8.php' );
		$_SESSION ['valeur'] ++;
		break;
	
	case 7 :
		$_SESSION ['montableau'] [7] [0] = $_POST ['nomE'];
		$_SESSION ['montableau'] [7] [1] = $_POST ['prenomE'];
		$_SESSION ['montableau'] [7] [2] = $_POST ['arret'];
		$_SESSION ['montableau'] [7] [3] = $_POST ['ecole'];
		$_SESSION ['montableau'] [7] [4] = $_POST ['niveau'];
		$_SESSION ['montableau'] [7] [5] = $_POST ['annee'];
		$_SESSION ['montableau'] [7] [6] = $id = QR_code ( $id );
		$_SESSION ['montableau'] [7] [7] = $_POST ['ramassage'];
		$_SESSION ['montableau'] [7] [8] = NULL;
		$_SESSION ['montableau'] [7] [9] = $_POST ['Matin'];
		$_SESSION ['montableau'] [7] [10] = $_POST ['Midi'];
		$_SESSION ['montableau'] [7] [11] = $_POST ['Mercredi'];
		$_SESSION ['montableau'] [7] [12] = $_POST ['Soir'];
		$_SESSION ['montableau'] [7] [13] = $_POST ['Seul'];
		
ajouterEleve ( $_POST ['nomE'], $_POST ['prenomE'], $_POST ['niveau'], $_POST ['ecole'], $id, $_POST ['arret'],$_POST['Seul'],$_POST['nom_responsable'],$_POST['nom_responsable2'],$_POST['numero'],$_POST['numero2'],$_POST['lien'],$_POST['lien2']);
		
		if ($_FILES ['photo'] ['name'] != NULL) {
			$dossier = 'upload/';
			$_SESSION ['montableau'] [7] [8] = basename ( $_FILES ['photo'] ['name'] );
			$taille_maxi = 100000;
			$taille7 = filesize ( $_FILES ['photo'] ['tmp_name'] );
			$extensions7 = array (
					'.png',
					'.gif',
					'.jpg',
					'.JPG',
					'.jpeg' 
			);
			$extension7 = strrchr ( $_FILES ['photo'] ['name'], '.' );
			// Début des vérifications de sécurité...
			if (! in_array ( $extension7, $extensions7 )) // Si l'extension n'est pas dans le tableau
{
				$erreur7 = '/!\ Les  photos doivent etre de type png, gif, jpg ou jpeg';
			}
			if ($taille7 > $taille_maxi) {
				$erreur7 = '/!\ Le fichier image est trop gros...';
			}
			if (! isset ( $erreur7 )) // S'il n'y a pas d'erreur, on upload
{
				move_uploaded_file ( $_FILES ['photo'] ['tmp_name'], $dossier . $_SESSION ['montableau'] [7] [8] );
			} else {
				$_SESSION ['erreur'] [7] = $erreur7;
				$_SESSION ['montableau'] [7] [8] = NULL;
			}
		}
		$_SESSION ['valeur'] ++;
		break;
}


if ($_SESSION ['valeur'] > 7) {
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
	
	if ($_SESSION['montableau'][0][10] == "matin")
	{
	$pdf->Image("cocher.png",21,81.5,-116);		
	}
	else {
	$pdf->Rect ( 21, 82, 2, 2, 'D' );
	}	
	$pdf->Text ( 26, 84, 'Matin' );
	if ($_SESSION['montableau'][0][11] == "midi")
	{
	$pdf->Image("cocher.png",41,81.5,-116);
	}
	else{
	$pdf->Rect ( 41, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 84, 'Midi' );
	
	if ($_SESSION['montableau'][0][12] == "mercredimidi")
	{
	$pdf->Image("cocher.png",41,86.5,-116);
	}
	else{
	$pdf->Rect ( 41, 87, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 89, 'Mercredi midi' );
	
	if ($_SESSION['montableau'][0][13] == "soir")
	{
	$pdf->Image("cocher.png",61,81.5,-116);
	}
	else{
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
	
	if ($_SESSION['montableau'][0][14] == "1")
	{
	$pdf->Image("cocher.png",107,81.5,-116);
	}
	else{
	$pdf->Rect ( 107, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 84, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][0][6]}.png", 157, 60, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 40, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text(103,90,'Direction Enfance-Education - Tel 01 41 52 53 32');
	
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
	
	if ($_SESSION['montableau'][1][9] == "matin"){
	$pdf->Image("cocher.png",21,141.5,-116);		
	}
	else{
	$pdf->Rect ( 21, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 144, 'Matin' );
	if ($_SESSION['montableau'][1][10] == "midi"){
	$pdf->Image("cocher.png",41,141.5,-116);	
	}
	else{
	$pdf->Rect ( 41, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 144, 'Midi' );
	if ($_SESSION['montableau'][1][11] == "mercredimidi"){
	$pdf->Image("cocher.png",41,146.5,-116);	
	}
	else{
	$pdf->Rect ( 41, 147, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 149, 'Mercredi midi' );
	
	if($_SESSION['montableau'][1][12] == "soir"){
	$pdf->Image("cocher.png",61,141.5,-116);		
	}
	else{
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
	
	if($_SESSION['montableau'][1][13] == "1"){
	$pdf->Image("cocher.png",107,141.5,-116);
	}
	else{
	$pdf->Rect ( 107, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 144, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][1][6]}.png", 157, 120, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 100, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 150, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	// CODE QR CARTE 3
	QRcode::png ( "{$_SESSION['montableau'][2][6]}", "{$_SESSION['montableau'][2][6]}.png", "L", 4, 4 );
	
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 165, "VILLE DE" );
	$pdf->Text ( 25, 170, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 162, - 210 );
	
	if ($_SESSION ['montableau'] [2] [8] == NULL) {
		$pdf->Rect ( 75, 181, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 15, $_SESSION ['erreur'] [2] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [2] [8], 78, 181, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 175, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [2] [7] );
	$pdf->Text ( 35, 180, 'Annee scolaire ' . $_SESSION ['montableau'] [2] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 187, 'Arret : ' . $_SESSION ['montableau'] [2] [2] );
	$pdf->Text ( 21, 192, 'Nom : ' . $_SESSION ['montableau'] [2] [0] );
	$pdf->Text ( 21, 197, 'Prenom : ' . $_SESSION ['montableau'] [2] [1] );
	
	if ($_SESSION['montableau'][2][9] == "matin"){
	$pdf->Image("cocher.png",21,201.5,-116);		
	}
	else{
	$pdf->Rect ( 21, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 204, 'Matin' );
	if ($_SESSION['montableau'][2][10] == "midi"){
	$pdf->Image("cocher.png",41,201.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 204, 'Midi' );
	if ($_SESSION['montableau'][2][11] == "mercredimidi"){
	$pdf->Image("cocher.png",41,206.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 207, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 209, 'Mercredi midi' );
	if ($_SESSION['montableau'][2][12] == "soir"){
	$pdf->Image("cocher.png",61,201.5,-116);		
	}
	else{
	$pdf->Rect ( 61, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 204, 'Soir' );
	

	$pdf->Rect ( 18, 160, 82, 52, 'D' ); // contour carte
	
	
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 167, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 172, $_SESSION ['montableau'] [2] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 185, 'Ecole : ' . $_SESSION ['montableau'] [2] [3] );
	$pdf->Text ( 103, 194, 'Niveau classe : ' . $_SESSION ['montableau'] [2] [4] );
	if ($_SESSION['montableau'][2][13] == "1"){
	$pdf->Image("cocher.png",112,201.5,-116);		
	}
	else{
	$pdf->Rect ( 112, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 117, 204, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][2][6]}.png", 157, 180, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 160, 82, 52, 'D' );

	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 210, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	// QR Code Carte 4
	QRcode::png ( "{$_SESSION['montableau'][3][6]}", "{$_SESSION['montableau'][3][6]}.png", "L", 4, 4 );
	
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 225, "VILLE DE" );
	$pdf->Text ( 25, 230, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 222, - 210 );
	
	if ($_SESSION ['montableau'] [3] [8] == NULL) {
		$pdf->Rect ( 75, 241, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 20, $_SESSION ['erreur'] [3] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [3] [8], 78, 241, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 235, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [3] [7] );
	$pdf->Text ( 35, 240, 'Annee scolaire ' . $_SESSION ['montableau'] [3] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 247, 'Arret : ' . $_SESSION ['montableau'] [3] [2] );
	$pdf->Text ( 21, 252, 'Nom : ' . $_SESSION ['montableau'] [3] [0] );
	$pdf->Text ( 21, 257, 'Prenom : ' . $_SESSION ['montableau'] [3] [1] );
	
	
	// $pdf->Rect ( 21, 262, 2, 2, 'D' );
	if ($_SESSION['montableau'][3][9] == "matin"){
	$pdf->Image("cocher.png",21,261.5,-116);		
	}
	else{
	$pdf->Rect ( 21, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 264, 'Matin' );
	if ($_SESSION['montableau'][3][10] == "midi"){
	$pdf->Image("cocher.png",41,261.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 264, 'Midi' );
	if ($_SESSION['montableau'][3][11] == "mercredimidi"){
	$pdf->Image("cocher.png",41,266.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 267, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 269, 'Mercredi midi' );
	
	if ($_SESSION['montableau'][3][12] == "soir"){
	$pdf->Image("cocher.png",61,261.5,-116);		
	}
	else{
	$pdf->Rect ( 61, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 264, 'Soir' );
	
	
	
	$pdf->Rect ( 18, 220, 82, 52, 'D' ); // contour carte
	
	
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 227, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 232, $_SESSION ['montableau'] [3] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 245, 'Ecole : ' . $_SESSION ['montableau'] [3] [3] );
	$pdf->Text ( 103, 254, 'Niveau classe : ' . $_SESSION ['montableau'] [3] [4] );
	
	if ($_SESSION['montableau'][3][13] == "1")
	{
	$pdf->Image("cocher.png",107,261.5,-116);
	}
	else{
	$pdf->Rect ( 107, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 264, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][3][6]}.png", 157, 240, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 220, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 270, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	//PAGE 2
	//QRcode CARTE 5 
	QRcode::png ( "{$_SESSION['montableau'][4][6]}", "{$_SESSION['montableau'][4][6]}.png", "L", 4, 4 );
	$pdf->AddPage ();
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 45, "VILLE DE" );
	$pdf->Text ( 25, 50, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 42, - 210 );
	
	if ($_SESSION ['montableau'] [4] [8] == NULL) {
		$pdf->Rect ( 75, 61, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 5, $_SESSION ['erreur'] [4] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [4] [8], 78, 61, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 55, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [4] [7] );
	$pdf->Text ( 35, 60, 'Annee scolaire ' . $_SESSION ['montableau'] [4] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 67, 'Arret : ' . $_SESSION ['montableau'] [4] [2] );
	$pdf->Text ( 21, 72, 'Nom : ' . $_SESSION ['montableau'] [4] [0] );
	$pdf->Text ( 21, 77, 'Prenom : ' . $_SESSION ['montableau'] [4] [1] );
	
	if ($_SESSION['montableau'][4][9] == "matin"){
	$pdf->Image("cocher.png",21,81.5,-116);		
	}
	else{
	$pdf->Rect ( 21, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 84, 'Matin' );
	if ($_SESSION['montableau'][4][10] == "midi"){
	$pdf->Image("cocher.png",41,81.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 84, 'Midi' );
	if ($_SESSION['montableau'][4][11] == "mercredimidi")
	{
	$pdf->Image("cocher.png",41,86.5,-116);
	}
	else{
	$pdf->Rect ( 41, 87, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 89, 'Mercredi midi' );
	
	if ($_SESSION['montableau'][4][12] == "soir"){
	$pdf->Image("cocher.png",61,81.5,-116);		
	}
	else{
	$pdf->Rect ( 61, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 84, 'Soir' );
	$pdf->Rect ( 18, 40, 82, 52, 'D' ); // contour carte
	
	
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 47, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 52, $_SESSION ['montableau'] [4] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 65, 'Ecole : ' . $_SESSION ['montableau'] [4] [3] );
	$pdf->Text ( 103, 74, 'Niveau classe : ' . $_SESSION ['montableau'] [4] [4] );
	
	if ($_SESSION['montableau'][4][13] == "1")
	{
	$pdf->Image("cocher.png",107,81.5,-116);
	}
	else{
	$pdf->Rect ( 107, 82, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 84, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][4][6]}.png", 157, 60, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 40, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text(103,90,'Direction Enfance-Education - Tel 01 41 52 53 32');
	
	// QR CODE CARTE 6
	QRcode::png ( "{$_SESSION['montableau'][5][6]}", "{$_SESSION['montableau'][5][6]}.png", "L", 4, 4 );
	
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 105, "VILLE DE" );
	$pdf->Text ( 25, 110, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 102, - 210 );
	
	if ($_SESSION ['montableau'] [5] [8] == NULL) {
		$pdf->Rect ( 75, 121, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 10, $_SESSION ['erreur'] [5] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [5] [8], 78, 121, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 115, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [5] [7] );
	$pdf->Text ( 35, 120, 'Annee scolaire ' . $_SESSION ['montableau'] [5] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 127, 'Arret : ' . $_SESSION ['montableau'] [5] [2] );
	$pdf->Text ( 21, 132, 'Nom : ' . $_SESSION ['montableau'] [5] [0] );
	$pdf->Text ( 21, 137, 'Prenom : ' . $_SESSION ['montableau'] [5] [1] );
	
if ($_SESSION['montableau'][5][9] == "matin"){
	$pdf->Image("cocher.png",21,141.5,-116);		
	}
	else{
	$pdf->Rect ( 21, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 144, 'Matin' );
	if ($_SESSION['montableau'][5][10] == "midi"){
	$pdf->Image("cocher.png",41,141.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 144, 'Midi' );
	
	if ($_SESSION['montableau'][5][11] == "mercredimidi"){
	$pdf->Image("cocher.png",41,146.5,-116);	
	}
	else{
	$pdf->Rect ( 41, 147, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 149, 'Mercredi midi' );
	
	if ($_SESSION['montableau'][5][12] == "soir"){
	$pdf->Image("cocher.png",61,141.5,-116);		
	}
	else{
	$pdf->Rect ( 61, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 144, 'Soir' );
	
	
	$pdf->Rect ( 18, 100, 82, 52, 'D' ); // contour carte

	
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 107, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 112, $_SESSION ['montableau'] [5] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 125, 'Ecole : ' . $_SESSION ['montableau'] [5] [3] );
	$pdf->Text ( 103, 134, 'Niveau classe : ' . $_SESSION ['montableau'] [5] [4] );
	
	if ($_SESSION['montableau'][5][13] == "1")
	{
	$pdf->Image("cocher.png",107,141.5,-116);
	}
	else{
	$pdf->Rect ( 107, 142, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 144, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][5][6]}.png", 157, 120, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 100, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 150, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	// CODE QR CARTE 7
	QRcode::png ( "{$_SESSION['montableau'][6][6]}", "{$_SESSION['montableau'][6][6]}.png", "L", 4, 4 );
	
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 165, "VILLE DE" );
	$pdf->Text ( 25, 170, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 162, - 210 );
	
	if ($_SESSION ['montableau'] [6] [8] == NULL) {
		$pdf->Rect ( 75, 181, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 15, $_SESSION ['erreur'] [6] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [6] [8], 78, 181, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 175, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [6] [7] );
	$pdf->Text ( 35, 180, 'Annee scolaire ' . $_SESSION ['montableau'] [6] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 187, 'Arret : ' . $_SESSION ['montableau'] [6] [2] );
	$pdf->Text ( 21, 192, 'Nom : ' . $_SESSION ['montableau'] [6] [0] );
	$pdf->Text ( 21, 197, 'Prenom : ' . $_SESSION ['montableau'] [6] [1] );
	
if ($_SESSION['montableau'][6][9] == "matin"){
	$pdf->Image("cocher.png",21,201.5,-116);		
	}
	else{
	$pdf->Rect ( 21, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 204, 'Matin' );
	if ($_SESSION['montableau'][6][10] == "midi"){
	$pdf->Image("cocher.png",41,201.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 204, 'Midi' );
	if ($_SESSION['montableau'][6][11] == "mercredimidi"){
	$pdf->Image("cocher.png",41,206.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 207, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 209, 'Mercredi midi' );
	if ($_SESSION['montableau'][6][12] == "soir"){
	$pdf->Image("cocher.png",61,201.5,-116);		
	}
	else{
	$pdf->Rect ( 61, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 204, 'Soir' );
	
	$pdf->Rect ( 18, 160, 82, 52, 'D' ); // contour carte
	
	
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 167, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 172, $_SESSION ['montableau'] [6] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 185, 'Ecole : ' . $_SESSION ['montableau'] [6] [3] );
	$pdf->Text ( 103, 194, 'Niveau classe : ' . $_SESSION ['montableau'] [6] [4] );
	
	if ($_SESSION['montableau'][6][13] == "1")
	{
	$pdf->Image("cocher.png",107,201.5,-116);
	}
	else{
	$pdf->Rect ( 107, 202, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 204, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][6][6]}.png", 157, 180, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 160, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 210, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	// QR Code Carte 8
	QRcode::png ( "{$_SESSION['montableau'][7][6]}", "{$_SESSION['montableau'][7][6]}.png", "L", 4, 4 );
	
	// RECTO
	$pdf->SetFont ( 'Arial', 'B', 12 );
	$pdf->Text ( 28, 225, "VILLE DE" );
	$pdf->Text ( 25, 230, "VILLEPINTE" );
	$pdf->Image ( "villepinte.jpg", 60, 222, - 210 );
	
	if ($_SESSION ['montableau'] [7] [8] == NULL) {
		$pdf->Rect ( 75, 241, 20, 20, 'D' ); // cadre photo
		$pdf->Text ( 45, 20, $_SESSION ['erreur'] [7] );
	} else {
		$pdf->Image ( 'upload/' . $_SESSION ['montableau'] [7] [8], 78, 241, - 190 );
	} // photo
	
	$pdf->SetFont ( 'Arial', 'B', 9 );
	$pdf->Text ( 25, 235, 'Carte de ramassage scolaire ' . $_SESSION ['montableau'] [7] [7] );
	$pdf->Text ( 35, 240, 'Annee scolaire ' . $_SESSION ['montableau'] [7] [5] );
	
	$pdf->SetFont ( 'Arial', '', 8 );
	$pdf->Text ( 21, 247, 'Arret : ' . $_SESSION ['montableau'] [7] [2] );
	$pdf->Text ( 21, 252, 'Nom : ' . $_SESSION ['montableau'] [7] [0] );
	$pdf->Text ( 21, 257, 'Prenom : ' . $_SESSION ['montableau'] [7] [1] );

if ($_SESSION['montableau'][7][9] == "matin"){
	$pdf->Image("cocher.png",21,261.5,-116);		
	}	
else{
	$pdf->Rect ( 21, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 26, 264, 'Matin' );
	if ($_SESSION['montableau'][7][10] == "midi"){
	$pdf->Image("cocher.png",41,261.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 264, 'Midi' );
	if ($_SESSION['montableau'][7][11] == "mercredimidi"){
	$pdf->Image("cocher.png",41,266.5,-116);		
	}
	else{
	$pdf->Rect ( 41, 267, 2, 2, 'D' );
	}
	$pdf->Text ( 46, 269, 'Mercredi midi' );
	if ($_SESSION['montableau'][7][12] == "soir"){
	$pdf->Image("cocher.png",61,261.5,-116);		
	}
	else{
	$pdf->Rect ( 61, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 66, 264, 'Soir' );
	
	
	$pdf->Rect ( 18, 220, 82, 52, 'D' ); // contour carte
	
	
	// VERSO
	$pdf->SetFont ( 'Arial', 'BIU', 12 );
	$pdf->Text ( 112, 227, "RAMASSAGE SCOLAIRE" );
	$pdf->Text ( 117, 232, $_SESSION ['montableau'] [7] [7] );
	
	$pdf->SetFont ( 'Arial', '', 9 );
	$pdf->Text ( 103, 245, 'Ecole : ' . $_SESSION ['montableau'] [7] [3] );
	$pdf->Text ( 103, 254, 'Niveau classe : ' . $_SESSION ['montableau'] [7] [4] );
	
	if ($_SESSION['montableau'][7][13] == "1")
	{
	$pdf->Image("cocher.png",107,261.5,-116);
	}
	else{
	$pdf->Rect ( 107, 262, 2, 2, 'D' );
	}
	$pdf->Text ( 112, 264, 'Enfant rentre seul (elementaire)' );
	
	$pdf->Image ( "{$_SESSION['montableau'][7][6]}.png", 157, 240, - 170 ); // positionnement QR code
	$pdf->Rect ( 100, 220, 82, 52, 'D' );
	$pdf->SetFont ( 'Arial', '', 6 );
	$pdf->Text ( 103, 270, 'Direction Enfance-Education - Tel 01 41 52 53 32' );
	
	$pdf->Output ( "F","ramastop/carte/". "{$_SESSION['montableau'][0][9]}.pdf" );
	
	header ( 'Location:'  ."ramastop/carte/". "{$_SESSION['montableau'][0][9]}.pdf" );
	
	session_destroy ();
}

?>
