<div class="titre2">Les courriers du Responsable en cours de traitement</div>

<?php
$courrier = new courrier;
/*
$areq = "select * from transferts where id_user_source = '".$_SESSION['id_utilisateur']."'";
$ares = mysql_query($areq) or die ("Erreur SQL".mysql_error());
$adata = mysql_fetch_array($ares);
*/
$nbreannonce = $courrier->TotalMessageLus($_SESSION['responsable']);
$AnnoncesParPage = 20;
$NbreDePages = ceil ($nbreannonce/$AnnoncesParPage);

echo "</div><br />";
if(isset($_GET['page'])) {
$page = $_GET['page'];
}
else
{
$page = 1;
}
$PremiereAnnonceAafficher = ($page - 1) * $AnnoncesParPage;
$total = $PremiereAnnonceAafficher + $AnnoncesParPage;
$tot = $PremiereAnnonceAafficher + 1;
$req = "SELECT * FROM courrier WHERE tuteur = '".$_SESSION['responsable']."' AND categorie='1' and (reception = 1 or lecture = '1') and traitement = '0' ORDER BY id DESC LIMIT $PremiereAnnonceAafficher , $AnnoncesParPage";
$courrier->affichersreq($req);
echo "<br>";
echo '<div align="center"><b>Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </b></span>';
for ($i = 1 ; $i <= $NbreDePages ; $i++)
{
echo '<a class="message" href="index.php?module=resp&action=encours&page=' . $i . '">' . $i . '</a> '; 
echo "&nbsp;&nbsp;&nbsp;";
}


?>
