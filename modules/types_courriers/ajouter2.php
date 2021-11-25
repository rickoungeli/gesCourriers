<?php 
if(!isset($_POST['libelle_type'])) {


?>
<link href="../../css/css.css" rel="stylesheet" type="text/css" />

<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="2" valign="top" class="titre3"><strong>Ajouter un type de courrier</strong></td>
    </tr>
    <tr>
      <td width="30%" valign="top" bgcolor="#F2F8FD"><div align="right" class="message">Libell&eacute; Type</div></td>
      <td width="70%" valign="top"><label>
        <input name="libelle_type" type="text" id="libelle_type" size="35" />
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
include("../../connect.inc.php");
$req = "insert into type_courrier values('','".addslashes($_POST['libelle_type'])."', '')";
$rep = mysql_query($req) or die ("Erreur SQL".mysql_error());
?>
<script language="javascript">
opener.location.reload();
window.close();
</script>
<?php 
}
?>
