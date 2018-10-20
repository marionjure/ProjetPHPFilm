<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<title>Stream</title>
	<link rel="stylesheet" href="../../CSS/BD.css"/>
<!--
	<link rel="stylesheet" href="/home/jure/Bureau/tp10/page/perso.css"/>
-->
</head>
<body>
	<?php
	include_once("../../SQL/Connextion.php");
	include_once("../../SQL/fonctionSQL.php");
	$realisateur= donnerRealisateur($_GET['id']);

	//Affiche une photo du realisateur, le nom, le prenom et la nationalite et la liste des films
	$film=donnerListeFilmRealisateur($_GET['id']);
	echo "<section>";
		echo "<h1>".$realisateur['nomrealisateur']."  ".$realisateur['prenomrealisateur']."</h1>";
		echo "<article>";
			echo  "<img src=".$realisateur['imageR']." alt='Smiley face'>";
			echo "<div>";
			echo "<p>Nationalité : ".$realisateur['natiorealisateur']." </p>";
			echo "<ul>";
			echo "<h3>La liste de ses films</h3>";
			foreach ($film as $m){
				$adresseF="'AffichageFilm.php?idF=".$m['idfilm']."'";
				echo "<li>";
				echo  "<a href=".$adresseF.">  <p>".$m['titre']."</p> </a> \n";
				//echo $m['titre'];
				echo "</li>";
				}
			echo "</article>";
			echo "</ul>";
			echo "</div>";
	echo "</section>";

	 ?>
</body>
</html>
