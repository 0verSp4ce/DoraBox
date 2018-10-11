<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DoraBox - 反射XSS</title>
</head>
<body>
<?php
	include "../class/function.class.php";
	$p = new Func("GET","url");
	$p -> con_html();
	if (isset($_REQUEST['submit'])) {
		$url = $_REQUEST['url'];
		echo $p -> con_function('file_get_contents',$url);
	}
?>
</body>
</html>
