<?php

class suppression {
var $id;

// constructeur

function suppression() {
$this->id = "";
}

// méthode qui permet de supprimer un enregistrement dans la bdd en fonction de son id et de sa table

function supprimer($id, $table) {
include("connect.inc.php");
$req = "delete from $table where id_service = '$id'";
$res = mysql_query($req) or die ("erreur sql".mysql_error());
$reponse = "El&eacute;ment supprim&eacute; avec succ&egrave;s";

echo $reponse;
} // fin méthode

} // fin classe

?>