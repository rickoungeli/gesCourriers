<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"/>
<title>Document sans titre</title>
</head>
<body><?php
$id = $_GET['id'];
$req1 = "UPDATE courrier SET traitement = '1' WHERE id = '$id'";
$res1 = mysql_query($req1) or die ("Erreur SQL ".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','$id','".$_SESSION['id_utilisateur']."','".$_SESSION['service']."','a archiv&eacute; le courrier pour le compte de ','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());

?>
<script language="javascript">
location.href = "index.php?module=courriers&action=archives";
</script>
</body>
</html>
