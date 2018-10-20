<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Stream</title>
	</head>
	<body>
		<form method="get" action="./../../BD.php">
		<?php
		include_once("../../SQL/fonctionSQL.php");
		include_once("../../SQL/FonctionSQlA.php");
			$prenom = $_GET['prenom'];
			$nom = $_GET['nom'];
			$natio = $_GET['natio'];
			$lienr = $_GET['lienr'];
			//Verifie si les champs ne sont pas vide
			if (empty($lienr)){
				echo "Désolé il faut rentrer lien de l'image du réalisateur";
				}
			elseif (empty($prenom)){
				echo "Désolé il faut rentrer la prenom du réalisateur";
				}
			elseif (empty($nom)){
				echo "Désolé il faut rentrer le nom du réalisateur";
				}
			elseif (empty($natio)){
				echo "Désolé il faut rentrer la nationalité du réalisateur";
				}
			elseif (VerifierRealisateur($nom,$prenom)){
				echo "Le réalisateur existe dans le base de donnée";
				}
			//~ elseif (!filter_input(INPUT_GET,'lien', FILTER_VALIDATE_URL)){
				//~ echo "Désolé la photo du réalisateur n'est pas un lien";
				//~ }
		//Insert le realisateur et affiche la fiche du realisateur
			else{

				envoierealisateur($prenom,$nom,$natio,$lienr);
				echo "<section>";
					echo "<h1>".$prenom."  ".$nom."</h1>";
					echo  "<img src=".$lienr." alt='La photo de ".$prenom." ".$nom." '>";
				echo "</section>";

				}

    ?>
    <input type="submit" value ="Retour">
		</form>
  </body>
</html>
