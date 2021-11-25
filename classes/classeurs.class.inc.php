<?php

class classeur {

var $nom_classeur;
var $observations;

// constructeur

function classeur() {
$this->nom_classeur = "";
$this->observations = "";
}

// Méthode pour ajouter un nouveau type

function ajouter() {
include("connect.inc.php");
$sql = "INSERT INTO classeur VALUES ('','".$this->nom_classeur ."','".$this->observations."')";
if(mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error())) {
$reponse = "Classeur correctement ajout&eacute;, merci";
$reponse .= "<br><a href='index.php?module=courriers&action=classeurs'>Retour</a><br>";
}
else
{
$reponse = "Erreur lors de l'ajout du classeur";
$reponse .= "<br><a href='javascript:history.back(-1)'>Retour</a><br>";

}
echo $reponse;
}

// Méthode pour modifier un type existant

function modifier($id_classeur) {
include("connect.inc.php");
$sql = "UPDATE classeurs SET nom_classeur = '".$this->nom_classeur ."', observations = '".$this->observations."' WHERE id_classeur = $id_classeur";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "Classeur modifi&eacute; avec succ&egrave;s<br>";
$reponse .= '<a href="index.php?module=dircab&action=classeurs">Cliquez ici pour rétourner</a>';
echo $reponse;
}

// méthode qui permet d'afficher tous les types dans un tableau
function afficher() {
include("connect.inc.php");
$req = "SELECT * FROM classeur ORDER BY id_classeur DESC";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height = '21' class='titretableau' >";
$table .= "<td>Nom classeur</td><td>Observation</td><td>Modifier</td><td>Supprimer</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height = '21' bgcolor='$bgcolor'><td>".$enreg['nom_classeur']."</td><td>".$enreg['observations']."</td>";
$table .= "<td><a class='message'  href='index.php?module=classeur&amp;action=modifier&amp;id_classeur=".$enreg['id_classeur']."'>Modifier</a></td>";
$table .= "<td><a class='message' href='#' onclick='supprimer(\"classeur\", ".$enreg['id_classeur'].")'>Supprimer</a></td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}


function nom_classeur($id_classeur) {
$req = "select * from classeur where id_classeur = '$id_classeur'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$dat =mysql_fetch_array($res);
return $dat['nom_classeur'];
}
function supprimer($id) {
include("connect.inc.php");
$req = "delete from classeur where id_classeur = '$id'";
$res = mysql_query($req) or die ("erreur sql".mysql_error());
$reponse = "classeur supprim&eacute; avec succ&egrave;s";
echo $reponse;
}

function ajouter_courrier($id_courrier) {
	include("connect.inc.php");
$req = "insert into classeur_courriers values('".$id_classeur."', '".$id_courrier."', '".time()."')";
	$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
	echo " Courrier correctement ajout&eacute; au classeur";
}

function details_classeurs ($id_classeur) {
	include("connect.inc.php");
$req = "SELECT * FROM classeurs WHERE id_classeur = $id_classeur ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$data = mysql_fetch_array($req);
$req1 = "select * from courriers where id_classeur = '".$data['id_classeur']."'";
$res1 = mysql_query($req1) or die ("Erreur SQL".mysql_error()); 
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height = '21' class='titretableau' >";
$table .= "<td>Code_courrier</td><td>Type_courrier</td><td>Classé le</td><td>Classé par</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while($enreg = mysql_fetch_array($res1)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height = '21' bgcolor='$bgcolor'><td>".$enreg['nom_classeur']."</td><td>".$enreg['observations']."</td>";
$table .= "<td><a class='message'  href='index.php?module=classeur&amp;action=modifier&amp;id_classeur=".$enreg['id_classeur']."'>Modifier</a></td>";
$table .= "<td><a class='message' href='#' onclick='supprimer(\"classeur\", ".$enreg['id_classseur'].")'>Supprimer</a></td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}
	
}
?>
