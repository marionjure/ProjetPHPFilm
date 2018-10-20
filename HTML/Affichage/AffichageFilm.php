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
	$film=donnerFilm($_GET['idF']);

// Affiche l'affiche du film, la photo, le réalisateur et l année
	echo "<section>";
		echo "<h1>".$film['titre']."</h1>";
		echo "<article>";
			echo  "<img src=".$film['imageF']." alt='Smiley face'>";
			echo "<div>";
			echo "<p> Année de réalisation: ".$film['annee']."</p>";
			echo "<p> Genre: ".$film['nomGenre']."</p>";
			echo "<p> Realisateur: ".$film['nomrealisateur']." ".$film['prenomrealisateur']."</p>";
			echo "</div>";
			$adresseA="'../Supprimer.php?idF=".$_GET['idF']."'";
			echo  " <a href=".$adresseA.">"."Supprimer"."</a> \n";
		echo "</article>"	;
	echo "</section>";



	 ?>
</body>
</html>
