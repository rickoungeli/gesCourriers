<?php
include("connect.inc.php");

function get_data($req){
	//var $tab_res;
	$res = mysql_query($req) or die ("Erreur SQL !<br>".mysql_error()."<br>".$req);
	$i=0;
	$tab_res[0]=0;
	while($tab=mysql_fetch_array($res)){
		$tab_res[$i++] = $tab;
	}
	return $tab_res;
}

// Prend en paramètre une requette de selection, pour retourner une liste d'option (pour comboBox),
// la propriété 'value' prend la valeur de la première colonne de la requette,  
// et la valeur à afficher sur la liste, est celle de la seconde colonne de la requette
function get_combobox($req){
	$res = mysql_query($req) or die ("Erreur SQL !<br>".mysql_error()."<br>".$req);
	while($tab=mysql_fetch_row($res)){
		echo "<option value='".$tab[0]."'>".$tab[1]."</option>";
	}
}

function get_combobox_id($req,$id){
	$res = mysql_query($req) or die ("Erreur SQL !<br>".mysql_error()."<br>".$req);
	while($tab=mysql_fetch_row($res)){
		if ($tab[0]==$id)
			echo "<option value='".$tab[0]."' selected='selected'>".$tab[1]."</option>";
		else
			echo "<option value='".$tab[0]."'>".$tab[1]."</option>";
	}
}



// Cette fonction prend en paramètre une requette, et retourne une chaine correspondante 
// à une table Html.
function get_table($req){
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);

$table = "<table border='1' cellspacing='0' bordercolor='#999999' style='border-collapse:collapse'><tr>";
$enreg = mysql_fetch_row($res);
for($i=0;$i<count($enreg);$i++)//for($i=1;$i<count(mysql_fetch_row($res));$i++)
	$table .= "<td bgcolor='#CECECE'>".mysql_field_name($res,$i)."</td>";

//foreach ($res[0] as $titre=>$valeur) /*récuperation des titres des colonnes*/
//	$table .= "<td>".$titre."</td>";
$table.= "</tr>";
$res = mysql_query($req) or die ("Erreur sql <br>".mysql_error()."<br>".$req);
while($enreg = mysql_fetch_row($res)) { //$i=0;$i<count($res);$i++){
	$table.= "<tr>";
	for($i=0;$i<count($enreg);$i++){
		$table .= "<td>".$enreg[$i]."</td>";
	}
	$table.= "</tr>";
}
$table.= "</table>";

return $table;
}



?>

<?php
// quelques fonctions utilistaires
// MISE EN FORME DE LA DATE
function format_date($ladate){
	$les_mois["01"] = "janvier";
	$les_mois["02"] = "février";
	$les_mois["03"] = "mars";
	$les_mois["04"] = "avril";
	$les_mois["05"] = "mai";
	$les_mois["06"] = "juin";
	$les_mois["07"] = "juillet";
	$les_mois["08"] = "août";
	$les_mois["09"] = "septembre";
	$les_mois["10"] = "octobre";
	$les_mois["11"] = "novembre";
	$les_mois["12"] = "décembre";
	
	return substr($ladate,8,2)." ".$les_mois[substr($ladate,5,2)]." ".substr($ladate,0,4);

}

?>