
<?php
if(!isset($_POST['old']) and !isset($_POST['new1']) and !isset($_POST['new2'])) {
?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td colspan="2" class="titre2">
      Modification du mot de passe
      </td>
    </tr>
    <tr>
      <td width="40%"><div align="right">Mot de passe actuel</div></td>
      <td width="60%"><label>
        <input type="password" name="old" id="old" />
      </label></td>
    </tr>
    <tr>
      <td width="40%"><div align="right">Nouveau mot de passe</div></td>
      <td width="60%"><input type="password" name="new1" id="new1" /></td>
    </tr>
    <tr>
      <td width="40%"><div align="right">Nouveau mot de passe</div></td>
      <td width="60%"><input type="password" name="new2" id="new2" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
          <input type="submit" name="button" id="button" value="Changer le mot de passe" />
          </label>
      </div></td>
    </tr>
  </table>
</form>
<?php
}
else
{
if($_POST['old'] == "" and $_POST['new1'] == "" and $_POST['new2'] == "" ) {
echo "Veuillez remplir toutes les informations";
}
elseif($_POST['new1'] != $_POST['new2']) {
echo " Vos deux nouveaux mots de passes sont diff&eacute;rentes, merci de recommencer<br>";
echo '<a href="javascript:history.back(-1)" class="message">R&eacute;tour</a>';
}
else
{
include("connect.inc.php");
$req = "select * from utilisateurs where id_utilisateur ='".$_SESSION['id_utilisateur']."' and password = '".md5($_POST['old'])."'";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
if(mysql_num_rows($res) == 0) {
echo "L'ancien mot de passe saisi est incorrecte, merci de recommencer<br>";
echo '<a href="javascript:history.back(-1)" class="message">R&eacute;tour</a>';
}
else
{
$req2 = "update utilisateurs set password = '".md5($_POST['new1'])."' where id_utilisateur = '".$_SESSION['id_utilisateur']."'";
$res2 = mysql_query($req2);
echo "Votre mot de passe a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s ! !<br>";
echo '<a href="index.php?module=user&action=accueil" class="message">R&eacute;tour  &agrave; l\'accueil</a>';
}
}
}
?>