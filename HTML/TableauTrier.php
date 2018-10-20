<form method="get" action="BD.php">
<?php
	include_once("./SQL/Connextion.php");
	include_once("./SQL/fonctionSQL.php");
$valeur="titre";
//Met une selection automatique si il y a pas de selection

if (!empty($_GET['tri'])){
	$valeur= $_GET['tri'];
	}


//Permet selon la selection d attribuer une requette
$listedeTri=array(	"titre"=>"SELECT * FROM film order by titre" ,
					"annee"=>"SELECT * FROM film order by annee",
					"nomrealisateur"=>"SELECT * FROM film natural join realisateur order by nomrealisateur",
					"nomGenre"=>"SELECT * FROM film natural join genre order by nomGenre"
					);
//cree la barre de selection
echo "<section class=sectionBouge>";
echo "<h3>Trier par </h3>";
echo "<select name='tri' class=Bouton>";

foreach($listedeTri as $m =>$p){
	if ($valeur==$m){
		echo "<option selected value=".$m.">".$m."</option>";
		}
	else{
		echo "<option value=".$m.">".$m."</option>";
		}
	}
echo "</select>";
echo "<input type='submit' value ='Rechercher' class=Bouton>";
echo "</section>"	;

//Affiche les films selon la requete
$file_db=new Connextion();
$file_db->connection();
$requete=$listedeTri[$valeur];
$result=$file_db->getfile_db()->query($requete);
$ok=true;
$valeurActuelle;
echo "<section id='tableau'> \n";
foreach ($result as $m){
	$valeurM=donnerValeurTri($valeur,$m[$valeur]);
	if ($ok or $valeurActuelle!=$valeurM ){
		if ($ok==false){
			echo "</section> \n";
			}
		echo "  <section class=categorie> \n";
			echo "   <h2 class=titrecategorie>".$valeurM."</h2> \n";
		$ok=false;
		$valeurActuelle=$valeurM;
		}
		echo "<section class=film> \n";
		$adresse="'./HTML/Affichage/AffichageRealisateur.php?id=".$m['idrealisateur']."'";
		$adresseF="'./HTML/Affichage/AffichageFilm.php?idF=".$m['idfilm']."'";
		$realisateur=donnerRealisateur($m['idrealisateur'],$file_db);
		echo  " <a href=".$adresseF."><img src=".$m['imageF']." alt='Affiche ".$m['titre']."' class=imageListe>"."</a> \n";
		echo "  <div><a href=".$adresse.">".$realisateur['nomrealisateur']."</a></div> \n"  ;
		echo  "<a href=".$adresseF.">  <p>".$m['titre']."</p> </a> \n";
	echo "</section> \n";
	}
	echo "</section> \n";
echo "</section> \n";

function donnerValeurTri($tri,$valeur){
	if($tri=="annee" or $tri=="nomGenre" ){
		return $valeur;
		}
	else{
		return substr($valeur, 0, 1);
		}
	}


?>
</form>
