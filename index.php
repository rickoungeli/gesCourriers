<?php
@session_start();
if(isset($_GET['module']) and isset($_GET['action']) and !isset($_SESSION['login']) and !isset($_SESSION['password'])) {
echo "<script language='javascript'>document.location='index.php?msg=coordonn�es incorrectes, veuillez recommencer'</script>";
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Gestion des courriers</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />

	<script language="javascript">
	function reception(id){
		if(confirm("Etes-vous sûr(e) d'avoir reçu physiquement ce courrier ?"))
			document.location = "index.php?module=courrier&action=reception&id="+id;
	}

	function traiter(id){
		if(confirm("Etes-vous s�r(e) de vouloir marqu� ce courrier comme traiter et l'archiver ?"))
			document.location = "index.php?module=courrier&action=traiter&id="+id;
	}

	function supprimer(action, id){
		if(confirm("Etes-vous s�r(e) de vouloir supprimer d�finitivement cet �l�ment ?"))
			document.location = "index.php?module=supprimer&action="+action+"&id="+id;
	}

	function AfficherMasquerDiv(le_calque){
		if (document.getElementById(le_calque).style.display == "none"){
			document.getElementById(le_calque).style.display = "block";
		}else{
			document.getElementById(le_calque).style.display ="none";
		}

	function OuvrirFenetre(url,nom,details) {
	window.open(url,nom,details)
	}
	</script>
	<Script Type="Text/JavaScript" Src="fonctions/ump.js"></Script>
</head>

<body>
	<table width="100%" border="5" cellspacing="0" cellpadding="0">
		<tr>
			<td width="69" height="69" background="images/bg_head.jpg"><img src="images/logo_head.png" width="69" height="63" /></td>
			<td background="images/bg_head.jpg"><div align="left"><img src="images/text_head.png" width="276" height="35" /></div></td>
			<td width="300" background="images/bg_head.jpg">
				<div class="div_header">
					<?php if(isset($_SESSION['login']) and isset($_SESSION['password'])){ ?>
								Bienvenue <b> <?php echo $_SESSION['nom'] ?> </b><br>
								<b>Espace Personnel de Gestion de courriers</b><br>
								<a href="index.php?module=user&amp;action=accueil" class="lien1">Accueil</a> | <a href="deconnexion.php" class = "lien1">D&eacute;connexion</a>  | 
								<a href="index.php?module=user&action=change" class = "lien1">Changer le mot de passe</a>
			
					<?php } else {
								echo "Vous devez vous connecter";
						} 
					?>
			
				</div>
			</td>
		</tr>
	</table>

	<table width="100%" border="10" cellspacing="0" cellpadding="0" bordercolor="#FF0000">
		<tr>
			<td height="12" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td height="28" colspan="2" background="images/bg_band.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/titre_appli.png" width="278" height="15" /></td>
			<td height="28" valign="middle" background="images/bg_band.jpg">
				<div align="right">
					<span class="texte1">Kinshasa, le 
						<?php 
						include("fonctions/fonction_sql.inc.php");
						$date1 = date('d/m/Y', time());
						echo $date1;
						?> 
			
			
						<script>
							document.write('<span id="AffKinshasa">'+afficher(1)+'</span>');

							function afficher(decalage) {
								maintenant = new Date();
								heures = (maintenant.getUTCHours()+decalage)%24;
								if(heures < 0) heures += 24;
								if(heures < 10) heures = '0'+heures;
								minutes = maintenant.getUTCMinutes();
								if(minutes < 10) minutes = '0'+minutes;
								secondes = maintenant.getUTCSeconds();
								if(secondes < 10) secondes = '0'+secondes;

								var retourner = heures+':'+minutes;
								if(decalage == +1) retourner += ':'+secondes;
								return retourner;
							}
							function heure(numero) {
								AffKinshasa.innerHTML = afficher(1);
								setTimeout(heure,500);
							}

							heure();
						</script>
			
					</span>&nbsp;&nbsp;&nbsp;
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php } ?>
				<table width="100%" border="2" cellspacing="0" cellpadding="0" bordercolor="#33FF66">
					<tr>
						<td>
							<?php
							if(isset($_POST['login']) and isset($_POST['password'])) { 
								include("login_trait.php");}
							elseif(!isset($_GET['module']) || !isset($_GET['action'])) {
								include("connexion.php");} 
							else {
								include("appli.php");
							}
							?>
						</td>
					</tr>
				</table>
				<p><br /></p>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" valign="top" background="images/bg_foot.jpg" style="padding-top:5px;">
				<p align="center" style="line-height:20px;">&copy; Direction des NTIC / Pr&eacute;sidence de la R&eacute;publique D&eacute;mocratique du Congo - 2009<br />
					Tous droits r&eacute;serv&eacute;s par copyright<br />
					R&eacute;alis&eacute; par GWD<br />
				</p>
			</td>
		</tr>	
	</table>
</body>
</html>