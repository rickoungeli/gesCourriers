<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("presidence");
$req = "CREATE TABLE  `increm` (
`id` MEDIUMINT NOT NULL AUTO_INCREMENT ,
`increm` TEXT NOT NULL ,
`year` TEXT NOT NULL ,
PRIMARY KEY (  `id` ) ,
UNIQUE (
`id`
)
) ENGINE = MYISAM";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error()."<br>".$req);
echo " La table a &eacute;t&eacute; cr&eacute;&eacute;e avec succ&egrave;s";

//:echo date('y', time());
?>
</body>
</html>
