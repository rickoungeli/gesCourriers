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
    <td class="raccourci1" >Gestion courriers</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=dircab&amp;action=entrant" class="liensimple">Courriers entrants</a></td>
  </tr>
  
  
  <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Courriers orient&eacute;s</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=dircab&action=synthese" class="liensimple">Vers PR et Dircab</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&amp;action=internesrecus" class="liensimple">Courriers internes du dircab</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courrier&action=all" class="liensimple">Autres courriers</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=evolution" class="liensimple">Evolution d'un courrier</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >R&eacute;ception</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courrier&action=ajouter_entrant" class="liensimple">Enregistrer un courrier entrant</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=admin&action=entrant" class="liensimple">Courriers enregistr&eacute;s</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;</td>
  </tr>
  <tr>
    <td class="raccourci1" >Courriers sortants</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courrier&action=ajouter_sortant" class="liensimple">Enregistrer un courrier sortant</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=envoyes" class="liensimple">Courriers non orient&eacute;s</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=sortants" class="liensimple">Orient&eacute;s vers l'ext&eacute;rieur</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=internes" class="liensimple">Orient&eacute;s vers l'int&eacute;rieur</a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=courriers&action=classeurs" class="liensimple">Classeurs courriers sortants</a></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  
  <tr>
    <td class="raccourci1" >Ordres de Mission</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=ordres&action=ajouter" class="liensimple">Enregistrer </a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=ordres&action=gerer" class="liensimple">Afficher la liste</a></td>
  </tr>
  
   <tr>
    <td >&nbsp;</td>
  </tr>
  
  <tr>
    <td class="raccourci1" >Autorisation de sortie</td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=autorisation&action=ajouter" class="liensimple">Enregistrer </a></td>
  </tr>
  <tr>
    <td class="raccourci2" onMouseOver="javascript:this.style.background ='#F4F4F4';" onMouseOut="javascript:this.style.background ='';">&nbsp;&nbsp;<a href="index.php?module=autorisation&action=gerer" class="liensimple">Afficher la liste</a></td>
  </tr>
</table>
</body>
</html>
