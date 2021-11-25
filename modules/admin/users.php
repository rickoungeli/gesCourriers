<div class="titre2">Les utilisateurs de l'application</div>

<?php
include("classes/users.class.inc.php");
$user = new user;
$req = "SELECT * FROM utilisateurs ORDER BY id_utilisateur DESC ";
$user->afficheradmin($req);

?>