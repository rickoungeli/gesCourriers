
<?php

echo '<div class="titre2">Courriers envoy&eacute;s</div>';
$courrier = new courrier;
$req = "SELECT * FROM courrier WHERE tuteur = '".$_SESSION['service']."' and orientation = '".$_SESSION['service']."' and categorie = 2 order by id DESC";
$courrier->affichersreqs($req);


?>