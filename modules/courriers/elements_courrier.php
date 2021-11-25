<table width="98%" border="0" align="center" cellpadding="4" cellspacing="1">
  <tr>
    <td colspan="2" valign="top" style="border-bottom: dashed 1px #0000FF;"><p class="titre2"><strong>Enregistrer un courrier </strong> : <strong>Etape 2 : Copies du courrier</strong></p>
      <p class="titre2">Identification du Courrier :
      <?php echo $_GET['id_courrier']; ?><br>
      </p></td>
  </tr>
  <tr>
    <td width="50%" valign="top" style="border-right: dashed 1px #0000FF;"><p class="titre2"><strong>Copies pour Informations</strong></p>
        <div><?php
	  
	  include("modules/copies/ajouter.php");
	  
	  ?></div>
      <p>      </p>
      </p>      </td>
    <td width="50%" valign="top" ><p><strong class="titre2">Scannages de la lettre</strong></p>
      <div>
        <?php
	  
	  include("modules/scannages/ajouter.php");
	  
	  ?>
      </div></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="index.php?module=user&amp;action=accueil" class="message">
      </label>
        
        <label>R&eacute;tour &agrave; l'accueil</label>
    </a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href="index.php?module=courrier&amp;action=ajouter_sortant" class="message">
            <label>Enregistrer un  courrier</label>
            sortant</a>
            <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
