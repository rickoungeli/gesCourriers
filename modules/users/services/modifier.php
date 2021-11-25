<?php 
if(!isset($_POST['libelle_service']) and !isset($_POST['prefixe'])) {
if(isset($_GET['id_service'])) {
include("connect.inc.php");
$sql = "select * from services where id_service = '".$_GET['id_service']."'";
$res = mysql_query($sql) or die ("erreur sql".mysql_error());
$tableau = mysql_fetch_array($res);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="2" valign="top" class="titre2">Modifier une entiti&eacute;</td>
    </tr>
    <tr>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><div align="right">Nom de l'entit&eacute;</div></td>
      <td width="70%" valign="top" bgcolor="#F2F8FD"><label>
<input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $tableau['id_service']; ?>" />
<input name="libelle_service" type="text" id="libelle_service" size="35" value="<?php echo $tableau['service']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><div align="right">Pr&eacute;fixe R&eacute;f&eacute;rence</div></td>
      <td width="70%" valign="top" bgcolor="#F2F8FD"><label>
      <input name="prefixe" type="text" id="prefixe" size="13" value="<?php echo $tableau['prefixe']; ?>" />
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
include("classes/services.class.inc.php");
$service = new service;
$service->libelle_service = htmlentities($_POST['libelle_service']);
$service->prefixe = htmlentities($_POST['prefixe']);
$service->modifier($_GET['id_service']);
}
?>
