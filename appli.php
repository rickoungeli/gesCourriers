<p>

   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200" valign="top">
	<?php if($_SESSION['id_type'] == 1) {
	include("menu_admin.php"); 
	}
	elseif($_SESSION['id_type'] == 7) {
	include("menu_dircab.php");
	}
	elseif($_SESSION['id_type'] == 8) {
	include("menu_reception.php");
	}
	elseif($_SESSION['id_type'] == 9) {
	include("menu_privilegie.php");
	}
	else
	{
	include("menu.php");
	}
 ?></td>
    <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
		
		<?php
		if(isset($_GET['module']) and isset($_GET['action'])) {
		// affichage des pages
		$module = $_GET['module'];
		$action = $_GET['action'];
// Gestion des utilisateurs en incluant leurs pages
if($module == "user" and $action == "accueil") {
		include("modules/users/accueil.php");
}
// Gestion des courriers
elseif($module == "courrier" and $action == "ajouter_entrant" ) {
include("modules/courriers/ajouter.php");
}
elseif($module == "courrier" and $action =="ajouter_sortant") {
include("modules/courriers/ajouter_sortant.php");
}
elseif($module == "courrier" and $action == "modifier")  {
include("modules/courriers/modifier.php");
}
elseif($module == "courrier" and $action == "afficher") {
include("modules/courriers/afficher.php");
}
elseif($module == "courrier" and $action == "supprimer" ) {
include("modules/courriers/supprimer.php");
}
elseif($module == "courriers" and $action == "etape2" ) {
include("modules/courriers/elements_courrier.php");
}
elseif($module == "courriers" and $action == "nonlus" ) {
include("modules/courriers/afficher.php");
}
elseif($module == "courriers" and $action == "internesrecus" ) {
include("modules/courriers/afficher_int.php");
}
elseif($module == "courriers" and $action=="recus") {
include("modules/courriers/recus1.php");
}
elseif($module == "courriers" and $action =="details") {
include("modules/courriers/afficher_detail.php");
}
elseif($module == "courrier" and $action=="reception") {
include("modules/courriers/reception.php");
}
elseif($module == "courriers" and $action=="brouillon") {
include("modules/courriers/brouillons.php");
}

elseif($module == "courrier" and $action=="transmettre") {
include("modules/courriers/transmettre.php");
}
elseif($module == "notes" and $action=="ajouter") {
include("modules/notes/ajouter.php");
}
elseif($module == "notes" and $action=="afficher") {
include("modules/notes/details_note.php");
}
elseif($module == "courriers" and $action=="encours") {
include("modules/courriers/encours.php");
}
elseif($module == "courrier" and $action=="traiter") {
include("modules/courriers/archive.php");
}
elseif($module == "courriers" and $action=="archives") {
include("modules/courriers/courriers_archives.php");
}
elseif($module == "courriers" and $action=="envoyes") {
include("modules/courriers/internes_send.php");
}
elseif($module == "courriers" and $action=="sortants") {
include("modules/courriers/sortants.php");
}
elseif($module == "courriers" and $action=="sortants") {
include("modules/courriers/sortants.php");
}
elseif($module == "courriers" and $action=="internes") {
include("modules/courriers/internes_send_int.php");
}
elseif($module == "courriers" and $action=="intdir") {
include("modules/courriers/internes_dircab.php");
}
elseif($module == "admin" and $action=="ajouteruser") {
include("modules/users/ajouter.php");
}
elseif($module == "admin" and $action=="ajoutertype") {
include("modules/types_courriers/ajouter.php");
}
elseif($module == "admin" and $action=="ajouterservice") {
include("modules/users/services/ajouters.php");
}
elseif($module == "admin" and $action=="entrant") {
include("modules/admin/entrant.php");
}
elseif($module == "admin" and $action=="sortant") {
include("modules/admin/sortant.php");
}
elseif($module == "admin" and $action=="user") {
include("modules/admin/users.php");
}
elseif($module == "admin" and $action=="service") {
include("modules/admin/services.php");
}
elseif($module == "admin" and $action=="type_courrier") {
include("modules/admin/types_courrier.php");
}
elseif($module == "courriers" and $action=="modifier") {
include("modules/admin/modifier_courrier.php");
}
elseif($module == "users" and $action=="modifier") {
include("modules/users/modifier.php");
}
elseif($module == "users" and $action=="detail") {
include("modules/users/details_utilisateur.php");
}
elseif($module == "supprimer") {
include("supprimer.php");
}
elseif($module == "services" and $action=="modifier") {
include("modules/users/services/modifier.php");
}
elseif($module == "services" and $action=="modifier") {
include("modules/users/services/modifier.php");
}
elseif($module == "ordres" and $action=="details") {
include("modules/ordres/afficher_details.php");
}
elseif($module == "autorisation" and $action=="details") {
include("modules/autorisation/afficher_details.php");
}

elseif($module == "courrier" and $action=="infos") {
include("modules/courriers/etat.php");
}
elseif($module == "stat" and $action=="user") {
include("modules/stat/stat_user.php");
}
elseif($module == "stat" and $action=="date") {
include("modules/stat/stat_date.php");
}
elseif($module == "stat" and $action=="period") {
include("modules/stat/stat_period.php");
}
elseif($module == "courriers" and $action=="transmis") {
include("modules/courriers/transmis.php");
}
elseif($module == "courriers" and $action=="search") {
include("modules/courriers/search.php");
}
elseif($module == "courriers" and $action=="evolution") {
include("modules/dircab/details_courrier.php");
}
elseif($module == "courriers" and $action=="accusation") {
include("modules/dircab/accuser_reception.php");
}
elseif($module == "courriers" and $action=="orientation") {
include("modules/dircab/orienter_courrier.php");
}
elseif($module == "user" and $action=="change") {
include("modules/courriers/change.php");
}
elseif($module == "resp" and $action=="nonlus") {
include("modules/courriers/affichier_resp.php");
}
elseif($module == "resp" and $action=="encours") {
include("modules/courriers/encours_resp.php");
}
elseif($module == "admin" and $action=="accueil") {
include("modules/admin/accueil_admin.php");
}
elseif($module == "dircab" and $action=="entrant") {
include("modules/dircab/liste.php");
}
elseif($module == "dircab" and $action=="synthese") {
include("modules/dircab/synthese.php");
}
elseif($module == "courrier" and $action=="all") {
include("modules/dircab/dircaba.php");
}
elseif($module == "ordres" and $action=="ajouter") {
include("modules/ordres/ajouter.php");
}
elseif($module == "ordres" and $action=="modifier") {
include("modules/ordres/modifier.php");
}
elseif($module == "ordres" and $action=="gerer") {
include("modules/ordres/afficher.php");
}
elseif($module == "autorisation" and $action=="ajouter") {
include("modules/autorisation/ajouter.php");
}
elseif($module == "courriers" and $action=="classeurs") {
include("modules/classeurs/afficher.php");
}
elseif($module == "classeurs" and $action=="ajouter") {
include("modules/classeurs/ajouter.php");
}
elseif($module == "classeur" and $action=="modifier") {
include("modules/classeurs/modifier.php");
}
elseif($module == "autorisation" and $action=="modifier") {
include("modules/autorisation/modifier.php");
}
elseif($module == "autorisation" and $action=="gerer") {
include("modules/autorisation/afficher.php");
}
}
else
{
echo " Erreur URL, veuillez spécifier une URL correcte";
}
?>
		
		
		</td>
      </tr>
    </table></td>
  </tr>
  
</table></p>