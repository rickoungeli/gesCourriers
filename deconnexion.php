<?php
@session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["password"])) {
	echo "<script language='javascript'>document.location='index.php'</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"/>
<title>Document sans titre</title>
</head>
<?php
session_destroy();

?>
<script language="javascript">
alert("Vous êtes déconnecté avec succès, vos données sont sécurisées, merci ! ! ! ");
document.location = "index.php";
</script>
<body>
</body>
</html>
