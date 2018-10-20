<?php
include_once("Connextion.php");

//Donner le realisateur
function donnerRealisateur($idrealisateur){
	$file_db=new Connextion();
	$file_db->connection();
	$requete='SELECT * FROM realisateur where idrealisateur='.$idrealisateur;
	$result=$file_db->getfile_db()->query($requete);
	foreach ($result as $m){
		return array('nomrealisateur'=>$m['nomrealisateur'],'prenomrealisateur'=>$m['prenomrealisateur'],'natiorealisateur'=>$m['natiorealisateur'],'imageR'=>$m['imageR']);}
	}

//Donne le film
function donnerFilm($idfilm){
	$file_db=new Connextion();
	$file_db->connection();
	$insert="SELECT * FROM film where idfilm= :idfilm";

    $result= $file_db->getfile_db()->prepare($insert);
    $result->bindParam(':idfilm',$idfilm);
    $result->execute();
	foreach ($result as $m){
		$realisateur=donnerRealisateur($m['idrealisateur']);
		$genre=donnerGenre($m['idGenre']);
		return array(
		'nomrealisateur'=>$realisateur['nomrealisateur'],
		'prenomrealisateur'=>$realisateur['prenomrealisateur'],
		'titre'=>$m['titre'],
		'annee'=>$m['annee'],
		'imageF'=>$m['imageF'],
		'nomGenre'=>$genre
		);}
	}

//Verifie si le film est toujours dans la base de données
function Verifier($idrealisateur,$titre){
	$file_db=new Connextion();
	$file_db->connection();
	$res=false;
	$insert="SELECT * FROM film where idrealisateur= :idrealisateur and titre= :titre ";

    $result= $file_db->getfile_db()->prepare($insert);
    $result->bindParam(':idrealisateur',$idrealisateur);
    $result->bindParam(':titre',$titre);

    $result->execute();
	foreach ($result as $m){
		$res=true;
		}
	return $res;
	}

//Verifie si il y a pas deux fois le meme realisateur
function VerifierRealisateur($nomrealisateur,$prenomrealisateur){
	$file_db=new Connextion();
	$file_db->connection();
	$res=false;
	$insert="SELECT * FROM realisateur where nomrealisateur= :nomrealisateur and prenomrealisateur=:prenomrealisateur ";

    $result= $file_db->getfile_db()->prepare($insert);
    $result->bindParam(':nomrealisateur',$nomrealisateur);
    $result->bindParam(':prenomrealisateur',$prenomrealisateur);

    $result->execute();
	foreach ($result as $m){
		$res=true;
		}
	return $res;
	}

//Donne la liste des films d un realisateur
function donnerListeFilmRealisateur($idrealisateur){
	$file_db=new Connextion();
	$file_db->connection();
	$res=array();
	$requete='SELECT * FROM film where idrealisateur='.$idrealisateur;
	$result=$file_db->getfile_db()->query($requete);
	foreach ($result as $m){
		$res[]=array('titre'=>$m['titre'],'annee'=>$m['annee'],'idfilm'=>$m['idfilm']);
		}
	return $res;
	}

//Donne le genre
function donnerGenre($idGenre){
	$file_db=new Connextion();
	$file_db->connection();
	$requete='SELECT nomGenre FROM genre where idGenre='.$idGenre;
	$result=$file_db->getfile_db()->query($requete);
	foreach ($result as $m){
		return $m['nomGenre'];}
	}

//Supprime un film
	function supprimerFilm($idfilm){
      $file_db=new Connextion();
      $file_db->connection();
        $requete='delete from film where idfilm=:idfilm';
        $result= $file_db->getfile_db()->prepare($requete);
		$result->bindParam(':idfilm',$idfilm);
		$result->execute();
    }

?>
