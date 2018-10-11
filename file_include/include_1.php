<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DoraBox - PATH_INCLUDE</title>
</head>
<body>
<?php
	include "../class/function.class.php";
	$p = new Func("GET","file");
	$p -> con_html();
	if (isset($_REQUEST['submit'])) {
		$file = $_REQUEST['file'];
		include './'.$file;
	}
?>
</body>
</html>
