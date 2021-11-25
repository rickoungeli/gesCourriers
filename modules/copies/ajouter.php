<?php 
if(!isset($_POST['id_utilisateur']) and !isset($_POST['id_courrier'])) {
?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td width="100%" valign="top"><p align="center">
        <input 	type="button" value="Ajouter une copie" 
					onclick="UMPAjout(document.form1,'fic');" />
      </p>
        <p align="center"><strong>
          <input type="submit" name="button" id="button" value="Enregistrer la(les) copie(s)" />
        </strong></p></td>
    </tr>
  </table>
</form>
<?php
}
else
{
$reqc = "select * from courrier where id = '".$_GET['id_courrier']."'";
$ress = mysql_query($reqc) or die("Erreur SQL".mysql_error());
$cour = mysql_fetch_array($ress);
$courrie = new courrier;
$courrie->expediteur = $cour['expediteur'];
$courrie->destinataire =  $cour['destinataire'];
$courrie->objet = $cour['objet'];
$courrie->synthese = $cour['synthese'];
$courrie->date_lettre = $cour['date_lettre'];
$courrie->id_saisi = 5;
$courrie->type_courrier = $cour['id_type'];
$courrie->ref = $cour['ref'];
$courrie->nbre_pages = $cour['nbre_pages'];
$courrie->categorie = "1";
$courrie->copie = "1";
$courrie->origine = $_GET['id_courrier'];
$courrie->date_courrier = time();
$courrie->tuteur = $_POST['id_destinataire'];


// Enregistrement du courrier dans la base de données
$sql = "INSERT INTO courrier VALUES ('','".$courrie->expediteur."','".$courrie->destinataire."' ,'".$courrie->objet."' ,'".$courrie->ref."' ,'".$courrie->id_saisi."' ,'".$courrie->date_lettre."' ,'".$courrie->date_arrivee."' ,'".$courrie->synthese."' ,'".$courrie->type_courrier."', '".$courrie->lecture."', '".$courrie->nbre_pages."', '".$courrie->categorie."', '".$courrie->copie."', '".$courrie->origine."', '".$courrie->reception."', '".$courrie->transfert."', '".$courrie->traitement."', '".$courrie->tuteur."')";
$ans = mysql_query($sql) or die ("Erreur lors de l'insertion dans la base de données<br>".mysql_error());

$id_courrier_copie = mysql_insert_id();

include("classes/copies.class.inc.php");
$copie = new copie;
$copie->id_courrier = htmlentities($_GET['id_courrier']);
$copie->id_utilisateur = htmlentities($_POST['id_destinataire']);
$copie->id_courrier_copie = $id_courrier_copie;
$copie->ajouter();
}
?>
