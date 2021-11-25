<?php
if(!isset($_POST['noms']) and !isset($_POST['objet']) and !isset($_POST['date_depart']) and !isset($_POST['date_arrivee'])) {
?>
<form id="forms" name="forms" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="4" class="titre2">Enregistrer un ordre de mission</td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Nom(s)</div></td>
      <td width="30%" bgcolor="#F2F8FD"><label>
        <input name="noms" type="text" id="noms" size="35" />
      </label></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Qualit&eacute;</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="qualite" type="text" id="login" size="35" /></td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Objet de la mission</div></td>
      <td width="30%" bgcolor="#F2F8FD"><label>
        <input name="objet" type="text" id="objet" size="35" />
      </label></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Origine de frais</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="origine_frais" type="text" id="origine_frais" size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Date de d&eacute;part</div></td>
      <td bgcolor="#F2F8FD"><input name="date_depart" type="text" id="date_depart" size="35" /></td>
      <td bgcolor="#F2F8FD"><div align="right">Date de r&eacute;tour</div></td>
      <td bgcolor="#F2F8FD"><input name="date_arrivee" type="text" id="date_arrivee" size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Destination</div></td>
      <td bgcolor="#F2F8FD"><label>
        <input name="destination" type="text" id="destination" size="35" />
      </label></td>
      <td bgcolor="#F2F8FD"><div align="right">Itin&eacute;raire</div></td>
      <td bgcolor="#F2F8FD"><input name="itineraire" type="text" id="email3" size="35" /></td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Dur&eacute;e de la mission</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="duree" type="text" id="duree" size="35" /></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Moyen de transport utilis&eacute;</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="moyens_transport" type="text" id="passwords4" size="35" /></td>
    </tr>
    <tr>
      <td colspan="4">
        <label>
        <div align="left"></div>
        </label>
      <div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
        <label>
        
        <input type="submit" name="button" id="button" value="Sauvegarder" />
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
         <input type="reset" name="button2" id="button2" value="R&eacute;initialiser" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<?php
}
elseif($_POST['date_depart'] == "" or $_POST['date_arrivee'] == "" or $_POST['noms'] == "" or $_POST['duree'] == "" or $_POST['itineraire'] == "" or $_POST['moyens_transport'] == "") {
echo " Certains champs obligatoires sont vides, veuillez les remplir<br>";
echo '<a href="javascript:history.back(-1)">Rétourner pour Corriger</a>';
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
$ordre->timestamp = time();
$ordre->origine_frais = addslashes($_POST['origine_frais']);
$ordre->moyens_transport =  addslashes($_POST['moyens_transport']);
$ordre->ajouter();

// Enregistrement de l'utilisateur dans la base de données

}
?>