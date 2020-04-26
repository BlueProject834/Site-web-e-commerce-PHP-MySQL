<?php
// if(!isset($_SESSION)){session_start();}
require 'class_ConnectBD.php';
$DB=new DB();
require 'class_panier.php';
$panier=new panier($DB);


if(isset($_GET['idProduit'])){
	$produits = $DB->query('select * from produit where idProduit=:idProduit',array('idProduit' => $_GET['idProduit']));
	if(empty($produits)){
		die("produit inexistant");
	}
	else{
	$panier->ajouter($produits[0]->idProduit);
	
	//avec un var_dump ici, on peut verifier que le produit est bien recupere
	
    echo ' <div align="center"> produit ajoute avec succes<a href="cuisine.php"> <br> Retourner vers la pages des produits</a> </div> ';

	}	
}else{
	die("Rien n'est selectionne");
}



?>
