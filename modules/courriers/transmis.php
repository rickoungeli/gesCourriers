<?php
echo '<div class="titre2">Courriers transmis</div>';
$courrier = new courrier;
$id_service = $_SESSION['service'];
$courrier->afficherstransmis($id_service, 1);

?>
