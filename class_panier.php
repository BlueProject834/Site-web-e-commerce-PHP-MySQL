<?php
class panier{
	
	private $DB;
	// on cree un panier vide dans le constructeur
	
	public function __construct($DB){
		if(!isset($_SESSION)){session_start();}
		if(!isset($_SESSION['panier']))
		{	$_SESSION['panier']=array(); }
		$this->DB = $DB;
	}
	
	public function ajouter($produit_id){
		//si le produit existe deja
		if(isset($_SESSION['panier'][$produit_id])){
			$_SESSION['panier'][$produit_id]++; // on incremente
		}else{ 
		$_SESSION['panier'][$produit_id]=1;	
		}
	}
	
	public function prixTotal(){
		$total=0;
		$ids = array_keys($_SESSION['panier']); 
		if(empty($ids)){
			$produits = array();	
		}else{
		$produits = $this->DB->query('select * from produit where idProduit in ('.implode(',',$ids).')');
			
		foreach($produits as $produit){
		 $total += $produit->prix * $_SESSION['panier'][$produit->idProduit];
		}
	}
	return $total;
	}
	
	public function del($produit_id){
		unset($_SESSION['panier'][$produit_id]);
	}
}
?>