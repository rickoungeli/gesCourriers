
<?php
session_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include("../../connect.inc.php");
$id_courrier=$_SESSION['id_courrier'];
if(isset($_POST['accuser'])) {
	if($_SESSION['type']==1){$req = "update courrier set reception = 3 where id = '$id_courrier'";}
	if($_SESSION['type']==2){$req = "update courrier set reception = 3 where id = '$id_courrier'";}	
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$id_courrier','".$_SESSION['id_utilisateur']."','".$_SESSION['service']."','a accus&eacute; reception du courrier pour le compte de ','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
}
elseif(isset($_POST['oriendef'])) {
if($_POST['orientation'] != "") {

	//si courrier externe
	if($_SESSION['type']==2){
		$orientation=$_POST['orientation'];
		$request = "update courrier set tuteur = '$orientation' where id = '$id_courrier'";
		$result = mysql_query($request) or die ("Error SQL".mysql_error());
	}
	$req = "update courrier set orientation = '".$_POST['orientation']."', tuteur = '".$_POST['orientation']."', transmission=0, reception=2 where id = '$id_courrier'";
	$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
	$request = "INSERT INTO actions_courriers VALUES('','$id_courrier', '".$_SESSION['id_utilisateur']."', '".$_POST['orientation']."', 'a 	
	orient&eacute; le courrier &agrave; (au)','".time()."')";
	$result = mysql_query($request) or die ("Error SQL".mysql_error());
	$resulter = mysql_query($req) or die ("Error SQL".mysql_error());
	$requete3 = "INSERT INTO transmission VALUES('','$id_courrier', '".$_SESSION['service']."', '".$_POST['orientation']."', '')";
	$resulta3 = mysql_query($requete3) or die ("Error SQL".mysql_error());	
}
else
{
?>

<script language="javascript">
alert("Aucun destinataire n'est s&eacute;lectionn&eacute;, veuillez recommencer");
history.back(-1);
</script>
<?php
}
}
if($_SESSION['action']=='accusation'){
if(isset($_POST['accuser'])!='') {
?>
<script language="javascript">
history.back(-1);
</script>
<?php
}
else{
?>
<script language="javascript">
document.location = "../../index.php?module=courriers&amp;action=accusation"
history.back(-1);
</script>
<?php
}
}
else{
?>
<script language="javascript">
document.location = "../../index.php?module=courriers&amp;action=orientation"
history.back(-1);
</script>
<?php
}
?>
</body>
</html>
