<?php
class transfert {
var $id_courrier;
var $id_user_source;
var $id_user_dest;
var $id_courrier_source;
var $id_courrier_dest;
var $date_transfert;

// constructeur

function transfert() {
$this->id_courrier = "";
$this->id_courrier_source = "";
$this->id_courrier_dest = "";
$this->id_user_source = "";
$this->id_user_dest = "";
$this->date_transfert = time();
}


// Méthode pour ajouter un nouveau fichier scanné

function ajouter() {
include("connect.inc.php");
$req = "INSERT INTO transmission VALUES ('','".$this->id_courrier_source."', '".$this->id_user_source."', '".$this->id_user_dest."', '".$this->date_transfert."')";
$req2 = "update courrier set tuteur = '".$this->id_user_dest."', orientation = '".$this->id_user_source."',  transmission = '1' where id = '".$this->id_courrier_source."'";
$res = mysql_query($req) or die ("erreur SQL".mysql_error());
$res2 = mysql_query($req2) or die ("erreur SQL".mysql_error());
$reqq = "update courrier set reception = 2 where id = ".$this->id_courrier_source;
$results = mysql_query($reqq) or die ("Error SQL".mysql_error());
echo "Courrier transférer avec succès <br>";
echo '<a href="javascript:history.back(-2)" class="message"> R&eacute;tour au courrier </a> |  <a href="index.php?module=courriers&action=nonlus" class="message">R&eacute;tour &agrave; la bo&icirc;te de r&eacute;ception</a>';
$request = "INSERT INTO actions_courriers VALUES('','".$this->id_courrier_source."', '".$_SESSION['id_utilisateur']."', '".$this->id_user_dest."', 'a transf&eacute;r&eacute;(e) le courrier &agrave; (au)','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
}

// méthode qui permet d'afficher toutes les notes

function afficher($id_courrier) {
include("connect.inc.php");
require_once("classes/users.class.inc.php");
require_once("classes/services.class.inc.php");
$req = "SELECT * FROM transmission WHERE id_courrier_source = '".$_GET['id_courrier']."' ORDER BY id_trans DESC";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau'>";
$table .= "<td>Transmi par</td><td>Transmis &agrave;</td><td>Transmis le</td></tr>";
$user = new user;
$service = new service;
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor'><td>".$service->nomservice($enreg['id_user_source'])."</td><td>".$service->nomservice($enreg['id_user_dest'])."</td><td>".date('d/m/Y à H:i', $enreg['date_transmission'])."</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}
// Méthode qui compte le nombre de fichiers transmis par un utilisateur

function Totaltransmis($id_utilisateur) {
include("connect.inc.php");
$req = "select count(*) As tottransmis from transmission where id_user_source = '$id_utilisateur'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$data = mysql_fetch_array($res);
return $data['tottransmis'];
}

// Méthode qui affiche tous les courriers transmis par un utilisateur

function TransmisUser($id_utilisateur) {
include("connect.inc.php");
include("classes/users.class.inc.php");
$req = "SELECT * FROM transmission WHERE id_user_source = '".$_SESSION['id_utilisateur']."' ORDER BY id_trans DESC";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau'>";
$table .= "<td>Expediteur</td><td>Transmis &agrave;</td><td>Transmis le</td></tr>";
$user = new user;
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor'><td>".$user->nomuser($enreg['id_user_source'])."</td><td>".$user->nomuser($enreg['id_user_dest'])."</td><td>".date('d/m/Y', $enreg['date_transmission'])."</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}
}
?>
