<form name="form1" method="post" action="">
  <p class="titre2">S&eacute;lectionnez un service ou organe particulier et valider pour voir ses statistiques</p>
  <p>
    <select name="service" id="service">
      <option value="">S&eacute;lectionnez un service</option>
	  <?php
     $req1 = "select * from services order by service ";
		get_combobox($req1);
		
		?>
    </select>
   
    de <span class="texte1">
     <label><select name="jourd" id="jourd">
      <option value="">Jour</option>
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
    </select></label>
/
<label><select name="moisd" id="moisd">
<option value="">Mois</option>
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
<option value="">Année</option>
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
</select></label>
    </span> <strong></strong> &agrave; <span class="texte1">
   <label> <select name="jourd2" id="jourd2">
    <option value="">Jour</option>
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
    </select></label>
/
<label><select name="moisd2" id="moisd2">
<option value="">mois</option>
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
<label><select name="anneed2" id="anneed2">
<option value="">Année</option>
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
</select></label>
    </span>
    <label><input type="submit" name="button" id="button" value="Valider">
    </label>
  </p>
  <p class="titre2">P&eacute;riode : <?php 
  if(!isset($_POST['jourd']) and !isset($_POST['moisd']) and !isset($_POST['anneed'])){
  echo "Du commencement ";
  }
  elseif($_POST['jourd'] == "" and $_POST['moisd'] == "" and $_POST['anneed'] == "") {
  echo "Du commencement ";
  }
  else {
  echo "Du ".$_POST['jourd']."/".$_POST['moisd']."/".$_POST['anneed']." ";
 
  }
 
  if(!isset($_POST['jourd2']) and !isset($_POST['moisd2']) and !isset($_POST['anneed2'])) {
   echo "au ".date('d/m/Y', time());
   }
   elseif($_POST['jourd2'] == "" and $_POST['moisd2'] == "" and $_POST['anneed2'] == "") {
   echo "au ".date('d/m/Y', time());
  }
  else
  {
echo "au ".$_POST['jourd2']."/".$_POST['moisd2']."/".$_POST['anneed2'];  
}  
  ?>
    <label></label>
  </p>
</form>
<?php
require_once("classes/courrier.class.inc.php");
$courrier = new courrier;
$courrier->AfficherStatUser();
?>