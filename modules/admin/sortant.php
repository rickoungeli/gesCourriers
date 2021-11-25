<div class="titre2">Les courriers entrant</div>

<?php

$courrier = new courrier;
$req = "SELECT * FROM courrier WHERE categorie='2' AND traitement = '0' ORDER BY id DESC ";
$courrier->afficheradminsortant($req);

?>