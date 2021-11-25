
<?php 
if(isset($_GET['id_service']) and isset($_GET['module']) ) {
include("classes/supprimer.class.inc.php");
$service = new suppression;
$service->supprimer($_GET['id_service'], $_GET['module']);
}
else
{
echo " veuillez choisir un service à supprimer";
}
?>
