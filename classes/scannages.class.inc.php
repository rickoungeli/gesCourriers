<?php

class scannage {

var $this->id_courrier;
var $this->tmp_name;
var $this->nom_fichier;
var $this->type_mime;
var $this->taille;
var $this->observation;

// constructeur

function scannage() {
$this->id_courrier = "";
$this->nom_fichier = "";
$this->type_mime = "";
$this->taille = "";
}


// Méthode pour ajouter un nouveau fichier scanné

function ajouter() {
include("connect.inc.php");
$req = "INSERT INTO scannages VALUES ('','"$this->id_courrier."','".$this->nom_fichier."','".$this->type_mime."', '".$this->taille."')";
$res = mysql_query($req) or die ("erreur SQL".mysql_error());
$id_req = mysql_insert_id();
$extension = substr ($this->nomfichier, strlen ($this->nom_fichier) - 4);
$this->nom_fichier = $id_req.$extension;

$req1 = "UPDATE scannages SET nomfichier = '".$this->nom_fichier."' WHERE id_scan = '$id_req' ";
$res = mysql_query($req1) or die ("erreur SQL".mysql_error());


//Renommer l'image et la dans le répertoire
$repertoire = "scannages/";
$this->uploader($this->tmp_name, $dossier/$this->nom_fichier);
echo "L'image a été uploadée avec succès ! merci<br>";
echo '<a href="javascript:close()">Fermer</a>';
}

// Méthode supprimer un fichier existant

function modifier($id_scan) {
include("connect.inc.php");
$sql = "UPDATE scannages SET id_courrier = '".$this->id_courrier ."', nom_fichier = '".$this->nom_fichier."', type_mime = '".$this->type_mime."', taille = '".$this->taille."', observations = '".$this->observations."' WHERE id_note = $id_note";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "scannage modifi&eacute; avec succ&egrave;s<br>";
$reponse .= '<a href="javascript:history.back(-1)">Cliquez ici pour rétourner</a>';
echo $reponse;
}

// méthode qui permet d'afficher toutes les notes

function afficher() {
include("connect.inc.php");
$req = "SELECT * FROM scannages ORDER BY id_scan DESC";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table border='1' cellspacing='0' width='80%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr>";
$table .= "<td>Titre note</td><td>Enregistrée le</td><td>Modifier</td><td>Supprimer</td></tr>";
while ($enreg = mysql_fetch_array($res)) {
$table .= "<tr><td>".$enreg['objet_note']."</td><td>".time('d/m/Y', $enreg['observations'])."</td>";
$table .= "<td><a href='index.php?module=notes&amp;action=modifier&amp;id_note=".$enreg['id_note']."'>Modifier</a></td>";
$table .= "<td><a href='index.php?module=notes&amp;action=supprimer&amp;id_note=".$enreg['id_note']."'>Supprimer</a></td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}

// Méthode qui permet d'afficher les notes relatives à un courrier
function afficher_user($id_courrier) {
include("connect.inc.php");
$req = "SELECT * FROM notes WHERE $id = '$id_courrier' ORDER BY id_type DESC";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table border='1' cellspacing='0' width='80%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr>";
$table .= "<td>Titre note</td><td>Enregistrée le</td><td>Modifier</td></tr>";
while ($enreg = mysql_fetch_array($res)) {
$table .= "<tr><td>".$enreg['objet_note']."</td><td>".time('d/m/Y', $enreg['observations'])."</td>";
$table .= "<td><a href='index.php?module=notes&amp;action=modifier&amp;id_note=".$enreg['id_note']."'>Modifier</a></td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}


}
?>
