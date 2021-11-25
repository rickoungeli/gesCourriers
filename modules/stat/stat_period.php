<form id="form1" name="form1" method="post" action="">
  <p class="titre2">Voir les statistiques pendant une p&eacute;riode</p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="">
      <td width="50%" height="25"><div align="center"><strong>Choisissez une date de d&eacute;but</strong></div></td>
      <td width="50%" height="25"><div align="center"><strong>Choisissez une date de fin </strong></div></td>
    </tr>
    <tr bgcolor="#E6F2F2">
      <td width="50%" height="25"><div align="center"><span class="texte1">
        <label>
        <select name="jourd" id="jourd">
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
<select name="moisd" id="moisd">
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
      </span> <strong></strong></div></td>
      <td width="50%" height="25"><div align="center"><span class="texte1">
        <label>
        <select name="jourd2" id="jourd2">
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
<select name="moisd2" id="moisd2">
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
<select name="anneed2" id="anneed2">
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
</span></div></td>
    </tr>
  </table>
  <p align="center">
<input type="submit" name="button" id="button" value="Afficher les statitstiques" />
  </p>
  
</form>
<div><?php
if(!isset($_POST['jourd']) and !isset($_POST['moisd']) and !isset($_POST['anneed'])) {
}
else
{
$jourd = $_POST['jourd'];
$moisd = $_POST['moisd'];
$anneed = $_POST['anneed'];
$jourd2 = $_POST['jourd2'];
$moisd2 = $_POST['moisd2'];
$anneed2 = $_POST['anneed2'];
$timestamp1 = mktime(0, 0, 0,  $_POST['moisd'], $_POST['jourd'], $_POST['anneed']);
$timestamp2 = mktime(0, 0, 0,  $_POST['moisd2'], $_POST['jourd2'], $_POST['anneed2']);
if($timestamp1 <= $timestamp2) {
require_once("classes/courrier.class.inc.php");
$courrier = new courrier;
echo $courrier -> AfficherStatPeriod($timestamp1, $timestamp2);
}
else
{
echo "La deuxi&egrave;me date doit &ecirc;tre sup&eacute;rieure &agrave; la premi&egrave;re<br>";
echo "Veuillez recommencez!";
}
}
?>
</div>