<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require_once("connect.inc.php");
$req = "select * from courrier where id_entrant = '00001-1' order by id";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error.$req);
$new_id = 0;
while($data = mysql_fetch_array($res)) {
$new_id = $new_id + 1;
if($new_id < 10 ) {
$nouvel_id = "0000".$new_id."-11";
}
elseif($new_id < 100 ) {
$nouvel_id = "000".$new_id."-11";
}
else
{
$nouvel_id = $new_id."-11";
}
$req2 = "update courrier set id_entrant = '$nouvel_id' where id ='".$data['id']."'";
$res2 = mysql_query($req2) or die ("Erreur SQL".mysql_error.$req2);
echo "le courrier numero ".$data['id']. " a quitté du numero ".$data['id_entrant']." au numero <strong>".$nouvel_id."<br><br>";
}

?>
</body>
</html>