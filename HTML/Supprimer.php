<html>
	<head>
		<meta charset="utf-8" />
		<title>Stream</title>
		<link rel="stylesheet" href="../CSS/BD.css"/>
	</head>
	<body>
		<form method="get" action="../BD.php">
		<?php
		//Supprime un film de la base des donnees
		//~ include_once("../SQL/Connextion.php");
		include_once("../SQL/fonctionSQL.php");
		$idfilm=$_GET['idF'];
		supprimerFilm($idfilm);
		echo "<p>Vous avez supprimer </p>";


    ?>
    <input type="submit" value ="Retour">
		</form>
  </body>
</html>
