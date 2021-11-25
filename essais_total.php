<?php
@session_start;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>
</p>
<form id="form1" name="form1" method="post" action="">
  <span class="texte1">
  <label></label>
  </span>
</form>
<p>
<?php
}
else
{
$jourd = $_POST['jourd'];
$moisd = $_POST['moisd'];
$anneed = $_POST['anneed'];
$jourd = $_POST['jourd2'];
$moisd = $_POST['moisd2'];
$anneed = $_POST['anneed2'];
$timestamp1 = mktime(0, 0, 0,  $_POST['moisd'], $_POST['jourd'], $_POST['anneed']);
$timestamp2 = mktime(0, 0, 0,  $_POST['moisd2'], $_POST['jourd2'], $_POST['anneed2']);
include("classes/courrier.class.inc.php");
$courrier = new courrier;
echo $courrier -> TotalMessageSentPeriod($timestamp1, $timestamp2);
}
?>
</p>
<p>
<?php
$courrie = new courrier;
echo $courrier -> TotalCourrierSentService(6);
?>
</p>
</body>
</html>
