<?php

class autorisation {

var $date_depart;
var $date_arrivee;
var $objet;
var $noms;
var $qualite;
var $destination;
var $duree;
var $origine_frais;
var $moyens_transport;
var $itineraire;
var $id_saisi;
var $timestamp;

// constructeur

function user() {
$this->date_depart = "";
$this->date_arrivee = "";
$this->objet = "";
$this->noms = "";
$this->qualite = "";
$this->destination = "";
$this->origine_frais = "";
$this->moyens_transport = "";
$this->itineraire = "";
$this->duree = "";
$this->id_saisi = $_SESSION['id_utilisateur'];
$this->timestamp = time();
}

// Méthode pour ajouter un nouvel utilisateur

function ajouter() {
include("connect.inc.php");
$sql = "INSERT INTO autorisation VALUES ('','".$this->date_depart."','".$this->date_arrivee."' ,'".$this->objet."' ,'".$this->noms."' ,'".$this->qualite."' , '".$this->destination."' ,'".$this->origine_frais."' ,'".$this->itineraire."' ,'".$this->moyens_transport."' ,'".$this->duree."' ,'".$this->id_saisi."' ,'".$this->timestamp."')";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse = "Enregistrement reussi, merci<br>";
$reponse .= '<a href="index.php?module=autorisation&action=gerer" class="message">Retour &agrave; la liste </a> | <a href="index.php?module=autorisation&action=ajouter" class="message">Retour &agrave; la liste </a><br>';
echo $reponse;
}

// Méthode pour modifier un utilisant existant

function modifier($id_autorisation) {
include("connect.inc.php");
$sql = "UPDATE autorisation SET date_depart = '".$this->date_depart."',  date_arrivee = '".$this->date_arrivee."',  objet = '".$this->objet."',  noms = '".$this->noms."',  qualite = '".$this->qualite."' ,  destination = '".$this->destination."',   duree = '".$this->duree."' ,   origine_frais = '".$this->origine_frais."' ,   itineraire = '".$this->itineraire."' ,   moyen_transport = '".$this->moyens_transport."' ,   duree = '".$this->duree."' WHERE id_autorisation = '$id_autorisation' ";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "Modifications effectu&eacute;es<br>";
echo $reponse;
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
$table .= "<td width='5%' align='center'>".$enreg['id_autorisation']."</td><td width='15%'><a href='index.php?module=autorisation&action=details&id_autorisation=".$enreg['id_autorisation']."' class='message'>".$enreg['noms']."</td><td width='10%'>".$enreg['date_depart']."</td><td width='10%'>".$enreg['date_arrivee']."</td><td width='15%'>".$enreg['destination']."</td><td width='20%'>".$enreg['itineraire']."</td><td width='10%'>".$enreg['objet']."</td>";
$table .="<td width='15%' align='center'><a href='index.php?module=autorisation&action=modifier&id_autorisation=".$enreg['id_autorisation']."' class='message'>Modifier</a></td>";
}
$table .="</table>";
echo $table;
}

function afficher2($req) {
include("connect.inc.php");
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='100%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td width='5%' align='center'>N&deg; </td><td width='15%'>Noms</td><td width='10%'>Date d&eacute;part</td><td width='10%'>Date Arriv&eacute;e</td><td width='20%'>Destinations</td><td width='20%'>Motif</td><td width='15%'>Dur&eacute;e</td><td width='10%' align='center'>Modifier</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' >";
$table .= "<td width='5%' align='center'>".$enreg['id_autorisation']."</td><td width='15%'><a href='index.php?module=autorisation&action=details&id_autorisation=".$enreg['id_autorisation']."' class='message'>".$enreg['noms']."</td><td width='10%'>".$enreg['date_depart']."</td><td width='10%'>".$enreg['date_arrivee']."</td><td width='15%'>".$enreg['destination']."</td><td width='20%'>".$enreg['objet']."</td><td width='10%'>".$enreg['duree']."</td>";
$table .="<td width='15%' align='center'><a href='index.php?module=autorisation&action=modifier&id_autorisation=".$enreg['id_autorisation']."' class='message'>Modifier</a></td>";
}
$table .="</table>";
echo $table;
}

function Totalautorisation() {
$req = "select count(*) as totalautorisation from autorisation";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$tab = mysql_fetch_array($res);
return $tab['totalautorisation'];
}

}

?>
