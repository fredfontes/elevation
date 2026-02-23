<?php
if (!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$", $_GET["email"]))
	{
	print "error=email invalido";
	die();
	}

$fp = fopen("emails.txt", "r");
$content = fread($fp, filesize("emails.txt"));
fclose($fp);

if (eregi($_GET["email"], $content))
	{
	print "error=email duplicado";
	die();
	}

$fp = fopen("emails.txt", "a+");
if (fwrite($fp, $_GET["email"].";"))
	print "status=ok";
fclose($fp);
?>