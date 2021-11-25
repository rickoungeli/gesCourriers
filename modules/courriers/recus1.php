
<div class="titre2">Les courriers réceptionnés </div>
<br /><form id="form1" action="#" method="post">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0" style="border:solid 1px #0000FF;background:#F2F8FD">

    <tr>
      <td colspan="4" valign="top" bgcolor="#F2F8FD"><strong>Rechercher  en fonction de(s) crit&egrave;re(s) ci-dessous.</strong></td>
    </tr>
        <tr>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Utilisateur</div></td>
      <td valign="middle" bgcolor="#F2F8FD"><select name="utilisateurs" id="utilisateurs" class="inputbox">
        <option selected="selected" value="">Tous</option>
            <?php 
			$req=mysql_query("select * from utilisateurs where service=8 or service=38 and id_type=9 order by nom"); 
   				while ($row = mysql_fetch_row($req)) { 
				$iduser = $row[0]; 
				$nom = $row[1]; 
				echo "<option value= ", $iduser,">", $nom, "</option>";
				} 
				?>
      </select></td>
          <td width="20%" valign="middle" bgcolor="#F2F8FD"></td>
      <td width="30%" valign="middle" bgcolor="#F2F8FD"></td>

    </tr>

        <tr>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Date de r&eacute;ception</div><br /><div align="right">Exp&eacute;diteur</div></td>
      <td valign="middle" bgcolor="#F2F8FD"><strong>
      <label> </label>
      </strong><span class="texte1">
      <label>
      <select name="jour" id="jour" class="inputbox">
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
        <option>28</option><option>29</option><option>30</option>
        <option>31</option>
        </select>
      </label>
/
<label>
<select name="mois" id="mois" class="inputbox" >
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
<select name="annee" id="annee" class="inputbox">
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
     <br /><br />
      <label>
        <input name="expediteur" type="text" id="expediteur" size="35" class="inputbox" />
      </label></span>
      </td>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">P&eacute;riode de r&eacute;ception</div></td>
      <td valign="middle" bgcolor="#F2F8FD"><strong>
      </strong><span class="texte1">
      <br/>
      <label style="color:#000000">Du</label>
      <select name="jour1" id="jour1" class="inputbox">
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
        <option>28</option><option>29</option><option>30</option>
        <option>31</option>
        </select>
      </label>
/
<select name="mois1" id="mois1" class="inputbox" >
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
<select name="annee1" id="annee1" class="inputbox">
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
<br /><br />
<label style="color:#000000">Au</label>
      <select name="jour2" id="jour2" class="inputbox">
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
        <option>28</option><option>29</option><option>30</option>
        <option>31</option>
        </select>
      </label>
/
<select name="mois2" id="mois2" class="inputbox" >
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
<select name="annee2" id="annee2" class="inputbox">
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
<?php
if(isset($_POST['utilisateurs']))
{
?>
	<table border="0" >
	<tr background="images/bg_band.jpg" style="color:#FFFFFF">
		<td align="center" widht='5%' >Numéro</td>
		<td align="center" widht='5%'>Réf. courrier</td>
		<td align="center" width='20%'>Provenance</td>
		<td align="center" width='30%'>Objet</td>
		<td align="center" width='10%'>Date réception</td>
		<td align="center" width='5%' >Orientation</td>
	</tr>
<?php 
include ('connect.inc.php');	
$ctr=1;
$id_utilisateur1=$_POST['utilisateurs'];
if($_POST['utilisateurs'] != "") {
$id_utilisateur= "and actions_courriers.id_utilisateur= $id_utilisateur1" ;
} 
else {
$id_utilisateur='';}
		?>
		<script langage="javascript">
		document.write=(alert("<?php echo $id_utilisateur ?> "));
		</script>
		<?php
$nom=$_SESSION['nom'];
if($_POST['jour1'] != "" and $_POST['mois1'] != "" and $_POST['annee1'] != "" and $_POST['jour2'] != "" and $_POST['mois2'] != "" and $_POST['annee2'] != "") {
  $timestamp1 = mktime(0, 0, 0, $_POST['mois1'], $_POST['jour1'], $_POST['annee1']);
  $timestamp2 = mktime(0, 0, 0, $_POST['mois2'], $_POST['jour2'] + 1, $_POST['annee2']);
  $date_recept = "and timestamp >= $timestamp1 and timestamp <= $timestamp2";
   }
elseif($_POST['jour'] != "" AND $_POST['mois'] != "" AND $_POST['annee'] != "") {
  $timestamp1 = mktime(0, 0, 0, $_POST['mois'], $_POST['jour'], $_POST['annee']);
  $date_recept = "and timestamp = $timestamp1";
}
else{
   $date_recept = " ";
}
//$trierpar=$_POST['trierpar'];

//chercher tous les courriers reçus par
$resultat=mysql_query("select actions_courriers.id_courrier, courrier.expediteur, courrier.destinataire, courrier.objet, courrier.transmission, 
						actions_courriers.timestamp     
                       from actions_courriers, courrier  
					   where left(actions_courriers.action,6) = 'a accu'  
					   and actions_courriers.id_courrier=courrier.id "
					   .$date_recept . $id_utilisateur.					      
					   "  order by timestamp desc") 					   
					   or die('Erreur SQL : '.$resultat);
			   
while ($row = mysql_fetch_array($resultat))
	{ 

		$idcourrier = $row[0];
		$expediteur = $row[1];
		$destinataire = $row[2];
		$objet = $row[3];
		if($row[4]==0){$transmis = 'Non orienté';} else {$transmis = 'orienté';};
		$timestamp = date('d/m/Y', $row[5]);

		echo "<tr  valign='top' >\n
		<td width='5%' align='center'>$ctr</td>\n
		<td width='5%' align='left'>$idcourrier</td>\n
		<td width='20%' align='left'>$expediteur</td>\n
		<td width='30%' align='left'>$objet</td>\n
		<td width='10%' align='left'>$timestamp</td>\n
		<td width='10%' align='center' color:#FF0000'>$transmis</td>\n
		<td width='5%' align='left'></td>\n
		</tr>\n";
		$ctr+=1;
	}					   
}			   

	?>
	</table>				
</div>
</body>
</html>