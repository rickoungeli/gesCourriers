<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body><br />
<div class="titre2">Statistiques d&eacute;taill&eacute;es </div><br />
<p style="padding-left:35px;">Cliquez sur le service pour lequel vous voulez avoir des d&eacute;tails. </p><br /><p>
  <?php

include("classes/services.class.inc.php");
$service = new service;
$req = "select * from services order by id_service desc";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
while ($data = mysql_fetch_array($res)) {
echo "<a href='index.php?module=stat&action=detail&id_service=".$data['id_service']."' style='font-size:13px;line-height:20px;text-decoration:none;padding-left:40px;font-weight:bolder;'>".$service->nomservice($data['id_service'])."</a><br>";
}
?>
</p>
</body>
</html>
