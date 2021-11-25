<?php
include("classes/notes.class.inc.php");
$note = new note;
$note->afficher_user($_GET['id_user']);
?>