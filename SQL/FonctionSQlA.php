<?php
	include_once("Connextion.php");


	//Permet d'envoyer un realisateur dans la base de données
	function envoierealisateur($prenom,$nom,$natio,$lienr){
      $file_db=new Connextion();
      $file_db->connection();
      $maximum;
        $requete='SELECT max(idrealisateur) as max FROM realisateur';
        $result=$file_db->getfile_db()->query($requete);

        foreach($result as $r){
          $maximum=$r['max']+1;
        }

        $insert="INSERT INTO realisateur VALUES (:idrealisateur, :nom, :prenom, :lienr, :natio);";
        $stmt= $file_db->getfile_db()->prepare($insert);

        $stmt->bindParam(':idrealisateur',$maximum);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':natio',$natio);
        $stmt->bindParam(':lienr',$lienr);
        $stmt->execute();
    }

	//permet de recuperer l id du réalisateur
	function trouverealisateur($nom,$prenom){

      $file_db=new Connextion();
	    $file_db->connection();

      //~ $nom=explode('/',$realisateur)[0];
      //~ $prenom=explode('/',$realisateur)[1];

      $requete='SELECT idrealisateur FROM realisateur WHERE nomrealisateur=:nom and prenomrealisateur=:prenom';

      $result=$file_db->getfile_db()->prepare($requete);
      $result->bindParam(':nom',$nom);
      $result->bindParam(':prenom',$prenom);
      $result->execute();

      foreach($result as $r){
        return $r['idrealisateur'];
      }
    }

//permet de recuperer l id d'un genre
    function trouvegenre($genre){

      $file_db=new Connextion();
	    $file_db->connection();

      $requete='SELECT idGenre FROM genre WHERE nomGenre=:genre';

      $result=$file_db->getfile_db()->prepare($requete);
      $result->bindParam(':genre',$genre);
      $result->execute();

      foreach($result as $r){
        return $r['idGenre'];
      }
    }

    //~ echo trouvegenre($genre);

//permet de trouver un id non utilisé lors d'une création d un film
	function maxFilm(){
		$file_db=new Connextion();
	    $file_db->connection();
        $requete='SELECT max(idfilm) as max FROM film';
        $result=$file_db->getfile_db()->query($requete);
        foreach($result as $r){
          return $r['max']+1;
        }
		}

//Envoie un film dans la base de données
    function envoiefilm($realisateur,$genre,$annee,$titre,$lien){
      	$file_db=new Connextion();
	    $file_db->connection();
        $maximum=maxFilm()+1;

        $idrea=trouverealisateur(explode('/',$realisateur)[0],explode('/',$realisateur)[1]);
        $idgenre=trouvegenre($genre);


            $insert="INSERT INTO film VALUES (:idfilm, :idrealisateur, :titre, :annee,:imageF, :idGenre);";
            $stmt= $file_db->getfile_db()->prepare($insert);


            $stmt->bindParam(':idfilm',$maximum);
            $stmt->bindParam(':idrealisateur',$idrea);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':annee',$annee);
            $stmt->bindParam(':imageF',$lien);
            $stmt->bindParam(':idGenre',$idgenre);
            $stmt->execute();
    }

?>
