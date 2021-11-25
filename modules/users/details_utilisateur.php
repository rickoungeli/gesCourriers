<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$id_utilisateur = $_GET['id_user'];
include("connect.inc.php");
$req = "select * from utilisateurs where id_utilisateur = '$id_utilisateur'";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
while ($enreg = mysql_fetch_array($res)) {
?>
<table width="98%" border="0" align="center" cellpadding="8" cellspacing="1">
  <tr>
    <td colspan="4" class="titre2">D&eacute;tails Utilisateur : <?php echo $enreg['login']; ?> ( <?php echo $enreg['nom']; ?> )</td>
  </tr>
  <tr>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Nom complet :</div></td>
    <td width="30%" valign="top" bgcolor="#FFFFFF"><label><?php echo $enreg['nom']; ?></label></td>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Nom d'utilisateur : </div></td>
    <td width="30%" valign="top" bgcolor="#FFFFFF"><?php echo $enreg['login']; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Adresse e-mail :</div></td>
    <td valign="top" bgcolor="#FFFFFF"><?php echo $enreg['email']; ?></td>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Mot de passe :</div></td>
    <td valign="top" bgcolor="#FFFFFF"><strong>Masqu&eacute;</strong></td>
  </tr>
  <tr>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">T&eacute;l&eacute;phone</div></td>
    <td width="30%" valign="top" bgcolor="#FFFFFF"><label><?php echo $enreg['telephone']; ?></label></td>
    <td width="20%" valign="top" bgcolor="#F2F8FD">&nbsp;</td>
    <td width="30%" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="21" colspan="4"><div align="right"></div>        
    <div align="right"></div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Cat&eacute;gorie du membre :</div></td>
    <td colspan="3" bgcolor="#FFFFFF"><label></label>        <div align="left">
      <?php 
	$req2 = "select libelle_type_user from type_user where id_type_user = ".$enreg['id_type'];
	$res2 = mysql_query($req2) or die ("Erreur SQL<br>".mysql_error());
	$enreg2 = mysql_fetch_array($res2);
	echo $enreg2['libelle_type_user']; ?>
    </div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Fonction :</div></td>
    <td colspan="3" bgcolor="#FFFFFF"><label></label>        <div align="left"><?php echo $enreg['fonction']; ?></div></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Service (organe) : </div></td>
    <td colspan="3" bgcolor="#FFFFFF"><?php 
	$req3 = "select service from services  where id_service = ".$enreg['service'];
	$res3 = mysql_query($req3) or die ("Erreur SQL<br>".mysql_error());
	$enreg3 = mysql_fetch_array($res3);
	echo $enreg3['service']; ?></td>
  </tr>
  <tr>
    <td colspan="4">
      <label>
      <table width="60%%" border="0" align="center" cellpadding="0" cellspacing="2">
        <tr>
          <td width="30%" height="24" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"><a href="index.php?module=users&amp;action=modifier&amp;id_user=<?php echo $_GET['id_user']; ?>"  class="message">Modifier </a></div></td>
          <td width="30%" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"><a href="index.php?module=admin&amp;action=user" class="message">R&eacute;tour aux utilisateurs</a></div></td>
          <td width="40%" height="24" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"></div></td>
        </tr>
      </table>
      <div align="left"></div>
      </label>
    <div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="4"></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>
