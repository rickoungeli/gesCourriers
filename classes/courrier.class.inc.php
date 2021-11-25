<?php

class courrier {

var $courrier_id;
var $expediteur;
var $destinataire;
var $objet;
var $type_courrier;
var $date_lettre;
var $date_arrivee;
var $synthese;
var $id_saisi;
var $ref;
var $nbre_pages;
var $categorie;
var $copie;
var $nbreannexes;
var $orientation;
var $id_entrant;

// constructeur

function courrier() {
$this->courrier_id = "";
$this->expediteur = "";
$this->destinataire = "";
$this->objet = "";
$this->type_courrier = "";
$this->date_lettre = "";
$this->date_arrivee = time();
$this->synthese = "";
$this->id_saisi = $_SESSION['id_utilisateur'];
$this->ref = "";
$this->nbre_pages = 1;
$this->categorie = "";
$this->reception = "0";
$this->traitement = "0";
$this->nbreannexes = "0";
$this->orientation = "0";
$this->transmission = "0";
$this->id_entrant = "0";
}

// Méthode pour ajouter un nouveau courrier

function ajouter() {
include("connect.inc.php");
if($this->categorie == 1) {
$reqs = "select * from increm order by id desc limit 0, 1";
$ress = mysql_query($reqs) or die ("Erreur SQL".mysql_error());
$datas = mysql_fetch_array($ress);
$increm = $datas['increm'] + 1;
if($increm < 10 ) {
$increm = "0000".$increm;
}
elseif($increm < 100 ) {
$increm = "000".$increm;
}
elseif($increm < 1000 ) {
$increm = "00".$increm;
}
elseif($increm < 10000 ) {
$increm = "0".$increm;
}
else
{
$increm = $increm;
}
$year = date('y', time());
//echo $year." year<br>";
//echo $datas['year']." datas <br>";
if($year == $datas['year']) {
$this->id_entrant = $increm."-".$datas['year'];
$reqssss = "update increm set increm = '$increm' where id = 1";
$resssss = mysql_query($reqssss);
//echo $increm." et ".$year;
}
else
{
$years = $datas['year'] + 1;
$this->id_entrant = "00001-".$years;
$requ = "update increm set increm = '1', year = '$years' where id = 1";
$resu = mysql_query($requ) or die ("Erreur SQL".mysql_error()."<br>".$requ);
//echo $increm." et ".$years;
}
}
else
{
$this->id_entrant = 0;
}
$sql = "INSERT INTO courrier VALUES ('','".$this->expediteur."','".$this->destinataire."' ,'".$this->objet."' ,'".$this->ref."' ,'".$this->id_saisi."' ,'".$this->date_lettre."' ,'".$this->date_arrivee."' ,'".$this->synthese."' ,'".$this->type_courrier."', '".$this->nbre_pages."', '".$this->categorie."', '".$this->reception."', '".$this->tuteur."', '".$this->orientation."','".$this->nbreannexes."','".$this->transmission."', '".$this->traitement."', '".$this->id_entrant."')";
$ans = mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de donn&eacute;es<br>".mysql_error());
$this->courrier_id = mysql_insert_id();
if($this->categorie == 1) {
$request = "select * from courrier where id = '".$this->courrier_id."'";
$result = mysql_query($request) or die ("Erreur SQL".mysql_error());
$datas = mysql_fetch_array($result);
$this->courrier_id = $datas['id_entrant'];
}
echo '<div class="titre2" style="border-bottom: dashed 1px #0000FF;"><strong>Enregistrement pr&eacute;c&eacute;dent r&eacute;ussi </strong></div><br>';
}

// Méthode pour modifier un courrier existant

function modifier($id_courrier) {
include("connect.inc.php");
$sql = "UPDATE courrier SET expediteur = '".$this->expediteur."',  destinataire = '".$this->destinataire."',  objet = '".$this->objet."', ref = '".$this->ref."', date_lettre = '".$this->date_lettre."',  synthese = '".$this->synthese."',  id_type = '".$this->type_courrier."', nbre_pages = '".$this->nbre_pages."', tuteur = '".$this->tuteur."', orientation = '".$this->orientation."' WHERE id = '$id_courrier' ";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de donn&eacute;es<br>".mysql_error()."<br>".$sql);
}
function modifierref($id_courrier) {
include("connect.inc.php");
$sql = "UPDATE courrier SET ref = '".$this->ref."' WHERE id = '$id_courrier'";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de donn&eacute;es<br>".mysql_error()."<br>".$sql);
}


// méthode qui permet d'afficher les courriers en réponse d'une requête
function affichersreq($req) {
include("connect.inc.php");
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td width='5%'>R&eacute;f. </td><td width='5%' align='center'>Vu</td><td widht='20%'>Expediteur</td><td width='20%'>Destinataire</td><td widht='25%'>Objet</td><td widht='15%'>Type de courrier</td><td widht='15%'> Date d'arriv&eacute;e</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
require_once("classes/type_courrier.class.inc.php");
$type_courrier = new type_courrier;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='5%'>";
if($enreg['categorie'] == 2) {
$table .= $enreg['id'];
}
else
{
$table .= $enreg['id_entrant'];
}
$table .= "</td>";
if($enreg['reception'] <= 2 and $enreg['traitement'] == 0) {
$table .= "<td width='5%' align = 'center'><img src='images/faux.png' border='0'></td>";
}
elseif($enreg['reception'] > 2 and $enreg['traitement'] == 0) 
{
$table .= "<td width='5%' align = 'center'><img src='images/trebien.png' border='0'></td>";
}
else 
{
$table .= "<td width='5%' align = 'center'><img src='images/fleche_retour.png' border='0'></td>";
}
$table .= "<td width='15%'><a class='message' href='index.php?module=courriers&amp;action=details&amp;id_courrier=".$enreg['id']."'>".$enreg['expediteur']."</a></td><td width='20%'>".$enreg['destinataire']."</td><td width='25%'>". $enreg['objet']."</td><td width='15%'>". $type_courrier->nomtype($enreg['id_type'])."</td><td width='15%'> ".date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

// Fin de la méthode

// méthode qui permet d'afficher les courriers en réponse d'une requête (pour les courriers envoyés)
function affichersreqs($reqs) {
include("connect.inc.php");
$res = mysql_query($reqs) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='30%'>Destinataire</td><td widht='40%'>Objet</td><td widht='20%'>Envoy&eacute;e le</td><td widht='10%'> Etat</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
require_once("classes/users.class.inc.php");
$user = new user;
if(is_numeric($enreg['destinataire'])) {
$expedit = $user->nomuser($enreg['destinataire']);
}
else
{
$expedit = $enreg['destinataire'];
}
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='30%'><a class='message' href='index.php?module=courriers&amp;action=details&amp;id_courrier=".$enreg['id']."'>".$expedit."</a></td><td width='40%'>".$enreg['objet']."</td><td width='20%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>";
if($enreg['reception'] == 0) {
$table .= "<a  class='message' href='#' onclick='reception(".$enreg['id'].")'>Accuser</a>";
}
else
{
$table .= "Dej&agrave; re&ccedil;u";
}
$table .="</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}


// Méthode qui permet d'afficher tous les courriers chez l'administrateur

function afficheradmin($req) {
include("connect.inc.php");
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='5%' align='center'><input type='checkbox' name='option1'></td><td widht='5%' align='center'>R&eacute;f.</td>";
$table .= "<td width='15%'>Expediteur</td><td widht='25%'>Destinataire</td><td width='20%'>Objet</td><td width='10%'>Arriv&eacute; le</td><td width='15%'> Type courrier</td><td width='5%'> Modifier</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
include("classes/users.class.inc.php");
require_once("classes/type_courrier.class.inc.php");
$type_courrier = new type_courrier;
$user = new user;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['expediteur'])) {
$expedit = $user->nomuser($enreg['expediteur']);
}
else
{
$expedit = $enreg['expediteur'];
}

$table .= "<tr height='24px' bgcolor='$bgcolor' name='".$enreg['id']."' >";
if($enreg['reception'] == 0) {
$table .= "<td width='5%' align='center'><input type='checkbox' name='case[]' value = '".$enreg['id']."' >";
}
else
{
$table .= "<td width='5%' align='center' ><img src='images/trebien.png' border='0'></td>";
}
if($enreg['categorie'] == 1) {
$id_courrier = $enreg['id_entrant'];
}
else
{
$id_courrier = $enreg['id'];
}
$table .="<td width='5%' align='center'>".$id_courrier."</td><td width='10%'>".$enreg['expediteur']."</td><td width='20%'>".$enreg['destinataire']."</td><td width='20%'>".$enreg['objet']."</td><td width='15%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>".$type_courrier->nomtype($enreg['id_type'])."</td>";
if($enreg['reception'] == '0') {
$table .= "<td width='5%'><a class='message' href='#' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\"> Modifier </a></td>";
}
else 
{
$table .= "<td width='5%'>Modifier</td>";
}
}
$table .="</table>";
echo $table;

}

function afficheradmi($req) {
include("connect.inc.php");
require_once("classes/services.class.inc.php");
require_once("classes/type_courrier.class.inc.php");
$service = new service;
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='5%' align='center'><input type='checkbox' name='option1'></td>";
$table .= "<td widht='5%' align='center'>Vu</td><td width='5%' > R&eacute;f.</td><td width='10%' >R&eacute;f. Courrier</td>";
$table .= "<td width='15%'>Exp&eacute;diteur</td><td widht='15%'>Destinataire</td><td width='15%'>Objet</td><td width='10%'>Arriv&eacute; le</td><td width='15%'>Type Courrier</td><td width='5%'> Orientation</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
include("classes/users.class.inc.php");
$user = new user;
$type_courrier = new type_courrier;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['expediteur'])) {
$expedit = $user->nomuser($enreg['expediteur']);
}
else
{
$expedit = $enreg['expediteur'];
}
if($enreg['orientation'] != 0 and $enreg['tuteur'] == '0') {
$orientation = "<strong><font color='#33CCFF'>".$service->nomservice($enreg['orientation'])."</font></strong>";
}
elseif($enreg['tuteur'] != 0){
$orientation = $service->nomservice($enreg['orientation']);
}
else
{
$orientation = "<font color='#FF00000'>Non orient&eacute;</font>";
}
$table .= "<tr height='24px' bgcolor='$bgcolor' name='".$enreg['id']."' onmouseover=\"javascript:this.style.background ='#C1F0FF';\" onmouseout=\"javascript:this.style.background ='".$bgcolor."';\">";
if($enreg['tuteur'] == 0) {
$table .= "<td width='5%' align = 'center'><input type='checkbox' name='case[]' value = '".$enreg['id']."'  ></td>";
}
else
{
$table .= "<td width='5%' align = 'center'><img src='images/trebien.png' border='0'></td>";
}
if($enreg['reception'] <= 1 and $enreg['traitement'] == 0) {
$table .= "<td width='5%' align = 'center'><img src='images/faux.png' border='0'></td>";
}
elseif( $enreg['reception'] > 1 and $enreg['traitement'] == 0 )
{
$table .= "<td width='5%' align = 'center'><img src='images/trebien.png' border='0'></td>";
}
else {
$table .= "<td width='5%' align = 'center'><img src='images/fleche_retour.png' border='0'></td>";
}
if($enreg['categorie'] == 1) {
$id_courrier = $enreg['id_entrant'];
}
else
{
$id_courrier = $enreg ['id'];
}
$table .="<td width='5%' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\" style=\"cursor:pointer;\">".$id_courrier."</td><td width='10%'>".$enreg['ref']."</td><td width='15%' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\" style=\"cursor:pointer;\">".$enreg['expediteur']."</td><td width='15%' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\" style=\"cursor:pointer;\" >".$enreg['destinataire']."</td><td width='15%' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\" style=\"cursor:pointer;\" >".$enreg['objet']."</td><td width='10%' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\" style=\"cursor:pointer;\">". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td>";
$table .= "<td width='15%' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\" style=\"cursor:pointer;\">".$type_courrier->nomtype($enreg['id_type'])."</td>";
$table .= "<td width='10% onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\" style=\"cursor:pointer;\"'>".$orientation."</td>";
}
$table .="</table>";
echo $table;

}


// Methode qui permet d'afficher tous les courriers nons lus d'un utilisateur
function afficheradmis($req) {
include("connect.inc.php");
require_once("classes/services.class.inc.php");
$service = new service;
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='5%'><input type='checkbox' name='option1'></td><td width='15%'>Expediteur</td><td widht='15%'>Destinataire</td><td width='15%'>Objet</td><td width='15%'>Envoy&eacute; le</td><td width='15%'> R&eacute;f.</td><td width='15%'>Orientation</td><td width='5%'> Modifier</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
include("classes/users.class.inc.php");
$user = new user;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['expediteur'])) {
$expedit = $user->nomuser($enreg['expediteur']);
}
else
{
$expedit = $enreg['expediteur'];
}

$table .= "<tr height='24px' bgcolor='$bgcolor' name='".$enreg['id']."' >";
if($enreg['tuteur'] == 0) {
$table .= "<td width='5%'><input type='checkbox' name='case[]' value = '".$enreg['id']."' ></td>";
}
else
{
$table .= "<td width='5%'><img src='images/trebien.png' border='0' ></td>";
}
$table .="<td width='15%'>".$enreg['expediteur']."</td><td width='15%'>".$enreg['destinataire']."</td><td width='15%'>".$enreg['objet']."</td><td width='15%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>".$enreg['ref']."</td>";
if($enreg['tuteur'] == 0) {
$table .= "<td width='15%'>Non orient&eacute;</td>";
}
else
{
$orientation = $service->nomservice($enreg['tuteur']);
$table .= "<td width='15%'>".$orientation."</td>";
}
$table .= "<td width='5%'><a class='message' href='#' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\"> Modifier </a></td></tr>";
}
$table .= "</table>";
echo $table;

}

// Méthode qui affiche tous les courriers sortants

// Methode qui permet d'afficher tous les courriers nons lus d'un utilisateur
function afficheradmiss($req) {
include("connect.inc.php");
require_once("classes/services.class.inc.php");
$service = new service;
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='5%'><input type='checkbox' name='option1'></td><td width='15%'>Expediteur</td><td widht='15%'>Destinataire</td><td width='15%'>Objet</td><td width='15%'>Envoy&eacute; le</td><td width='15%'> R&eacute;f.</td><td width='15%'>Orientation</td><td width='5%'> Modifier</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
include("classes/users.class.inc.php");
$user = new user;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['expediteur'])) {
$expedit = $user->nomuser($enreg['expediteur']);
}
else
{
$expedit = $enreg['expediteur'];
}

$table .= "<tr height='24px' bgcolor='$bgcolor' name='".$enreg['id']."' >";
if($enreg['tuteur'] == 0 or $enreg['reception'] != 10) {
$table .= "<td width='5%'><input type='checkbox' name='case[]' value = '".$enreg['id']."' ></td>";
}
else
{
$table .= "<td width='5%'><img src='images/trebien.png' border='0' ></td>";
}
$table .="<td width='15%'><a href='index.php?module=courriers&action=details&id_courrier=".$enreg['id']."'  class='message' >".$enreg['expediteur']."</a></td><td width='15%'>".$enreg['destinataire']."</td><td width='15%'>".$enreg['objet']."</td><td width='15%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>".$enreg['ref']."</td>";
if($enreg['tuteur'] == 0) {
$table .= "<td width='15%'>Non orient&eacute;</td>";
$table .= "<td width='5%'><a class='message' href='#' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."','Ajouter','width=500,height=550')\"> Modifier </a></td>";
}
elseif($enreg['tuteur'] == 100) {
$orientation = "sortant";
$table .= "<td width='15%'>".$orientation."</td>";
$table .= "<td width='5%'>Modifier</td>";
}
else
{
$orientation = $service->nomservice($enreg['tuteur']);
$table .= "<td width='15%'>".$orientation."</td>";
$table .= "<td width='5%'>Modifier</td>";
}
}
$table .="</table>";
echo $table;
}
// Affichage de voir les tableaux pour ajouter les synthèses

function affichersynthese($req) {
include("connect.inc.php");
require_once("classes/services.class.inc.php");
$service = new service;
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='5%'><input type='checkbox' name='option1'></td><td width='5%'> R&eacute;f.</td><td width='15%'>Expediteur</td><td widht='15%'>Destinataire</td><td width='15%'>Objet</td><td width='15%'>Synth&egrave;se</td><td width='5%'> Modifier</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
include("classes/users.class.inc.php");
$user = new user;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['expediteur'])) {
$expedit = $user->nomuser($enreg['expediteur']);
}
else
{
$expedit = $enreg['expediteur'];
}
if($enreg['orientation'] != 0) {
$orientation = $service->nomservice($enreg['orientation']);
}
else
{
$orientation = "Non orient&eacute;";
}
$table .= "<tr height='24px' bgcolor='$bgcolor' name='".$enreg['id']."' ><td width='5%'><input type='checkbox' name='case[]' value = '".$enreg['id']."' >";
if($enreg['categorie'] == 1) {
$id_courrier = $enreg['id_entrant'];
}
else
{
$id_courrier = $enreg ['id'];
}
$table .="</td><td width='5%'>".$id_courrier."</td><td width='15%'>".$enreg['expediteur']."</td><td width='15%'>".$enreg['destinataire']."</td><td width='15%'>".$enreg['objet'];
$table .= "<td width='30%'>".$enreg['synthese']."</td>";
$table .= "<td width='5%'><a class='message' href='#' onclick =\" OuvrirFenetre('modules/courriers/modifier_courrier.php?id_courrier=".$enreg['id']."&synthese=1','Ajouter','width=500,height=550')\"> Modifier </a></td>";
}
$table .="</table>";
echo $table;

}


// Méthode pour afficher les courriers de tous les collèges chez le dircaba

function afficherdircaba($req) {
include("connect.inc.php");
require_once("classes/services.class.inc.php");
$service = new service;
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='10%'>R&eacute;f.</td><td width='20%'>Expediteur</td><td widht='20%'>Destinataire</td><td width='30%'>Objet</td><td width='10%'> Re&ccedil;u le</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
include("classes/users.class.inc.php");
$user = new user;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['expediteur'])) {
$expedit = $user->nomuser($enreg['expediteur']);
}
else
{
$expedit = $enreg['expediteur'];
}
if($enreg['orientation'] != 0) {
$orientation = $service->nomservice($enreg['orientation']);
}
else
{
$orientation = "Non orient&eacute;";
}
$table .= "<tr height='24px' bgcolor='$bgcolor' name='".$enreg['id']."' ><td width='10%'>".$enreg['id']."</td>";
$table .="<td width='20%'>".$enreg['expediteur']."</td><td width='20%'>".$enreg['destinataire']."</td>";
$table .= "<td width='30%'>".$enreg['objet']."</td>";
$table .= "<td width='10%'>".date('d/m/Y', $enreg['date_arrivee'])."</td></tr>";;
}
$table .="</table>";
echo $table;

}



// Méthode pour afficher les messages en cours de traitement


function afficherslus($id_utilisateur, $categorie) {
include("connect.inc.php");
$req = "SELECT * FROM courrier WHERE destinateur = '$id_utilisateur' and tuteur = '$id_destinataire' AND categorie='$categorie' and reception = 0 and traitement = '0' ORDER BY id DESC ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='30%'>Expediteur</td><td widht='40%'>Objet</td><td widht='20%'>Date d'arriv&eacute;e</td><td widht='10%'> R&eacute;ception</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='30%'><a class='message' href='index.php?module=courriers&amp;action=details&amp;id_courrier=".$enreg['id']."'>".$enreg['expediteur']."</a></td><td width='40%'>".$enreg['objet']."</td><td width='20%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>";
if($enreg['reception'] == 0) {
$table .= "<a  class='message' href='#' onclick='reception(".$enreg['id'].")'>Accuser</a>";
}
else
{
$table .= "Dej&agrave; re&ccedil;u";
}
$table .="</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}


// Méthode qui affiche les courriers sortant en espace admin

function afficheradminsortant($req) {
include("connect.inc.php");
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='20%'>Expediteur</td><td widht='15%'>Destinataire</td><td width='20%'>Objet</td><td width='15%'>Envoy&eacute; le</td><td width='15%'> Modifier</td><td width='15%'> Supprimer</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
include("classes/users.class.inc.php");
$user = new user;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['destinataire'])) {
$destin = $user->nomuser($enreg['destinataire']);
}
else
{
$destin = $enreg['destinataire'];
}

$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='20%'>";

$table .="<a class='message' href='index.php?module=courriers&amp;action=details&amp;id_courrier=".$enreg['id']."'>".$user->nomuser($enreg['expediteur'])."</a></td><td width='15%'>".$destin."</td><td width='20%'>".$enreg['objet']."</td><td width='15%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td>";

$table .= "<td width='15%'><a class='message' href='index.php?module=courriers&amp;action=modifier&amp;id_courrier=".$enreg['id']."'> Modifier </a></td>";
$table .= "<td width='15%'><a class='message' href='#' onclick='supprimer(\"courrier\", ".$enreg['id'].")'>Supprimer</a></td></tr>";

}
$table .="</table>";
echo $table;

}


// Méthode qui affiche tous les messages en cours de traitement d'un utilisateur

function affichersencours($id_utilisateur, $categorie) {
include("connect.inc.php");
$req = "SELECT * FROM courrier WHERE destinateur = '$id_utilisateur' AND tuteur = '$id_utilisateur' AND categorie='$categorie' and reception = 1 and traitement = 0 ORDER BY id DESC ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='30%'>Expediteur</td><td widht='40%'>Objet</td><td widht='20%'>Date d'arriv&eacute;e</td><td widht='10%'> R&eacute;ception</td></tr>";

$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='30%'><a class='message' href='index.php?module=courriers&amp;action=details&amp;id_courrier=".$enreg['id']."'>".$enreg['expediteur']."</a></td><td width='40%'>".$enreg['objet']."</td><td width='20%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>";
if($enreg['reception'] == 0) {
$table .= "<a  class='message' href='#' onclick='reception(".$enreg['id'].")'>Accuser</a>";
}
else
{
$table .= "Dej&agrave; re&ccedil;u";
}
$table .="</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

// Fin de la méthode qui affiche tous les messages en cours de traitement.


// Méthode qui affiche tous les courriers transmis chez d'autres utilisateurs

function afficherstransmis($id_utilisateur, $categorie) {
include("connect.inc.php");
include("classes/services.class.inc.php");
$service = new service;
$req = "SELECT * FROM courrier WHERE transmission = 1 AND tuteur != '$id_utilisateur' AND orientation = '$id_utilisateur' and  traitement = 0 ORDER BY id DESC ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='20%'>Expediteur</td><td widht='30%'>Objet</td><td widht='20%'>Transmis &agrave;</td><td widht='20%'>Date d'arriv&eacute;e</td><td widht='10%'> R&eacute;ception</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='20%'><a class='message' href='index.php?module=courriers&amp;action=details&amp;id_courrier=".$enreg['id']."'>".$enreg['expediteur']."</a></td><td width='30%'>".$enreg['objet']."</td><td width='20%'>".$service->nomservice($enreg['tuteur'])."</td><td width='20%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>";
if($enreg['reception'] == 0) {
$table .= "Non re&ccedil;u";
}
else
{
$table .= "Dej&agrave; re&ccedil;u";
}
$table .="</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

// Méthode qui affiche tous les messages en cours de traitement d'un utilisateur

function affichersarchive($id_service) {
include("connect.inc.php");
$req = "SELECT * FROM courrier WHERE traitement = 1 AND tuteur = '$id_service' OR expediteur = '$id_service' ORDER BY id DESC ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='30%'>Expediteur</td><td widht='40%'>Objet</td><td widht='20%'>Date d'arriv&eacute;e</td><td widht='10%'> R&eacute;ception</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
require_once("classes/users.class.inc.php");
$user= new user;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if(is_numeric($enreg['expediteur'])) $exp = $user->nomuser($enreg['expediteur']); else $exp = $enreg['expediteur'];
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='30%'><a class='message' href='index.php?module=courriers&amp;action=details&amp;id_courrier=".$enreg['id']."'>".$exp."</a></td><td width='40%'>".$enreg['objet']."</td><td width='20%'>". date('d/m/Y H:i:s', $enreg['date_arrivee'])."</td><td width='10%'>";
if($enreg['reception'] == 0) {
$table .= "<a  class='message' href='#' onclick='reception(".$enreg['id'].")'>Accuser</a>";
}
else
{
$table .= "Dej&agrave; re&ccedil;u";
}
$table .="</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

// Fin de la méthode

//Tous les courriers d'un utilisateur;

function TotalMessage($id_utilisateur) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where destinataire = '$id_utilisateur' and tuteur = '$id_utilisateur' ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}

// Tous les courriers envoyés d'un utilisateur

function TotalMessageEnvoyes($id_utilisateur) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where expediteur = '$id_utilisateur' and categorie = 2";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}

// Tous les courriers en cours de traitement par un utilisateur

function TotalMessageTrait($id_utilisateur) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '$id_utilisateur' and traitement = 1";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}
function TotalMessageRecu($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '$id_service' and traitement = 0 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}
function TotalMessageRecu2($id_service, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '$id_service' and traitement = 0 and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

function TotalMessageRecuDir($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where (tuteur = '$id_service' or ( orientation = '$id_service' and transmission = 0 and tuteur != 100 and categorie = 1))  and traitement = 0 and categorie = 1  ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

function TotalMessageRecuDir_ext($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where (tuteur = '$id_service' or ( orientation = '$id_service' and transmission = 0 and tuteur != 100 and categorie = 1))  and traitement = 0  ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

function TotalMessageRecuDir_int($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '$id_service' and transmission = 0 and categorie = 2 and traitement = 0  ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

function TotalMessageRecuDir2($id_service, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where (tuteur = '$id_service' or ( orientation = '$id_service' and transmission = 0 and tuteur != 100 and categorie = 1))  and traitement = 0 and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}
// Tous les courrier recu en une date
function TotalMessageDate($d, $m, $y) {
$date = mktime(0, 0, 0, $m, $d, $y);
$timestampsuivant = mktime(0,0,0, $m, $d + 1, $y);
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where date_arrivee >= $date and date_arrivee <= $timestampsuivant and categorie = '1'";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}

// Tous les courriers envoyés en une date
function TotalMessageSentDate($d, $m, $y) {
$date = mktime(0, 0, 0, $m, $d, $y);
$timestampsuivant = mktime(0,0,0, $m, $d + 1, $y);
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where date_arrivee >= $date and date_arrivee <= $timestampsuivant and categorie = '2'";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}

// Tous les courriers recus en une période
	function TotalMessageRecuPeriod($timestamp1, $timestamp2) {
	include("connect.inc.php");
	$req = "select count(*) as nbre_messages from courrier where date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2 and categorie = 1";
	$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
	$tot = mysql_fetch_array($res);
	return $tot['nbre_messages'];
	}

// Tous les courriers envoyés en une période

	function TotalMessageSentPeriod($timestamp1, $timestamp2) {
	include("connect.inc.php");
	$req = "select count(*) as nbre_messages from courrier where date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2 and categorie = 2";
	$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
	$tot = mysql_fetch_array($res);
	return $tot['nbre_messages'];
	}

// Tous les courriers reçu par un service

function TotalCourrierRecuService($service) {
include("connect.inc.php");
$total = 0;
$requ1 = "select * from utilisateurs where service = '$service'";
$resu1 = mysql_query($requ1) or die ("Erreur SQL".mysql_error());
while($data1 = mysql_fetch_array($resu1)) {
$id_utilisateur = $data1['id_utilisateur'];
$req = "select count(*) as nbre_messages from courrier where destinataire = '$id_utilisateur' and categorie = 1";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
$courriers_user = $tot['nbre_messages'];
$total = $total + $courriers_user;
}
return $total;
}

// Tous les courriers envoyés par un service


function TotalCourrierSentService($service) {
include("connect.inc.php");
$total = 0;
$requ1 = "select * from utilisateurs where service = '$service'";
$resu1 = mysql_query($requ1) or die ("Erreur SQL".mysql_error());
while($data1 = mysql_fetch_array($resu1)) {
$id_utilisateur = $data1['id_utilisateur'];
$req = "select count(*) as nbre_messages from courrier where destinataire = '$id_utilisateur' and categorie = 2";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
$courriers_user = $tot['nbre_messages'];
$total = $total + $courriers_user;
}
return $total;
} // fin de la méthode 


// Méthode qui permet d'archiver un courrier

function ArchiverCourrier($id_courrier, $source) {
include("connect.inc.php");
$req = "update courrier set traitement = '1' and tuteur = '$source'  where id = '$id_courrier'";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
} // fin de la méthode 

// Méthode qui permet de compter le nombre de reçu par un utilisateur

function TotalMessageSaisi() {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where categorie = '1' and traitement = '0' ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} 
function TotalMessageSaisi2($timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where categorie = '1' and traitement = '0' and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} 
// fin de la méthode 


function TotalMessageNonOrientes() {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where categorie = '1' and reception > 0";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}
function TotalMessageColleges() {
include("connect.inc.php");
$req = "SELECT COUNT(*) AS nbre_messages FROM courrier WHERE categorie='1' AND orientation != 0 AND tuteur != 6 AND tuteur != 10 AND orientation != 6 AND orientation != 10";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

function TotalMessageSynthese() {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where reception > 0 and (orientation = 6 OR orientation = '8' OR tuteur =  '6' OR tuteur = '8')";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

// Méthode qui permet de compter le nombre de courriers lus d'un utilisateur

function TotalMessageLus($id_utilisateur) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '$id_utilisateur' and traitement = 0";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} 

function TotalMessageLus2($id_utilisateur, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '$id_utilisateur' and traitement = 0 and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2  ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} 
function TotalCourriersTransmis($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where transmission = 1 and orientation = '$id_service' and tuteur != '$id_service' and tuteur != 0 and traitement = 0" ;
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} 

function TotalCourriersTransmis2($id_service, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where transmission = 1 and orientation = '$id_service' and tuteur != '$id_service' and tuteur != 0 and traitement = 0 and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2  " ;
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} 
// fin de la méthode 

// Méthode qui permet de compter le nombre de courriers lus d'un utilisateur

function TotalArchive($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where traitement = 1 and (tuteur = '$id_service' or orientation = '$id_service') ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} // 


function TotalArchive2($id_service, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where (destinataire = '$id_service' or tuteur = '$id_service') and traitement = '1' and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}

// Méthode qui permet de compter le nombre de courriers lus d'un utilisateur

function TotalMessageSent($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where orientation = '$id_service' and categorie =  2 and tuteur != 100 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} 



function TotalMessageSent2($id_service, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where orientation = '$id_service' and categorie =  2 and tuteur != 100 and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}
// fin de la méthode 

function TotalMessageSortant($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '100' and categorie = 2 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

function TotalMessageInternes($id_service) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur != '100' and tuteur != 0 and categorie = 2 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];
}

function TotalMessageSortant2($id_service, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where tuteur = '100' and categorie = 2 and date_arrivee <= $timestamp1 and date_arrivee >= $timestamp2 ";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

} // fin de la méthode 


// Méthode qui permet de compter les courriers encours d'envoi (brouillon)

function TotalMessageBrouillon($id_utilisateur) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where expediteur = '$id_utilisateur' and reception = 0";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}

function TotalMessageBrouillon2($id_utilisateur, $timestamp1, $timestamp2) {
include("connect.inc.php");
$req = "select count(*) as nbre_messages from courrier where expediteur = '$id_utilisateur' and reception = 0 and date_arrivee <= $timestamp1 and date_arrivee >= $timestamp2";
$res = mysql_query($req) or die ('Erreur SQL'.mysql_error());
$tot = mysql_fetch_array($res);
return $tot['nbre_messages'];

}

function AfficherStatUser() {
include("connect.inc.php");
if(!isset($_POST['service'])) {
$req = "SELECT * FROM services ORDER BY service ";
}
elseif($_POST['service'] == "") {
$req = "SELECT * FROM services ORDER BY service  ";
}
else
{
$req = "SELECT * FROM services WHERE id_service = '".$_POST['service']."' ORDER BY service";
}
if(!isset($_POST['jourd']) and !isset($_POST['moisd']) and !isset($_POST['anneed'])) {
$timestamp1 = "0";
}
elseif($_POST['jourd'] == "" and $_POST['moisd'] == "" and $_POST['anneed'] == "") {
$timestamp1 = "0";
}
else
{
$jourd = $_POST['jourd'];
$moisd = $_POST['moisd'];
$anneed = $_POST['anneed'];
$timestamp1 = mktime(0, 0, 0,  $_POST['moisd'], $_POST['jourd'], $_POST['anneed']);
}
if(!isset($_POST['jourd2']) and !isset($_POST['moisd2']) and !isset($_POST['anneed2'])) {
$timestamp2 = time();
}
elseif($_POST['jourd2'] == "" and $_POST['moisd2'] == "" and $_POST['anneed2'] == "") {
$timestamp2 = time();
}
else
{
$jourd2 = $_POST['jourd2'];
$moisd2 = $_POST['moisd2'];
$anneed2 = $_POST['anneed2'];
$timestamp2 = mktime(0, 0, 0,  $_POST['moisd2'], $_POST['jourd2'], $_POST['anneed2']);
}
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='20%'>Organe ou Service</td><td width='16%' align='right'>Re&ccedil;us</td><td width='16%' align='right'> Transmis</td><td width='16%' align='right'>Archiv&eacute;s</td><td width='16%' align='right'>Envoy&eacute;s</td><td width='16%' align='right'>Total</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
$total1 = 0;$total2 = 0;$total3 = 0;$total4 = 0;$total5 = 0;$total6 = 0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
if($enreg['id_service'] == 8) {
$totalgeneral2 = $this->TotalMessageRecuDir2($enreg['id_service'], $timestamp1, $timestamp2) +  $this->TotalCourriersTransmis2($enreg['id_service'], $timestamp1, $timestamp2) +  $this->TotalArchive2($enreg['id_service'], $timestamp1, $timestamp2) + $this->TotalMessageSent2($enreg['id_service'], $timestamp1, $timestamp2);
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='20%'>".$enreg['service']."</td><td width='16%' align='right'>". $this->TotalMessageRecuDir2($enreg['id_service'], $timestamp1, $timestamp2)."</td><td width='16%' align='right'>".$this->TotalCourriersTransmis2($enreg['id_service'], $timestamp1, $timestamp2)."</td>";
$table .= "<td width='16%' align='right'>".$this->TotalArchive2($enreg['id_service'], $timestamp1, $timestamp2)."</td><td width='16%' align='right'>".$this->TotalMessageSent2($enreg['id_service'], $timestamp1, $timestamp2)."</td><td width='16%' align='right'>".$totalgeneral2."</td></tr>";
$total1 += $this->TotalMessageRecuDir2($enreg['id_service'], $timestamp1, $timestamp2);
$total2 += $this->TotalCourriersTransmis2($enreg['id_service'], $timestamp1, $timestamp2);
$total3 += $this->TotalArchive2($enreg['id_service'], $timestamp1, $timestamp2);
$total4 += $this->TotalMessageSent2($enreg['id_service'], $timestamp1, $timestamp2);
$total5 += $totalgeneral2;
}
else
{
$totalgeneral2 = $this->TotalMessageRecu2($enreg['id_service'], $timestamp1, $timestamp2) +  $this->TotalCourriersTransmis2($enreg['id_service'], $timestamp1, $timestamp2) +  $this->TotalArchive2($enreg['id_service'], $timestamp1, $timestamp2) + $this->TotalMessageSent2($enreg['id_service'], $timestamp1, $timestamp2);
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='20%'>".$enreg['service']."</td><td width='16%' align='right'>". $this->TotalMessageRecu2($enreg['id_service'], $timestamp1, $timestamp2)."</td><td width='16%' align='right'>".$this->TotalCourriersTransmis2($enreg['id_service'], $timestamp1, $timestamp2)."</td>";
$table .= "<td width='16%' align='right'>".$this->TotalArchive2($enreg['id_service'], $timestamp1, $timestamp2)."</td><td width='16%' align='right'>".$this->TotalMessageSent2($enreg['id_service'], $timestamp1, $timestamp2)."</td><td width='16%' align='right'>".$totalgeneral2."</td></tr>";
$total1 += $this->TotalMessageRecu2($enreg['id_service'], $timestamp1, $timestamp2);
$total2 += $this->TotalCourriersTransmis2($enreg['id_service'], $timestamp1, $timestamp2);
$total3 += $this->TotalArchive2($enreg['id_service'], $timestamp1, $timestamp2);
$total4 += $this->TotalMessageSent2($enreg['id_service'], $timestamp1, $timestamp2);
$total5 += $totalgeneral2;
}
}
$table .= "<tr height='20px' class='titretableau' >";
$table .= "<td widht='20%'>Totaux</td><td width='16%' align='right'>".$total1."</td><td width='16%' align='right'> ".$total2."</td><td width='16%' align='right'>".$total3."</td><td width='16%' align='right'>".$total4."</td><td width='16%' align='right'>".$total5."</td></tr>";
$table .="</table>";
echo $table;
}

function AfficherStatService() {
include("connect.inc.php");
if(!isset($_POST['service'])) {
$req = "SELECT * FROM utilisateurs ORDER BY nom DESC ";
}
elseif($_POST['service'] == "") {
$req = "SELECT * FROM utilisateurs ORDER BY nom DESC ";
}
else
{
$req = "SELECT * FROM utilisateurs WHERE id_utilisateur = '".$_POST['id_user']."' ORDER BY nom DESC ";
}
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='17%'>Nom et Postnom</td><td widht='17%'>Identifiant</td><td widht='16%'>Re&ccedil;us</td><td widht='16%'> Envoy&eacute;s</td><td widht='17%'>En traitement</td><td widht='17%'>Total</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='17%'>".$enreg['nom']."</td><td width='17%'>".$enreg['login']."</td><td width='16%'>". $this->TotalMessageRecu($enreg['id_utilisateur'])."</td><td width='16%'>".$this->TotalMessageEnvoyes($enreg['id_utilisateur'])."</td>";
$table .= "<td width='17%'>".$this->TotalMessageTrait($enreg['id_utilisateur'])."</td><td width='17%'>".$this->TotalMessage($enreg['id_utilisateur'])."</td></tr>";
}
$table .="</table>";
echo $table;
}


/*
function AfficherStatServices($eq) {
include("connect.inc.php");
if(!isset($_POST['service'])) {
$req = "SELECT * FROM services ORDER BY nom DESC ";
}
elseif($_POST['service'] == "") {
$req = "SELECT * FROM services ORDER BY nom DESC ";
}
else
{
$req = "SELECT * FROM services WHERE id_service = '".$_POST['service']."' ORDER BY nom DESC ";
}
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='17%'>Nom et Postnom</td><td widht='17%'>Identifiant</td><td widht='16%'>Re&ccedil;us</td><td widht='16%'> Envoy&eacute;s</td><td widht='17%'>En traitement</td><td widht='17%'>Total</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='17%'>".$enreg['nom']."</td><td width='17%'>".$enreg['login']."</td><td width='16%'>". $this->TotalMessageRecu($enreg['id_utilisateur'])."</td><td width='16%'>".$this->TotalMessageEnvoyes($enreg['id_utilisateur'])."</td>";
$table .= "<td width='17%'>".$this->TotalMessageTrait($enreg['id_utilisateur'])."</td><td width='17%'>".$this->TotalMessage($enreg['id_utilisateur'])."</td></tr>";
}
$table .="</table>";
echo $table;
}


*/

function AfficherStatPeriod($timestamp1, $timestamp2) {
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' ><td width='25%'>Date</td><td width='25%'>Total envoy&eacute;s</td><td width='25%'>Courriers Re&ccedil;us</td><td width='25%'>Total</td></tr>";
$i=0;
$dateactuel = $timestamp1;
$bgcolor='#E6F2F2';
while($dateactuel <= $timestamp2) {
$i++;
$dateactuel += 24 * 3600;
/*
echo $i ."  et " .$dateactuel . " et la date ". date('d/m/Y', $dateactuel)." donc jour" .date('d', $dateactuel)." et mois ".date('m', $dateactuel). "de l'ann&eacute;e ". date('Y', $dateactuel)."<br>";
*/
$d = date('d', $dateactuel); $m = date('m', $dateactuel); $y = date('Y', $dateactuel); $now = date('d/m/Y', $dateactuel);
$now1 = $this->TotalMessageSentDate($d, $m, $y);
$now2 = $this->TotalMessageDate($d, $m, $y);
$now3 = $this->TotalMessageSentDate($d, $m, $y) + $this->TotalMessageDate($d, $m, $y);
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';

//echo $d. $m. $y. "<br>";
$table.= "<tr height='24px' bgcolor='$bgcolor'><td width='25%'>".$now."</td><td width='25%'>".$now1."</td><td width='25%'>".$now2."</td><td width='25%'>".$now3."</td></tr>";
}
$table .="</table>";
echo $table;
}

}
 // fin class
?>