<?php 
  include("classes/courrier.class.inc.php");
  $nbrecourriers = new courrier;
   ?>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="raccourci1" >&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Mes courriers</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=nonlus" class="liensimple">Courriers externes entrants</a> (<?php echo $nbrecourriers->TotalMessageRecuDir($_SESSION['service'], 1); ?>)</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&amp;action=internesrecus" class="liensimple">Courriers internes entrants</a> (<?php echo $nbrecourriers->TotalMessageRecuDir_int($_SESSION['service'], 1); ?>)</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=transmis" class="liensimple">Courriers transmis</a> (<?php echo $nbrecourriers->TotalCourriersTransmis($_SESSION['service']); ?>)</td>
  </tr>
     <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=recus" class="liensimple">Courriers réceptionnés</a> (<?php //echo $nbrecourriers->TotalCourriersTransmis($_SESSION['service']); ?>)</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=archives" class="liensimple">Trait&eacute;s et archiv&eacute;s</a> (<?php echo $nbrecourriers->TotalArchive($_SESSION['service']); ?>)</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Courriers</td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&amp;action=evolution" class="liensimple">Evolution d'un courrier</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&amp;action=accusation" class="liensimple">R&eacute;ception d'un courrier</a></td>
  </tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&amp;action=orientation" class="liensimple">Orientation d'un courrier</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onmouseover="javascript:this.style.background ='#F4F4F4';" onmouseout="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=dircab&amp;action=synthese" class="liensimple">Vue des synth&egrave;ses</a></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Statistiques</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=stat&amp;action=user" class="liensimple">Activit&eacute; globale </a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=stat&amp;action=details" class="liensimple">Activit&eacute; par service </a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=stat&amp;action=period" class="liensimple">Activit&eacute;s par p&eacute;riode</a></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Tous les courriers</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=dircab&amp;action=entrant" class="liensimple">Courriers entrants</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&amp;action=envoyes" class="liensimple">Courriers internes</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&amp;action=sortants" class="liensimple">Courriers sortants</a></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
</table>

