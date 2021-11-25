<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action=""><span class="titre2">Effectuer une recherche</span><br />
  <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0">
    
    <tr>
      <td width="25%" bgcolor="#F2F8FD"><div align="right">Nom(s)</div></td>
      <td width="25%" bgcolor="#F2F8FD"><label>
        <input name="noms" type="text" id="noms" size="35" />
      </label></td>
      <td width="25%" bgcolor="#F2F8FD"><div align="right">Dur&eacute;e</div></td>
      <td width="25%" bgcolor="#F2F8FD"><input name="duree" type="text" id="duree" size="35" /></td>
    </tr>
    <tr>
      <td width="25%" bgcolor="#F2F8FD"><div align="right">Objet</div></td>
      <td width="25%" bgcolor="#F2F8FD"><input name="objet" type="text" id="objet" size="35" /></td>
      <td bgcolor="#F2F8FD"><div align="right">Itin&eacute;raire</div></td>
      <td bgcolor="#F2F8FD"><input name="destination" type="text" id="login" size="35" /></td>
    </tr>
    <tr>
      <td width="25%" bgcolor="#F2F8FD">&nbsp;</td>
      <td width="25%" bgcolor="#F2F8FD">&nbsp;</td>
      <td width="25%" bgcolor="#F2F8FD">&nbsp;</td>
      <td width="25%" bgcolor="#F2F8FD">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#F2F8FD"><div align="center">
          <label>
          <input type="submit" name="button" id="button" value="Lancer la recherche" />
          </label>
      </div></td>
    </tr>
  </table>
</form>
<p>

<?php
/*
include("classes/ordres.class.inc.php");
$ordre = new ordre;
if($_POST['noms'] and $_POST['objet'] and $_POST['destination'] and $_POST['nbre_jour'] and $_POST['observations'] and $_POST['categorie']) {
$req = "select * from ordres where noms = '%".$_POST['noms']."%' and noms = '%".$_POST['objet']."%' and noms = '%".$_POST['destination']."%' and noms = '%".$_POST['nbre_jours']."%' and noms = '%".$_POST['observations']."%' and noms = '%".$_POST['categorie']."%' order by id_ordre desc";
}
else
{
$req = "select * from ordres order by id_ordre desc";
}
$ordre->afficher($req);
*/?>
</p>
<p>

  <?php
require_once("classes/ordres.class.inc.php");
$ordre = new ordre;
$nbreannonce = $ordre->TotalOrdres();
$AnnoncesParPage = 10;
$NbreDePages = ceil ($nbreannonce/$AnnoncesParPage);

echo "</div><br />";
if(isset($_GET['page'])) {
$page = $_GET['page'];
}
else
{
$page = 1;
}
$PremiereAnnonceAafficher = ($page - 1) * $AnnoncesParPage;
$total = $PremiereAnnonceAafficher + $AnnoncesParPage;
$tot = $PremiereAnnonceAafficher + 1;
if(!isset($_POST['noms'])) {
echo '<center><span class="titre3">Page '.$page.' sur un total de '.$NbreDePages .'</span></center><br>';
}
else
{
echo '<center><span class="titre3">R&eacute;sultats de la recherche</span> | <a href="index.php?module=ordres&action=gerer" class="message">Afficher Tout</a></center><br>';
}
if(isset($_POST['noms'])) {
if($_POST['categorie'] == "") {
$req = "select * from ordres where noms like '%".$_POST['noms']."%' and objet like '%".$_POST['objet']."%' and itineraire like '%".$_POST['destination']."%' and duree like '%".$_POST['duree']."%' order by id_ordre desc";
}
else
{
$req = "select * from ordres where noms like '%".$_POST['noms']."%' and objet like '%".$_POST['objet']."%' and itineraire like '%".$_POST['destination']."%' and duree like '%".$_POST['duree']."%' order by id_ordre desc";
}
}
else
{
$req = "select * from ordres order by id_ordre desc limit $PremiereAnnonceAafficher , $AnnoncesParPage";
}
$ordre->afficher($req);
echo "<br>";
if(!isset($_POST['noms'])){
echo '<div align="center"><b>Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </b></span>';

for ($i = 1 ; $i <= $NbreDePages ; $i++)
{
echo '<a class="message" href="index.php?module=ordres&action=gerer&page=' . $i . '">' . $i . '</a> '; 
echo "&nbsp;&nbsp;&nbsp;";
}}
?>



</p>
</body>
</html>
