<?php
session_start();
require 'class_ConnectBD.php';
$DB=new DB();

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>COMMENTAIRES</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<header>
	<table width="100%" height="40" border="0">
		<tr>
			<td width="100" height="50" bgcolor="9E0E40" colspan="3"><div align="center" class="Style1"><a style="text-decoration:none" href="index.php"><p align="center">HomeDeco &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="login.php"  style="color :#000000"><font size="4">Connexion</font></a>
				<span>&nbsp;&nbsp;</span>
				<a href="inscription.php"  style="color :#000000" ><font size="4">Inscription</font></a>
				<span>&nbsp;&nbsp;</span>
				<a href="panier.php"  style="color :#000000" ><font size="4">Panier</font></a>
				</p></div>
			</td>
		</tr>
		<tr>
			<td width="100" height="50" bgcolor="#FFFFFF" colspan="0"><div align="center" class="Style3">Vos Commentaires</div></td>
		</tr>
	</TABLE>
<header>

	<?php
	$commentaires=$DB->query('SELECT * FROM commentaire order by dateComment desc');
	foreach($commentaires as $commentaire){
		
		$clients=$DB->query('SELECT * FROM client WHERE idClient='.$commentaire->auteurComment.'');
		
		foreach($clients as $client){
		
		?>
		<table align="center" width="60%"  border="1" >
			<tr>
				<td  width="10%"  bgcolor="#F6F4ED"><p align="center">Auteur :<br> <?php echo "".$client->nom." ".$client->prenom."";?> <br> 
				Date : <?php echo "".$commentaire->dateComment." ";	?></p></td>

				<td width="50%"  bgcolor="#E6DFC0" border="2" >	<p align="center"><?php echo "".$commentaire->contenuComment." ";	?></p></td>
			</tr>
	<?php } }?>
	</table><br>
	
	<div align="center">
    <form  action="commentaire.php" method="POST" style="margin: 0 auto; width:60%; padding: 1em; border: 1px solid #CCC;">    
        <label><b>Laisser nous un nouveau commentaire :</b></label><br><br>
        <textarea type="text" placeholder="Laisser un commentaire ici" name="comment" rows="10" cols="70"></textarea><br>
        <input type="submit" name='submit' value='Publier votre commentaire' style="width: 50%;padding: 12px 20px;margin: 8px 0;border: 1px solid #ccc;box-sizing: border-box;">            
    </form>
	</div>
	
	<?php
	if(isset($_POST['submit'])){
				
		if($_POST['comment'] !== "")
		{
			$datetime = date("Y/m/d");
			
			$a=$DB->query("INSERT INTO commentaire VALUES(NULL,'".$_POST['comment']."','".$_SESSION['idClient']."','".$datetime."')");	
			header('location:commentaire.php');
		}else{
			die('<p align="center">Votre commentaire est vide!</p>');
		}
	}
	?>
</body>
</html>