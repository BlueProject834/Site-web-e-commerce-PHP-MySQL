<?php
require 'class_ConnectBD.php';
require 'class_panier.php';
$DB=new DB();
$panier=new panier($DB);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PRODUITS POUR CUISINE</title>
<link rel="stylesheet" href="style.css" type="text/css">
<style>
table { border-collapse: collapse; border-spacing:0;}
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
		<td width="100" height="50" bgcolor="#20B2AA" colspan="0"><div align="center" class="Style1">Cuisine et Electrom&eacutenager</div></td>
	</tr>
</TABLE>
<header>

<table width="800" height="600" border="0" align="center" bordercolor="black" >
<?php $produits = $DB->query('SELECT * FROM produit'); // on recupere tous les produits ?> 
<?php foreach($produits as $produit){ ?>
<span>	
	<tr> 
		<td width="200" height="200" bgcolor="white" ><div align="center"><img src="<?php echo $produit->image ?>" width="200" height="200" border="2"/> </div> 
		</td>
		<td width="200" height="200">
			<div align="center">
			<p><div align="center"><h4> <?php /* le nom */ echo ''.$produit->nom.''?> </h4></div><br>
			<span class="Style2"> <?php /* le prix */ echo ''.$produit->prix.''?>&nbspDH</span>
			<div> <a href="AjouterAuPanier.php?idProduit=<?= $produit->idProduit ?>">Ajouter au panier </a></div>
			</p>
			</div>
		</td>
	</tr>
</span>
<?php } ?>
	
</tr></table>
</body>
</html>