<?php
if($_SESSION['id_type'] == 1 OR $_SESSION['id_type'] == 3) {

if($_GET['action'] == "courrier") {
$req = "delete from courrier where id = '".$_GET['id']."'";
}
elseif($_GET['action'] == "user") {
$req = "delete from utilisateurs where id_utilisateur = '".$_GET['id']."'";
}
elseif($_GET['action'] == "service") {
$req = "delete from services where id_service = '".$_GET['id']."'";
}
elseif($_GET['action'] == "type_courrier") {
$req = "delete from type_courrier where id_type = '".$_GET['id']."'";
}
else
{
}

$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
?>
<script language="javascript">
alert("Supression reussie, Merci");
history.back(-1);
</script>
<?php

}
else
{ 
echo "Vous n'avez pas les droits de supprimer cet &eacute;l&eacute;ment<br>";
echo '<a href="javascript:history.back(-1)">Cliquez ici pour revenir</a>';
}
?>