<?php

class type_courrier {

var $libelle_type;
var $observations;

// constructeur

function type() {
$this->libelle_type = "";
$this->observations = "";
}

// Méthode pour ajouter un nouveau type

function ajouter() {
include("connect.inc.php");
$sql = "INSERT INTO type_courrier VALUES ('','".$this->libelle_type ."','".$this->observations."')";
if(mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error())) {
$reponse = "type de courrier correctement ajout&eacute;, merci";
}
else
{
$reponse = "Erreur lors de l'ajout du type";
}
echo $reponse;
}

// Méthode pour modifier un type existant

function modifier($id_type) {
include("connect.inc.php");
$sql = "UPDATE type_courrier SET libelle_type = '".$this->libelle_type ."', observations = '".$this->observations."' WHERE id_type = $id_type";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "type modifi&eacute; avec succ&egrave;s<br>";
$reponse .= '<a href="index.php?module=admin&action=type_courrier">Cliquez ici pour rétourner</a>';
echo $reponse;
}

// méthode qui permet d'afficher tous les types dans un tableau
function afficher() {
include("connect.inc.php");
$req = "SELECT * FROM type_courrier ORDER BY id_type DESC";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height = '21' class='titretableau' >";
$table .= "<td>Type de courrier</td><td>Observation</td><td>Modifier</td><td>Supprimer</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height = '21' bgcolor='$bgcolor'><td>".$enreg['libelle_type']."</td><td>".$enreg['observations']."</td>";
$table .= "<td><a class='message'  href='index.php?module=type_courrier&amp;action=modifier&amp;id_type=".$enreg['id_type']."'>Modifier</a></td>";
$table .= "<td><a class='message' href='#' onclick='supprimer(\"type_courrier\", ".$enreg['id_type'].")'>Supprimer</a></td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}


function nomtype($id_type) {
$req = "select * from type_courrier where id_type = '$id_type'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$dat =mysql_fetch_array($res);
return $dat['libelle_type'];
}
function supprimer($id) {
include("connect.inc.php");
$req = "delete from type_courrier where id_type = '$id'";
$res = mysql_query($req) or die ("erreur sql".mysql_error());
$reponse = "type supprim&eacute; avec succ&egrave;s";

echo $reponse;
}
}
?>
