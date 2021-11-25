<?php
if(!isset($_POST['objet']) or !isset($_POST['contenu'])) {
include("connect.inc.php");
$req = "select * from notes where id_note = '".$_GET['id_note']."' order by id_note desc";
$res = mysql_query($req) or die ("Erreur SQL<br>".mysql_error());
while ($enreg = mysql_fetch_array($res)) {

?>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr>
      <td colspan="2">Modifier une note</td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F4F4F4"><div align="right">Objet de la note</div></td>
      <td valign="top"><label>
        <input name="objet" type="text" id="objet" size="35"  value="<?php echo $enreg['objet_note']; ?>"/>
      </label></td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F4F4F4"><div align="right">Contenu</div></td>
      <td valign="top"><label>
        <textarea name="contenu" cols="50" rows="4" id="contenu"><?php echo $enreg['libelle_note']; ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
          <div align="left"></div>
        </label>
          <div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
          <input type="submit" name="button" id="button" value="Sauvegarder" />
          </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label></label>
      </div></td>
    </tr>
  </table>
</form>
<?php
elseif($_POST['libelle_note'] ==  "") {
echo " Le contenu de la note est obligatoire, veuillez le saisir.<br>";
echo '<a href="javascript:history.back(-1)">Cliquez ici pour r&eacute;commencer</a>';
}
else
{
include("classes/notes.class.inc.php");
$note = new note;
$note -> objet_note = $_POST['objet'];
$note -> libelle_note = $_POST['contenu'];

// Insertion de la note dans la base de données

$note->modifier();
}
?>
</body>
</html>
