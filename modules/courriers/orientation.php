<style type="text/css">
<!--
.Style1 {color: #FF0000}
-->
</style>
<?php
include("classes/users.class.inc.php");
$_SESSION['action']="orientation";
$_SESSION['type']=$_GET['type'];
$id_service=$_SESSION['service'];
$id_courrier=$_GET['id_courrier'];
$user = new user;
if($_GET['type'] == "1") {
/*
	$req = "select * from courrier where id_entrant = '$id_courrier' or id_entrant = '0".$id_courrier."' or id_entrant = '00".	
	$id_courrier."' or id_entrant = '000".$id_courrier."' or id_entrant = '0000".$id_courrier."'  and orientation = '".$id_service."'";
*/
	$req = "select * from courrier where id_entrant = '$id_courrier' and orientation='$id_service' and transmission=0";
}
else{
	$req = "select * from courrier where id = '$id_courrier' and tuteur='$id_service'";
}
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
if(mysql_num_rows($res) > 0 ) { 
	$data = mysql_fetch_array($res);
	$_SESSION['id_courrier']=$data['id'];
	?>
	<p class="titre2" style="display:block; left:10%">Informations sur le courrier</p>
    <form name="form1" id="form1" method="post" action="modules/dircab/actions1.php">
	<table width="100%" border="0" cellspacing="10" cellpadding="2">
  	<tr>
    <td width="10%" valign="top"></td>
    <td width="20%" valign="top"><span class="style1">Numéro du courrier : <br /><br />
    							Réf. courrier 			: <br /><br />
    							Exp&eacute;diteur : <br /><br />
    							Destinataire :<br /><br />
    							Objet : <br /><br />
    							Date de réception : <br /><br />    
       </td>
    <td width="40%" valign="top"><?php echo $_GET['id_courrier']; ?> <br /><br />
								<?php echo $data['ref']; ?> <br /><br />
								<?php echo $data['expediteur']; ?> <br /><br />
    							<?php echo $data['destinataire']; ?> <br /><br />
    							<?php echo $data['objet']; ?> <br /><br />  
    							<?php echo strtotime($data['date_arrivee']); ?> <br /><br />                                    
    </span>

  </tr>
  <tr>
  <td>
   </td><td>
    <label> &nbsp;&nbsp;</label>
     <label>
   <select name="orientation" id="orientation">
     <option value=""> Choisissez une orientation </option><?php
     $req1 = "select * from services order by service ";
		get_combobox($req1);
		
		?>
   </select></td>
   <td><input type="submit" name="oriendef" id="oriendef" value="Transmettre"></td>
   </tr>
</table>
</form>
<?php
}
else
{
echo "Ce courrier n'existe pas, saisissez le num&eacute;ro d'un courrier valide";
}
?>
<p align="center"><a href="javascript:history.back(-1)" class="message">Retour</a></p>
