<?php
if($_SESSION['id_type'] == 9 or $_SESSION['id_utilisateur'] == $_SESSION['responsable'] or $_SESSION['id_type'] == 10 or $_SESSION['id_type'] == 1 or $_SESSION['id_type'] == 7) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="get" action="#">
 <div class="titre2"> Visualiser les d&eacute;tails d'un courrier</div> 
 <p align="center">
 Saisissez le num&eacute;ro du courrier : &nbsp;&nbsp;&nbsp;&nbsp;
 <input name="module" type="hidden" id="module" value="courriers" />
 <input name="action" type="hidden" id="action" value="evolution" /> 
 <input name="id_courrier" type="text" id="id_courrier" />
   
    <label>
    &nbsp;&nbsp;&nbsp;&nbsp;<select name="type" id="type">
      <option value="1" selected="selected">Courrier entrant</option>
      <option value="2">Courrier interne</option>
      <option value="3">Courrier sortant</option>
    </select>
    </label>
    &nbsp;&nbsp;&nbsp;&nbsp;<label>
    <input type="submit" value="Voir l'&eacute;volution" />
    </label>
  </p>
</form>
<br />
<?php
if(isset($_GET['id_courrier'])) {
//include("modules/courriers/etat.php");
include("modules/courriers/etat.php");
}
?>
</body>
</html>
<?php
}
else
{
echo "ceci est un espace s&eacute;curis&eacute;, votre tentative d'intrusion est signal&eacute;e aux autorit&eacute;s";
} ?>