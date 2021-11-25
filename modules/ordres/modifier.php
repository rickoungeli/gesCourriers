<?php
if(!isset($_POST['noms']) or !isset($_POST['objet']) or !isset($_POST['duree']) or !isset($_POST['date_depart']) or !isset($_POST['date_arrivee'])) {
include("connect.inc.php");
$req = "select * from ordres where id_ordre = '".$_GET['id_ordre']."' order by id_ordre desc";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
while ($enreg = mysql_fetch_array($res)) {

?>
<form id="forms" name="forms" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="4" class="titre2">Enregistr&eacute; un ordre de mission</td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Nom(s)</div></td>
      <td width="30%" bgcolor="#F2F8FD"><label>
        <input name="noms" type="text" id="noms" size="35" value="<?php echo stripslashes($enreg['noms']); ?> "/>
      </label></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Qualit&eacute;</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="qualite" type="text" id="login" value="<?php echo stripslashes($enreg['qualite']); ?> " size="35" /></td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Objet de la mission</div></td>
      <td width="30%" bgcolor="#F2F8FD"><label>
        <input name="objet" type="text" id="objet" value="<?php echo stripslashes($enreg['objet']); ?> " size="35" />
      </label></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Origine de frais</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="origine_frais" type="text" id="origine_frais" value="<?php echo stripslashes($enreg['origine_frais']); ?> " size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Date de d&eacute;part</div></td>
      <td bgcolor="#F2F8FD"><input name="date_depart" type="text" id="date_depart" value="<?php echo stripslashes($enreg['date_depart']); ?> " size="35" /></td>
      <td bgcolor="#F2F8FD"><div align="right">Date d'arriv&eacute;e</div></td>
      <td bgcolor="#F2F8FD"><input name="date_arrivee" type="text" id="date_arrivee" value="<?php echo stripslashes($enreg['date_arrivee']); ?> " size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Destination</div></td>
      <td bgcolor="#F2F8FD"><input name="destination" type="text" id="destination" value="<?php echo stripslashes($enreg['destination']); ?> " size="35" /></td>
      <td bgcolor="#F2F8FD"><div align="right">Itin&eacute;raire</div></td>
      <td bgcolor="#F2F8FD"><input name="itineraire" type="text" id="email3" value="<?php echo stripslashes($enreg['itineraire']); ?> " size="35" /></td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Dur&eacute;e de la mission</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="duree" type="text" id="duree" value="<?php echo stripslashes($enreg['duree']); ?> " size="35" /></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Moyen de transport utilis&eacute;</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="moyens_transport" type="text" id="passwords4" value="<?php echo stripslashes($enreg['moyen_transport']); ?> " size="35" /></td>
    </tr>
    <tr>
      <td colspan="4"><label>
          <div align="left"></div>
        </label>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
        <label>
        <input type="submit" name="button" id="button" value="Sauvegarder" />
          </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
          <input type="reset" name="button2" id="button2" value="R&eacute;initialiser" />
          </label>
      </div></td>
    </tr>
  </table>
</form>
<p>
  <?php
}
}
elseif($_POST['noms'] == "" or $_POST['objet'] == "" or $_POST['date_depart'] == "" or $_POST['date_arrivee'] == "" or $_POST['moyens_transport'] == "" or $_POST['duree'] == "" or $_POST['qualite'] == "" ) {
echo "Certains champs obligatoires sont vides<br>";
echo '<a href="javascript:history.back(-1)">Cliquez ici pour corriger</a>';
}
else
{
include("classes/ordres.class.inc.php");
$ordre = new ordre;
$ordre->date_depart = addslashes($_POST['date_depart']);
$ordre->date_arrivee =  addslashes($_POST['date_arrivee']);
$ordre->objet =  addslashes($_POST['objet']);
$ordre->noms =  addslashes($_POST['noms']);
$ordre->qualite =  addslashes($_POST['qualite']);
$ordre->destination =  addslashes($_POST['destination']);
$ordre->duree =  addslashes($_POST['duree']);
$ordre->id_saisi = addslashes($_SESSION['id_utilisateur']);
$ordre->itineraire =  addslashes($_POST['itineraire']);
$ordre->origine_frais = addslashes($_POST['origine_frais']);
$ordre->moyens_transport =  addslashes($_POST['moyens_transport']);
$ordre->modifier($_GET['id_ordre']);
}
?>
</p>
<p align="center"><a href="index.php?module=ordres&amp;action=gerer" class="message">R&eacute;tour &agrave; la liste des ordres</a></p>
</body>
</html>
