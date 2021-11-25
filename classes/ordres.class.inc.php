<?php

class ordre {

var $date_depart;
var $date_arrivee;
var $objet;
var $noms;
var $qualite;
var $destination;
var $duree;
var $id_saisi;
var $itineraire;
var $timestamp;
var $origine_frais;
var $moyens_transport;

// constructeur

function user() {
$this->date_depart = "";
$this->date_arrivee = "";
$this->objet = "";
$this->noms = "";
$this->qualite = "";
$this->destination = "";
$this->duree = "";
$this->id_saisi = $_SESSION['id_utilisateur'];
$this->itineraire = "";
$this->timestamp = time();
$this->origine_frais = "";
$this->moyens_transport = "";
}

// Méthode pour ajouter un nouvel utilisateur

function ajouter() {
include("connect.inc.php");
$sql = "INSERT INTO ordres VALUES ('','".$this->date_depart."','".$this->date_arrivee."' ,'".$this->objet."' ,'".$this->noms."' ,'".$this->qualite."' , '".$this->destination."' ,'".$this->duree."' ,'".$this->id_saisi."' ,'".$this->itineraire."' ,'".$this->timestamp."', '".$this->origine_frais."', '".$this->moyens_transport."')";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse = "Enregistrement reussi, merci<br>";
$reponse .= '<a href="index.php?module=ordres&action=gerer" class="message">Retour &agrave; la liste </a> | <a href="index.php?module=ordres&action=ajouter" class="message">Enregistrer un autre ordre de mission </a><br>';
echo $reponse;
}

// Méthode pour modifier un utilisant existant

function modifier($id_ordre) {
include("connect.inc.php");
$sql = "UPDATE ordres SET date_depart = '".$this->date_depart."',  date_arrivee = '".$this->date_arrivee."',  objet = '".$this->objet."',  noms = '".$this->noms."',  qualite = '".$this->qualite."', destination = '".$this->destination."',  duree = '".$this->duree."' ,  itineraire = '".$this->itineraire."' ,  origine_frais = '".$this->origine_frais."',  moyen_transport = '".$this->moyens_transport."' WHERE id_ordre = '$id_ordre' ";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "Modifications effectu&eacute;es<br>";
echo $reponse;
echo '<a href="index.php?module=ordres&action=gerer" class="message">Retour &agrave; la liste d\'ordres de missions</a>';
}
function afficher($req) {
include("connect.inc.php");
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='100%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td width='5%' align='center'>N&deg; </td><td width='15%'>Noms</td><td width='10%'>Date d&eacute;part</td><td width='10%'>Date de Retour</td><td width='15%'>Destination</td><td width='20%'>Itin&eacute;raire</td><td width='15%'>Objet</td><td width='10%' align='center'>Modifier</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' >";
$table .= "<td width='5%' align='center'>".$enreg['id_ordre']."</td><td width='15%'><a href='index.php?module=ordres&action=details&id_ordre=".$enreg['id_ordre']."' class='message'>".$enreg['noms']."</td><td width='10%'>".$enreg['date_depart']."</td><td width='10%'>".$enreg['date_arrivee']."</td><td width='15%'>".$enreg['destination']."</td><td width='20%'>".$enreg['itineraire']."</td><td width='10%'>".$enreg['objet']."</td>";
$table .="<td width='15%' align='center'><a href='index.php?module=ordres&action=modifier&id_ordre=".$enreg['id_ordre']."' class='message'>Modifier</a></td>";
}
$table .="</table>";
echo $table;
}

function TotalOrdres() {
$req = "select count(*) as totalordre from ordres";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$tab = mysql_fetch_array($res);
return $tab['totalordre'];
}

}

?>
