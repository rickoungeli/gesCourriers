<?php 
if(!isset($_POST['id_utilisateur']) and !isset($_POST['id_courrier'])) {
?>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td width="100%" valign="top"><p align="center">Transmettre le courrier &agrave; :<strong> 
        <input type="hidden" name="id_courrier" id="id_courrier" />
        <select name="service" id="service">
        <option value="">S&eacute;lectionnez un destinataire</option>
          <?php
     $req1 = "select * from services order by service ";
		get_combobox($req1);
		
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

include("classes/transfert.class.inc.php");
$transfert = new transfert;
$transfert->id_courrier_source = htmlentities($_GET['id_courrier']);
$transfert->id_user_dest = htmlentities($_POST['service']);
$reqc = "select * from courrier where id = '".$_GET['id_courrier']."'";
$resc = mysql_query($reqc) or die ("Erreur SQL".mysql_error());
$datac = mysql_fetch_array($resc);
if($datac['tuteur'] == 0) {
$transfert->id_user_source = $datac['orientation'];
}
else
{
$transfert->id_user_source = $datac['tuteur'];
}
$transfert->ajouter();
$request = "update courrier set tuteur = '".$transfert->id_user_dest."' where id = '".$_GET['id_courrier']."'";
$result = mysql_query($request) or die ("Error SQL".mysql_error());
}


?>
