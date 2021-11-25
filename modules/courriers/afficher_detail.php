<?php

$requete = "select * from courrier where id='".$_GET['id_courrier']."'";
$resultat = mysql_query($requete);
$enregistrement = mysql_fetch_array($resultat);
?>
<table width="98%" border="0" align="center" cellpadding="6" cellspacing="1">
  <tr>
    <td colspan="4" class="titre2"><strong>D&eacute;tails du courrier n&deg;
      <?php if($enregistrement['categorie'] == 1){
$id_courrier = $enregistrement['id_entrant'];
}
else
{
$id_courrier = $enregistrement['id'];
} echo $id_courrier; ?>
    </strong></td>
  </tr>
  <tr>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
    <td width="30%" valign="top" bgcolor="#FFFFFF"><strong><?php echo $enregistrement['expediteur']; ?></strong></td>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Date du courrier</div></td>
    <td width="30%" valign="top" bgcolor="#FFFFFF"><?php echo stripslashes($enregistrement['date_lettre']); ?></td>
  </tr>
  <tr>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">R&eacute;f&eacute;rences du courrier</div></td>
    <td width="30%" valign="top" bgcolor="#FFFFFF"><label><?php echo stripslashes($enregistrement['ref']); ?></label></td>
    <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Destinataire</div></td>
    <td width="30%" valign="top" bgcolor="#FFFFFF"><strong><?php echo $enregistrement['destinataire']; ?></strong></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Objet du courrier</div></td>
    <td valign="top" bgcolor="#FFFFFF"><?php echo stripslashes($enregistrement['objet']); ?></td>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
    <td valign="top" bgcolor="#FFFFFF"><?php 
	$reqs = "select * from type_courrier where id_type = '".$enregistrement['id_type']."'";
	$ress = mysql_query($reqs) or die ("Erreur SQL".mysql_error());
	$enregss = mysql_fetch_array($ress);
	echo $enregss['libelle_type']; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">N&deg; de R&eacute;f&eacute;rence interne</div></td>
    <td valign="top" bgcolor="#FFFFFF"><strong><?php if($enregistrement['categorie'] == 1){
$id_courrier = $enregistrement['id_entrant'];
}
else
{
$id_courrier = $enregistrement['id'];
} echo $id_courrier; ?></strong></td>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">R&eacute;f&eacute;rence du soubassement</div></td>
    <td valign="top" bgcolor="#FFFFFF"><?php 
	
	if(stripslashes($enregistrement['nbre_pages']) == "") {
	echo "Pas de soubassement signal&eacute;";
	}
	else
	{
echo "<a href='index.php?module=courriers&action=details&id_courrier=".$enregistrement['nbre_pages']."' class='message' target = '_blank'>".$enregistrement['nbre_pages']."</a>";
	}  ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">R&eacute;ception Physique</div></td>
    <td valign="top" bgcolor="#FFFFFF"><?php echo $enregistrement['reception'] == 3 ? "Courrier physique dej&agrave; re&ccedil;u" : "Courrier physique non encore re&ccedil;u"; ?></td>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Nombre d'annexes</div></td>
    <td valign="top" bgcolor="#FFFFFF"><?php echo stripslashes($enregistrement['annexes']); ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right">Synth&egrave;se du courrier</div></td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF">
    <?php
		if($enregistrement['synthese'] == "") {
	if($_SESSION['id_utilisateur'] == $_SESSION['responsable'] or $_SESSION['id_type'] == 9) {
	echo " Pas de synth&egrave;se pour l'instant";
	}
	else
	{
	?>   
    <div><?php echo " Pas de synth&egrave;se pour l'instant";
	include("modules/synthese/ajouter.php"); ?></div>   
	  <?php
	}
	}
	elseif($_SESSION['id_utilisateur'] == $_SESSION['responsable'] or $_SESSION['id_type'] == 9) {
	echo nl2br(stripslashes($enregistrement['synthese']));
	}
	else
	{
	include("modules/synthese/modifier.php");
	} ?>    </td>
  </tr>
  <tr>
    <td colspan="4" valign="top" class="titre2">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right" class="titre2">Fichiers attach&eacute;s</div></td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF"><ul>
    <?php
$rq = "select * from scannages where id_courrier = '".$_GET['id_courrier']."'";
$rs = mysql_query($rq) or die ("Erreur SQL".mysql_error());
if(mysql_num_rows($rs) == 0) {
echo "Aucun fichier attach&eacute; &agrave; ce courrier";
}
else
{
while ($dt = mysql_fetch_array($rs)) {
echo "<li>".$dt['titre']."  | <a href='../presidence/scannages/".$dt['nom_fichier']."' class='message'>T&eacute;l&eacute;charger</a></li>";
}
}
?>
</ul></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#F2F8FD"><div align="right" class="titre2">Annotations</div></td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF"><ul>
      <?php
	$requ = "select * from courrier where id = ".$_GET['id_courrier'];
	$resu = mysql_query($requ) or die ("Erreur SQL".mysql_error());
	$tada = mysql_fetch_array($resu);
	$princ = $tada['id'];
	$requ2 = "select * from notes where id_courrier = '$princ' ";
	$resu2 = mysql_query($requ2) or die ("Erreur SQL".mysql_error());
	if(mysql_num_rows($resu2) > 0) {
	while($dataa = mysql_fetch_array($resu2)) {
	echo "<li>". $dataa['objet_note']." | <a class='message' href='index.php?module=notes&action=afficher&id_note=".$dataa['id_note']."'>Voir la note</a>  | Ajout&eacute;e le ".date('d/m/Y', $dataa['date_note'])."</li>";
	}
	}
	else
	{
	echo "Aucune annotation n'a &eacute;t&eacute; apport&eacute;e &agrave; ce courrier pour l'instant";
	}
    ?>
    </ul>    </td>
  </tr>
  
  <tr>
    <td height="20" colspan="4" class="titre2">&nbsp;</td>
  </tr>
  <?php
  if($enregistrement['traitement'] == 1 or ($enregistrement['transmission'] == 1 and $enregistrement['tuteur'] != $_SESSION['service'])) {
 ?>
 <tr><td width="20%" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"><a href="index.php?module=courrier&action=infos&id_courrier=<?php echo $_GET['id_courrier']; ?>" class="message">Infos courrier</a></div></td></tr>
 <?php
  }
  else
  {
  if($enregistrement['tuteur'] == $_SESSION['service'] or $_SESSION['id_type'] == 9) {
  ?>
  <tr>
    <td colspan="4" align="center"><table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="20%" height="24" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"><?php if($enregistrement['reception'] == 3) { ?><a href="index.php?module=courrier&action=transmettre&id_courrier=<?php echo $_GET['id_courrier']; ?>"  class="message">Transmettre </a><?php } else { ?><a href="index.php?module=courrier&amp;action=reception&id=<?php echo $_GET['id_courrier']; ?>"  class="message">Accuser r&eacute;ception </a> <?php } ?></div></td>
    <td width="20%" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"><a href="index.php?module=notes&action=ajouter&id_courrier=<?php echo $_GET['id_courrier']; ?>"class="message">Ajouter une note </a></div></td>
    <?php if($enregistrement['traitement'] != 1) {?> <td width="20%" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"><?php if($enregistrement['reception'] == 3) {?><a href="#" onclick="traiter('<?php echo $_GET['id_courrier']; ?>')" class="message">Archiver</a><?php } else { echo "Archiver"; } ?></div></td><?php } ?>
    <td width="20%" bgcolor="#F2F8FD" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='#F2F8FD';"><div align="center"><a href="index.php?module=courrier&action=infos&id_courrier=<?php if($enregistrement['categorie'] == 1) { echo $enregistrement['id_entrant']; } else { echo $enregistrement['id']; } ?>&type=<?php echo $enregistrement['categorie']; ?>" class="message">Infos courrier</a></div></td>
    </tr>
</table>
      <div align="center"><a href="javascript:history.back(-1)" class="message"><br />
      R&eacute;tour aux courriers</a></div>
      <br /></td>
  </tr>
  <?php
  }}
  ?>
</table>
<?
}
}
?>