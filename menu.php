<?php

if(isset($_SESSION['login']) and isset($_SESSION['password'])) {
?>
<?php 
  include("classes/courrier.class.inc.php");
  $nbrecourriers = new courrier;
   ?>
   <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
    <td height= "10">&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Courriers entrants</td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courriers&action=nonlus" class="liensimple">Courriers externes entrants</a> (<?php echo $nbrecourriers->TotalMessageRecu($_SESSION['service'], 1); ?>)</td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courriers&amp;action=internesrecus" class="liensimple">Courriers internes entrants</a> (<?php echo $nbrecourriers->TotalMessageRecuDir_int($_SESSION['service'], 1); ?>)</td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courriers&action=transmis" class="liensimple">Courriers transmis</a> (<?php echo $nbrecourriers->TotalCourriersTransmis($_SESSION['service']); ?>)</td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courriers&action=archives" class="liensimple">Trait&eacute;s et archiv&eacute;s</a> (<?php echo $nbrecourriers->TotalArchive($_SESSION['service']); ?>)</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  <?php if($_SESSION['id_utilisateur'] != $_SESSION['responsable']) {?>
  <tr>
    <td class="raccourci1" >Courriers internes</td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courrier&amp;action=ajouter_sortant" class="liensimple">Enregistrer un courrier interne</a></td>
  </tr>
 <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courriers&amp;action=envoyes" class="liensimple">Courriers internes envoy&eacute;s</a> (<?php echo $nbrecourriers->TotalMessageSent($_SESSION['service']); ?>)</td>
  </tr>
 <tr>
   <td >&nbsp;</td>
 </tr>
 <?php if($_SESSION['id_type'] == 10) { ?>
 <tr>
   <td class="raccourci1" >Autres courriers</td>
 </tr>
 <tr>
   <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courrier&amp;action=all" class="liensimple">Courriers des coll&egrave;ges</a></td>
 </tr>
<tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';"><a href="index.php?module=courriers&amp;action=evolution" class="liensimple">Evolution d'un courrier</a></td>
  </tr>
 <?php } ?>
    <tr><td>&nbsp;</td>
 </tr>
  
<?php
}
?>
   </table>
<?php
}
else
{
echo "Vous devez vous connecter";
}
?>
