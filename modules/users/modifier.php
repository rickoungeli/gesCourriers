<?php
if(!isset($_POST['nom']) or !isset($_POST['email']) or !isset($_POST['type_user']) or !isset($_POST['fonction']) or !isset($_POST['service'])) {
include("connect.inc.php");
$req = "select * from utilisateurs where id_utilisateur = '".$_GET['id_user']."' order by id_utilisateur desc";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
while ($enreg = mysql_fetch_array($res)) {

?>

<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="2"><p><strong>Editer un utilisateur</strong></p>      </td>
    </tr>
    <tr>
      <td width="30%" bgcolor="#F2F8FD"><div align="right">Nom</div></td>
      <td bgcolor="#F2F8FD"><label>
        <input name="nom" type="text" id="nom" size="35" value="<?php echo $enreg['nom']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Adresse e-mail</div></td>
      <td bgcolor="#F2F8FD"><input name="email" type="text" id="email" size="35" value="<?php echo $enreg['email']; ?>" /></td>
    </tr>
    <tr>
      <td width="30%" bgcolor="#F2F8FD"><div align="right">T&eacute;l&eacute;phone</div></td>
      <td bgcolor="#F2F8FD"><input name="telephone" type="text" id="telephone" size="35" value="<?php echo $enreg['telephone']; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"></div>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Cat&eacute;gorie du membre</div></td>
      <td bgcolor="#F2F8FD"><label>
        <select name="type_user" id="type_user">
          <?php 
		
		$req = "select * from type_user order by libelle_type_user desc";
		$id = $enreg['id_type'];
		get_combobox_id($req, $id);
		?>
        </select>
      </label>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Fonction</div></td>
      <td bgcolor="#F2F8FD"><label>
        <input name="fonction" type="text" id="fonction" size="35" value="<?php echo $enreg['fonction']; ?>" />
        </label>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Service</div></td>
      <td bgcolor="#F2F8FD"><select name="service" id="service">
        <?php
    $req1 = "select * from services order by id_service desc";
	$id = $enreg['service'];
	get_combobox_id($req1, $id);
		
		?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><label>
          <div align="left"></div>
        </label>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
          <input type="submit" name="button" id="button" value="Sauvegarder" />
          </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label></label>
      </div></td>
    </tr>
  </table>
</form>
<?php
}
}
elseif($_POST['nom'] == "" or $_POST['email'] == "" or $_POST['type_user'] == "" or $_POST['fonction'] == "" or $_POST['service'] == "") {
echo "Certains champs obligatoires sont vides<br>";
echo '<a href="javascript:history.back(-1)">Cliquez ici pour corriger</a>';
}
else
{
include("classes/users.class.inc.php");
$utilisateur = new user;
$utilisateur->nom = $_POST['nom'];
$utilisateur->email = $_POST['email'];
$utilisateur->fonction = $_POST['fonction'];
$utilisateur->service = $_POST['service'];
$utilisateur->telephone = $_POST['telephone'];
$utilisateur->type_user = $_POST['type_user'];
$utilisateur->modifier($_GET['id_user']);
}
?>
</body>
</html>
