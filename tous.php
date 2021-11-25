<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
 /*
$dmile9 = mktime(0, 0, 0, 1, 1, 2009);
$dmile10 = mktime(0, 0, 0, 1, 1, 2010);
$dmile11 = mktime(0, 0, 0, 1, 1, 2011);
$diff1 = $dmile10 - $dmile9;
$diff2 = $dmile11 - $dmile10;

echo "Timestamp au 1er janvier 2009 &eacute;tait $dmile9<br>";
echo "Timestamp au 1er janvier 2010 &eacute;tait $dmile10<br>";
echo "Timestamp au 1er janvier 2011 &eacute;tait $dmile11<br>";
echo "diff&eacute;rence entre 2010 et 2009 est $diff1<br>";
echo "la diff&eacute;rence entre 2011 et 2010 est $diff2<br>";
echo"<br><br>";
echo date('d-m-Y', 1293836400);
*/
 ?>
 
 <?php
 /*
 echo "<br><br>Code 2<br>";
 
 $i = 115;
 $date_arrivee = 1262300399;
 $ecart2t = 31536000;
 
 $debutt = 1230764400;

$differencet= $date_arrivee - $debutt;
$nbre_ecart = floor($differencet/$ecart2t);
$nbre_ecart = 9 + $nbre_ecart;
if($nbre_ecart < 10) {
$nbre_ecart = "0".$nbre_ecart;
}
$numeroct = $i."-".$nbre_ecart;
echo "courrier numero $numeroct<br>";


$actuel = time();
$ecart2t = 31536000;
$debutt = 1230764400;
$diffactuel = $actuel - $debut;
$rappactuel = floor($debut - $ecart2t);

function timeback($id) {
$id1 += $id;
$req = "select * from courrier where id = $id1";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$ids = 0;
while ($data = mysql_fetch_array($res)) {
$ids = $data['id'];
}
return $ids
}
*/
mysql_connect("localhost", "root", "");
mysql_select_db("presidence");
$req = "select * from courrier where id_entrant != 0 order by id";
$res = mysql_query($req) or die ("Erreur SQL".mysql_error());
$incre = 0;
while($data = mysql_fetch_array($res)) {
$ecart2t = 31536000;
$actualt = 1230764400;
$debutt = $data['date_arrivee'];
$diffactuel = $debutt - $actualt;
$rappactuel = floor($diffactuel/$ecart2t);
$nbre_ecart = 9 + $rappactuel;
if($nbre_ecart < 10) {
$nbre_ecart = "0".$nbre_ecart;
if($data['id_entrant'] < 10 ) {
$new_id = "0000".$data['id_entrant'];
}
elseif($data['id_entrant'] < 100 ) {
$new_id = "000".$data['id_entrant'];
}
elseif($data['id_entrant'] < 1000 ) {
$new_id = "00".$data['id_entrant'];
}
elseif($data['id_entrant'] < 10000 ) {
$new_id = "0".$data['id_entrant'];
}
else
{
$new_id = $data['id_entrant'];
}
$numeroct = $new_id."-".$nbre_ecart;
$reqs = "update courrier set  id_entrant = '$numeroct' where id = '".$data['id']."' ";
$ress = mysql_query($reqs) or die ("Erreur SQL".mysql_error()."<br>".$req);
echo "le courrier n&deg; ".$data['id_entrant']." est devenu n&deg; $numeroct<br>";
}
else
{
$incre = $incre + 1;
if($incre < 10 ) {
$increm = "0000".$incre;
}
elseif($incre < 100 ) {
$increm = "000".$incre;
}
elseif($incre < 1000 ) {
$increm = "00".$incre;
}
elseif($incre < 10000 ) {
$increm = "0".$incre;
}
else
{
$increm = $incre;
}
$numeroct = $increm."-".$nbre_ecart;
$reqs = "update courrier set  id_entrant = '$numeroct' where id = '".$data['id']."' ";
$ress = mysql_query($reqs) or die ("Erreur SQL".mysql_error()."<br>".$req);
echo "le courrier n&deg; ".$data['id_entrant']." est devenu n&deg; $numeroct<br>";
}}

$request = "insert into increm values ('','$incre','".date('y', time())."')";
$result = mysql_query($request) or die ("Erreur SQL".mysql_error()."<br>".$request);
echo "Limit actuelle est .... pour l'ann&eacute;e ...";

?>

</body>

</html>
