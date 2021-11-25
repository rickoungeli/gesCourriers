<?php
if(!isset($_POST['nom']) and !isset($_POST['email']) and !isset($_POST['login']) and !isset($_POST['password']) and !isset($_POST['password2']) and !isset($_POST['categorie_membre']) and !isset($_POST['service']) and !isset($_POST['fonction'])) {
?>
<form id="forms" name="forms" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="4" class="titre2">Ajouter un utilisateur</td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Nom</div></td>
      <td width="30%" bgcolor="#F2F8FD"><label>
        <input name="nom" type="text" id="nom" size="35" />
      </label></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Nom d'utilisateur</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="logins" type="text" id="login" size="35" /></td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Post-nom / Pr&eacute;nom</div></td>
      <td width="30%" bgcolor="#F2F8FD"><label>
        <input name="postnom" type="text" id="postnom" size="35" />
      </label></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Mot de passe</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="passwords" type="password" id="passwords" size="35" /></td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Adresse e-mail</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="email" type="text" id="email" size="35" /></td>
      <td width="20%" bgcolor="#F2F8FD"><div align="right">Retapez le mot de passe</div></td>
      <td width="30%" bgcolor="#F2F8FD"><input name="passwords2" type="password" id="passwords2" size="35" /></td>
    </tr>
    <tr>
      <td height="20" colspan="4"><div align="right"></div>        <div align="right"></div></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">T&eacute;l&eacute;phone</div></td>
      <td colspan="3" bgcolor="#F2F8FD"><input name="telephone" type="text" id="telephone" size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Cat&eacute;gorie du membre</div></td>
      <td colspan="3" bgcolor="#F2F8FD"><label>
        <select name="type_user" id="type_user">
        <option selected="selected">S&eacute;lectionnez une cat&eacute;gorie</option>
		<?php 
		
		$req = "select * from type_user order by libelle_type_user desc";
		get_combobox($req);
		?>
        </select>
      </label>        <div align="right"></div></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Entit&eacute;</div></td>
      <td colspan="3" bgcolor="#F2F8FD"><label>
        <select name="service" id="service">
          <?php
     $req1 = "select * from services order by service ";
		get_combobox($req1);
		
		?>
        </select>
      </label>
                <div align="right"></div></td>
    </tr>
    <tr>
      <td bgcolor="#F2F8FD"><div align="right">Fonction</div></td>
      <td colspan="3" bgcolor="#F2F8FD"><input name="fonction" type="text" id="fonction" size="35" /></td>
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
elseif($_POST['nom'] == "" or $_POST['postnom'] == "" or $_POST['email'] == "" or $_POST['logins'] == "" or $_POST['passwords'] == "" or $_POST['passwords2'] == "" or $_POST['type_user'] == "" or $_POST['fonction'] == "" ) {
echo " Certains champs obligatoires sont vides, veuillez les remplir<br>";
echo '<a href="javascript:history.back(-1)">Rétourner pour Corriger</a>';
}
else
{
include("classes/users.class.inc.php");
$user = new user;
$user->nom = $_POST['nom']. " " . $_POST['postnom'];
$user->email = $_POST['email'];
$user->login = $_POST['logins'];
$user->password = md5($_POST['passwords']);
$user->type_user = $_POST['type_user'];
$user->fonction = $_POST['fonction'];
$user->service = $_POST['service'];
$user->telephone = $_POST['telephone'];

// Enregistrement de l'utilisateur dans la base de données

if($_POST['passwords'] == $_POST['passwords2']){
$user->ajouter();
}
else
{
echo "Les deux mots de passes saisis sont différents<br>";
echo '<a href="javascript:history.back(-1)">Rétourner pour Corriger</a>';
}
}
?>