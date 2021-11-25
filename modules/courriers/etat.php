<style type="text/css">
<!--
.Style1 {color: #FF0000}
-->
</style>
<p class="titre2">Informations sur la vie du courrier</p>
<table width="100%" border="0" cellspacing="10" cellpadding="2">
  <tr>
    <td valign="top">
      
      <?php
 	include("classes/users.class.inc.php");
	$user = new user;
	if($_GET['type'] == "1") {
	$req = "select * from courrier where id_entrant = '".$_GET['id_courrier']."' or id_entrant = '0".$_GET['id_courrier']."' or id_entrant = '00".$_GET['id_courrier']."' or id_entrant = '000".$_GET['id_courrier']."' or id_entrant = '0000".$_GET['id_courrier']."'";
	}
	else
	{
	$req = "select * from courrier where id = '".$_GET['id_courrier']."'";
	}
	$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
if(mysql_num_rows($res) > 0 ) { 
	$enreg = mysql_fetch_array($res);
	echo "<font color='#FF8800'>Encod&eacute; dans le syst&egrave;me par :";
	echo $user->nomuser($enreg['id_saisi']);
	echo "  le ".date('d/m/Y à H:i:s', $enreg['date_arrivee']);
	
	
	?><br  /><span class="titre3">Exp&eacute;diteur :
     <?php
 	echo $enreg['expediteur'];
		?>
    </span>   <br />
      <span class="titre3">Destinateur :
      <?php
 	echo $enreg['destinataire'];
		?>
      </span><br />
      </font></td>
    <td valign="top"><span class="titre3">
      <?php
	  
	  if($enreg['nbre_pages'] != NULL and $_GET['type'] != 1 and $enreg['tuteur'] != '100') {
	  		?>
      <span class="Style1">Ce courrier sortant est une r&eacute;ponse au courrier n&deg; 
      <strong><?php
	  
	  echo $enreg['nbre_pages'];
	  		?></strong>
      </span></span>. <a href="http://192.168.1.6/presidence/index.php?module=courriers&amp;action=evolution&amp;id_courrier=<?php
	  $requesss = "select * from courrier where id_entrant = '".$enreg['nbre_pages']."' order by id desc limit 0, 1";
	  $resultt = mysql_query($requesss) or die ("Erreur SQL".mysql_error());
	  while($datass = mysql_fetch_array($resultt)) {
	  echo $datass['id_entrant']; }
	  ?>&amp;type=1">Cliquez ici pour plus de d&eacute;tails sur le soubassement </a><?php } ?></td>
  </tr>
  <tr>
    <td width="50%" valign="top"><span class="titre2">Transmissions</span><br />
    <?php
include("classes/transfert.class.inc.php");
$courrier = new transfert;
$courrier -> afficher($_GET['id_courrier']);
?></td>
    <td width="50%" valign="top"><span class="titre2">Notes</span><br />
    <?php
include("classes/note.class.inc.php");
$note = new note;
$note -> afficher($_GET['id_courrier']);
?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD" class="infos" style="border:solid 1px #306BAD;"><p class="titre2">Evolution de la synth&egrave;se</p>
      <ul>
        <?php
		if($_GET['type'] == "1") {
	$reqv = "select * from courrier where id_entrant = '".$_GET['id_courrier']."'";
	}
	else
	{
	$reqv = "select * from courrier where id = '".$_GET['id_courrier']."'";
	}
	$resv = mysql_query($reqv) or die ("Error SQL parce que ".mysql_error()."dans la requete ".$reqv);
	$datav = mysql_fetch_array($resv);
	$idv = $datav['id'];
	$requ2 = "select * from synthese where id_courrier = '$idv' ";
	$resu2 = mysql_query($requ2) or die ("Erreur SQL".mysql_error());
	if(mysql_num_rows($resu2) > 0) {
	while($dataa = mysql_fetch_array($resu2)) {
	$user = new user;
?>
        <li> Version de la synth&egrave;se enregistr&eacute;e le <?php echo date("d/m/Y à H:i:s", $dataa["date_enreg"]); ?> | <a class="message" href="javascript:OuvrirFenetre('synthese.php?id=<?php echo $dataa["id_synthese"]; ?>','Visualiseur','width=600,height=300')">Voir</a></li>
        <?php
	}
	}
	else
	{
	echo "Aucune synth&egrave;se enregistr&eacute; &agrave; ce courrier pour l'instant";
	}
    ?>
      </ul>
    <p></p></td>
    <td valign="top" bgcolor="#F2F8FD" class="infos" style="border:solid 1px #306BAD;" ><p class="titre2">Autres informations</p>
      <ul>
        <?php
		if($_GET['type'] == "1") {
	$reqv = "select * from courrier where id_entrant = '".$_GET['id_courrier']."'";
	}
	else
	{
	$reqv = "select * from courrier where id = '".$_GET['id_courrier']."'";
	}
	$resv = mysql_query($reqv) or die ("Error SQL parce que ".mysql_error()."dans la requete ".$reqv);
	$datav = mysql_fetch_array($resv);
	$idv = $datav['id'];
	$requ2 = "select * from actions_courriers where id_courrier = '$idv' ";
	$resu2 = mysql_query($requ2) or die ("Erreur SQL".mysql_error());
	while($dataa = mysql_fetch_array($resu2)) {
	$user = new user;
	require_once("classes/services.class.inc.php");
	$service = new service;
	?>
        <li> Le <?php echo date("d/m/Y à H:i:s", $dataa["timestamp"]); ?>,  <?php echo $user->nomuser($dataa['id_utilisateur']); ?> <?php echo $dataa['action']; ?> <?php echo $service->nomservice($dataa['id_utilisateur2']); ?></li>
        <?php
	}
    ?>
      </ul>      
    </td>
  </tr>
</table>
<?php
}
else
{
echo "Ce courrier n'existe pas, saisissez le num&eacute;ro d'un courrier valide";
}
?>
<p align="center"><a href="javascript:history.back(-1)" class="message">Retour</a></p>
