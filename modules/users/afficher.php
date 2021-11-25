<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="4" bgcolor="#FFFFFF">Rechercher un utilisateur</td>
    </tr>
    <tr>
      <td width="20%" bgcolor="#F4F4F4"><div align="right">Nom</div></td>
      <td width="30%" bgcolor="#FFFFFF"><label>
        <input name="nom" type="text" id="nom" size="35" />
      </label></td>
      <td width="20%" bgcolor="#F4F4F4"><div align="right">Nom d'utilisateur</div></td>
      <td width="30%" bgcolor="#FFFFFF"><input name="login" type="text" id="login" size="35" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
      <td colspan="2" bgcolor="#FFFFFF"><div align="center">
          <label>
          <input type="submit" name="button" id="button" value="Lancer la recherche" />
          </label>
      </div></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </table>
</form>
<p>

<?php

include("classes/users.class.inc.php");
$utilisateurs = new user;
$utilisateurs->afficher();

?>
</p>
</body>
</html>
