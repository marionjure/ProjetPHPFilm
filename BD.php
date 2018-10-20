<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<title>Stream</title>
		<link rel="stylesheet" href="./CSS/BD.css"/>
	</head>
	<body>
		<header>
			<img src="https://streamspot.com/img/streamspot_logo_og.png" alt="le logo" class=logo>
			<p> Designed by Marion Jure and Alexandre Braquet</p>
		</header>
		<?php
				include_once("./SQL/Connextion.php");
				include_once("./SQL/TableBD.php");
				//~ include_once("insertionTest.php");
		?>
		<aside>
			<?php
				include_once("./HTML/Ajouter/AjoutRealisateur.php");
				include_once("./HTML/Ajouter/AjouterFilm.php");
			?>
		</aside>
		<article>
			<?php
			include_once("./HTML/TableauTrier.php");
			?>
		</article>
	</body>
</html>
