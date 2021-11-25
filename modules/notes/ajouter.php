<?php
if(!isset($_POST['objet']) and !isset($_POST['contenu'])) {

?><form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="6" cellspacing="1">
    <tr>
      <td colspan="2" class="titre2">Ajouter une note</td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Objet de la note</div></td>
      <td valign="top" bgcolor="#F2F8FD"><label>
        <input name="objet" type="text" id="objet" size="35" />
      </label></td>
    </tr>
    <tr>
      <td width="20%" valign="top" bgcolor="#F2F8FD"><div align="right">Contenu</div></td>
      <td valign="top" bgcolor="#F2F8FD"><label>
        <textarea name="contenu" cols="50" rows="4" id="contenu"></textarea>
      </label></td>
    </tr>
    <tr>
      <td colspan="2">
        <label>
        <div align="left"></div>
        </label>
      <div align="right"></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <label>
        <input type="submit" name="button" id="button" value="Sauvegarder" />
        </label>
      </div></td>
    </tr>
  </table>
</form>
<?php
}
elseif($_POST['contenu'] ==  "") {
echo " Le contenu de la note est obligatoire, veuillez le saisir.<br>";
echo '<a href="javascript:history.back(-1)">Cliquez ici pour r&eacute;commencer</a>';
}
else
{
include("classes/note.class.inc.php");
$note = new note;
$note->id_courrier = $_GET['id_courrier'];
$note -> objet_note = addslashes($_POST['objet']);
$note -> libelle_note = addslashes($_POST['contenu']);
$note-> id_utilisateur = $_SESSION['id_utilisateur'];


// Insertion de la note dans la base de données

$note->ajouter();
}
?>