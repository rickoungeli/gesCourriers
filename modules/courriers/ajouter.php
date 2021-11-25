<?php
if(!isset($_POST['expediteur']) and !isset($_POST['jourd']) and !isset($_POST['moisd']) and !isset($_POST['anneed'])  and !isset($_POST['ref']) and !isset($_POST['destinataire']) and !isset($_POST['type_courrier']) and !isset($_POST['nbre_pages'])) {
?>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="8" cellspacing="1">
    <tr>
      <td colspan="4" ><div class="titre2" style="border-bottom: dashed 1px #0000FF;"><strong>Saisie Courrier</strong></div>      </td>
    </tr>
    <tr>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
        <input name="expediteur" type="text" id="expediteur" size="35" class="inputbox" />
        <br />
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
          <option>28</option><option>29</option>
          <option>30</option>
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
<select name="anneed" id="anneed" class="inputbox">
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
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">R&eacute;f&eacute;rences du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
        <input name="ref" type="text" id="ref" size="35" class="inputbox"  />
      </label></td>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Destinataire </div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
      <input name="destinataire" type="text" id="destinataire" size="35" class="inputbox" />
      </label></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Objet du courrier</div></td>
      <td valign="top" bgcolor="#FFFFFF"><input name="objet" type="text" id="objet" size="35"  class="inputbox" /></td>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
      <td valign="top" bgcolor="#FFFFFF"><select name="type_courrier" id="type_courrier" class="inputbox" >
        <option value="" selected="selected">S&eacute;lectionner</option>
		<?php 
		
		$req = "select * from type_courrier order by libelle_type";
		get_combobox($req);
		?>
      </select>
      [<a href="#" class="message" onClick="OuvrirFenetre('modules/types_courriers/ajouter2.php','Ajouter','width=500,height=250')">Ajout rapide</a>]</td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Nombre d'annexes</div></td>
      <td valign="top" bgcolor="#FFFFFF">
        <input name="nbre_pages" type="hidden" id="nbre_pages" size="10" class="inputbox" value=" "  />
       <label> <input name="annexes" type="text" id="annexes" size="10" class="inputbox"  />
      </label></td>
    </tr>
    <tr>
      <td height="20" colspan="3"><div id="copie" ><br />
      </div>
      <div id="pic"></div></td>
      <td height="20">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="image" src="images/valider.png" />
        &nbsp;&nbsp;&nbsp;&nbsp;
          <label></label>
<img src="images/ajouter_copie.png" 
					onclick="UMPAjout(document.form1,'fic');" border="0" style="cursor:pointer;" />
        </label></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
</form>
<p>
  <?php
}
elseif($_POST['expediteur'] == "" or $_POST['destinataire'] == "" or $_POST['type_courrier'] == "" or $_POST['jourd'] == ""  or $_POST['moisd'] == ""  or $_POST['anneed'] == "" or $_POST['objet'] == "") {
echo " Certains champs obligatoires sont vides, veuillez les remplir<br>";
echo '<a href="javascript:history.back(-1)">Rétourner pour Corriger</a>';
}
else
{
$courrier = new courrier;
$courrier->expediteur = addslashes($_POST['expediteur']);
$courrier->destinataire = addslashes($_POST['destinataire']);
$courrier->objet = addslashes($_POST['objet']);
$courrier->date_lettre = addslashes($_POST['jourd']). "/" . addslashes($_POST['moisd']) . "/" . addslashes($_POST['anneed']);
$courrier->id_saisi = $_SESSION['id_utilisateur'];
$courrier->type_courrier = addslashes($_POST['type_courrier']);
$courrier->ref = addslashes($_POST['ref']);
$courrier->nbre_pages = addslashes($_POST['nbre_pages']);
$courrier->categorie = "1";
$courrier->reception = "0";
$courrier->tuteur = addslashes($_POST['destinataire']);
$courrier->nbreannexes = addslashes($_POST['annexes']);

// Enregistrement du courrier dans la base de données
$courrier->ajouter();
/*
$reponse = "<center><div class='confirmation'> Courrier enregistr&eacute; avec succ&egrave;s<br>";
$reponse .= "<span class='titre3'>Num&eacute;ro  de R&eacute;f&eacute;rence Interne : ".$courrier->courrier_id."</span><br>";
$reponse .= "</div></center>";
echo $reponse;
*/
echo "<strong>Courrier enregistr&eacute; avec succ&egrave;s, avec le num&eacute;ro : ".$courrier->courrier_id."<br></strong>";
if(isset($_POST['fic']) && !empty($_POST['fic'])){
$col1_Array = $_POST['fic'];
foreach($col1_Array as $selectValue1) {
include("connect.inc.php");
$date_courrier = addslashes($_POST['jourd']). "/" . addslashes($_POST['moisd']) . "/" . addslashes($_POST['anneed']);
$req = "INSERT INTO courrier VALUES('','".addslashes($_POST['expediteur'])."','$selectValue1','".addslashes($_POST['objet'])."','".addslashes($_POST['ref'])."','".$_SESSION['id_utilisateur']."','".$date_courrier."','".time()."','Pas de synthèse','".$_POST['type_courrier']."','".$_POST['nbre_pages']."','1', '0','0','0','".$_POST['annexes']."', '0', '0','')";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error()."<br>".$req);
$id_new = mysql_insert_id();
echo "<strong>Copie du courrier pour <strong>".$selectValue1. "</strong>  enregistr&eacute; avec succ&egrave;s, avec le num&eacute;ro : ".$id_new."<br></strong>";
/*
echo "<center><div class='confirmation'>";
echo "Une copie du courrier pour <strong>". $selectValue1 ." </strong>est cr&eacute;&eacute;e avec succ&egrave;s<br><span class='titre3'>Num&eacute;ro de R&eacute;f&eacute;rence Interne : " .$id_new."</span><br></div></center>";
*/

}
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="8" cellspacing="1">
    <tr>
      <td colspan="4" ><div class="titre2" style="border-bottom: dashed 1px #0000FF;"><strong>Enregistrer un autre courrier</strong></div>      </td>
    </tr>
    <tr>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Exp&eacute;diteur</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
        <input name="expediteur" type="text" id="expediteur" size="35" class="inputbox" />
        <br />
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
          <option>28</option><option>29</option><option>29</option>
          <option>30</option>
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
<select name="anneed" id="anneed" class="inputbox">
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
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">R&eacute;f&eacute;rences du courrier</div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
        <input name="ref" type="text" id="ref" size="35" class="inputbox"  />
      </label></td>
      <td width="20%" valign="middle" bgcolor="#F2F8FD"><div align="right">Destinataire </div></td>
      <td width="30%" valign="top" bgcolor="#FFFFFF"><label>
      <input name="destinataire" type="text" id="destinataire" size="35" class="inputbox" />
      </label></td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Objet du courrier</div></td>
      <td valign="top" bgcolor="#FFFFFF"><input name="objet" type="text" id="objet" size="35"  class="inputbox" /></td>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Type du courrier</div></td>
      <td valign="top" bgcolor="#FFFFFF"><select name="type_courrier" id="type_courrier" class="inputbox" >
        <option value="" selected="selected">S&eacute;lectionner</option>
		<?php 
		
		$req = "select * from type_courrier order by libelle_type";
		get_combobox($req);
		?>
      </select>
      [<a href="#" class="message" onclick="OuvrirFenetre('modules/types_courriers/ajouter2.php','Ajouter','width=500,height=250')">Ajout rapide</a>]</td>
    </tr>
    <tr>
      <td valign="middle" bgcolor="#F2F8FD">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF"><input name="nbre_pages" type="hidden" id="nbre_pages" size="10" class="inputbox" value=""  /></td>
      <td valign="middle" bgcolor="#F2F8FD"><div align="right">Nombre d'annexes</div></td>
      <td valign="top" bgcolor="#FFFFFF"><label>
        <input name="annexes" type="text" id="annexes" size="10" class="inputbox"  />
      </label></td>
    </tr>
    <tr>
      <td height="20" colspan="3"><div id="copie" ><br />
      </div>
      <div id="pic"></div></td>
      <td height="20">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input type="image" src="images/valider.png" />
        &nbsp;&nbsp;&nbsp;&nbsp;
          <label></label>
<img src="images/ajouter_copie.png" 
					onclick="UMPAjout(document.form1,'fic');" border="0" style="cursor:pointer;" />
        </label></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>
</form>
<?php
}
?>
