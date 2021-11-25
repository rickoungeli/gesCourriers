<?php
if(isset($_SESSION['login']) and isset($_SESSION['password'])) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td colspan="2" class="titre2">Bienvenue, <?php echo $_SESSION['nom']; ?></td>
  </tr>
  <tr>
    <td width="50%" valign="top" class="infos"><p class="titre3">Cher Utilisateur,</p>
        Nous sommes tr&egrave;s heureux de vous informer que ce logiciel vous permet de mieux g&eacute;rer 
        vos courriers en temps r&eacute;el . <br />
        Il vous permet de :</p>
      <ul>
        <li> V&eacute;rifier le flux de vos courriers</li>
        <li> Voir le circuit emprunt&eacute; par vos courriers entrants et sortants.</li>
        <li> Voir l&rsquo;&eacute;volution de vos courriers.</li>
        <li>Etc..<br />
        </li>
      </ul>
      <p>Toutes vos remarques sont les bienvenues pour nous permettre d&rsquo;am&eacute;liorer ce travail.<br />
      </p>
      <p align="right"><strong>La Direction des NTIC / Pr&eacute;sidence de la R&eacute;publique</strong><br />
    </p></td>
    <td width="50%" valign="top" class="infos" ><p class="titre3">Vos derni&egrave;res actions sur les courriers</p>      <ul>
        <?php
	$requ2 = "select * from actions_courriers where id_utilisateur = ".$_SESSION['id_utilisateur']." order by id_action desc limit 0, 10";
	$resu2 = mysql_query($requ2) or die ("Erreur SQL".mysql_error());
	require("classes/users.class.inc.php");
	while($dataa = mysql_fetch_array($resu2)) {	
	$user = new user;
	require_once("classes/services.class.inc.php");
	$service = new service;
	?>
        <li> Courrier n° <?php echo $dataa['id_courrier']; ?>, Le <?php echo date("d/m/Y à H:i:s", $dataa["timestamp"]); ?>, <?php echo $user->nomuser($dataa['id_utilisateur']); ?> <?php echo $dataa['action']; ?><?php echo $service->nomservice($dataa['id_utilisateur2']); ?></li>
        <?php
	}
    ?>
            </ul></td>
  </tr>
</table>
<?php
}
else
{
echo "Veuillez vous connecter, Merci !";
}
?>