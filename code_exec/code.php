<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DoraBox - 代码执行</title>
</head>
<body>
<?php
	include "../class/function.class.php";
	$p = new Func("GET","code");
	$p -> con_html();
	if (isset($_REQUEST['submit'])) {
		$code = $_REQUEST['code'];
		echo $p -> con_function('assert',$code);
	}
?>
</body>
</html>
