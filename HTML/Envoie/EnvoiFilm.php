<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Stream</title>
		<link rel="stylesheet" href="../../CSS/BD.css"/>
	</head>
	<body>
		<form method="get" action="./../../BD.php">
		<?php
		include_once("../../SQL/fonctionSQL.php");
		include_once("../../SQL/FonctionSQlA.php");
			$genre = $_GET['choix'];
			$annee = $_GET['annee'];
			$titre = $_GET['titre'];
			$lien = $_GET['lien'];
			$realisateur = $_GET['realisateur'];
			//Vérifie si l entree est bien un lien
			$idrea=trouverealisateur(explode('/',$realisateur)[0],explode('/',$realisateur)[1]);
			if (!filter_input(INPUT_GET,'lien', FILTER_VALIDATE_URL)){
				echo "Désolé l'affiche du film n'est pas un lien";
				}
			//Verifie si les champs ne sont pas vide
			elseif (empty($titre)){
				echo "Désolé il faut rentrer un titre pour ce film";
				}
			elseif (empty($lien)){
				echo "Désolé il faut rentrer un l pour ce film";
				}
			elseif (Verifier($idrea,$titre)){
				echo "Le fiml est deja dans la base de donnée";
				}
			//Insert le film dans la base de donnee et affiche le realisateur
			else{
				envoiefilm($realisateur,$genre,$annee,$titre,$lien);
				echo "<h1>".$titre."</h1>";
					echo "<section>";
					echo  "<img src=".$lien." alt='Smiley face'>";
					echo "<p> Année de réalisation: ".$annee."</p>";
					echo "<p> Genre: ".$genre."</p>";
					echo "<p> Realisateur: ".explode('/',$realisateur)[0]." ".explode('/',$realisateur)[1]."</p>";
				echo "</section>";
				}
			?>
			<input type="submit" value ="Retour">
		</form>
	</body>
</html>
