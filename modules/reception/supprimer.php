<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
if(isset($_POST['sendtri'])) {
$req = "update courrier set reception = '1' where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$selectValue1', '".$_SESSION['id_utilisateur']."', '6', 'a envoy&eacute;(e) le courrier pour tri et orientation &agrave; (au)','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
}
else
{
$req = "delete from courrier where id = '$selectValue1'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
}?>

<script language="javascript">
history.back(-1);
</script>

<?php

}
}
else
{
?>

<script language="javascript">
alert("Pas de sélection, veuillez recommencer, Merci");
history.back(-1);
</script>
<?php
}
?>
</body>
</html>
