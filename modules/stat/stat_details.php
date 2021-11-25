<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<div class="titre2">Statistiques d&eacute;taill&eacute;es</div>
</p>
<p class="titre2">Service : 
  <?php require_once("classes/services.class.inc.php"); $service = new service; echo $service->nomservice($_GET['id_service']); ?> 
</p>
<table width="600" border="0" align="center" cellpadding="6" cellspacing="0">
  <tr background="images/bg_band.jpg" >
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr background="images/bg_band.jpg" style="color:#FFFFFF;">
    <td colspan="3" background="images/bg_band.jpg" style="border-right:solid 2px #ffffff;"><div align="center" ><strong>Courriers entrant </strong></div></td>
    <td colspan="3" background="images/bg_band.jpg"><div align="center" ><strong>Courriers internes </strong></div></td>
  </tr>
  <tr>
    <td width="17%" bgcolor="#F2F8FD"><div align="center"><strong>Re&ccedil;us</strong></div></td>
    <td width="17%"><div align="center"><strong>R&eacute;pondus</strong></div></td>
    <td width="17%" bgcolor="#F2F8FD" style="border-right:solid 2px #4F8CCF;"><div align="center"><strong>Class&eacute;</strong></div></td>
    <td width="17%"><div align="center"><strong>Re&ccedil;u</strong></div></td>
    <td width="17%" bgcolor="#F2F8FD"><div align="center"><strong>R&eacute;pondus</strong></div></td>
    <td width="17%"><div align="center"><strong>G&eacute;n&eacute;r&eacute;</strong></div></td>
  </tr>
  <?php
  ?>
  
  <tr>
    <td style="border-bottom:solid 2px #4F8CCF;"><div align="center">
	
	<?php
	require_once("classes/courrier.class.inc.php");
	$courrier = new courrier;
	if($_GET['id_service'] == 8 ) {
	echo $courrier->TotalMessageRecuDir($_GET['id_service']); }
	else
	{
	echo $courrier->TotalMessageRecu($_GET['id_service']);
	}
	 ?></div></td>
    <td  style="border-bottom:solid 2px #4F8CCF;"><div align="center">
	
	<?php 
	$reqq = "SELECT * FROM courrier WHERE tuteur = '".$_GET['id_service']."' and traitement = '0' and categorie = 1 and transmission = 0 "; 
	$ress = mysql_query($reqq) or die ("Erreur SQL".mysql_error().$req);
	$nombre = 0;
	while ($dataa = mysql_fetch_array($ress)) {
	$reqqs = "select * from courrier where categorie = 2 and orientation = '".$_GET['id_service']."' and tuteur = '100' and nbre_pages = '".$dataa['id_courrier']."'";
	$resss = mysql_query($reqqs) or die("Erreur SQL".mysql_error().$reqqs);
	if(mysql_num_rows($resss) > 0) {
	$nombre += 1;
	}}
	echo $nombre;
	
	?>
	
	
	</div></td>
    <td style="border-right:solid 2px #4F8CCF;border-bottom:solid 2px #4F8CCF;"><div align="center">
      <?php
	$courrier = new courrier;
	if($_GET['id_service'] == 8 ) {
	echo $courrier->TotalArchive($_GET['id_service']); }
	else
	{
	echo $courrier->TotalArchive($_GET['id_service']);
	}
	 ?>
    </div></td>
    <td  style="border-bottom:solid 2px #4F8CCF;"><div align="center">
      <?php
	$courrier = new courrier;
	if($_GET['id_service'] == 8 ) {
	echo $courrier->TotalMessageRecuDir_int($_GET['id_service']); }
	else
	{
	echo $courrier->TotalMessageRecuDir_int($_GET['id_service']);
	}
	 ?>
    </div></td>
    <td  style="border-bottom:solid 2px #4F8CCF;"><div align="center">
      <?php 
	$reqq1 = "select * from courrier where tuteur = '".$_GET['id_service']."' and transmission = 0 and categorie = 2 and traitement = 0 "; 
	$ress1 = mysql_query($reqq1) or die ("Erreur SQL".mysql_error().$req);
	$nombres = 0;
	while ($dataa1 = mysql_fetch_array($ress1)) {
	$reqqs1 = "select * from courrier where categorie = 2 and nbre_pages = '".$dataa1['id_courrier']."' and orientation = '".$_GET['id_service']."' and tuteur != 100";
	$resss1 = mysql_query($reqqs1) or die("Erreur SQL".mysql_error().$reqqs1);
	$dataaa2 = mysql_fetch_array($resss1);
	if($dataaa2['id_courrier'] == $dataa1['nbre_pages']) {
	$nombres ++;
	}
	}
	echo $nombres;
	
	?>
    </div></td>
    <td  style="border-bottom:solid 2px #4F8CCF;"><div align="center">
      <?php
	$courrier = new courrier;
	if($_GET['id_service'] == 8 ) {
	echo $courrier->TotalMessageSent($_GET['id_service']); }
	else
	{
	echo $courrier->TotalMessageSent($_GET['id_service']);
	}
	 ?>
    </div></td>
  </tr>
</table>
<p align="center"><a class='lien1' href="index.php?module=stat&amp;action=details">Retour</a></p>
</body>
</html>
