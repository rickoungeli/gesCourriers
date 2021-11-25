
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

if(isset($_POST['orienprov'])) {
if($_POST['orientation'] != "") {
$req = "update courrier set tuteur = '".$_POST['orientation']."' where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$selectValue1','".$_SESSION['id_utilisateur']."','".$_POST['orientation']."','a orient&eacute; d&eacute;finitivement le courrier sortant &agrave; (au)','".time()."')";
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
else
{
$req = "delete from courrier where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
}
}
}
else
{
?>
<script language="javascript">
alert("Aucun destinataire n'est sélectionné, veuillez recommencer");
history.back(-1);
</script>
<?php
}
?>
<br />
<script language="javascript">
history.back(-1);
</script>
</body>
</html>
