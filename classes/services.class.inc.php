<?php

class service {

var $libelle_service;
var $prefixe;

// constructeur

function service() {
$this->libelle_service = "";
$this->prefixe = "";
}

// Méthode pour ajouter un nouveau service

function ajouter() {
include("connect.inc.php");
$sql = "INSERT INTO services VALUES ('','".$this->libelle_service ."','".$this->prefixe."', '0')";
if(mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error())) {
$reponse = "Entit&eacute;correctement ajout&eacute;e, merci<br>";
}
else
{
$reponse = "Erreur lors de l'ajout de l'entit&eacute;<br>";
}
$reponse .= '<a href="index.php?module=admin&action=service" class="message">Retour aux entit&eacute;s </a>';
echo $reponse;
}

// Méthode pour modifier un service existant

function modifier($id_service) {
include("connect.inc.php");
$sql = "UPDATE services SET service = '".$this->libelle_service ."', prefixe = '".$this->prefixe."' WHERE id_service = $id_service";
if(mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error())) {
$reponse =  "Entit&eacute; modifi&eacute;e avec succ&egrave;s<br>";
$reponse .= '<a href="index.php?module=admin&action=service" class="message">Retour aux entit&eacute;s </a>';
}
else
{
$reponse = "Erreur lors de la modification de l'entit&eacute;";
}
echo $reponse;
}

// méthode qui permet d'afficher tous les services dans un tableau

function afficher() {
include("connect.inc.php");
$req = "SELECT * FROM services ORDER BY id_service ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height = '21' class='titretableau' >";
$table .= "<td>Entit&eacute;</td><td>Pr&eacute;fixe R&eacute;f&eacute;rence</td><td>Modifier</td><td>Supprimer</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height = '21' bgcolor='$bgcolor'><td>".$enreg['service']."</td><td>".$enreg['prefixe']."</td>";
$table .= "<td><a class='message'  href='index.php?module=services&amp;action=modifier&amp;id_service=".$enreg['id_service']."'>Modifier</a></td>";
$table .= "<td><a class='message' href='#' onclick='supprimer(\"service\", ".$enreg['id_service'].")'>Supprimer</a></td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

// Méthode qui permet le nom d'un service en fonction de son id 
function afficher_id($id_utilisateur) {
include("connect.inc.php");
$req1 = "select service from utilisateurs where id_utilisateur = '$id_utilisateur'";
$res1 = mysql_query($req1) or die ("Erreur SQL".mysql_error());
$data1 = mysql_fetch_array($res1);
$id_service = $data1['service']; 
$req = "select * from services where id_service = '$id_service'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$data = mysql_fetch_array($res);
return $data['service'];
}

function nomservice($id_service) {
$req = "select * from services where id_service = '$id_service'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$dat =mysql_fetch_array($res);
return $dat['service'];
}
function incrementation($id_service) {
$req = "select * from services where id_service = '$id_service'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$dat =mysql_fetch_array($res);

//let's check this incrementation out

$reqs = "select * from courrier where categorie = '2' and ref like '%".$this->prefixeservice($_SESSION['service'])."%' order by id desc limit 0, 1";
$ress = mysql_query($reqs) or die ("Erreur SQL".mysql_error());
$datas = mysql_fetch_array($ress);
$year = date('y', time());
$years = date('y', $datas['date_arrivee']);
//echo $year." year<br>";
//echo $datas['year']." datas <br>";
if($year == $years) {
$myreq = "select * from services where id_service = '".$_SESSION['service']."'";
$myres = mysql_query($myreq);
$mydata = mysql_fetch_array($myres);
$incre = $mydata['last'] + 1;
}
else
{
$incre = 1;
}
if($incre < 10 ) {
$increm = "0000".$incre;
}
elseif($incre < 100 ) {
$increm = "000".$incre;
}
elseif($incre < 1000 ) {
$increm = "00".$incre;
}
elseif($incre < 10000 ) {
$increm = "0".$incre;
}
else
{
$increm = $incre;
}
$req2 = "update services set last = '$incre' where id_service = '$id_service'";
$res2 = mysql_query($req2) or die ("Erreur SQL".mysql_error());
return $increm;
}

function prefixeservice($id_service) {
$req = "select * from services where id_service = '$id_service'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$dat =mysql_fetch_array($res);
return $dat['prefixe'];
}

function supprimer($id) {
include("connect.inc.php");
$req = "delete from services where id_service = '$id'";
$res = mysql_query($req) or die ("erreur sql".mysql_error());
$reponse = "Entit&eacute; supprim&eacute; avec succ&egrave;s";
echo $reponse;
}
}
?>
