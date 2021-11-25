<?php
if(!isset($_POST['expediteur']) or !isset($_POST['date_courrier']) or !isset($_POST['ref']) or !isset($_POST['destinataire']) or !isset($_POST['objet']) or !isset($_POST['type_courrier'])) {
include("connect.inc.php");
$req = "select * from courrier where id = '".$_GET['id_courrier']."' order by id desc";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
while ($enreg = mysql_fetch_array($res)) {
if($_SESSION['id_type'] == 1 OR $_SESSION['id_type'] == 3) {
?>

<form name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="4" class="titre2">Modifier un courrier</td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><label>
        <input name="expediteur" type="text" id="expediteur" size="35" value="<?php echo $enreg['expediteur']; ?>" />
      </label></td>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Date du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><input name="date_courrier" type="text" id="date_courrier" value="<?php echo $enreg['date_lettre']; ?>" size="35" /></td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">R&eacute;f&eacute;rences du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><label>
        <input name="ref" type="text" id="ref" value="<?php echo $enreg['ref']; ?>" size="35" />
      </label></td>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Destinataire Principal</div></td>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><label>
        <select name="destinataire" id="destinataire">
               <?php 
		
		$req = "select * from utilisateurs order by nom ";
		get_combobox_id($req, $enreg['destinataire']);
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Objet du courrier</div></td>
      <td valign="top" bgcolor="#F2F8FD"><input name="objet" type="text" id="objet" value="<?php echo $enreg['objet']; ?>" size="35" /></td>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
<td valign="top" bgcolor="#F2F8FD"><select name="type_courrier" id="type_courrier">
                    <?php 
		
		$req = "select * from type_courrier order by libelle_type";
		get_combobox_id($req, $enreg['id_type']);
		?>
      </select></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Synth&egrave;se du courrier</div></td>
      <td valign="top" bgcolor="#F2F8FD"><textarea name="synthese" id="synthese" cols="40" rows="5"><?php echo $enreg['synthese']; ?></textarea></td>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Nbre des pages</div></td>
      <td valign="top" bgcolor="#F2F8FD"><label>
        <input name="nbre_pages" type="text" id="nbre_pages" value="<?php echo $enreg['nbre_pages']; ?>" size="10" />
      </label></td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD">&nbsp;</td>
      <td colspan="3" valign="top" bgcolor="#F2F8FD"><label></label></td>
    </tr>
    <tr>
      <td height="20" colspan="4"><div align="right"></div>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center"></label>
          <label>
          <input type="submit" name="button" id="button" value="Sauvegarder" />
          </label>
          <label></label>
          <div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
</form>
<?php
}
else
{
echo "Vous n'avez pas les droits de modifier ce courrier";
}
}
}
elseif($_POST['expediteur'] == "" or $_POST['destinataire'] == "" or $_POST['objet'] == "" $_POST['type_courrier'] == "" or $_POST['date_courrier'] == "") {
echo "Certains champs obligatoires sont vides<br>";
echo '<a href="javascript:history.back(-1)">Cliquez ici pour corriger</a>';
}
else
{
$courrier = new courrier;
$courrier->expediteur = addslashes($_POST['expediteur']);
$courrier->destinataire = addslashes($_POST['destinataire']);
$courrier->objet = addslashes($_POST['objet']);
$courrier->synthese = addslashes($_POST['synthese']);
$courrier->date_courrier = addslashes($_POST['date_courrier']);
$courrier->ref = addslashes($_POST['ref']);
$courrier->nbre_pages = addslashes($_POST['nbre_pages']);
$courrier->type_courrier = addslashes($_POST['type_courrier']);
$courrier->tuteur = addslashes($_POST['destinataire']);

// Apport des différentes modifications sur la base de données
$courrier->modifier($_GET['id_courrier']);
}
?>