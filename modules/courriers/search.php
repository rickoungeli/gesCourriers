
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr>
      <td colspan="4" ><div class="titre2" style="border-bottom: dashed 1px #0000FF;"><strong>Rechercher parmi vos courriers</strong></div>          </td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
        <input name="expediteur" type="text" id="expediteur" size="35" class="inputbox" />
      </label></td>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Destinataire Principal</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><select name="destinataire" id="destinataire" class="inputbox" >
        <option value="" selected="selected">Tous</option>
        <?php 
		
		$req = "select * from utilisateurs order by nom ";
		get_combobox($req);
		?>
      </select></td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Objet du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><input name="objet" type="text" id="objet" size="35"  class="inputbox" /></td>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
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
      <td colspan="4" valign="top" bgcolor="#F2F8FD"><div align="center"><strong>Date de r&eacute;ception entre le</strong> <span class="texte1">
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
      </span> <strong>et le 
      <label>      </label>
      </strong><span class="texte1">
<label><select name="jourd2" id="jourd2">
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
      </span></div>
      <div align="center"></div></td>
    </tr>

    <tr>
      <td height="20" colspan="4"><div align="center">
        <input type="image" src="images/valider.png" />
</div></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['expediteur']) and isset($_POST['objet']) and isset($_POST['destinataire']) and isset($_POST['expediteur'])) {
if($_POST['jourd'] != "" and $_POST['moisd'] != "" and $_POST['anneed'] != "" and $_POST['jourd2'] != "" and $_POST['moisd2'] != "" and $_POST['anneed2'] != "") {
$timestamp1 = mktime(0, 0, 0, $_POST['moisd'], $_POST['jourd'], $_POST['anneed']);
$timestamp2 = mktime(0, 0, 0, $_POST['moisd2'], $_POST['jourd2'], $_POST['anneed2']);
}
$req = "select * from courrier where expediteur like '%".$_POST['expediteur']."%' and objet like '%".$_POST['objet']."%' and destinataire like '%".$_POST['destinataire']."%' and date_arrivee > '$timestamp1' and date_arrivee < '$timestamp2' order by id desc";
$courrier = new courrier;
$courrier->affichersreq($req);
}
?>
