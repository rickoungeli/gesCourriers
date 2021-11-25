<body>
<?php 
  include("classes/courrier.class.inc.php");
  $courrier = new courrier;
   ?>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Enregistrement de courriers</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courrier&action=ajouter_entrant" class="liensimple">Courriers entrants</a></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Gestion de courriers</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=admin&action=entrant" class="liensimple">Courriers enregistr&eacute;s</a></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
