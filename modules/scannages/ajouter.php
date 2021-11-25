<?php 
if(!isset($_FILES['fichier']) and !isset($_POST['titre'])) { // premier if
?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11;
}
-->
</style>

<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="0">
     <tr>
       <td colspan="2" valign="top" class="titre2">Attacher un fichier</td>
     </tr>
     <tr>
      <td width="30%" valign="top" class="style1"><div align="right">Titre du fichier</div></td>
      <td width="70%" valign="top" class="style1"><label>
      <input type="text" name="titre" id="titre" />
      </label></td>
    </tr>
      <tr>
      <td width="30%" valign="top" class="style1"><div align="right">Retrouver le fichier</div></td>
      <td width="70%" valign="top" class="style1"><label>
        <input name="fichier" type="file" id="fichier" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2" class="style1"><div align="center">
        <label>
        <input type="submit" name="button" id="button" value="Enregistrer le fichier" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<p class="style1">
  <?php
}
else // premier else
{
$image = $_FILES['fichier'];
$titre = $_POST['titre'];
$nom_image = addslashes($image['name']);
$tmp_name = $image['tmp_name'];
$type_mime = $image['type'];
//Envoyer les informations sur l'image dans la base de données
include("../../connect.inc.php");
$req = "INSERT INTO scannages VALUES ('','$titre','".$_GET['id_courrier']."','$nom_image','$type_mime','".time()."')";
$res = mysql_query($req) or die ("erreur SQL".mysql_error());
$id_req = mysql_insert_id();
$extension = pathinfo($nom_image, PATHINFO_EXTENSION);
//$extension = substr ($nom_image, strlen ($nom_image) - 4);
$nom_image = $id_req.".".$extension;

$req1 = "UPDATE scannages SET nom_fichier = '$nom_image' WHERE id_scan = '$id_req' ";
$res = mysql_query($req1) or die ("erreur SQL".mysql_error());
//Renommer l'image et la dans le répertoire
$repertoire = "../../scannages/";
copy($tmp_name, $repertoire.$nom_image) or die ("impossible de copier");
echo "Le fichier a été uploadé avec succès ! merci<br>";
echo '<a href="index.php?module=courriers&action=etape2&id_courrier='.$_GET['id_courrier'].'">Ajouter un autre fichier</a>';
 // fin quatrième if
}
?>
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style1"><a href="#" onclick="javascript:window.close()">Fermer cette f&eacute;n&ecirc;tre</a></span></p>
