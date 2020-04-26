<?php
session_start();
if(isset($_POST['submit']))
{ 	
	$login= $_POST['login'];
    $password=$_POST['password'];
	
	if($login&&$password){
    $password=md5($password);
    $db = mysqli_connect('localhost','***USER***','***PASSWORD***','***BDpanier***')
    or die('could not connect to database');
 
    $query=mysqli_query($db,"SELECT * FROM client WHERE login='".$_POST['login']."' && Passwd='".$_POST['password']."'");
    $rows=mysqli_num_rows($query);
    if($rows==1){
        $_SESSION['login'] = $login;
		$client=$query->fetch_assoc();
		$_SESSION['idClient'] = $client['idClient'];
		$_SESSION['nom'] = $client['nom'];
		$_SESSION['prenom'] = $client['prenom'];
	
        header('Location:principale.php');
        echo "hhhhhh";

    }else echo '<p align="center"> Login ou Mot de passe incorrecte</p>';

}else echo '<p align="center"> Veuiller saisir tous les champs</p>';
}

?>


<?php
require 'class_ConnectBD.php';
$DB=new DB();
?>
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="styleLogin.css" media="screen" type="text/css" />
		<title>Connexion</title>
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
					</p>
					</div></td>
				</tr>
			</table>
		<header>
	
        <div id="container">    
            <form action="login.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>login</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" name='submit' value='submit' >
                
            </form>
        </div>
    </body>
</html>



