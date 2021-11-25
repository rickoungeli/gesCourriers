<?php
if(!isset($_POST['synthese'])) {
?>
<form name="form1" method="post" action="">
  <label>
  <span class="titre2">Saisissez la synth&egrave;se du courrier.</span><br>
  <textarea name="synthese" cols="40" rows="6" id="synthese"></textarea>
  </label>
  <p>
    <label>
    <input type="submit" name="button" id="button" value="Valider">
    </label>
  </p>
</form>
<?php
}
else
{
$synthese = addslashes($_POST['synthese']);
$id_user = $_SESSION['id_utilisateur'];
$id_courrier = $_GET['id_courrier'];
include("connect.inc.php");
$res1 = mysql_query("UPDATE courrier SET synthese = '$synthese' WHERE id = '$id_courrier'") or die ("Erreur SQL 1".mysql_error());
$res2 = mysql_query("INSERT INTO synthese VALUES ('','$id_courrier','$id_user','$synthese','".time()."')");
?>
<script language="javascript">
alert("Success");
history.back(-1);
</script>
<?php
}
?>