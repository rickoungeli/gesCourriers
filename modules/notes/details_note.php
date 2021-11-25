<?php
$sql = "select * from notes where id_note='".$_GET['id_note']."'";
$res = mysql_query($sql) or die ("Erreur SQL".mysql_error()."<br>".$sql);
while($enreg = mysql_fetch_array($res)) {
?>
<table width="98%" border="0" align="center" cellpadding="6" cellspacing="2">
  <tr>
    <td colspan="2" class="titre2">D&eacute;tails de l'annotation : </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Note r&eacute;dig&eacute;e le</div></td>
    <td valign="top"><?php echo date('d/m/Y H:i:s', $enreg['date_note']); ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Par </div></td>
    <td valign="top"><?php 
	$requete = "select * from utilisateurs where id_utilisateur = '".$enreg['id_utilisateur']."'";
	$resultat = mysql_query($requete) or die ("Erreur SQL".mysql_error());
	$enregistrement = mysql_fetch_array($resultat);
	echo $enregistrement['nom'];
	?></td>
  </tr>
  <tr>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Objet de la note</div></td>
    <td valign="top"><?php echo stripslashes($enreg['objet_note']); ?></td>
  </tr>
  <tr>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Contenu</div></td>
    <td valign="top"><label><?php echo stripslashes(nl2br($enreg['libelle_note'])); ?></label></td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center"><a href="javascript:history.back(-1)" class="message">R&eacute;tour au courrier </a></div>
    </td>
  </tr>
</table>
<?php
}
?>