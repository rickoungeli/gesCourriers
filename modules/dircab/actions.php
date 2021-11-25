
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
if(isset($_POST['case'])){
$col1_Array = $_POST['case'];
foreach($col1_Array as $selectValue1) {

if(isset($_POST['avaliser'])) {
$req = "update courrier set reception = 2 where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
}
elseif(isset($_POST['accuser'])) {
$req = "update courrier set reception = 2 where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$selectValue1','".$_SESSION['id_utilisateur']."','".$_SESSION['service']."','a accus&eacute; reception du courrier pour le compte de ','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
}
elseif(isset($_POST['distribuer'])) {
$req = "update courrier set reception = 10 where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$selectValue1','".$_SESSION['id_utilisateur']."','".$_SESSION['service']."','a distribu&eacute; le courrier pour le compte de ','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
}
elseif(isset($_POST['orienprov'])) {
if($_POST['orientation'] != "") {
$req = "update courrier set orientation = '".$_POST['orientation']."' where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$selectValue1','".$_SESSION['id_utilisateur']."','".$_POST['orientation']."','a orient&eacute; provisoirement le courrier &agrave; (au)','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
//echo 'Le courrier num&eacute;ro '.$selectValue1 .' est orient&eacute; provisoirement vers '. $_POST['orientation'].'<br>';
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
elseif(isset($_POST['oriendef'])) {
if($_POST['orientation'] != "") {
$req = "update courrier set orientation = '".$_POST['orientation']."', tuteur = '".$_POST['orientation']."' where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$selectValue1', '".$_SESSION['id_utilisateur']."', '".$_POST['orientation']."', 'a orient&eacute; d&eacute;finitivement le courrier &agrave; (au)','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
$requester = "UPDATE courrier SET reception = 2 where id = '$selectValue1'";
$resulter = mysql_query($requester) or die ("Error SQL".mysql_error());
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
elseif(isset($_POST['classer'])) {
if($_POST['classeur'] != "") {
$req = "insert into classeur_courrier values('".$_POST['classeur']."', '$selectValue1', '".time()."')";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$selectValue1','".$_SESSION['id_utilisateur']."','".$_POST['orientation']."','a placer&eacute; dans un classeur le courrier pour le compte de','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
//echo 'Le courrier num&eacute;ro '.$selectValue1 .' est orient&eacute; provisoirement vers '. $_POST['orientation'].'<br>';
}
else
{
?>
<script language="javascript">
alert("Aucun classeur n'est s&eacute;lectionn&eacute;, veuillez recommencer");
history.back(-1);
</script>
<?php
}
}
?>



<?php

}}
?><br />
<script language="javascript">
history.back(-1);
</script>

</body>
</html>
