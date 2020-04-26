<?php
session_start();
require 'fonctionsVerification.php';
require 'class_ConnectBD.php';
$DB=new DB();

if(isset($_POST['submit']))
{
   /* on test si les champ sont bien remplis */
    if($_POST['nom'] && $_POST['prenom'] && $_POST['login'] && $_POST['password'] &&  $_POST['repeatpassword'] && $_POST['numtel'])
    {	
		// on verifie l'email
		if(VerifierEmail($_POST['login']))
		{   
			if(VerifierNumTel($_POST['numtel']))
			{   
				if(VerifierMDP($_POST['password']))
				{   
					// on test si les deux mdp sont bien identiques 
					if ($_POST['password']==$_POST['repeatpassword'])
					{
						// On crypte le mot de passe
						$password = md5($_POST['password']);
		            	
				    	$DB->query("INSERT INTO client VALUES (NULL,'".$_POST['login']."','".$_POST['password']."','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['numtel']."')");
				    	$err= "Inscription terminée <a href='login.php'> Connecter vous</a>";
					
					}	else $err= "<p align=center>ATTENTION : Les mots de passe ne sont pas identiques</p>";
				}
			}else $err= "<p align=center>ATTENTION :  numero de telephone invalide</p>";
		}else $err= " <p align=center>ATTENTION : email invalide</p>";
	}else $err= " <p align=center>ATTENTION : il faut remplire tous les champs</p>";
}

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Inscription</title>
<link rel="stylesheet" href="styleLogin.css" media="screen" type="text/css" />
</head>
<body>
<header>
<table width="100%" height="60" border="0">
	<tr>
		<td width="100" height="40" bgcolor="9E0E40" colspan="3"><div align="center" class="Style1"><a style="text-decoration:none" href="index.php"><p align="center">HomeDeco &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="login.php"  style="color :#000000"><font size="4">Connexion</font></a>
		<span>&nbsp;&nbsp;</span>
		<a href="inscription.php"  style="color :#000000" ><font size="4">Inscription</font></a>
		<span>&nbsp;&nbsp;</span>
		<a href="panier.php"  style="color :#000000" ><font size="4">Panier</font></a>
		</p>
		</div></td>
	</tr>
</TABLE>
<header>
 
<?php
if($err){?>
<div align="center">
    <table width="400" height="40" >
        <tr></tr>
        <tr>
            <td bgcolor="F0C83D"> <?php echo $err;?> </td>
        </tr>
        <tr></tr>
    </table>
</div>    
  <?php } ?>  
<div id="container1" > 
<form method="post" action="inscription.php"> 
	<h1>Inscription</h1>
	
	<label>Nom :</label> 
	<input type="text" name="nom" > 

	<label>Prénom :</label> 
    <INPUT type="text" name="prenom" > 
 
	<label>Email :</label> 
    <INPUT type="text" name="login" >
 

 
	<label>Mot de passe :</label> 
    <INPUT type="password" name="password" > 
 
 
	<label>Confirmer le Mot de passe :</label> 
    <INPUT type="password" name="repeatpassword" >
 
 
	<label>Numero de telephone :</label> 
    <INPUT type="text" name="numtel"  box-sizing="border-box">

	<INPUT type="submit" name="submit" value="S'inscrire"> 
 

</FORM>
</div>
</body>
</html>




