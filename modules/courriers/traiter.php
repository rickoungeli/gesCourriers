<div class="titre2">Mes Courriers trait&eacute;s et archiv&eacute;s</div>

<?php

$courrier = new courrier;
$req = "SELECT * FROM courrier WHERE destinataire = '".$_SESSION['id_utilisateur']."' AND lecture = '0' AND categorie='1' and reception = 3 and traitement = '1' ORDER BY id DESC ";
$courrier->affichersreq($req);

?>
