<?php
include("connect.inc.php");
$req = "select * from synthese where id_synthese = ".$_GET['id'];
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$data = mysql_fetch_array($res);
require_once("classes/users.class.inc.php");
$user = new user;
echo "Ajout&eacute;e/Modifi&eacute;e par ".$user->nomuser($data["id_user"])." le ". date("d/m/Y à H:i:s", $data["date_enreg"]) ."<br><br>";
echo "<div class='titre2'>Synt&egrave;se : </div><br>";
echo $data['synthese']. "<br>";
?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<br />
<a href="javascript:close()" class="message">Fermer la f&ecirc;netre </a>