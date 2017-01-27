			<?php
			session_start ();
			if (! isset ( $_SESSION ['valeur'] )) {
				$_SESSION ['valeur'] = 0;
			}
			// echo $_SESSION ['valeur'];
			?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />
<title>Ramassage Scolaire</title>
</head>
<body>
	<div id="rose">
		<!--ligne rose-->

	</div>
	<div id="bleu">
		<!--ligne rose-->

	</div>
	<div id="page">
		<header>
			<div id="image">
				<!--image de villepinte-->
				<img src="image/villepinte.png" width=230 height=120
					alt="Villepinte" />
			</div>
			<nav>
				<!--le menu-->
				<ul id="barre">
					<li><a style="color: #FA9F01;" href="ajouter.php">Ajouter</a></li>
					<li><a href="supprimer.php">Supprimer</a></li>
					<li><a href="liste.php">Liste d'élève</a></li>
					<li><a href="modifier.php">Modifier</a></li>
					<li><a href="">Statistique</a>
						<ul id="menu2">
							<li><a href="mensuel.php">Mensuel</a></li>
							<li><a href="individuel.php">Individuel</a></li>
							<li><a href="bus.php">Bus</a></li>
						</ul></li>
					<li><a href="imprimer.php">Imprimer</a></li>
					<li><a href="tablette.php">Mise à jour</a></li>
				</ul>
			</nav>
		</header>
		<div id="radio">
			<form enctype="multipart/form-data" action="saisie.php" method="post">
				<input type="radio" name="radio" value="1"
					onchange="submit(this.form)"> 2 Elève <input type="radio"
					name="radio" value="2" onchange="submit(this.form)"> 4 Elève <input
					type="radio" name="radio" value="3" onchange="submit(this.form)"> 8
				Elève
			</form>
			<p>Vous avez ajouté <?php  echo $_SESSION ['valeur'];?><p>
		</div>
		<section id="inscription">


			<h1>Formulaire pour ajouter quatre élèves</h1>
			<!-- On précise que le formulaire agit sur generateurpdf en utilisant la méthode post -->


			<form id="myform" action="testtab4.php" method="post"
				enctype="multipart/form-data">

				<!-- inforation sur le responsable -->
				<label for="nom_responsable">Nom du responsable légal </label><input
					type="text" name="nom_responsable" /><br />
				<label for="numero">Numero de téléphone du responsable légal </label><input
					type="text" name="numero" /><br /> <br /> <label for="lien">Lien de
					parentés </label> <select name="lien">
					<option>pere
					
					<option>mere
					
					<option>frere
					
					<option>soeur
					
					<option>autre
				
				</select><br />

				<!-- inforation sur le responsable -->
				<br /> <label for="nom_responsable2">Nom du deuxième responsable
					légal </label><input type="text" name="nom_responsable2" /><br /> <label
					for="numero2">Numero de téléphone du deuxième responsable légal </label><input
					type="text" name="numero2" /><br /> <br /> <label for="lien2">Lien
					de parentés </label> <select name="lien2">
					<option>pere
					
					<option>mere
					
					<option>frere
					
					<option>soeur
					
					<option>autre
				
				</select><br />



				<!-- Selection des champs nom et prenom de l'élève-->
				<label for="nomE">Nom : </label><input class=coinsArrondis
					type="text" name="nomE" id="nomE" /><br /> <label for="prenomE">Prenom
					: </label><input class=coinsArrondis type="text" name="prenomE"
					id="prenomE" /><br />

				<!-- Selection des arrets sous forme de liste déroulante-->
				<!--<label for="arret">Arret : </label><input class=coinsArrondis type="text" name="arret" id="arret"/><br/>-->
				<label for="arret">Arret : </label> <select name="arret">
					<option>Rue Bachaga Boualam
					
					<option>Rue Henri Barbusse
					
					<option>Avenue de la Croix de l'Aumône
					
					<option>Rue Léon Jouhaux / Route de Sevran
					
					<option>Avenue de Villeneuve / Paul Bert
					
					<option>Avenue Vert Galant/Avenue des fougères
				
				</select><br />

				<!-- Selection des champs Ecole, niveau classe, année scolaire-->
				<label for="ecole">Ecole : </label><input class=coinsArrondis
					type="text" name="ecole" id="ecole" /><br /> <label for="niveau">Niveau
					classe : </label><input class=coinsArrondis type="text"
					name="niveau" id="niveau" /><br /> <label for="annee">Année
					scolaire : </label><input class=coinsArrondis type="text"
					name="annee" id="annee" /><br />


				<!-- <?php if ($_SESSION['valeur'] == 0){ ?> 
	<!-- Nom sous lequel le fichier pdf et l'image du code QR seront enregistrés -->
				<label for="nom">Nom du fichier : </label><input class=coinsArrondis
					type="text" name="nom" id="nom" /><br />
				<!-- <?php } ?>
	
<!-- Choix de la ligne de ramassage à l'aide de boutons radio-->
				<br /> <label for="ramassage">Ramassage : </label> <select
					name="ramassage">
					<option>Vert GALANT



						<option>Langevin
				
				
				
				</select><br />
				
<!-- Case à cocher -->
			<div id="case">
				<label for="nom">Matin </label><input type="checkbox" name="Matin"
						value="matin" />
				<label for="nom">Midi </label> <input type="checkbox" name="Midi"
						value="midi" /> 
				<label for="nom">Mercredi Midi </label> <input type="checkbox"
						name="Mercredi" value="mercredimidi" />
				<label for="nom">Soir </label> <input type="checkbox" name="Soir"
						value="soir" />
				<label for="nom">Rentre Seul </label><input type="checkbox"
						name="Seul" value="1" />
			</div>
<!-- Insertion d'une eventuelle photo dans la carte -->
				<input type="hidden" name="MAX_FILE_SIZE" value="100000" /><br /> <label
					for="nom">Photo(optionnel) : </label><input type="file"
					name="photo" /><br />
			
			<div id="bouton">
							<!-- Envoi des données-->
					<input type="submit" value="envoyer" />
				</div>



			
					
					</form>

		</section>

		<footer> </footer>
	</div>

</body>
</html>
