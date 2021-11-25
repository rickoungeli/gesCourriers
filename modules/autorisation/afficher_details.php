<?php
include("connect.inc.php");
$req = "select * from autorisation where id_autorisation = '".$_GET['id_autorisation']."' order by id_autorisation desc";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
while ($enreg = mysql_fetch_array($res)) {

?>
<table width="95%" border="0" align="center" cellpadding="8" cellspacing="2">
  <tr>
    <td colspan="4" class="titre2">Autorisation  n&deg;<?php echo $_GET['id_autorisation']; ?></td>
  </tr>
  <tr>
    <td width="20%" bgcolor="#F2F8FD"><div align="right"><strong>Nom(s)</strong></div></td>
    <td width="30%" bgcolor="#F2F8FD"><label><?php echo $enreg['noms']; ?></label></td>
    <td width="20%" bgcolor="#F2F8FD"><div align="right"><strong>Qualit&eacute;</strong></div></td>
    <td width="30%" bgcolor="#F2F8FD"><?php echo $enreg['qualite']; ?></td>
  </tr>
  <tr>
    <td width="20%" bgcolor="#F2F8FD"><div align="right"><strong>Objet de la mission</strong></div></td>
    <td width="30%" bgcolor="#F2F8FD"><label><?php echo $enreg['objet']; ?></label></td>
    <td width="20%" bgcolor="#F2F8FD"><div align="right"><strong>Origine de frais</strong></div></td>
    <td width="30%" bgcolor="#F2F8FD"><?php echo $enreg['origine_frais']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#F2F8FD"><div align="right"><strong>Date de d&eacute;part</strong></div></td>
    <td bgcolor="#F2F8FD"><?php echo $enreg['date_depart']; ?></td>
    <td bgcolor="#F2F8FD"><div align="right"><strong>Date d'arriv&eacute;e</strong></div></td>
    <td bgcolor="#F2F8FD"><?php echo $enreg['date_arrivee']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#F2F8FD"><div align="right"><strong>Destination</strong></div></td>
    <td bgcolor="#F2F8FD"><?php echo $enreg['destination']; ?></td>
    <td bgcolor="#F2F8FD"><div align="right"><strong>Moyen de transport utilis&eacute;</strong></div></td>
    <td bgcolor="#F2F8FD"><?php echo $enreg['moyen_transport']; ?></td>
  </tr>
  <tr>
    <td bgcolor="#F2F8FD"><div align="right"><strong>Itin&eacute;raire</strong></div></td>
    <td bgcolor="#F2F8FD"><?php echo $enreg['itineraire']; ?></td>
    <td bgcolor="#F2F8FD"><div align="right"><strong>Dur&eacute;e de la mission</strong></div></td>
    <td bgcolor="#F2F8FD"><?php echo $enreg['duree']; ?></td>
  </tr>
  <tr>
    <td colspan="4"><label>
        <div align="left"></div>
      </label>
        <div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">
      <label><a href="index.php?module=autorisation&amp;action=gerer" class="message">R&eacute;tour &agrave; la liste des autorisation</a></label>
      |
      <label><a href="index.php?module=autorisation&amp;action=modifier&amp;id_autorisation=<?php echo $enreg['id_autorisation']; ?>" class="message">Modifier cette autorisation de sortie</a></label>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
}
?>
</body>
</html>
