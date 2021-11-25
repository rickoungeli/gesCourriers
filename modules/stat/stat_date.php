<form id="form1" name="form1" method="post" action="">

    <div align="left"><span class="titre2">Afficher les statistiques d'activit&eacute;s d'une date donn&eacute;e</span><br /><br />
    <label><select name="jourd" id="jourd">
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
    </select></label>
  /  
 <label> <select name="moisd" id="moisd">
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
  </select></label>
  / 
  <label><select name="anneed" id="anneed">
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
    <option>2030</option></select>
  </select>
   <p align="left" class="texte1">    
    <label>
    <input type="submit" name="button" id="button" value="Consulter" />
    </label>
  </p> </div>
</form>
<?php
if(!isset($_POST['jourd']) and !isset($_POST['moisd']) and !isset($_POST['anneed'])) {
echo "S&eacute;lectionn&eacute; une date dans le formulaire et valider";
}
else
{
$jourd = $_POST['jourd'];
$moisd = $_POST['moisd'];
$anneed = $_POST['anneed'];

$timestamp1 = mktime(0, 0, 0,  $_POST['moisd'], $_POST['jourd'], $_POST['anneed']);
require_once("classes/courrier.class.inc.php");
$courrier = new courrier;
?>
<p class="titre2">Statistiques de la date s&eacute;lectionn&eacute;e</p>
<table width="50%" border="0" cellpadding="0" style='border:solid 1px #E6F2F2;' cellspacing='0' >
  <tr class="titretableau">
    <td width="25%" height="25"><div align="right">Date s&eacute;lectionn&eacute;e : &nbsp;&nbsp;&nbsp;</div></td>
    <td width="25%" height="25"><div align="right"><?php echo $jourd."/".$moisd."/".$anneed; ?>&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr bgcolor="#E6F2F2">
    <td width="25%" height="25"><div align="right">Courriers exp&eacute;di&eacute;s : &nbsp;&nbsp;&nbsp;</div></td>
    <td width="25%" height="25"><div align="right"><?php echo $courrier->TotalMessageSentDate($jourd,$moisd , $anneed); ?>&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr>
    <td width="25%" height="25"><div align="right">Courriers re&ccedil;us : &nbsp;&nbsp;&nbsp;</div></td>
    <td width="25%" height="25"><div align="right"><?php echo $courrier->TotalMessageDate($jourd,$moisd , $anneed); ?>&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr bgcolor="#E6F2F2">
    <td height="25"><div align="right"><strong>Total : &nbsp;&nbsp;&nbsp;</strong></div></td>
    <td height="25" bgcolor="#E6F2F2"><div align="right"><strong><?php echo $courrier->TotalMessageSentDate($jourd,$moisd , $anneed) + $courrier->TotalMessageDate($jourd,$moisd , $anneed); ?>&nbsp;&nbsp;&nbsp;
    </strong></div></td>
  </tr>
</table>
<p><a href="javascript:history.back(-1)">R&eacute;tour</a></p>
<p>
  <?php
}

?>
</p>
