<a href="index.php?module=classeurs&action=ajouter" class="message">Ajouter un classeur </a>
<br /><br />
<?php

include("classes/classeurs.class.inc.php");
$type = new classeur;
$type->afficher();

?>
<br /><br />
<a href="index.php?module=classeurs&action=ajouter" class="message">Ajouter un classeur </a>