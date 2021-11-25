<div class="titre2">Les courriers sortants</div>
<br />
<form id="form1" action="#" method="post">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" style="border:solid 1px #0000FF;">
    <tr>
      <td colspan="4" valign="top" bgcolor="#F2F8FD"><strong>Rechercher  en fonction de(s) crit&egrave;re(s) ci-dessous.</strong></td>
    </tr>
    <tr>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
      <td width="30%" valign="middle" bgcolor="#F2F8FD"><label>
        <input name="expediteur" type="text" id="expediteur" size="35" class="inputbox" />
      </label></td>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Destinataire </div></td>
      <td width="30%" valign="middle" bgcolor="#F2F8FD"><input name="destinataire" type="text" id="destinataire" size="35" class="inputbox" /></td>
    </tr>
    <tr>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">R&eacute;ception</div></td>
      <td width="30%" valign="middle" bgcolor="#F2F8FD"><select name="reception" id="reception" class="inputbox">
        <option selected="selected" value="">Tous</option>
        <option value="1">Non re&ccedil;us</option>
        <option value="2">D&eacute;j&agrave; re&ccedil;us</option>
      </select>
        R&eacute;f.:
        <input name="ref" type="text" size="10" maxlength="20" class="inputbox" /></td>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
      <td width="30%" valign="middle" bgcolor="#F2F8FD"><label>
        <select name="type_courrier" id="type_courrier" class="inputbox" >
          <option value="" selected="selected">Tous</option>
          <?php 
		
		$req = "select * from type_courrier order by libelle_type";
		get_combobox($req);
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Objet</div></td>
      <td valign="middle" bgcolor="#F2F8FD"><label>
        <input name="objet" type="text" id="objet" size="30" class="inputbox" />
      </label></td>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Destinataire (Interne) </div></td>
      <td valign="middle" bgcolor="#F2F8FD"><select name="tuteur" id="tuteur" class="inputbox">
        <option selected="selected" value="">Tous</option>
        <option value="0" >Non orient&eacute;s</option>
        <?php
     $req1 = "select * from services order by service ";
		get_combobox($req1);
		
		?>
      </select></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Date d'envoie</div></td>
      <td valign="middle" bgcolor="#F2F8FD"><strong>
        <label> </label>
        </strong><span class="texte1">
          <label>
            <select name="jourd" id="jourd" class="inputbox">
              <option value="" selected="selected">Jour</option>
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
              <option>28</option>
              <option>29</option>
              <option>30</option>
              <option>31</option>
            </select>
        </label>
          /
          <label>
            <select name="moisd" id="moisd" class="inputbox" >
              <option selected="selected" value="">Mois</option>
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
            <select name="anneed" id="anneed">
              <option selected="selected" value="">Ann&eacute;e</option>
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
      <td valign="middle" bgcolor="#F2F8FD">&nbsp;</td>
      <td valign="middle" bgcolor="#F2F8FD">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" valign="middle" bgcolor="#F2F8FD"><div align="center">
        <label>
          <input type="submit" name="button" id="button" value="Lancer la recherche" />
          </label>
      </div></td>
    </tr>
  </table>
</form>
<form id="form1" action="modules/courriers/internes_send_trait.php" method="post">
    <?php
require_once("classes/courrier.class.inc.php");
$courrier = new courrier;
$nbreannonce = $courrier->TotalMessageSortant($_SESSION['service']);
$AnnoncesParPage = 40;
$NbreDePages = ceil ($nbreannonce/$AnnoncesParPage);

echo "</div><br />";
if(isset($_GET['page'])) {
$page = $_GET['page'];
}
else
{
$page = 1;
}
$PremiereAnnonceAafficher = ($page - 1) * $AnnoncesParPage;
$total = $PremiereAnnonceAafficher + $AnnoncesParPage;
$tot = $PremiereAnnonceAafficher + 1;
if(!isset($_POST['destinataire']) and $NbreDePages > 0 ) {
echo '<center><span class="titre3">Page '.$page.' / '.$NbreDePages .'</span></center><br>';
}
else
{
echo '<center><span class="titre3">R&eacute;sultats de la recherche</span> | <a href="index.php?module=courriers&action=envoyes" class="message">Afficher Tout</a></center><br>';
}
if(isset($_POST['expediteur']) or isset($_POST['reception']) or isset($_POST['destinataire']) or isset($_POST['type_courrier']) or isset($_POST['objet']) or (isset($_POST['jourd']) and isset($_POST['moisd']) and isset($_POST['anneed']))) {
if($_POST['tuteur'] == "") {
$orientation = " ";
}
elseif($_POST['tuteur'] == 0 ) {
$orientation = "and tuteur = ".$_POST['tuteur'] ." and orientation = ".$_POST['tuteur'];
}
else
{
$orientation = "and (tuteur = ".$_POST['tuteur'] ." or orientation = ".$_POST['tuteur'].")";
}
if($_POST['type_courrier'] == "") {
$type_courrier = "";
}
else
{
$type_courrier = "and id_type = ".$_POST['type_courrier'];
}
if($_POST['jourd'] == "" AND $_POST['moisd'] == "" AND $_POST['anneed'] == "") {
$dated = "";
}
else
{
$timestamp1 = mktime(0, 0, 0, $_POST['moisd'], $_POST['jourd'], $_POST['anneed']);
$timestamp2 = mktime(0, 0, 0, $_POST['moisd'], $_POST['jourd'] + 1, $_POST['anneed']);
$dated = "and date_arrivee >= $timestamp1 and date_arrivee <= $timestamp2";
}

if($_POST['reception'] == "") {
$reception = "and reception >= 1";
}
elseif($_POST['reception'] == 1) {
$reception = "and reception = 1";
}
else
{
$reception = "and reception >= ".$_POST['reception'];
}
if($_POST['jourd'] != "" and $_POST['moisd'] != "" and $_POST['anneed'] != "") {
$timestamp1 = mktime(0, 0, 0, $_POST['moisd'], $_POST['jourd'], $_POST['anneed']);
$timestamp2 = mktime(0, 0, 0, $_POST['moisd'], $_POST['jourd'] + 1, $_POST['anneed']);
$datesearch = $_POST['jourd']."/".$_POST['moisd']."/".$_POST['anneed'];
// echo date('d/m/y', $timestamp1) ." ". date('d/m/y', $timestamp2);
}
if($_POST['objet'] == "" ) {
$objet = "";
}
else
{
$objet = "and objet like '%".$_POST['objet']."%' ";
}
if($_POST['ref'] == "" ) {
$ref = "";
}
else
{
$ref = "and ref = '".$_POST['ref']."' ";
}
$req = "select * from courrier where expediteur like '%".$_POST['expediteur']."%' and destinataire like '%".$_POST['destinataire']."%'$reception  $type_courrier  $dated $orientation  $objet $ref and categorie = 2 order by id DESC";

}
else
{
$req = "SELECT * FROM courrier WHERE categorie='2' and tuteur = '100' ORDER BY id DESC LIMIT $PremiereAnnonceAafficher , $AnnoncesParPage ";
}
////echo $req;
$courrier->afficheradmiss($req);
echo "<br>";
if(!isset($_POST['destinataire'])){
echo '<div align="center"><b>Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </b></span>';

for ($i = 1 ; $i <= $NbreDePages ; $i++)
{
echo '<a class="message" href="index.php?module=courriers&action=envoyes&page=' . $i . '">' . $i . '</a> '; 
echo "&nbsp;&nbsp;&nbsp;";
}}
?>
  <p align="center">&nbsp;</p>
</form>
