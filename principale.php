<?php
session_start();
if($_SESSION['login'] !== ""){
$user = $_SESSION['login'];
// afficher un message
$bonjour="Bonjour $user , vous êtes connecté";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="styleLogin.css" media="screen" type="text/css" />
    </head>
<body style='background:#fff;'>
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
			<td width="100" height="50" bgcolor="#20B2AA" colspan="0"><div align="center" class="Style1">Bienvenue</div></td>
		</tr>
		</TABLE>
	<header>

	<div align="center" ><p color="#ffffff" ><?php echo $bonjour; ?></div>
	<div align="center" class="Style3"><a style="text-decoration:none" href="cuisine.php">Nos produits</a></div></br>
	<div align="center"><img src="Img/p1.jpg" width="800" height="370" border="4"/> </div>
	
</body>
</html>