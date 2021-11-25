<?php 
if(!isset($_POST['id_utilisateur']) and !isset($_POST['id_courrier'])) {
?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td width="100%" valign="top"><p align="center">Transmettre le courrier &agrave; :<strong> 
        <input type="hidden" name="id_courrier" id="id_courrier" />
        <select name="id_destinataire" id="id_destinataire" class="inputbox" >
          <option value="" selected="selected">S&eacute;lectionn&eacute; un destinataire</option>
          <?php 
		
		$req = "select * from utilisateurs order by nom ";
		get_combobox($req);
		?>
        </select>
      </strong></p>
        <p align="center"><strong>
          <input type="submit" name="button" id="button" value="Valider la transmission" />
        </strong></p></td>
    </tr>
  </table>
</form>
<?php
}
else
{

include("classes/copies.class.inc.php");
$copie = new copie;
$copie->id_courrier = htmlentities($_GET['id_courrier']);
$copie->id_utilisateur = htmlentities($_POST['id_destinataire']);
$copie->ajouter();
$requu = "insert into lettre_tuteur values('','".$_POST['destinataire']."', '".$_POST['destinataire']."')";
$ress = mysql_query($requu) or die ("erreur SQL".mysql_error());
$request = "INSERT INTO actions_courriers VALUES('','".$_GET['id_courrier']."','".$_SESSION['id_utilisateur']."','".$_POST['destinataire']."','a transmis le courrier pour &agrave; ','".time()."')";
$result = mysql_query($request) or die ("Error SQL".mysql_error());

}
?>
