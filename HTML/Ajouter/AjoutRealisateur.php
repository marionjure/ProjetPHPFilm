<form action='./HTML/Envoie/EnvoiRealisateur.php' method='GET'>
<?php
//Connection a la base de données
	include_once("./SQL/Connextion.php");
	$file_db=new Connextion();
	$file_db->connection();
//Création d un tableau pour ajouter le formulaire de l'ajout des réalisateurs
	echo "<section class=ajouter>";
	echo "<h3>Ajouter un réalisateur</h3>";
	echo "<table>";
		echo "<tr>";
			echo "<td>";
				echo'<label for="prenom">Prénom </label>';
			echo "</td>";
			echo "<td>";
				echo'<input type="text" name="prenom" id="prenom"/>';
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo'<label for="nom">Nom </label>';
			echo "</td>";
			echo "<td>";
				echo'<input type="text" name="nom" id="nom"/>';
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo'<label for="natio">Nationalité</label>';
			echo "</td>";
			echo "<td>";
				echo'<input type="text" name="natio" id="natio"/>';
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>";
				echo'<label for="lienr">Lien</label>';
			echo "</td>";
			echo "<td>";
				echo'<input type="text" name="lienr" id="lienr"/>';
			echo "</td>";
		echo "</tr>";
	echo "</table>";
	echo "<input type=submit value='Envoyer'>";
	echo "</form>";
	echo "</section>";

?>
