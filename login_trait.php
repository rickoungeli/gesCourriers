<?php
include("connect.inc.php");
$login = htmlentities($_POST['login']);
$password = htmlentities($_POST['password']);

// Vérification des coordonnées dans la base de données
$req = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '".md5($password)."'";

$res = mysql_query($req) or die("Erreur SQL !<br>".mysql_error(). "<br>$req");

if (mysql_num_rows($res) > 0){ // Création des variables de sessions
    $enregs=mysql_fetch_array($res);
	$_SESSION["id_utilisateur"] = $enregs["id_utilisateur"];
	$_SESSION["nom"] = $enregs["nom"];
	$_SESSION["fonction"]= $enregs["fonction"];
	$_SESSION["service"]= $enregs["service"];
	$_SESSION["login"]= $enregs["login"];
	$_SESSION["password"]= $enregs["password"];
	$_SESSION["email"]= $enregs["email"];
	$_SESSION["id_type"]= $enregs["id_type"];
	$_SESSION["date_enreg"]= $enregs["date_enreg"];
	$ip = $_SERVER['REMOTE_ADDR'];
	echo $ip;
  		echo '<script langage="javascript">
  		document.location = "index.php?code=1"
  		document.write=(alert("Vous ne pouvez pas enregistrer veuillez contacter l Administrateur "));
  		</script>';
	/*
$requet = mysql_query("INSERT INTO sessions VALUES('','".$_SESSION['id_utilisateur']."', '".time()."', '0', '$ip')") or die ("Erreur SQL".mysql_error());
	$_SESSION['id_session'] = mysql_insert_id($requet);
	*/
	$reqresp = "select * from utilisateurs where service = '".$_SESSION['service']."' and id_type = 3 limit 0, 1";
	$resresp = mysql_query($reqresp) or die("Erreur");
	$tabresp = mysql_fetch_array($resresp);
	$_SESSION['responsable'] = $tabresp['id_utilisateur'];
	echo "<script language='javascript'>document.location='index.php?module=user&action=accueil'</script>";
} else {
	echo "<script language='javascript'>document.location='index.php?msg=Identifiant et/ou mot de passe incorrect(s), veuillez recommencer'</script>";
}
?>