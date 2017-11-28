<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DoraBox - 反射XSS</title>
</head>
<body>
<?php
	include "../class/function.class.php";
	$p = new Func("GET","name");
	$p -> con_html();
	if (isset($_REQUEST['submit'])) {
		$name = $_REQUEST['name'];
		echo $p -> con_function('var_dump',$name);
	}
?>
</body>
</html>
