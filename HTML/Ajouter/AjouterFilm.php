<form action='./HTML/Envoie/EnvoiFilm.php' method='GET'>
<?php

	//Connection à la base de données
	include_once("./SQL/Connextion.php");
	$file_db=new Connextion();
	$file_db->connection();


	//Presentation pour ajouter le film
	echo "<section class=ajouter>";
	echo "<h3>Ajouter un film</h3>";

// Selectionne tout les réalisateurs dans la base de données
			$realisateur='SELECT * FROM realisateur order by nomrealisateur,prenomrealisateur ';
			$result2=$file_db->getfile_db()->query($realisateur);
				echo'<select name="realisateur" class=inputRealisateur>';
				foreach ($result2 as $g) {
					//~ echo $g["nomGenre"];
// Sépare les résultats pour le nom, le prénom et la nationalité du réalisateurs
					echo'<option value='.$g["nomrealisateur"]."/".$g["prenomrealisateur"]."/".$g["natiorealisateur"].'>'.$g["nomrealisateur"]." ".$g["prenomrealisateur"].'</option>';
						}
				echo'</select>';
// Selectionne tout les genres
				$genre='SELECT * FROM genre order by nomGenre';
				$result1=$file_db->getfile_db()->query($genre);
				echo'<select name="choix" class=inputRealisateur>';
//Séparle les genres
				foreach ($result1 as $g) {
					echo $g["nomGenre"];
					echo'<option value='.$g["nomGenre"].'>'.$g["nomGenre"].'</option>';
						}
				echo'</select>';
				echo'<select name="annee" class=inputRealisateur>';
					for ($i = 1950; $i <= 2050; $i++) {
						echo $i;
						echo'<option value='.$i.'>'.$i.'</option>';
						}

// Création du tableau qui contient le formulaire
					echo'</select>';
		echo "<table>";
				echo "<tr>";
					echo "<td>";
						echo'<label for="titre">Titre</label>';
					echo "</td>";
					echo "<td>";
						echo'<input type="text" name="titre" id="titre" class=Bouton/>';
					echo "</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>";
						echo'<label for="lien">Lien </label>';
					echo "</td>";
					echo "<td>";
						echo'<input type="text" name="lien" id="lien" class=Bouton/>';
					echo "</td>";
				echo "</tr>";
	echo "</table>"

?>
	<input type=submit value="Envoyer">
</form>
