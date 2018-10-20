<?php
class Connextion{

//Permet de se connecter a la base de donnees de Marion Juré

	private $serveur="servinfo-mariadb"; //"servinfo-mariadb"
	private $base="DBjure"; //"DBjure"
	private $user="jure";//"jure"
	private $password="jure";//"jure"
	private $file_db;

    public function getfile_db(){
		return $this->file_db;
		}
	public function setfile_db($m){
		return $this->file_db=$m;
	}
	public function connection(){
		try{
			$this->setfile_db(new PDO("mysql:dbname=".$this->base.";host=".$this->serveur,$this->user,$this->password));
			$this->getfile_db()->setAttribute(PDO::ATTR_ERRMODE,
							PDO::ERRMODE_EXCEPTION);
			}

			catch(PDOException $e){
				echo $e->getMessage();
				}
	}
}
?>
