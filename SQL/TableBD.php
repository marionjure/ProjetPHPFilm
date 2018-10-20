<?php
	include_once("Connextion.php");
	$file_db=new Connextion();
	$file_db->connection();

	//Les tables : film, genre, realisateur

	$file_db->getfile_db()->exec("CREATE TABLE IF NOT EXISTS film(
									idfilm INTEGER PRIMARY KEY,
									idrealisateur INTEGER,
									titre TEXT,
									annee YEAR,
									imageF VARCHAR(200),
									idGenre INTEGER)");
	$file_db->getfile_db()->exec("CREATE TABLE IF NOT EXISTS genre(
								idGenre INTEGER PRIMARY KEY,
								nomGenre VARCHAR(30))");
    $file_db->getfile_db()->exec("CREATE TABLE IF NOT EXISTS realisateur(
								idrealisateur INTEGER PRIMARY KEY,
								nomrealisateur VARCHAR(30),
								prenomrealisateur VARCHAR(30),
								imageR VARCHAR(200),
								natiorealisateur VARCHAR(30))");

?>
