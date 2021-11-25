<?php

if(isset($_GET['resp'])) {
echo '<div class="titre2">Les courriers du Responsable en attente d\'envoie</div>';
$courrier = new courrier;
$req = "SELECT * FROM courrier WHERE expediteur = ".$_SESSION['responsable']." and reception = '0' order by id DESC";
$courrier->affichersreqs($req);
}
else
{
echo '<div class="titre2">Mes courriers en attente d\'envoie</div>';
$courrier = new courrier;
$req = "SELECT * FROM courrier WHERE expediteur = ".$_SESSION['id_utilisateur']." and reception = '0' order by id DESC";
$courrier->affichersreqs($req);
}
?>