<?php
if(!isset($_POST['expediteur']) and !isset($_POST['date_courrier']) and !isset($_POST['ref']) and !isset($_POST['destinataire']) and !isset($_POST['synthese']) and !isset($_POST['type_courrier']) ) {
?>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr> 
      <td colspan="4" ><div class="titre2" style="border-bottom: dashed 1px #0000FF;"><strong>Enregistrer un  courrier sortant</strong></div>      </td>
    </tr>
    <tr>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF">
        <?php
        if(isset($_GET['id_courrier'])) echo "<input type='hidden' name='origine' id='origine' value='".$_GET['id_courrier']."'>"; ?>
      <label>
      <input name="expediteur" type="text" id="expediteur" size="35" class="inputbox"  />
      </label></td>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Date du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><span class="texte1">
        <label>
        <select name="jourd" id="jourd" class="inputbox" >
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option><option>29</option><option>30</option>
          <option>31</option>
        </select>
        </label>
/
<label>
<select name="moisd" id="moisd" class="inputbox" >
  <option value="01">Janvier</option>
  <option value="02">F&eacute;vrier</option>
  <option value="03">Mars</option>
  <option value="04">Avril</option>
  <option value="05">Mai</option>
  <option value="06">Juin</option>
  <option value="07">Juillet</option>
  <option value="08">Ao&ucirc;t</option>
  <option value="09">Septembre</option>
  <option value="10">Octobre</option>
  <option value="11">Novembre</option>
  <option value="12">D&eacute;cembre</option>
</select>
</label>
/
<label>
<select name="anneed" id="anneed" class="inputbox" >
  <option>2009</option>
  <option>2010</option>
  <option>2011</option>
  <option>2012</option>
  <option>2013</option>
  <option>2014</option>
  <option>2015</option>
  <option>2016</option>
  <option>2017</option>
  <option>2018</option>
  <option>2019</option>
  <option>2020</option>
  <option>2021</option>
  <option>2022</option>
  <option>2023</option>
  <option>2024</option>
  <option>2025</option>
  <option>2026</option>
  <option>2027</option>
  <option>2028</option>
  <option>2029</option>
  <option>2030</option>
</select>
</label>
      </span></td>
    </tr>
    <tr>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Objet du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><input name="objet" type="text" id="objet" size="35"  class="inputbox" /></td>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Destinataire</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
        <input name="destinataire" type="text" id="destinataire" size="35"  class="inputbox" />
      </label></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Num&eacute;ro du sous basement</div></td>
      <td valign="top" bgcolor="#FFFFFF"><input name="nbre_pages" type="text" id="nbre_pages" size="10" class="inputbox"  />
       <select name="typeinfo" id="typeinfo">
        <option value="1" selected="selected">Courrier entrant</option>
        <option value="2">Courrier interne</option>
        <option value="3">Courrier sortant</option>
      </select></td>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
      <td valign="top" bgcolor="#FFFFFF"><select name="type_courrier" id="type_courrier" class="inputbox" >
        <option value="" selected="selected">S&eacute;lectionn&eacute; un type de courrier</option>
		<?php 
		
		$req = "select * from type_courrier order by libelle_type";
		get_combobox($req);
		?>
      </select></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">R&eacute;f&eacute;rence  courrier</div></td>
      <td valign="top" bgcolor="#FFFFFF"><input name="ref_manuel" type="text" id="ref_manuel" size="20" class="inputbox"  /></td>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Nombre d'annexes</div></td>
      <td valign="top" bgcolor="#FFFFFF"><input name="nbre_annexes" type="text" id="nbre_annexes" size="10" class="inputbox"  /></td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F2F8FD"><div align="right">Synth&egrave;se</div></td>
      <td valign="top" bgcolor="#FFFFFF"><textarea name="synthese" id="synthese" cols="30" rows="5" class="inputbox"></textarea></td>
      <td valign="top" bgcolor="#F2F8FD">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td height="20" colspan="4"><div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="4" align="center"></label>
        <label>
        <input type="image" src="images/valider.png" />
        </label>
      <label>&nbsp;&nbsp;&nbsp;&nbsp; <img src="images/ajouter_copie.png" 
					onclick="UMPAjout(document.form1,'fic');" border="0" style="cursor:pointer;" />      </label>
      </label>
      <div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
</form>
<?php
}
elseif($_POST['expediteur'] == "" or $_POST['destinataire'] == "" or $_POST['type_courrier'] == "" or $_POST['objet'] == "" ) {
echo " Certains champs obligatoires sont vides, veuillez les remplir<br>";
echo '<a href="javascript:history.back(-1)">R&eacute;tourner pour Corriger</a>';
}
else
{
$courrier = new courrier;
$courrier->expediteur = addslashes($_POST['expediteur']);
$courrier->destinataire = addslashes($_POST['destinataire']);
$courrier->objet = addslashes($_POST['objet']);
$courrier->synthese = addslashes($_POST['synthese']);
$courrier->date_lettre = addslashes($_POST['jourd']). "/" . addslashes($_POST['moisd']) . "/" . addslashes($_POST['anneed']);
$courrier->id_saisi = $_SESSION['id_utilisateur'];
$courrier->nbre_pages = addslashes($_POST['nbre_pages']);
$courrier->nbreannexes = addslashes($_POST['nbre_annexes']);
$courrier->type_courrier = addslashes($_POST['type_courrier']);
$courrier->categorie = "2";
$courrier->tuteur = 0 ;
$courrier->orientation = $_SESSION['service'];
$courrier->reception = 1;
// Enregistrement du courrier dans la base de données
$courrier->ajouter();
$id = mysql_insert_id();
require_once("classes/services.class.inc.php");
$service = new service;
$courrier->ref = $service->prefixeservice($_SESSION['service'])."/". $service->incrementation($_SESSION['service'])."/".date('m/Y', time());
$courrier->modifierref($id);

// Notification de la réponse
if($_POST['typeinfo'] == "1") {
	$reqv = "select * from courrier where id_entrant = '".$_POST['nbre_pages']."'";
	$resultv = mysql_query($reqv);
	$datav = mysql_fetch_array($resultv);
	$idvrai = $datav['id'];
	}
	else
	{
	$idvrai = $_POST['nbre_pages'];
	}
$reqve = "insert into actions_courriers values ('','$idvrai', '".$_SESSION['id_utilisateur']."', '".$_SESSION['service']."', 'a enregistr&eacute; le courrier n&deg; <a href=index.php?module=courriers&action=evolution&id_courrier=".$id ."&type=2>".$id ."</a> comme r&eacute;ponse &agrave; ce courrier pour le compte de (du)', '".time()."')";
mysql_query($reqve) or die ("Erreur SQL".mysql_error());
//echo $reqve;
// Marquee le soubassement comme traité

if($_POST['nbre_pages'] != ""){
$reqvvs = "update courrier set traitement = 1 where id = '$idvrai'";
$resvvs = mysql_query($reqvvs) or die ("Erreur SQL".mysql_error().$reqvvs);
}

$reponse = "<center><div class='confirmation'> Courrier enregistr&eacute; avec succ&egrave;s<br>";
$reponse .= "<span class='titre3'>Num&eacute;ro  de R&eacute;f&eacute;rence Interne : ".$courrier->ref."</span><br>";
$reponse .= "</div></center>";
echo $reponse;
?>
<center><div class='confirmation'> Attacher un fichier &agrave; ce courrier<br>
<strong><a href="modules/scannages/ajouter.php?id_courrier=<?php echo $id; ?>" class="message" target="_blank">Cliquez ici pour attacher un fichier</a></strong><br>
</div>
</center>
<?php

echo "";
if(isset($_POST['fic']) && !empty($_POST['fic'])){
$col1_Array = $_POST['fic'];
foreach($col1_Array as $selectValue1) {
include("connect.inc.php");
$date_courrier = addslashes($_POST['jourd']). "/" . addslashes($_POST['moisd']) . "/" . addslashes($_POST['anneed']);
$req = "INSERT INTO courrier VALUES('','".addslashes($_POST['expediteur'])."','$selectValue1','".addslashes($_POST['objet'])."','".$courrier->ref."','".$_SESSION['id_utilisateur']."','".$date_courrier."','".time()."',' ','".$_POST['type_courrier']."','".$_POST['nbre_pages']."','2', '0','0','".$_SESSION['service']."','".$_POST['nbre_annexes']."', '0', '0','')";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error()."<br>".$req);

$id_new = mysql_insert_id();
$courrier->ref = $service->prefixeservice($_SESSION['service'])."/". $service->incrementation($_SESSION['service'])."/".date('m/Y', time());
$courrier->modifierref($id_new);


// Notification de la réponse
$reqve = "insert into actions_courriers values ('','".$_POST['nbre_pages']."', '".$_SESSION['id_utilisateur']."', '".$_SESSION['service']."', 'a r&eacute;pondu au courrier pour le compte de (du)', '".time()."')";
mysql_query($reqve) or die ("Erreur SQL".mysql_error());
//echo $reqve;


echo "<center><div class='confirmation'>";
echo "Copie pour <strong>". $selectValue1 ." </strong> cr&eacute;&eacute;e avec succ&egrave;s<br><span class='titre3'>Num&eacute;ro de R&eacute;f&eacute;rence Interne : " .$courrier->ref."</span><br></div></center>";
?>
<center><div class='confirmation'> Attacher un fichier &agrave; ce courrier<br>
<strong><a href="modules/scannages/ajouter.php?id_courrier=<?php echo $id_new; ?>" class="message" target="_blank">Cliquez ici pour attacher un fichier</a></strong><br>
</div>
</center>
<?php

}

}

?>
<div style="width:400px; text-align:center; float:none;">
  <strong><a href="index.php?module=courrier&amp;action=ajouter_sortant" class="message">Enregistrer un autre  courrier sortant</a></strong></div>
<?php
}

?>