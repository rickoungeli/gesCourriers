<?php 
if(!isset($_POST['libelle_type']) and !isset($_POST['observations'])) {


?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="2" valign="top"><strong>Ajouter un type de courrier</strong></td>
    </tr>
    <tr>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><div align="right">Libelle_Type</div></td>
      <td width="70%" valign="top"><label>
        <input name="libelle_type" type="text" id="libelle_type" size="35" />
      </label></td>
    </tr>
    <tr>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><div align="right">Observations</div></td>
      <td width="70%" valign="top"><label>
        <textarea name="observations" cols="32" rows="5" id="observations"></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="button" id="button" value="Ajouter" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<?php
}
else
{
include("classes/type_courrier.class.inc.php");
$type = new type_courrier;
$type->libelle_type = addslashes(htmlentities($_POST['libelle_type']));
$type->observations = addslashes(htmlentities($_POST['observations']));
$type->ajouter();
}
?>
