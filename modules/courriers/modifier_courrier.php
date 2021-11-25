<html>

<head>
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
if(!isset($_POST['expediteur']) or !isset($_POST['ref']) or !isset($_POST['destinataire']) or !isset($_POST['objet']) or !isset($_POST['type_courrier'])) {
include("../../connect.inc.php");
$req = "select * from courrier where id = '".$_GET['id_courrier']."' order by id desc";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
while ($enreg = mysql_fetch_array($res)) {
?>



<form name="form1" method="post" action="#">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="2" class="titre2">Modifier un courrier n° <?php echo $enreg['categorie'] == 1 ? $enreg['id_entrant'] : $enreg['id']; ?></td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><label>
        <input name="expediteur" type="text" id="expediteur" size="35" value="<?php echo $enreg['expediteur']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Destinataire</div></td>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><label>
        <input name="destinataire" type="text" id="destinataire" size="35" value="<?php echo $enreg['destinataire']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Date du courrier</div></td>
      <td valign="top" bgcolor="#F2F8FD"><input name="date_courrier" type="text" id="date_courrier" value="<?php echo $enreg['date_lettre']; ?>" size="35" /></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">R&eacute;f&eacute;rences du courrier</div></td>
      <td valign="top" bgcolor="#F2F8FD"><input name="ref" type="text" id="ref" value="<?php echo $enreg['ref']; ?>" size="35" /></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
      <td valign="top" bgcolor="#F2F8FD"><select name="type_courrier" id="type_courrier">
        <?php 
		require_once("../../fonctions/fonction_sql.inc.php");
		$req = "select * from type_courrier order by libelle_type";
		get_combobox_id($req, $enreg['id_type']);
		?>
      </select></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Objet du courrier</div></td>
      <td valign="top" bgcolor="#F2F8FD"><input name="objet" type="text" id="objet" value="<?php echo $enreg['objet']; ?>" size="35" /></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Nbre des pages</div></td>
      <td valign="top" bgcolor="#F2F8FD"><input name="nbre_pages" type="text" id="nbre_pages" value="<?php echo $enreg['nbre_pages']; ?>" size="10" /></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Nbre d'annnexes</div></td>
      <td valign="top" bgcolor="#F2F8FD"><label>
        <input name="annexes" type="text" id="annexes" value="<?php echo $enreg['annexes']; ?>" size="10" />
      </label></td>
    </tr>
    
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Orientation d&eacute;finitive </div></td>
      <td valign="top" bgcolor="#F2F8FD"> <select name="orientation" id="orientation">
     <option value=""> Choisissez une orientation </option><?php
	 require_once("../../fonctions/fonction_sql.inc.php");
     $req1 = "select * from services order by service ";
	 get_combobox_id($req1, $enreg['tuteur']);
		
		?>
   </select></td>
    </tr><?php if(isset($_GET['synthese'])) { ?>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Synth&egrave;se</div></td>
      <td valign="top" bgcolor="#F2F8FD"><label>
        <textarea name="synthese" id="synthese" cols="45" rows="5"><?php echo $enreg['synthese']; ?></textarea>
      </label></td>
    </tr>
    <?php
	} ?>
    <tr>
      <td height="20" colspan="2"><div align="right"></div>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="2" align="center"></label>
          <label>
          <input type="submit" name="button" id="button" value="Sauvegarder" />
          </label>
          <label></label>
      <div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<?php

}
}
elseif($_POST['expediteur'] == "" or $_POST['destinataire'] == "" or $_POST['objet'] == ""  or $_POST['type_courrier'] == "" or $_POST['annexes'] == "") {
echo "Certains champs obligatoires sont vides<br>";
echo '<a href="javascript:history.back(-1)">Cliquez ici pour corriger</a>';
}
else
{
include("../../connect.inc.php");
if(isset($_POST['synthese'])) {
$req = "update courrier set synthese = '".addslashes($_POST['synthese'])."' where id = ".$_GET['id_courrier'];
$res = mysql_query($req) or die ("Erreur SQL".mysql_error()."<br>".$req);
$res2 = mysql_query("INSERT INTO synthese VALUES ('','".$_GET['id_courrier']."','".$_SESSION['id_utilisateur']."','".addslashes($_POST['synthese'])."','".time()."')") or die ("Erreur synthese".mysql_error());

?>
<script language="javascript">
opener.location.reload();
window.close();
</script>
<?php
}
else
{
$req = "UPDATE courrier SET expediteur = '".addslashes($_POST['expediteur'])."', destinataire = '".addslashes($_POST['destinataire'])."', objet = '".addslashes($_POST['objet'])."', id_saisi = '".addslashes($_SESSION['id_utilisateur'])."', date_lettre = '".addslashes($_POST['date_courrier'])."', id_type = '".addslashes($_POST['type_courrier'])."', nbre_pages = '".addslashes($_POST['nbre_pages'])."', annexes = '".addslashes($_POST['annexes'])."', tuteur = '".$_POST['tuteur']."' WHERE id = ".$_GET['id_courrier'];
$res = mysql_query($req) or die ("Erreur SQL".mysql_error()."<br>".$req);
$request = "INSERT INTO actions_courriers VALUES('','".$_GET['id_courrier']."','".$_SESSION['id_utilisateur']."','0','a modifi&eacute; les informations g&eacute;n&eacute;rales du courrier','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
?>
<script language="javascript">
opener.location.reload();
window.close();
</script>
<?php 
// Apport des différentes modifications sur la base de données
}
}
?>

<?php
$rq = "select * from scannages where id_courrier = '".$_GET['id_courrier']."'";
$rs = mysql_query($rq) or die ("Erreur SQL".mysql_error());
while ($dt = mysql_fetch_array($rs)) {
echo "<p align='center'>".$dt['titre']." | <a href='supprimer.php?id_scan=".$dt['id_scan']."' class='message'>Supprimer ce fichier </a>  | <a href='../presidence/scannages/".$dt['nom_fichier']."' class='message'>T&eacute;l&eacute;charger</a></p>";
}
?>
</body>
</html>