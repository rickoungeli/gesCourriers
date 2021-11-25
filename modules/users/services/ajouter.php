<?php 
if(!isset($_POST['libelle_service'])) {
?>
<link href="../../../css/css.css" rel="stylesheet" type="text/css" />

<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="2" valign="top"><strong class="titre2">Ajouter rapidement une entit&eacute; ou un service</strong></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD" class="texte2"><div align="right">Nom de l'entit&eacute;</div></td>
      <td valign="top" bgcolor="#FFFFFF"><input name="libelle_service" type="text" id="libelle_service" size="35" /></td>
    </tr>
    <tr>
      <td width="30%" valign="middle" bgcolor="#F2F8FD" class="texte2"><div align="right">Pr&eacute;fixe r&eacute;f&eacute;rence</div></td>
      <td width="70%" valign="top" bgcolor="#FFFFFF"><label></label>
      <input name="prefixe" type="text" id="prefixe" size="13" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="button" id="button" value="Ajouter et fermer" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<?php
}
else
{
$service = addslashes(htmlentities($_POST['service']));
include(".../connect.inc.php");
$req = "insert into services values('','$service','".addslashes($_POST['prefixe'])."','0'))";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
?>
<script language="javascript">
alert("Service correctement ajout&Eacute;, Merci");
onClick="parent.frames['Outils'].reload()";
document.close();
</script>
<?php
}
?>