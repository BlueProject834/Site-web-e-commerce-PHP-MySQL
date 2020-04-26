<?php
class DB{
	private $host = 'localhost';
	private $user = '********';
	private $password = '*******';
	private $db = '********';
	private $connexion;
	
	public function __construct($host=null,$user=null,$password=null,$db=null){
		if($host!=null){
			$this->host=$host;
			$this->user=$user;
			$this->password=$password;
			$this->db=$db;
		}
		try{
		$this->connexion = new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->user,$this->password);
		}
		catch(PDOException $e){
			die('Attention Erreur: connexion non reussie');
		}
	}
	
	public function query($sql,$data=array()){
		$req = $this->connexion->prepare($sql);
		$req->execute($data);
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
}
?>