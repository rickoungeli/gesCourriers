<?php

class note {

var $id_courrier;
var $id_utilisateur;
var $objet_note;
var $libelle_note;
var $date_note;

// constructeur

function note() {
$this->id_courrier = "";
$this->id_utilisateur = "";
$this->objet_note = "";
$this->libelle_note = "";
$this->date_note = time();
}

// Méthode pour ajouter une nouvelle note

function ajouter() {
include("connect.inc.php");
$sql = "INSERT INTO notes VALUES ('','".$this->id_courrier."','".$this->id_utilisateur."', '".$this->objet_note."', '".$this->libelle_note."', '".$this->date_note."')";
$req2 = "update courrier set lecture = '1' where id = '".$this->id_courrier."'";
mysql_query($req2);
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse = "<br><div class='titre2'>Ajouter une note</div><br><br>";
$reponse .= "<br>Note correctement ajout&eacute;, merci<br>";
$reponse .= '<a href="index.php?module=courriers&action=details&id_courrier='.$this->id_courrier.'" class="message">R&eacute;tour au courrier</a>';

echo $reponse;
}

// Méthode pour modifier un type existant

function modifier($id_note) {
include("connect.inc.php");
$sql = "UPDATE notes SET id_courrier = '".$this->id_courrier ."', id_utilisateur = '".$this->id_utilisateur."', objet_note = '".$this->objet_note."', libelle_note = '".$this->libelle_note."' WHERE id_note = $id_note";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "type modifi&eacute; avec succ&egrave;s<br>";
$reponse .= '<a href="javascript:history.back(-1)">Cliquez ici pour rétourner</a>';
echo $reponse;
}

// méthode qui permet d'afficher toutes les notes
// Méthode qui permet d'afficher les notes relatives à un courrier
function afficher($id_courrier) {
include("connect.inc.php");
$req = "SELECT * FROM notes WHERE id_courrier = '".$_GET['id_courrier']."'";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau'>";
$table .= "<td>Objet de la note</td><td>Enregistr&eacute; par </td><td>Enregistr&eacute; le</td></tr>";
$user = new user;
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor'><td><a class='message' href='index.php?module=notes&action=afficher&id_note=".$enreg['id_note']."'>".$enreg['objet_note']."</a></td><td>".$user->nomuser($enreg['id_utilisateur'])."</td><td>".date('d/m/Y H:i:s', $enreg['date_note'])."</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

}
?>
