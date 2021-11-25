<?php

class user {

var $nom;
var $login;
var $password;
var $email;
var $type_user;
var $fonction;
var $service;
var $telephone;
var $date_enregistrement;

// constructeur

function user() {
$this->nom = "";
$this->login = "";
$this->password = "";
$this->type_user = 6;
$this->fonction = "";
$this->nom = "";
$this->service = "";
$this->telephone = "";
$this->date_enregistrement = time();
}

// méthode qui vérifie l'existance d'un utilisateur

function verifexist() {
include("connect.inc.php");
$req1 = "SELECT login FROM utilisateurs WHERE login = '".$this->login."'";
$res1 = mysql_query($req1)or die("Erreur SQL !<br>".mysql_error(). "<br>$req1");
if(mysql_num_rows($res1) > 0) {
return 1;
}
else
{
return 0;
}
}

// Méthode pour ajouter un nouvel utilisateur

function ajouter() {
include("connect.inc.php");
if($this->verifexist() == 1) {
$reponse = "cet utilisateur existe deja, veuillez changer de login<br>";
echo $reponse;
echo '<a href="javascript:history.back(-1)">R&eacute;tourner pour Corriger</a><br>';
}
else
{
$sql = "INSERT INTO utilisateurs VALUES ('','".$this->nom."','".$this->fonction."' ,'".$this->service."' ,'".$this->login."' ,'".$this->password."' ,'".$this->email."' ,'".$this->type_user."' ,'".$this->date_enregistrement."' ,'".$this->telephone."')";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse = "Utilisateur correctement ajout&eacute;, merci<br>";
$reponse .= '<a href="index.php?module=admin&action=user" class="message">Retour &agrave; la liste d\'utilisateurs';
}
echo $reponse;
}

// Méthode pour modifier un utilisant existant

function modifier($id_utilisateur) {
include("connect.inc.php");
$sql = "UPDATE utilisateurs SET nom = '".$this->nom."',  fonction = '".$this->fonction."',  service = '".$this->service."',  email = '".$this->email."',  id_type = '".$this->type_user."',  telephone = '".$this->telephone."' WHERE id_utilisateur = '$id_utilisateur' ";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "Utilisateur modifi&eacute; avec succ&egrave;s<br>";
echo $reponse;
echo '<a href="index.php?module=admin&action=user" class="message">Retour &agrave; la liste d\'utilisateurs</a>';
}


// méthode qui permet d'afficher tous les utilisateurs dans un tableau

function afficher() {
include("connect.inc.php");
$req = "SELECT * FROM utilisateurs ORDER BY nom ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table border='1' cellspacing='0' width='80%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr>";
$table .= "<td>Nom</td><td>Login</td><td>Enregistr&eacute; le</td><td>Modifier</td><td>Supprimer</td></tr>";
while ($enreg = mysql_fetch_array($res)) {
$table .= "<tr><td><a href='index.php?module=user&amp;action=voir&amp;id_user=".$enreg['id_utilisateur']."'>".$enreg['nom']."</a></td><td>".$enreg['login']."</td><td>".date('d/m/Y', $enreg['date_enreg'])."</td>";
$table .= "<td><a href='index.php?module=users&amp;action=modifier&amp;id_user=".$enreg['id_utilisateur']."'>Modifier</a></td>";
$table .= "<td><a href='index.php?module=users&amp;action=supprimer&amp;id_user=".$enreg['id_utilisateur']."'>Supprimer</a></td>";
$table .= "</tr>";
}
$table .= "</table>";
echo $table;
}
// méthode qui permet d'afficher les utilisateurs en fonction d'une recherche de nom et/ou de login

function affichers($nom, $login) {
include("connect.inc.php");
$req = "SELECT * FROM utilisateurs WHERE nom LIKE '%$nom%' AND login LIKE '%$login%' ORDER BY nom ";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table border='1' cellspacing='0' width='80%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr>";
$table .= "<td>Noms</td><td></td><td>Login</td><td>Enregistré le</td><td>Supprimer</td></tr>";
while ($enreg = mysql_fetch_array($res)) {
$table .= "<tr><td>".$enreg['nom']."</td><td>".$enreg['login']."</td><td>". date('d/m/Y', $enreg['login'])."</td>";
$table .= "<td><a href='index.php?module=utilisateurs&amp;action=modifier&amp;id_utilisateur=".$enreg['id_utilisateur']."'>Modifier</a></td>";
$table .= "<td><a href='index.php?module=utilisateurs&amp;action=supprimer&amp;id_utilisateur=".$enreg['id_utilisateur']."'>Supprimer</a></td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

// Méthode qui permet de retrouver le nom d'un utilisateur à partir de son id

function nomuser($id_user) {
$req = "select * from utilisateurs where id_utilisateur = '$id_user'";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$dat =mysql_fetch_array($res);
return $dat['nom'];
}

// Méthode qui permet d'afficher un utilisateur

function afficheradmin($req) {
include("connect.inc.php");
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau' >";
$table .= "<td widht='30%'>Noms</td><td widht='20%'>Login</td><td width='15%'>Enregistr&eacute; le</td><td width='15%'> Modifier</td><td width='20%'> Supprimer</td></tr>";
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor' ><td width='20%'>";

$table .="<a class='message' href='index.php?module=users&amp;action=detail&amp;id_user=".$enreg['id_utilisateur']."'>".$enreg['nom']."</a></td><td width='15%'>".$enreg['login']."</td><td width='20%'>". date('d/m/Y', $enreg['date_enreg'])."</td>";

$table .= "<td width='15%'><a class='message' href='index.php?module=users&amp;action=modifier&amp;id_user=".$enreg['id_utilisateur']."'> Modifier </a></td>";
$table .= "<td width='15%'><a class='message' href='#' onclick='supprimer(\"user\", ".$enreg['id_utilisateur'].")'>Supprimer</a></td></tr>";

}
$table .="</table>";
echo $table;

}

}

?>
