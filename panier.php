<?php
require 'class_ConnectBD.php';
require 'class_panier.php';
$DB=new DB();
$panier=new panier($DB);

//var_dump($_SESSION['panier']);  // pour v2rifier la session
?>
<?php
if(isset($_GET['del'])){
$panier->del($_GET['del']);	// fonction de suppression d'un produit du panier.
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Panier</title>
<style>
table { border-collapse: collapse; bgcolor:#9E0E40 border-spacing:0;}
h4{color: black;font-size:20px;font-family: "Segoe Print";}
td {border-spacing: 0;border-collapse: collapse;}
.Style2{color: red;font-size:20px;}
.Style1 {  font-size: 27px;font-family: "Segoe Print";color: white;}
td{color:white;}
.Style3{color: black;font-size:20px;}
</style>
</head>

<body bgcolor="white">

		<header>
			<table width="100%" height="40" border="0">
				<tr>
					<td width="100" height="50" bgcolor="9E0E40" colspan="3"><div align="center" class="Style1"><a style="text-decoration:none" href="index.php"><p align="center">HomeDeco &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="login.php"  style="color :#000000"><font size="4">Connexion</font></a>
					<span>&nbsp;&nbsp;</span>
					<a href="inscription.php"  style="color :#000000" ><font size="4">Inscription</font></a>
					<span>&nbsp;&nbsp;</span>
					<a href="panier.php"  style="color :#000000" ><font size="4">Panier</font></a>
					</p>
					</div></td>
				</tr>
				<tr>
					<td width="100" height="50" bgcolor="#20B2AA" colspan="0"><div align="center" class="Style1">Mon panier</div></td>
				</tr>				
			</table>
		<header>
		<span></span>
		<table width="70%" height="40" align="center" border="2">
			<tr height="50"></tr>
			<tr>
				<th> image</th>
				<th> Produit</th>
				<th> Prix</th>
				<th> Quantite</th>
				<th><p> Action</p></th>
			</tr> 
			
			<?php 
			$ids = array_keys($_SESSION['panier']);
			//var_dump($ids); 
			if(empty($ids)){
				$produits = array();
				echo '<div align="center" class="style3"> Votre panier est vide </div>';	
			}else{
			$produits = $DB->query('select * from produit where idProduit in ('.implode(',',$ids).')');
			//var_dump($produits);
			}

			foreach($produits as $produit){
			?>
			<tr>
				<td> <img src="<?php echo $produit->image ?>" width="100" height="100" border="2"/></td>
				<td> <p style="color:#000000;" align="center"> <?php /* le nom */ echo $produit->nom?></p></td>
				<td> <p style="color:#000000;" align="center"><?php /* le prix */ echo $produit->prix?>&nbspDH </p></td>
				<td> <p style="color:#000000;" align="center"><?= $_SESSION['panier'][$produit->idProduit]; ?></p></td>
				<td><p style="color:#000000;" align="center"><a href="panier.php?del=<?= $produit->idProduit;?>">Supprimer</a></p></td>
			</tr>

			<?php } /* end foreach*/ ?>
			<tr>
				<td colspan="5"><p style="color:#000000;" align="right">Prix Total :&nbsp&nbsp<?= $panier->prixTotal();?> </td>
			</tr>
		</table>
</body>
</html>


