<?php 
if(!isset($_POST['nom_classeur']) and !isset($_POST['observations'])) {
if(isset($_GET['id_type'])) {
include("connect.inc.php");
$sql = "select * from classeur where id_classeur = '".$_GET['id_classeur']."'";
$res = mysql_query($sql) or die ("erreur sql".mysql_error());
$tableau = mysql_fetch_array($res);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="8" cellspacing="1">
    <tr>
      <td colspan="2" valign="top" class="titre2"><strong>Modifier un type de courrier</strong></td>
    </tr>
    <tr>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><div align="right">Nom classeur</div></td>
      <td width="70%" valign="top" bgcolor="#F2F8FD"><label>
<input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $tableau['id_service']; ?>" />
<input name="nom_classeur" type="text" id="nom_classeur" size="35" value="<?php echo $tableau['libelle_type']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><div align="right">Observations</div></td>
      <td width="70%" valign="top" bgcolor="#F2F8FD"><label>
        <textarea name="observations" cols="32" rows="5" id="observations"><?php echo $tableau['observations']; ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="button" id="button" value="Modifier" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<?php
}
}
else
{
include("classes/type_courrier.class.inc.php");
$type = new type_courrier;
$type->libelle_type = htmlentities($_POST['libelle_service']);
$type->observations = htmlentities($_POST['observations']);
$type->modifier($_GET['id_type']);
}
?>
