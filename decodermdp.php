<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("presidence");
$resultat=mysql_query("select id_utilisateur,password from utilisateurs") or die('Erreur SQL : '.$resultat);
while ($row = mysql_fetch_array($resultat))
{ 					   
$id = $row[0];
$pwd = md5($row[1]);	
		?>
		<script langage="javascript">
	
		document.write=(alert(<?php echo $pwd ?>));
		</script>
		<?php	


}				   
?>
</body>
</html>
