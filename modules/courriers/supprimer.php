
<?php 
include("../../connect.inc.php");
if(isset($_GET['id_scan'])) {
$id_scan = $_GET['id_scan'];
$req = "delete from scannages where id_scan='$id_scan'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
?>
<script language="javascript">
alert("Fichier supprimé avec succès");
window.close();
</script>
<?php
}
else
{
echo "Erreur, aucun document &agrave; supprimer n'a &eacute;t&eacute; trouv&eacute;, merci de recommencer";
}
?>