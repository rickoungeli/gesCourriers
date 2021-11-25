<?php
echo '<div class="titre2">Courriers trait&eacute;s et archiv&eacute;s</div>';
$courrier = new courrier;
$courrier->affichersarchive($_SESSION['service']);
?>