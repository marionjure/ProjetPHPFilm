<?php
	include_once("Connextion.php");
	$file_db=new Connextion();
	$file_db->connection();

//Insertion dans la base de donnees afin de tester
//les condions et le bon deroulement des informations qui
//sont transmis

    $genre= array(
          array('idGenre'=>1,
                'nomGenre'=>'Aventure'),
          array('idGenre'=>2,
                'nomGenre'=>'Thriller'),
          array('idGenre'=>3,
                'nomGenre'=>'Action')
          );

    $insert="INSERT INTO genre VALUES (:idGenre, :nomGenre);";
    $stmt= $file_db->getfile_db()->prepare($insert);

    $stmt->bindParam(':idGenre',$idGenre);
    $stmt->bindParam(':nomGenre',$nomGenre);


    foreach($genre as $g){
      $idGenre=$g['idGenre'];
      $nomGenre=$g['nomGenre'];

      $stmt->execute();
    }

    $contacts= array(
      array('idrealisateur'=>1,
            'nomrealisateur'=>'Besson',
            'prenomrealisateur'=>'Luc',
            'imageR'=>'https://images.redframe.com/fotosensible/1000_22198/imagef.jpg',
            'natiorealisateur'=>'portugal'),
      array('idrealisateur'=>2,
            'nomrealisateur'=>'Adams',
            'prenomrealisateur'=>'Kev',
            'imageR'=>'https://images.redframe.com/fotosensible/1000_22198/imagef.jpg',
            'natiorealisateur'=>'espagne'),
      array('idrealisateur'=>3,
            'nomrealisateur'=>'Peter',
            'prenomrealisateur'=>'Sagan',
            'imageR'=>'https://images.redframe.com/fotosensible/1000_22198/imagef.jpg',
            'natiorealisateur'=>'france')
      );
    $insert="INSERT INTO realisateur VALUES (:idrealisateur, :nomrealisateur, :prenomrealisateur,:imageR ,:natiorealisateur);";
    $stmt= $file_db->getfile_db()->prepare($insert);

    $stmt->bindParam(':idrealisateur',$idrealisateur);
    $stmt->bindParam(':nomrealisateur',$nomrealisateur);
    $stmt->bindParam(':prenomrealisateur', $prenomrealisateur);
    $stmt->bindParam(':natiorealisateur',$natiorealisateur);
    $stmt->bindParam(':imageR',$imageR);



    foreach($contacts as $c){
      $idrealisateur=$c['idrealisateur'];
      $nomrealisateur=$c['nomrealisateur'];
      $prenomrealisateur=$c['prenomrealisateur'];
      $imageR=$c['imageR'];
      $natiorealisateur=$c['natiorealisateur'];

      $stmt->execute();
    }
    $film= array(
        array('idfilm'=>1,
              'idrealisateur'=>1,
              'titre'=>'Avatar',
              'annee'=>'2019',
              'imageF'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Galician_Johan_Tuorum.jpg/220px-Galician_Johan_Tuorum.jpg',
              'idGenre'=>1),
        array('idfilm'=>4,
              'idrealisateur'=>2,
              'titre'=>'Sous la piscine',
              'annee'=>'2019',
              'imageF'=>'https://images.redframe.com/fotosensible/1000_22198/imagef.jpg',
              'idGenre'=>1),
        array('idfilm'=>2,
              'idrealisateur'=>2,
              'titre'=>'Taxi',
              'annee'=>'2017',
              'imageF'=>'https://media-cdn.tripadvisor.com/media/photo-s/01/50/01/a6/ayoyee-imagee-toi-avoir.jpg',
              'idGenre'=>2),
        array('idfilm'=>3,
              'idrealisateur'=>3,
              'titre'=>'Alad2',
              'annee'=>'2018',
              'imageF'=>'http://mini-chaos.m.i.pic.centerblog.net/1a6054ea.jpg',
              'idGenre'=>3)
        );

  $insert="INSERT INTO film VALUES (:idfilm, :idrealisateur, :titre, :annee,:imageF, :idGenre);";
  $stmt= $file_db->getfile_db()->prepare($insert);

  $stmt->bindParam(':idfilm',$idfilm);
  $stmt->bindParam(':idrealisateur',$idrealisateur);
  $stmt->bindParam(':titre', $titre);
  $stmt->bindParam(':annee',$annee);
  $stmt->bindParam(':imageF',$imageF);
  $stmt->bindParam(':idGenre',$idGenre);


  foreach($film as $f){
    $idfilm=$f['idfilm'];
    $idrealisateur=$f['idrealisateur'];
    $titre=$f['titre'];
    $annee=$f['annee'];
    $idGenre=$f['idGenre'];
	$imageF=$f['imageF'];
    $stmt->execute();
  }
?>
