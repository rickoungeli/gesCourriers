<?php
class copie {
var $id_courrier;
var $id_utilisateur;
var $date_copie;
var $id_courrier_copie;

// constructeur

function copie() {
$this->id_courrier = "";
$this->id_utilisateur = "";
$this->date_copie = time();
$this->id_courrier_copie = "";
}


// Méthode pour ajouter un nouveau fichier scanné

function ajouter() {
include("connect.inc.php");
$req = "INSERT INTO copies VALUES ('','".$this->id_courrier."','".$this->id_utilisateur."','".$this->date_copie."', '".$this->id_courrier_copie."')";
$res = mysql_query($req) or die ("erreur SQL".mysql_error());
echo "Une copie de la lettre a été correctement créé, merci <br>";
echo "<a href='javascript:history.back(-1)'> Envoyé une autre copie </a>";
}
// Méthode supprimer un fichier existant

function modifier($id_copie) {
include("connect.inc.php");
$sql = "UPDATE copies SET id_courrier = '".$this->id_courrier ."', id_utilisateur = '".$this->id_utilisateur."', type_mime = '".$this->date_copie."'";
mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());
$reponse =  "copie modifi&eacute; avec succ&egrave;s<br>";
echo $reponse;
}

// méthode qui permet d'afficher toutes les notes

function afficher($id_courrier) {
include("connect.inc.php");
$requo = "select * from courrier where id = '$id_courrier'";
$resuo = mysql_query($requo) or die ('Erreur SQL');
$datao = mysql_fetch_array($resuo);
$origine = $datao['origine'];
$req = "SELECT * FROM copies WHERE id_courrier = '$origine' ORDER BY id_copie DESC";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
$table = "<table style='border:solid 1px #E6F2F2;' cellspacing='0' width='98%' bordercolor='#999999' style='border-collapse:collapse' align='center'><tr height='20px' class='titretableau'>";
$table .= "<td>Copi&eacute; &agrave;</td><td>Copi&eacute; le</td></tr>";
$user = new user;
$bgcolor='#E6F2F2';
$i=0;
while ($enreg = mysql_fetch_array($res)) {
$i++;
if(ceil($i/2) == $i/2) $bgcolor='#E6F2F2'; else $bgcolor='';
$table .= "<tr height='24px' bgcolor='$bgcolor'><td>".$user->nomuser($enreg['id_utilisateur'])."</td><td>".date('d/m/Y H:i:s', $enreg['date_copie'])."</td>";
$table .= "</tr>";
}
$table .="</table>";
echo $table;
}


}
?>
